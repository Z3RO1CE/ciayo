<?php
$hostname = 'akademi.rotogravureindonesia.co.id';
$dataFolder = 'data/';
$templateFolder = 'templates/';
echo "Memeriksa folder data: $dataFolder\n";

$progressFile = 'progress.txt';
$processedCount = 0;
$maxDirectoriesPerRun = 100000; // ✅ Nilai lebih realistis

// Reset the last processed keyword index
$lastProcessedIndex = 0;

// Load the last processed keyword index from progress.txt
if (file_exists($progressFile)) {
    $lastProcessedIndex = (int)file_get_contents($progressFile);
}

echo "Memeriksa folder data: $dataFolder\n";


// Array untuk menyimpan URL untuk sitemap
$sitemapUrls = [];

// Fungsi untuk membaca template PHP dari folder templates
function loadTemplates($templateFolder) {
    $templates = [];
    $files = glob($templateFolder . '*.php'); // Ganti ekstensi ke .php
    foreach ($files as $file) {
        $templateName = basename($file, '.php'); // Gunakan .php template
        $templates[$templateName] = file_get_contents($file);
    }
    return $templates;
}

// Memuat template PHP dari folder templates
$htmlTemplates = loadTemplates($templateFolder);

// Membaca file data.txt untuk mendapatkan daftar keyword
$filePath = 'data.txt';
$keywords = file($filePath, FILE_IGNORE_NEW_LINES);
$totalKeywords = count($keywords);


// Array untuk menyimpan tautan internal
$internalLinksArray = [];

// Fungsi untuk mengganti spasi dengan tanda hubung dan menghapus karakter yang tidak diinginkan
function sanitizeName($name) {
    return preg_replace('/[^a-z0-9-]+/', '-', strtolower(trim($name)));
}


// Fungsi untuk memuat gambar acak dari daftar gambar dengan hostname
function getRandomImage($imageSources, $hostname) {
    $randomIndex = array_rand($imageSources);
    return "https://$hostname/" . $imageSources[$randomIndex];
}

// Daftar gambar tanpa hostname
$imageSources = [
    'slot1.png',
    'slot2.png',
    'slot3.png',
    'slot4.png',
    'slot5.png',
    'slot6.png',
    'slot7.png'
];

// Loop pertama untuk mengumpulkan semua URL yang akan dibuat
foreach ($keywords as $index => $keyword) {
    if ($index < $lastProcessedIndex) {
        echo "Skipping keyword at index $index: $keyword\n";
        continue;
    }
    
    if ($processedCount >= $maxDirectoriesPerRun) {
        echo "Reached maximum directories per run ($maxDirectoriesPerRun). Stopping.\n";
        break;
    }
    
    $keyword = sanitizeName(trim($keyword));
    echo "$keyword dilist=success\n";
                
    // Buat folder jika belum ada
    $folderPath = './' . $keyword . '/';
    if (!file_exists($folderPath)) {
        mkdir($folderPath, 0777, true);
        echo "Folder dibuat: $folderPath\n";
        $processedCount++;
    } else {
        echo "Folder sudah ada: $folderPath\n";
    }

    // Membaca konten dari file yang sesuai dengan keyword
    $contentFile = $dataFolder . $keyword . '.txt';
    $content = '';
    $sections = [];

    if (file_exists($contentFile)) {
        $content = file_get_contents($contentFile);
        // Memisahkan konten menjadi judul dan deskripsi
        $sections = explode("\n\n", $content);
    }

    if (empty($sections)) {
        // If no content file, create a default title and description
        $title = ucwords(str_replace('-', ' ', $keyword));
        $description = "This is a default description for $keyword.";
        $sections = [ "Title: $title\nDescription: $description" ];
    }
    
    // Menghasilkan landing page untuk setiap bagian
    foreach ($sections as $sectionIndex => $section) {
        preg_match('/^Title:\s*(.+)$/m', $section, $titleMatches);
        preg_match('/^Description:\s*(.+)$/m', $section, $descMatches);

        if ($titleMatches && $descMatches) {
            $title = trim($titleMatches[1]);
            $description = trim($descMatches[1]);

            // Format judul tanpa tanda '-'
            $formattedTitle = ucwords(strtolower(str_replace('-', ' ', $title)));

            // Nama folder dan path
            $folderName = $keyword;
            if ($sectionIndex > 0) {
                $folderName .= '-' . ($sectionIndex + 1);
            }
            $folderPath = './' . $folderName . '/';

            // Buat folder jika belum ada
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
                $processedCount++;
            }

            // Placeholder untuk paragraf acak
            $randomParagraph = generateRandomParagraph($internalLinksArray[$keyword]);

            // Pilih gambar acak dengan hostname
            $randomImage = getRandomImage($imageSources, $hostname);

            // Pilih template berdasarkan indeks
            $templateKeys = array_keys($htmlTemplates);
            $templateKey = $templateKeys[$sectionIndex % count($templateKeys)];
            $template = $htmlTemplates[$templateKey];

            // Hilangkan tanda hubung dari brand
            $brand = str_replace('-', ' ', $keyword);

            // Ganti placeholder dengan nilai aktual
            $phpContent = str_replace(['{{brand}}', '{{title}}', '{{description}}', '{{folderName}}', '{{internalLinks}}', '{{image}}', '{{canonical}}'], [$brand, $formattedTitle, $description, $folderName, $randomParagraph, $randomImage, "https://$hostname/$folderName/"], 
            $template);

            // Ganti {$hostname} juga
            $phpContent = str_replace('{$hostname}', $hostname, $phpContent);
            
            // Simpan konten PHP ke file
            $fileName = 'index.php';
            file_put_contents($folderPath . $fileName, $phpContent);
            echo "Dihasilkan: " . $folderPath . $fileName . PHP_EOL;
        }
    }
    
    // Update progress file
    file_put_contents($progressFile, $index + 1);
}

include 'sitemap_generator.php';
include 'robots_generator.php';
?>