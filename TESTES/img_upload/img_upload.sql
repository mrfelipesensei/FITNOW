create database img_upload;
use img_upload;

CREATE TABLE images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image_name VARCHAR(255),
    image_data LONGBLOB,
    image_description TEXT
);
