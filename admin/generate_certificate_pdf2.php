<?php
$rowNum=0;
$data=[];
if(isset($_GET['roll'])&& isset($_GET['reg']) && !empty($_GET['reg']) && !empty($_GET['roll'])){
$roll_no=$_GET['roll'];
$reg_no=$_GET['reg'];

require_once 'inc/connection.php';

$query=mysqli_query($db,"SELECT * FROM students WHERE roll_no='$roll_no' AND reg_no='$reg_no' ORDER BY id ASC LIMIT 1");
$rowNum=mysqli_num_rows($query);
while ($row=mysqli_fetch_assoc($query)) {
    $data=$row;
}
}
if($rowNum===1){


$font = "../fonts/times-new-roman-bold-italic.ttf"; // Ensure this font file exists
$font2 = "../fonts/times-new-roman-bold.ttf"; // Ensure this font file exists
$image = imagecreatefromjpeg("../upload/certificate/test-blank.jpg"); // Example of relative path

$color = imagecolorallocate($image, 19, 21, 22); // Set the text color

$license = "T/D/01704";
imagettftext($image, 45, 0, 1770, 960, $color, $font2, $license); // Add serial number text

$serial = $data['serial_no'];
imagettftext($image, 45, 0, 2670, 930, $color, $font, $serial); // Add serial number text
$role = $roll_no;
imagettftext($image, 45, 0, 2670, 1010, $color, $font, $role); // Add serial number text
$reg = $reg_no;
imagettftext($image, 45, 0, 2670, 1090, $color, $font, $reg); // Add serial number text
$issue_date = $data['issue_date'];
imagettftext($image, 45, 0, 2670, 1170, $color, $font, $issue_date); // Add serial number text
$student_name = $data['full_name'];
imagettftext($image, 45, 0, 1200, 1270, $color, $font, $student_name); // Add serial number text
$father_name = $data['father_name'];
imagettftext($image, 45, 0, 800, 1360, $color, $font, $father_name); // Add serial number text
$mother_name =$data['mother_name'];
imagettftext($image, 45, 0, 800, 1460, $color, $font, $mother_name); // Add serial number text
$course_name = $data['course_name'];
imagettftext($image, 45, 0, 1150, 1550, $color, $font, $course_name); // Add serial number text
$inst_name = $data['institute_name'];
imagettftext($image, 45, 0, 700, 1645, $color, $font, $inst_name); // Add serial number text
$inst_code = $data['institute_code'];
imagettftext($image, 45, 0, 2570, 1645, $color, $font, $inst_code); // Add serial number text
$test_date = $data['session_start'];
imagettftext($image, 45, 0, 700, 1750, $color, $font, $test_date); // Add serial number text
$grade = $data['grade'];
imagettftext($image, 45, 0, 1900, 1750, $color, $font, $grade); // Add serial number text
$recommendation = $data['recommendation'];
imagettftext($image, 45, 0, 2670, 1750, $color, $font, $recommendation); // Add serial number text
// Load the already generated QR code image
$qr_image = imagecreatefrompng("../upload/certificate/qr-code.png"); // Path to the already generated QR code image

// Define the desired size for the QR code (new width and height)
$qr_width = 300; // New width of the QR code
$qr_height = 300; // New height of the QR code

// Define the position on the certificate for the QR code
$qr_x = 1500; // X position on the certificate
$qr_y = 1930; // Y position on the certificate

// Resize the QR code to the desired dimensions
$qr_resized = imagecreatetruecolor($qr_width, $qr_height); // Create a blank image for the resized QR code
imagecopyresampled($qr_resized, $qr_image, 0, 0, 0, 0, $qr_width, $qr_height, imagesx($qr_image), imagesy($qr_image)); // Resize the QR code

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


// Save the modified image as a temporary file
$temp_image_path = "certificate_with_info.png";
imagepng($image); // Adjust quality as needed (0-9)
// imagedestroy($image);

// require_once __DIR__ . '/../vendor/autoload.php'; // mPDF autoload file
// // Initialize mPDF and add image to PDF


// $mpdf = new \Mpdf\Mpdf([
//     'tempDir' => sys_get_temp_dir(),  // Use system temp directory
//     'useCache' => false,               // Disable cache
//     'mode' => 'utf-8',
//     'format' => 'A4',
//     'orientation' => 'L', // 'P' for Portrait, 'L' for Landscape
//     'dpi' => 96, // Higher DPI for better image quality
//     'margin_top' => 0,
//     'margin_bottom' => 0,
//     'margin_right' => 2,
//     'margin_left' => 2,
//     'img_dpi' => 300,
//     ]
// );
// $mpdf->AddPage();
// // Get the PDF page width and height
// $pdf_width = 297; // A4 landscape width in mm
// $pdf_height = 210; // A4 landscape height in mm
// // Get the image dimensions


// try {
//     $mpdf->Image($temp_image_path, 8, 0, $pdf_width, $pdf_height, 'png');
// } catch (Exception $e) {
//     // Handle image loading errors
//     echo "Error loading image: " . $e->getMessage();
//     exit;
// }

// // Output the PDF to the browser for download
// $mpdf->Output("Student_Certificate_{$roll_no}_{$reg}.pdf", "D");

// // Remove temporary image file
// unlink($temp_image_path);
// // Clear the output buffer after PDF output
}
?>
