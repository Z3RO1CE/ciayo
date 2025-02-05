<?php
$hostname = 'khalejmovers.com/ayola';
$baseUrl = "https://$hostname";

// Menyusun isi robots.txt
$robotsContent = "User-agent: *" . PHP_EOL;

// Menambahkan sitemap1.xml ke dalam robots.txt
$robotsContent .= "Sitemap: $baseUrl/sitemap1.xml" . PHP_EOL;

file_put_contents('./robots.txt', $robotsContent);
echo "Dihasilkan robots.txt: ./robots.txt" . PHP_EOL;
?>