<?php
require_once __DIR__ . '/vendor/autoload.php'; // mPDF autoload file

// Set variables for student information
$student_name = "John Doe";
$student_id = "12345";

// Load base PNG image
$certificate_template = imagecreatefrompng("upload/certificate/cer-blank.png");

// Set text color and font size
$text_color = imagecolorallocate($certificate_template, 0, 0, 0); // Black color
$font_path = __DIR__ . '/arial.ttf'; // Change to your font path
$font_size = 20;

// Set positions for text
$name_position_x = 200; // Adjust as per your design
$name_position_y = 300;
$id_position_x = 200;
$id_position_y = 350;

// Add student name and ID to the image
imagettftext($certificate_template, $font_size, 0, $name_position_x, $name_position_y, $text_color, $font_path, $student_name);
imagettftext($certificate_template, $font_size, 0, $id_position_x, $id_position_y, $text_color, $font_path, "ID: " . $student_id);

// Save the modified image as a temporary file
$temp_image_path = "certificate_with_info.png";
imagepng($certificate_template, $temp_image_path);
imagedestroy($certificate_template);

// Initialize mPDF and add image to PDF
$mpdf = new \Mpdf\Mpdf();
$mpdf->AddPage();
$mpdf->Image($temp_image_path, 0, 0, 210, 297, 'png'); // A4 size

// Output the PDF to the browser for download
$mpdf->Output("Student_Certificate.pdf", "D");

// Remove temporary image file
unlink($temp_image_path);
?>
