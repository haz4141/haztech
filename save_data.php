<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_input = $_POST["user_input"];
    file_put_contents("data.txt", $user_input . "\n", FILE_APPEND);
    echo "Data saved!";
}
?>
