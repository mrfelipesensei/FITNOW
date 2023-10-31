<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" value="Upload Image" name="submit">
</form>
<?php

$image_data = base64_decode($row['image_data']);
$image_type = mime_content_type($row['image_name']);
echo '<img src="data:' . $image_type . ';base64,' . base64_encode($image_data) . '" />';

?>