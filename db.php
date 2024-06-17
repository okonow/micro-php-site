<?php
// db.php

// Параметры подключения к базе данных
$host = 'localhost'; // Хост базы данных
$dbname = 'db_siteforweb'; // Имя базы данных
$username = 'root'; // Имя пользователя
$password = ''; // Пароль

// Создание соединения с базой данных
$conn = new mysqli($host, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
}

// Функция для добавления текста в базу данных
function addStudent($name, $birthDate, $studyType) {
    
    global $conn;

    $sql = "INSERT INTO students (name, b_date, study_type) VALUES ('$name', '$birthDate', '$studyType')";

    if ($conn->query($sql) === TRUE) {
        echo "Пользователь добавлен успешно";
        error_log("bebe");
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
        error_log("veve");
        
    }
}

// Функция для получения всех пользователей
function getAllStudents() {
    global $conn;

    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Имя: " . $row["name"] . "<br>Дата рождения: " . $row["b_date"] . "<br>Тип обучения: " . $row["study_type"] . "<br><br>";
        }
    } else {
        echo "Записи отсутствуют";
    }
}


function displayUsers() {
    global $conn;

    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);

    $html = "";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $html .= "<div class='item-user'>";
            $html .= "<div class='info-string'><h3>" . $row["name"] . "</h3></div>";
            $html .= "<div class='info-string'><p>Дата рождения: " . $row["b_date"] . "</p></div>";
            $html .= "<div class='info-string'><p>Тип обучения: " . $row["study_type"] . "</p></div>";
            $html .= "</div>";
        }
    } else {
        $html = "<div class='item'><p>Записи отсутствуют</p><div>";
    }

    return $html;
}


?>
