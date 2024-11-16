<?php
require_once  __DIR__ .'/../vendor/autoload.php'; // Path to the autoloader of mPDF

header('Content-Type: image/jpeg'); // Correct content type for PNG?

$font = "../fonts/times-new-roman-bold-italic.ttf"; // Ensure this font file exists
$font2 = "../fonts/times-new-roman-bold.ttf"; // Ensure this font file exists
$image = imagecreatefromjpeg("../upload/certificate/course-cer.jpg"); // Example of relative path

$color = imagecolorallocate($image, 19, 21, 22); // Set the text color

$license = "T/D/01704";
imagettftext($image, 45, 0, 1650, 960, $color, $font2, $license); // Add serial number text

$serial = "01";
imagettftext($image, 45, 0, 2670, 930, $color, $font, $serial); // Add serial number text
$role = "01";
imagettftext($image, 45, 0, 2670, 1010, $color, $font, $role); // Add serial number text
$reg = "55455544";
imagettftext($image, 45, 0, 2670, 1090, $color, $font, $reg); // Add serial number text
$issue_date = "09.12.2024";
imagettftext($image, 45, 0, 2670, 1170, $color, $font, $issue_date); // Add serial number text
$student_name = "MD. Omar Faruk";
imagettftext($image, 45, 0, 1200, 1260, $color, $font, $student_name); // Add serial number text
$father_name = "Shofi Uddin";
imagettftext($image, 45, 0, 800, 1350, $color, $font, $father_name); // Add serial number text
$mother_name = "Khadiza Begum";
imagettftext($image, 45, 0, 800, 1450, $color, $font, $mother_name); // Add serial number text
$course_name = "Full Stack Web Developer";
imagettftext($image, 45, 0, 1150, 1550, $color, $font, $course_name); // Add serial number text
$inst_name = "Shikhbe Shobai";
imagettftext($image, 45, 0, 700, 1640, $color, $font, $inst_name); // Add serial number text
$inst_code = "1167";
imagettftext($image, 45, 0, 2570, 1645, $color, $font, $inst_code); // Add serial number text
$session_start = "11.11.2024";
imagettftext($image, 45, 0, 520, 1750, $color, $font, $session_start); // Add serial number text

$session_end = "11.11.2024";
imagettftext($image, 45, 0, 950, 1750, $color, $font, $session_end); // Add serial number text

$grade = "(B)";
imagettftext($image, 45, 0, 1900, 1745, $color, $font, $grade); // Add serial number text
$recommendation = "FIT";
imagettftext($image, 45, 0, 2670, 1750, $color, $font, $recommendation); // Add serial number text



///image
// Load the already generated QR code image
$qr_image = imagecreatefrompng("../upload/certificate/qr-code.png"); // Path to the already generated QR code image

// Define the desired size for the QR code (new width and height)
$qr_width = 300; // New width of the QR code
$qr_height = 300; // New height of the QR code

// Define the position on the certificate for the QR code
$qr_x = 320; // X position on the certificate
$qr_y = 830; // Y position on the certificate

// Resize the QR code to the desired dimensions
$qr_resized = imagecreatetruecolor($qr_width, $qr_height); // Create a blank image for the resized QR code
imagecopyresampled($qr_resized, $qr_image, 0, 0, 0, 0, $qr_width, $qr_height, imagesx($qr_image), imagesy($qr_image)); // Resize the QR code
imagecopy($image, $qr_resized, $qr_x, $qr_y, 0, 0, $qr_width, $qr_height);
// Load the already generated instructor sign image
$instructor_sign = imagecreatefrompng("../upload/certificate/instructor-sign.png"); // Path to the already generated QR code image

// Define the desired size for the instructor sign
$is_width = 800; // New width
$is_height = 200; // New height

// Define the position on the certificate for the instructor sign
$is_x = 200; // X position on the certificate
$is_y = 1878; // Y position on the certificate

// Resize the instructor sign to the desired dimensions
$instructor_sign_resized = imagecreatetruecolor($is_width, $is_height); // Create a blank image for the resized instructor sign
imagecopyresampled($instructor_sign_resized, $instructor_sign, 0, 0, 0, 0, $is_width, $is_height, imagesx($instructor_sign), imagesy($instructor_sign)); // Resize the instructor sign

// Copy the resized instructor sign onto the certificate image
imagecopy($image, $instructor_sign_resized, $is_x, $is_y, 0, 0, $is_width, $is_height);

// Load the already generated manager sign image
$manager_sign = imagecreatefrompng("../upload/certificate/senior_manager.png"); // Path to the manager sign image

// Define the desired size for the manager sign
$sm_width = 800; // New width
$sm_height = 200; // New height

// Define the position on the certificate for the manager sign
$sm_x = 2240; // X position on the certificate
$sm_y = 1878; // Y position on the certificate

// Resize the manager sign to the desired dimensions
$manager_sign_resized = imagecreatetruecolor($sm_width, $sm_height); // Create a blank image for the resized manager sign
imagecopyresampled($manager_sign_resized, $manager_sign, 0, 0, 0, 0, $sm_width, $sm_height, imagesx($manager_sign), imagesy($manager_sign)); // Resize the manager sign
// Copy the resized manager sign onto the certificate image
imagecopy($image, $manager_sign_resized, $sm_x, $sm_y, 0, 0, $sm_width, $sm_height);

// Capture the image output to a variable




// Save the modified image to a temporary file
$temp_image_path = "certificate_with_info2.png";
imagepng($image, $temp_image_path);
imagedestroy($image);

// Create the PDF
$mpdf = new \Mpdf\Mpdf();
$mpdf->AddPage();

// Add the image to the PDF
$mpdf->Image($temp_image_path, 0, 0, 210, 297, 'png'); // Adjust dimensions as needed

// Output the PDF
$mpdf->Output("certificate_{$reg}.pdf", 'I');

// Remove the temporary image file
// unlink($temp_image_path);
?>