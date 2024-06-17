<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $birthDate = $_POST["birthDate"];
    $studyType = $_POST["studyType"];

    addStudent($name, $birthDate, $studyType);
}
?>