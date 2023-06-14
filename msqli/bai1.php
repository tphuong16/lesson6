<?php
// Kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsinhvien";

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

// Create table
$sql_stmt = "CREATE TABLE IF NOT EXISTS qlsinhvien (
    MaSV int(10) not null primary key,
    HoTen varchar(50) not null,
    NgaySinh datetime not null,
    LopHoc varchar(20) not null,
    DiemTB float not null )";
$result = mysqli_query($dbh, $sql_stmt);
// Thực thi câu lệnh SQL
if (!$result) {
    die("Database access failed: " . mysqli_error($dbh));
    // Thông báo lỗi nếu thực thi thất bại
} else {
    echo "Create success table";
}

// Thêm 5 sinh viên INSERT INTO
$sql_stmt = "INSERT INTO qlsinhvien (MaSV, HoTen, NgaySinh, LopHoc, DiemTB) VALUES
(001, 'Phạm Thu Phương', '2002-12-12', 'php04', 9),
(002, 'Phạm Thu Huyền', '2002-12-1', 'php02', 9),
(003, 'Phạm Thu Trang', '2002-2-12', 'php04', 7),
(004, 'Phạm Thu Hương', '2002-1-12', 'php03', 8),
(005, 'Phạm Thu Hoài', '2002-1-12', 'php01', 9)";

$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL
 if (!$result) {
     die("Adding record failed: " . mysqli_error($dbh)); 
     // Thông báo lỗi nếu thực thi câu lệnh thất bại
 } else {
     echo "Data has been successfully added to your contacts list";
 }
*/
//Cập nhật điểm trung bình của sinh viên có mã "SV001" thành 8.5.
$sql_stmt = "UPDATE qlsinhvien
SET DiemTB = 8.5 
WHERE MaSV = 001";
$result = mysqli_query($dbh,$sql_stmt);
// Thực thi câu lệnh SQL

if (!$result) {
    die("Deleting record failed: " . mysqli_error());
    // Thông báo lỗi nếu thực thi thất bại
} else {
    echo "MaSV 001 has been successfully updated";
}
//Xoá thông tin của sinh viên có mã "SV003" khỏi bảng danh sách.
$sql_stmt = "DELETE FROM qlsinhvien 
WHERE MaSV = 003";
$result = mysqli_query($dbh,$sql_stmt); 
// Thực thi câu lệnh SQL
if (!$result) {
    die("Deleting record failed: " . mysqli_error());
    // Thông báo lỗi nếu thực thi thất bại 
} else {
    echo "MaSV 003 has been successfully deleted";
}
// Truy vấn SELECT
$sql_stmt = "SELECT * FROM qlsinhvien";
$result = mysqli_query($dbh, $sql_stmt);
//Để lấy dữ liệu cập nhật từ bảng "qlsinhvien" và gán kết quả truy vấn vào biến $result 
// Kiểm tra lỗi
if (!$result) {
    die("Database access failed: " . mysqli_error($dbh));
}
// Hiển thị dữ liệu
$rows = mysqli_num_rows($result);
if ($rows) {
    while ($row = mysqli_fetch_array($result)) { 
        echo 'MaSV: ' . $row['MaSV'] . '<br>';  
        echo  'HoTen: ' . $row['HoTen'] . '<br>';  
        echo  'NgaySinh: ' . $row['NgaySinh'] . '<br>';  
        echo  'LopHoc: ' . $row['LopHoc'] . '<br>';  
        echo  'DiemTB: ' . $row['DiemTB'] . '<br><br>';  
    } 
}
