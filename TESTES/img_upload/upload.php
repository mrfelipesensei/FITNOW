<?php
if (isset($_POST['submit'])) {
    $image_name = $_FILES['image']['name'];
    $image_data = file_get_contents($_FILES['image']['tmp_name']);
    $image_data = base64_encode($image_data); // Convert to base64 for storage

    // Perform database insertion using prepared statements
    $pdo = new PDO('mysql:host=localhost;dbname=img_upload;', 'root', '');
    $stmt = $pdo->prepare("INSERT INTO images (image_name, image_data) VALUES (:image_name, :image_data)");
    $stmt->bindParam(':image_name', $image_name);
    $stmt->bindParam(':image_data', $image_data);
    $stmt->execute();

    // Redirect or show a success message
    header('Location: index.php');
}
