<?php
// Kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lsgd";

// Tạo kết nối
$dbh = mysqli_connect($servername, $username, $password);
if (!$dbh) {
    die("Unable to connect to MySQL: " . mysqli_connect_error());
    // Nếu kết nối thất bại thì đưa ra thông báo lỗi
}

if (!mysqli_select_db($dbh, $dbname)) {
    die("Unable to select database: " . mysqli_error($dbh));
    // Thông báo lỗi nếu chọn CSDL thất bại
}

/*
//Tạo bảng lịch sử giao dịch với các cột: ngày giao dịch, loại giao dịch, số tiền, mô tả.
$sql_stmt = "CREATE TABLE IF NOT EXISTS lsgd (
    MaGD int(10) not null primary key,
    NgayGD datetime not null,
    LoaiGD varchar(50) not null,
    SoTien decimal(10,2) not null,
    MoTa varchar(255) not null
)";
$result = mysqli_query($dbh, $sql_stmt);
// Thực thi câu lệnh SQL
if (!$result) {
    die("Database access failed: " . mysqli_error($dbh));
    // Thông báo lỗi nếu thực thi thất bại
} else {
    echo "Create success table";
}
//INSERT Data
$sql_stmt = "INSERT INTO lsgd (MaGD, NgayGD, LoaiGD, SoTien, MoTa) VALUES
(1, '2023-06-12', 'Gui tien', 100, 'Gui tien ATM'),
(2, '2023-06-12', 'Rut tien', 200, 'Rut tien ATM'),
(3, '2023-06-12', 'Rut tien', 300, 'Rut tien ATM'),
(4, '2023-06-12', 'Rut tien', 400, 'Rut tien ATM'),
(5, '2023-06-12', 'Rut tien', 500, 'Rut tien ATM')";

$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL
 if (!$result) {
     die("Adding record failed: " . mysqli_error($dbh)); 
     // Thông báo lỗi nếu thực thi câu lệnh thất bại
 } else {
     echo "Data has been successfully added to your contacts list";
 }
 */
//Cập nhật số tiền của giao dịch có số thứ tự 3 trong bảng lịch sử thành 1000.
$sql_stmt = "UPDATE lsgd
SET SoTien = 1000 
WHERE MaGD = 3";
$result = mysqli_query($dbh,$sql_stmt);
// Thực thi câu lệnh SQL

if (!$result) {
    die("Deleting record failed: " . mysqli_error());
    // Thông báo lỗi nếu thực thi thất bại
} else {
    echo "MaGD 3 has been successfully updated";
}
//Xoá thông tin của giao dịch có số thứ tự 5 khỏi bảng lịch sử.
$sql_stmt = "DELETE FROM lsgd
WHERE MaGD = 5";
$result = mysqli_query($dbh,$sql_stmt); 
// Thực thi câu lệnh SQL
if (!$result) {
    die("Deleting record failed: " . mysqli_error());
    // Thông báo lỗi nếu thực thi thất bại 
} else {
    echo "MaGD 5 has been successfully deleted";
}
/// Truy vấn SELECT
$sql_stmt = "SELECT * FROM lsgd";
$result = mysqli_query($dbh, $sql_stmt);
//Để lấy dữ liệu cập nhật từ bảng "lsgd" và gán kết quả truy vấn vào biến $result 
// Kiểm tra lỗi
if (!$result) {
    die("Database access failed: " . mysqli_error($dbh));
}
// Hiển thị dữ liệu
$rows = mysqli_num_rows($result);
if ($rows) {
    while ($row = mysqli_fetch_array($result)) { 
        echo 'MaGD: ' . $row['MaGD'] . '<br>'; 
        echo 'NgayGD: ' . $row['NgayGD'] . '<br>'; 
        echo 'LoaiGD: ' . $row['LoaiGD'] . '<br>'; 
        echo 'SoTien: ' . $row['SoTien'] . '<br>'; 
        echo 'MoTa: ' . $row['MoTa'] . '<br><br>';   
    } 
}
