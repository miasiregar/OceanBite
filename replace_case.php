<?php
$files = [
    'app/Http/Controllers/AdminController.php',
    'app/Http/Controllers/OrderController.php',
    'app/Http/Controllers/MenuController.php',
    'app/Http/Controllers/CartController.php'
];
foreach ($files as $file) {
    $content = file_get_contents($file);
    $content = str_replace("'USERS'", "'users'", $content);
    $content = str_replace("'MENU'", "'menu'", $content);
    $content = str_replace("'PESANAN'", "'pesanan'", $content);
    $content = str_replace("'DETAIL_PESANAN'", "'detail_pesanan'", $content);
    $content = str_replace("'PEMBAYARAN'", "'pembayaran'", $content);
    
    $content = str_replace("'PESANAN.", "'pesanan.", $content);
    $content = str_replace("'PEMBAYARAN.", "'pembayaran.", $content);
    $content = str_replace("'DETAIL_PESANAN.", "'detail_pesanan.", $content);
    $content = str_replace("'MENU.", "'menu.", $content);
    
    file_put_contents($file, $content);
}
echo "Replaced all occurrences";
