<?php
$hostname = 'khalejmovers.com/ayola';
$sitemapUrls = [];
$dataFolder = 'data/';

// Fungsi untuk mengganti spasi dengan tanda hubung dan menghapus karakter yang tidak diinginkan
function sanitizeName($name) {
    return preg_replace('/[^a-z0-9-]+/', '-', strtolower(trim($name)));
}

// Membaca file data.txt untuk mendapatkan daftar keyword
$filePath = 'data.txt';
$keywords = file($filePath, FILE_IGNORE_NEW_LINES);

foreach ($keywords as $keyword) {
    $keyword = sanitizeName(trim($keyword));
    $contentFile = $dataFolder . $keyword . '.txt';

    if (file_exists($contentFile)) {
        $content = file_get_contents($contentFile);
        $sections = explode("\n\n", $content);

        foreach ($sections as $index => $section) {
            preg_match('/^Title:\s*(.+)$/m', $section, $titleMatches);
            if ($titleMatches) {
                $folderName = $keyword;
                if ($index > 0) {
                    $folderName .= '-' . ($index + 1);
                }
                $protocol = "https";
                $baseUrl = "$protocol://$hostname";
                $sitemapUrl = $baseUrl . '/' . trim($folderName, '/') . '/';
                $sitemapUrl = preg_replace('#/+#', '/', $sitemapUrl);
                $sitemapUrl = str_replace('https:/', 'https://', $sitemapUrl);
                $sitemapUrls[] = $sitemapUrl;
            }
        }
    }
}

// Membuat sitemap.xml
$sitemapFile = './sitemap1.xml';
$sitemapContent = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
$sitemapContent .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

foreach ($sitemapUrls as $url) {
    $sitemapContent .= '<url>' . PHP_EOL;
    $sitemapContent .= '<loc>' . htmlspecialchars($url) . '</loc>' . PHP_EOL;
    $sitemapContent .= '</url>' . PHP_EOL;
}

$sitemapContent .= '</urlset>';

file_put_contents($sitemapFile, $sitemapContent);
echo "Sitemap dibuat: $sitemapFile\n";
?>