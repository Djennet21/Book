<?php
// Это чтобы подключиться к базе данных
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Book";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Запрос для получения поступивших заявок за указанный период
$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];
$sql = "SELECT author, title, request_date FROM books WHERE request_date BETWEEN '$start_date' AND '$end_date'"; 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Вывод данных в виде таблицы
    echo "<table border='1'>";
    echo "<tr><th>Автор</th><th>Название</th><th>Дата заявки</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["author"]. "</td><td>" . $row["title"]. "</td><td>" . $row["request_date"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Заявок не найдено";
}

$conn->close();
?>
