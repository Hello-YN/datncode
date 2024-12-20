<?php
if (isset($_GET['file'])) {
$file = basename($_GET['file']);
$uploadDir = 'uploads/';

// Kiểm tra nếu file tồn tại
if (file_exists($uploadDir . $file)) {
// Ghi log vào error.log của Apache khi tải file
error_log(" File downloaded: " . $file, 3, "/var/log/apache2/error.log");
// Đưa file về dạng download
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $file . '"');
readfile($uploadDir . $file);
exit;
} else {
echo "File not found!";
}
}
?>
