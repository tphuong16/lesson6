<?php
$DB_TYPE = "mysql";
$DB_HOST = "localhost";
$DB_NAME = "bai1";
$USER_NAME = "root";
$USER_PASSWORD = "";

$conn = new PDO("$DB_TYPE:host=$DB_HOST;dbname=$DB_NAME", $USER_NAME, $USER_PASSWORD);
// Connect to database
if ($conn) {
    echo "Connected to the $DB_HOST successfully!";
}
/*
//Tạo bảng
$stsm = $conn->prepare("CREATE TABLE IF NOT EXISTS dssinhvien (
    MaSV int(10) not null primary key,
    HoTen varchar(50) not null,
    NgaySinh datetime not null,
    LopHoc varchar(20) not null,
    DiemTB float not null )");
$result=$stsm-> execute();
if (!$result) {
    die("Database access failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Create success table";
};
/// Thêm 5 sinh viên INSERT INTO
$stsm = $conn->prepare('INSERT INTO dssinhvien (MaSV, HoTen, NgaySinh, LopHoc, DiemTB) 
VALUES (?, ?, ?, ?, ?)');
$data = array(
    array("001", 'Phạm Thu Phương', '2002-12-12', 'php04', 9),
    array("002", 'Phạm Thu ', '2002-12-12', 'php04', 9),
    array("003", 'Phạm Phương', '2002-12-12', 'php04', 9.2),
    array("004", 'Phạm Thu Hương', '2002-12-12', 'php04', 9),
    array("005", 'Phạm Thu Huyền', '2002-12-12', 'php04', 9.5),
);
foreach ($data as $value) {
    $stsm->execute($value);
}
echo "Data has been successfully added to your contacts list";
*/
//Cập nhật điểm trung bình của sinh viên có mã "SV001" thành 8.5.
$stsm = $conn -> prepare('UPDATE dssinhvien 
SET DiemTB = 8.5
 WHERE MaSV = "SV001";');
$result=$stsm -> execute();
if (!$result) {
    die("Update failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "MaSV 001 has been successfully updated";
}
//Xoá thông tin của sinh viên có mã "SV003" khỏi bảng danh sách.
$stsm = $conn -> prepare('DELETE FROM dssinhvien 
 WHERE MaSV = "003";');
$result=$stsm -> execute();
if (!$result) {
    die("Deleting record failed: " . mysqli_error());
    // Thông báo lỗi nếu thực thi thất bại 
} else {
    echo "MaSV 003 has been successfully deleted";
}
// Truy vấn
$result = $conn -> prepare('SELECT * FROM dssinhvien');
$result -> setFetchMode(PDO::FETCH_ASSOC);
$result->execute();
//Để lấy dữ liệu cập nhật từ bảng dssinhvien và gán kết quả truy vấn vào biến $result 
// Hiển thị dữ liệu
while($row = $result->fetch()) {
    echo 'MaSV: ' . $row['MaSV'] . '<br>';  
    echo  'HoTen: ' . $row['HoTen'] . '<br>';  
    echo  'NgaySinh: ' . $row['NgaySinh'] . '<br>';  
    echo  'LopHoc: ' . $row['LopHoc'] . '<br>';  
    echo  'DiemTB: ' . $row['DiemTB'] . '<br><br>';  
} 
