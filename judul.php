<?php

// Pastikan fungsi hanya dideklarasikan jika belum ada
if (!function_exists('formatTopicForFile')) {
    function formatTopicForFile($topic) {
        return str_replace(' ', '-', strtolower($topic));
    }
}

if (!function_exists('formatTopicForDisplay')) {
    function formatTopicForDisplay($topic) {
        return ucwords(str_replace('-', ' ', $topic));
    }
}

function generateRandomTitleAndDescription($topic) {
    $emojis = [
        '🚀',
        '🌌',
        '🍀',
        '⚡',
		'🔥',
		'☄️',
		'🌟',
		'💰',
		'🎰',
        '💰',
        '🌟',
        '✨',
        '🎯',
        '🎉',
        '🏆'
    ];

    $actions = [
        'Gerbang Luar Biasa',
        'Pusat Kesuksesan',
        'Jalan Kemenangan',
        'Portal Keberuntungan',
        'Akses Utama',
        'Hub Pengalaman',
        'Gerbang Emas',
        'Akses Premium',
        'Pintu Keajaiban',
        'Zona Eksklusif',
        'Gerbang Galaksi',
        'Situs Legendaris',
        'Koneksi Cepat',
        'Portal Bintang',
        'Titik Sentral',
        'Basis Terpercaya',
        'Pusat Elit',
        'Gerbang Keunggulan',
        'Akses Galaksi',
        'Zona Utama',
		'Puncak Kemenangan',
        'Portal Kemenangan',
        'Pusat Keberuntungan',
        'Gerbang Impian',
        'Jalan Menuju Kemenangan',
        'Zona Kemenangan',
        'Sumber Keberhasilan',
        'Akses Sukses',
        'Pintu Kesuksesan',
        'Oasis Keberuntungan',
        'Katalis Kemenangan',
        'Dunia Keberuntungan',
        'Pusat Jackpot',
        'Ruang Kemenangan',
        'Arena Keberuntungan',
        'Portal Peluang',
        'Kawasan Emas',
        'Jalan Emas',
        'Situs Kemenangan',
        'Emporium Keberuntungan',
        'Puncak Keberhasilan',
        'Gerbang Keberhasilan',
        'Tempat Legendaris',
        'Pusat Slot',
        'Jalan Menuju Jackpot',
        'Koneksi Keberuntungan',
        'Gerbang Keajaiban',
        'Basis Kemenangan',
        'Zona Premium',
        'Kota Keberuntungan',
        'Pintu Peluang',
        'Gerbang Kesempatan',
        'Portal Terbaik',
        'Emporium Kemenangan',
        'Pusat Sukses',
        'Puncak Jackpot',
        'Akses Kemenangan',
        'Basis Elit',
        'Zona Emas',
        'Ruang Jackpot',
        'Pintu Peluang Emas',
        'Dunia Sukses',
        'Tempat Kesuksesan',
        'Pusat Strategi',
        'Jalan Menuju Keberuntungan',
        'Oasis Kemenangan',
        'Gerbang Keberuntungan',
        'Situs Utama',
        'Portal Keberhasilan',
        'Dunia Emas'
    ];

    $descriptors = [
        'Slot Megah',
        'Slot Beruntung',
        'Slot Fantastis',
        'Slot Menakjubkan',
        'Slot Mengasyikkan',
        'Slot Luar Angkasa',
        'Slot Kosmik',
        'Slot Terhebat',
        'Slot Spektakuler',
        'Slot Epik',
        'Slot Dahsyat',
        'Slot Sensasional',
        'Slot Megahit',
        'Slot Angkasa',
        'Slot Elite',
        'Slot Terfavorit',
        'Slot Paling Dicari',
        'Slot Nomor Satu',
        'Slot Super',
        'Slot Eksklusif',
		'Slot Jackpot',
        'Slot Keberuntungan',
        'Slot Kemenangan Besar',
        'Slot Emas',
        'Slot Ajaib',
        'Slot Mewah',
        'Slot Fantasi',
        'Slot Menang Terus',
        'Slot Bintang',
        'Slot Berani Menang',
        'Slot Penuh Kejutan',
        'Slot Penuh Energi',
        'Slot Bersinar',
        'Slot Beruntung Setiap Hari',
        'Slot Terbaik',
        'Slot Pemburu Jackpot',
        'Slot Sukses Gemilang',
        'Slot Berkualitas',
        'Slot Cemerlang',
        'Slot Pemenang'
    ];
    
    $extras = [
        'Dengan RTP Galaksi Tinggi',
        'Peluang Menang Spektakuler',
        'Deposit Via E-Wallet Tanpa Potongan',
        'Jackpot Megah Setiap Hari',
        'Slot Baru Menggelegar',
        'Paling Gacor Sepanjang Masa',
        'Keamanan Super Ketat',
        'Bonus Kosmik Besar',
        'Transaksi Kilat',
        'Banyak Hadiah Menanti',
        'Terdaftar Resmi dan Aman',
        'Pembayaran Pasti Cepat',
        'Jackpot Terus Menerus',
        'Menguntungkan Sepanjang Hari',
        'Gameplay Mudah dan Seru',
        'Jackpot Progresif Tanpa Batas',
        'Fitur Terbaru dan Terbaik',
        'Banyak Kejutan Menanti',
        'Bonus Berlimpah Setiap Hari',
        'Layanan Dukungan Nonstop',
        'Transaksi Lancar dan Cepat',
        'Kemenangan Setiap Hari',
        'Dijamin Aman 100%',
        'Permainan Paling Populer',
		'Kemenangan Beruntun',
        'Taruhan Cerdas, Hasil Besar',
        'Peluang Menang Tiada Henti',
        'Keberuntungan Menanti Anda',
        'Bonus Spin Gratis Setiap Hari',
        'RTP Tinggi untuk Kemenangan Maksimal',
        'Dapatkan Kemenangan Fantastis',
        'Slot Terpanas Saat Ini',
        'Kemenangan Mega Menanti',
        'Bermain dan Menang Besar',
        'Keberuntungan Selalu Bersama Anda',
        'Keuntungan Besar di Setiap Putaran',
        'Jackpot Sehari-hari yang Menggoda',
        'Keseruan Menang Tiada Henti',
        'Nikmati Kemenangan Instan',
        'Mainkan Slot Favorit Anda',
        'Pengalaman Menang yang Mengasyikkan',
        'Bonus Tambahan di Setiap Taruhan',
        'Hadiah Mewah Setiap Minggu',
        'Kemenangan Spektakuler Menanti Anda',
        'Peluang Jackpot Menggiurkan',
        'Berita Baik: Kemenangan Besar di Depan Mata',
        'Slot dengan RTP Tertinggi',
        'Kemenangan Besar di Ujung Jari Anda',
        'Peluang Emas Setiap Saat',
        'Jackpot yang Tidak Pernah Habis',
        'Raih Kemenangan Sekarang',
        'Permainan Penuh Kemenangan',
        'Kejutan Kemenangan Tiap Putaran',
        'Dapatkan Kemenangan Mega Hari Ini',
        'Slot dengan Peluang Menang Tinggi',
        'Serunya Menang Setiap Hari',
        'Slot Berhadiah Besar',
        'Bonus Melimpah untuk Semua Pemain',
        'Kemenangan Tiada Tanding',
        'Keberuntungan Ada di Sini',
        'Dapatkan Kemenangan Spektakuler',
        'Menang Besar di Setiap Putaran',
        'Kemenangan Cepat, Tanpa Ribet',
        'Momen Kemenangan Menyergap Anda',
        'Dapatkan Jackpot Impian Anda',
        'Putaran Menang yang Beruntun',
        'Rasakan Keseruan Kemenangan Besar',
        'Buka Peluang Menang yang Luas',
        'Kemenangan Luar Biasa untuk Semua',
        'Permainan yang Menghadiahkan Kemenangan',
        'Jackpot Menunggu untuk Diambil',
        'Selamat Datang di Dunia Kemenangan',
        'Peluang Besar, Kemenangan Nyata',
        'Nikmati Kemenangan Berlimpah Setiap Hari'
    ];

    $connectors = [
        'serta',
        'dan',
        'dengan',
        'untuk',
        'menghadirkan'
    ];

    $adjectives = [
        'Fantastis',
        'Epik',
        'Luar Biasa',
        'Megah',
        'Menakjubkan',
        'Spektakuler',
        'Fenomenal',
        'Elite',
        'Istimewa',
        'Dahsyat',
		'Berkelas',
        'Menggetarkan',
        'Menyenangkan',
        'Mempesona',
        'Luar Biasa',
        'Fantasi',
        'Memukau',
        'Menawan',
        'Bergengsi',
        'Keren',
        'Ajaib',
        'Glamor',
        'Bersinar',
        'Kemenangan',
        'Sensasi',
        'Menguntungkan',
        'Premium',
        'Megah',
        'Spektakuler',
        'Mewah',
        'Sensasional',
        'Kejutan',
        'Brilian',
        'Cuan',
        'Eksklusif',
        'Jackpot',
        'Tak Terbatas',
        'Sukses',
        'Gemilang'
    ];

    $templates = [
        "Bergabunglah dengan {topic}, {descriptor} {connector} {extra}. Dapatkan kesempatan memenangkan hadiah besar dan menikmati permainan yang menarik dan seru. Rasakan sensasi bermain {topic} dengan fitur-fitur terbaik yang kami tawarkan.",
        "Temukan {topic}, tempat {descriptor} berkumpul {connector} {extra}. Dapatkan pengalaman bermain yang luar biasa dengan berbagai macam bonus dan layanan unggulan yang kami sediakan. Bergabunglah sekarang {topic} dan nikmati permainan yang menguntungkan.",
        "{topic} menyediakan {descriptor} {connector} {extra}. Nikmati permainan terbaik dengan peluang menang tinggi. Daftar sekarang dan jadilah bagian dari komunitas kami yang selalu menang.",
        "{topic} adalah pilihan terbaik untuk {descriptor} {connector} {extra}. Kami menawarkan permainan dengan RTP tinggi dan banyak {topic} bonus menarik. Jangan lewatkan kesempatan ini untuk menang besar.",
        "Mainkan {topic}, {descriptor} {connector} {extra}. Dengan dukungan 24/7 dan transaksi mudah, kami menjamin pengalaman bermain yang aman dan nyaman.",
        "{topic} hadir dengan {descriptor} {connector} {extra}. Dapatkan akses ke permainan terbaru dan fitur canggih yang kami tawarkan. Daftar sekarang dan nikmati kemenangan konsisten.",
        "{topic}, tempat {descriptor} bertemu {connector} {extra}. Kami menawarkan layanan premium dan bonus besar untuk setiap anggota. Bergabunglah sekarang dan rasakan keuntungan bermain bersama kami.",
        "Dengan {topic}, {descriptor} {connector} {extra} menjadi lebih mudah. Kami menawarkan permainan dengan RTP tinggi dan banyak jackpot menanti Anda.",
        "Bergabunglah di {topic} dan nikmati {descriptor} {connector} {extra}. Kami menyediakan berbagai macam permainan seru dengan peluang menang tinggi. Daftar sekarang dan raih kemenangan besar.",
        "{topic} menghadirkan {descriptor} {connector} {extra}. Dengan banyak fitur menarik dan bonus besar, pengalaman bermain Anda akan menjadi lebih menyenangkan dan menguntungkan.",
        "{topic} adalah pusat {descriptor} {connector} {extra}. Kami menawarkan berbagai macam permainan dengan fitur terbaik dan bonus besar. Jangan lewatkan kesempatan untuk menang besar bersama kami.",
        "Mainkan {topic} dan nikmati {descriptor} {connector} {extra}. Kami menjamin pengalaman bermain yang luar biasa dengan banyak kemenangan dan fitur menarik.",
        "Temukan {topic}, tempat {descriptor} {connector} {extra}. Daftar sekarang dan dapatkan akses ke permainan dengan RTP tinggi dan banyak bonus menarik.",
        "{topic} menawarkan {descriptor} {connector} {extra}. Bergabunglah sekarang dan nikmati permainan dengan peluang menang tinggi dan banyak bonus menanti Anda."
    ];

    // Acak kata kunci dan pilih beberapa
    $emoji = $emojis[array_rand($emojis)];
    $action = $actions[array_rand($actions)];
    $descriptor = $descriptors[array_rand($descriptors)];
    $extra = $extras[array_rand($extras)];
    $connector = $connectors[array_rand($connectors)];
    $adjective = $adjectives[array_rand($adjectives)];

    // Format topik
    $formattedTopicForFile = formatTopicForFile($topic);
    $formattedTopicForDisplay = formatTopicForDisplay($topic);

    // Bangun judul dan deskripsi
    $title = "$formattedTopicForDisplay $emoji $action $adjective $descriptor";
    $description = str_replace(
        ["{descriptor}", "{connector}", "{extra}", "{topic}"],
        [$descriptor, $connector, $extra, $formattedTopicForDisplay],
        $templates[array_rand($templates)]
    );

    return ['title' => $title, 'description' => $description, 'formattedTopicForFile' => $formattedTopicForFile];
}

// Baca data dari file data.txt
$filePath = 'data.txt';
$names = file($filePath, FILE_IGNORE_NEW_LINES);

// Looping untuk setiap nama dan batasi jumlah yang dihasilkan
foreach ($names as $index => $name) {
    // Pastikan folder data sudah ada atau buat jika belum ada
    if (!file_exists('data')) {
        mkdir('data', 0777, true);
    }

    // Variabel untuk menyimpan semua judul dan deskripsi
    $content = "";

    // Hasilkan 5 judul dan deskripsi
    for ($i = 0; $i < 5; $i++) {
        $data = generateRandomTitleAndDescription($name);
        $title = $data['title'];
        $description = $data['description'];

        // Tambahkan judul dan deskripsi ke konten
        $content .= "Title: $title\nDescription: $description\n\n";
    }

    // Buat nama file sesuai dengan nama dari data.txt tanpa angka
    $fileName = "data/{$data['formattedTopicForFile']}.txt";
    file_put_contents($fileName, $content);

    echo "Judul dan deskripsi berhasil dibuat dan disimpan di $fileName\n";
}
?>
