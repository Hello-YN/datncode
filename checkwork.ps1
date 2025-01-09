# Đường dẫn thư mục chứa log trên Windows
$sourceDir = "C:\inetpub\logs\LogFiles\W3SVC1"

# Tìm file log mới nhất trong thư mục
$latestFile = Get-ChildItem -Path $sourceDir -File | Sort-Object LastWriteTime -Descending | Select-Object -First 1

# Đường dẫn chia sẻ tới file result.txt
$destination = "\\tsclient\_home_ubuntu_share\result.txt"

# Sao chép nội dung từ file log mới nhất vào file result.txt
if ($latestFile) {
    Get-Content -Path $latestFile.FullName | Set-Content -Path $destination
    Write-Output "Successfully copied content from $($latestFile.Name) to $destination"
} else {
    Write-Output "No log files found in $sourceDir"
}
