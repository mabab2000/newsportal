<?php
require_once('mysqli_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission

    // Validate and sanitize input data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $text = mysqli_real_escape_string($conn, $_POST['text']);
    $link = mysqli_real_escape_string($conn, $_POST['link']);
    $linkText = mysqli_real_escape_string($conn, $_POST['linkText']);

    // Upload image file
    $targetDirectory = 'images/';
    $targetFile = $targetDirectory . basename($_FILES['newImage']['name']);
    move_uploaded_file($_FILES['newImage']['tmp_name'], $targetFile);

    // Get only the image filename
    $imageFilename = basename($targetFile);

    // Insert new image details into the database without the directory path
    $insertSql = "INSERT INTO slider (title, text, link, link_text, banner) VALUES ('$title', '$text', '$link', '$linkText', '$imageFilename')";
    
    if ($conn->query($insertSql) === TRUE) {
        echo "New image added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
