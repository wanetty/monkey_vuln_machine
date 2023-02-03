<?php
session_start();

// Check if user is logged in
if (!$_SESSION['logged_in']) {
    header('Location: /');
    exit;
}
echo '<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .container {
            width: 50%;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
            border: 1px solid #333;
            border-radius: 10px;
        }
        
        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>';

// Form for uploading a file
echo '<div class="container">';
echo '<h1>Pirate application</h1>';
echo '<form action="upload.php" method="post" enctype="multipart/form-data">';
echo '<input type="file" name="fileToUpload" id="fileToUpload">';
echo '<input type="submit" value="Upload File" name="submit">';
echo '</form>';
echo '</div>';
echo '</body>
</html>';