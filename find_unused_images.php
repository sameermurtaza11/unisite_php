<?php
$imgDir = 'static/media/Photos';
$codeDirs = ['.']; // Search current folder recursively

$images = array_diff(scandir($imgDir), ['.', '..']);
$unused = [];

foreach ($images as $img) {
    $used = false;
    foreach ($codeDirs as $dir) {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
        foreach ($files as $file) {
            if ($file->isFile() && preg_match('/\.(php|html|js|css)$/', $file)) {
                $content = file_get_contents($file);
                if (strpos($content, $img) !== false) {
                    $used = true;
                    break 2;
                }
            }
        }
    }
    if (!$used) $unused[] = $img;
}

echo "🔍 Unused Images:\n";
foreach ($unused as $img) {
    echo "OR $img\n";
}
