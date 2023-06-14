<?php
$DB_TYPE = "mysql";
$DB_HOST = "localhost";
$DB_NAME = "bai2";
$USER_NAME = "root";
$USER_PASSWORD = "";

$conn = new PDO("$DB_TYPE:host=$DB_HOST;dbname=$DB_NAME", $USER_NAME, $USER_PASSWORD);
// Connect to database
if ($conn) {
    echo "Connected to the $DB_HOST successfully!";
}
/*
//Tạo bảng
$stsm = $conn->prepare("CREATE TABLE IF NOT EXISTS lsgiaodich (
     MaGD int(10) not null primary key,
    NgayGD datetime not null,
    LoaiGD varchar(50) not null,
    SoTien decimal(10,2) not null,
    MoTa varchar(255) not null
)");
$result=$stsm-> execute();
if (!$result) {
    die("Database access failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Create success table";
};
//INSERT Data
$stsm = $conn->prepare('INSERT INTO lsgiaodich (MaGD, NgayGD, LoaiGD, SoTien, MoTa) 
VALUES (?, ?, ?, ?, ?)');
$data = array(
    array(1, '2023-06-12', 'Gui tien', 100, 'Gui tien ATM'),
    array(2, '2023-06-12', 'Rut tien', 700, 'Rut tien ATM'),
    array(3, '2023-06-12', 'Rut tien', 800, 'Rut tien ATM'),
    array(4, '2023-06-12', 'Rut tien', 4000, 'Rut tien ATM'),
    array(5, '2023-06-12', 'Rut tien', 800, 'Rut tien ATM'),
);
foreach ($data as $value) {
    $stsm->execute($value);
}
echo "Data has been successfully added to your contacts list";
*/
//Cập nhật số tiền của giao dịch có số thứ tự 3 trong bảng lịch sử thành 1000.
$stsm = $conn -> prepare('UPDATE lsgiaodich
SET SoTien = "1000"
WHERE MaGD = 3 ;');
$result=$stsm -> execute();
if (!$result) {
    die("Update failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "MaGD 3 has been successfully updated";
}
//Xoá thông tin của giao dịch có số thứ tự 5 khỏi bảng lịch sử.
$stsm = $conn -> prepare('DELETE FROM lsgiaodich 
 WHERE MaGD = 5 ;');
$result=$stsm -> execute();
if (!$result) {
    die("Deleting record failed: " . mysqli_error());
    // Thông báo lỗi nếu thực thi thất bại 
} else {
    echo "MaGD 5 has been successfully deleted";
}
// Truy vấn
$result = $conn -> prepare('SELECT * FROM lsgiaodich');
$result -> setFetchMode(PDO::FETCH_ASSOC);
$result->execute();
//Để lấy dữ liệu cập nhật từ bảng dssinhvien và gán kết quả truy vấn vào biến $result 
// Hiển thị dữ liệu
while($row = $result->fetch()) {
    echo 'MaGD: ' . $row['MaGD'] . '<br>'; 
    echo 'NgayGD: ' . $row['NgayGD'] . '<br>'; 
    echo 'LoaiGD: ' . $row['LoaiGD'] . '<br>'; 
    echo 'SoTien: ' . $row['SoTien'] . '<br>'; 
    echo 'MoTa: ' . $row['MoTa'] . '<br><br>';   
} 
