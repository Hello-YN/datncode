<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>File Service</title>
</head>
<body>
<h1>Upload and Download Files</h1>
<form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="file">
<button type="submit">Upload</button>
</form>
<h2>Available Files:</h2>
<ul>
<?php
$uploadDir = 'uploads/';
// Kiểm tra nếu có file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
$uploadFile = $uploadDir . basename($_FILES['file']['name']);

// Kiểm tra nếu file được upload thành công
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
echo "<p>File uploaded successfully: " . htmlspecialchars($_FILES['file']['name']) . "</p>";
// Ghi log vào error.log của Apache
error_log("File uploaded successfully: " . htmlspecialchars($_FILES['file']['name']), 3, "/var/log/apache2/error.log");
} else {
echo "<p> Failed to upload file.</p>";
// Ghi log lỗi nếu upload thất bại
error_log(" Failed to upload file: " . htmlspecialchars($_FILES['file']['name']), 3, "/var/log/apache2/error.log");
}
}
// Hiển thị các file có sẵn trong thư mục uploads
foreach (glob($uploadDir . "*") as $file) {
echo "<li><a href='download.php?file=" . urlencode(basename($file)) . "'>" . basename($file) . "</a></li>";
}
?>
</ul>
</body>
</html>
