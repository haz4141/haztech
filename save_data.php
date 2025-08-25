<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $name = isset($_POST["name"]) ? htmlspecialchars(trim($_POST["name"])) : "";
    $email = isset($_POST["email"]) ? filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL) : "";
    $message = isset($_POST["message"]) ? htmlspecialchars(trim($_POST["message"])) : "";
    
    // Check if all fields are filled
    if (empty($name) || empty($email) || empty($message)) {
        header("Location: index.html?error=missing_fields");
        exit();
    }
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.html?error=invalid_email");
        exit();
    }
    
    // Create contact data
    $contact_data = [
        'timestamp' => date('Y-m-d H:i:s'),
        'name' => $name,
        'email' => $email,
        'message' => $message
    ];
    
    // Save to data file
    $data_line = json_encode($contact_data) . "\n";
    file_put_contents("data.txt", $data_line, FILE_APPEND);
    
    // Redirect to bye.html after submission
    header("Location: bye.html");
    exit();
}
?>
