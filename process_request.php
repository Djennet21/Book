<?php
// Это чтобы подключится к базе данных
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Book";

$conn = new mysqli($servername, $username, $password, $dbname);

// Это как проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получаю данные из формы
$author = $_POST['author'];
$title = $_POST['title'];
$publisher = $_POST['publisher'];
$year = $_POST['year'];
$price = $_POST['price'];
$request_date = $_POST['request_date'];

$sql = "INSERT INTO books (author, title, publisher, year, price, request_date) VALUES ('$author', '$title', '$publisher', '$year', '$price', '$request_date')";

if ($conn->query($sql) === TRUE) {
    echo "Заявка успешно оформлена";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
