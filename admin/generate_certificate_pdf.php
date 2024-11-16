<?php
$rowNum = 0;
$rowNum2 = 0;
$data = [];
$company = [];
if (isset($_GET['roll']) && isset($_GET['reg']) && !empty($_GET['reg']) && !empty($_GET['roll'])) {
    $roll_no = $_GET['roll'];
    $reg_no = $_GET['reg'];

    require_once 'inc/connection.php';

    $query = mysqli_query($db, "SELECT * FROM students WHERE roll_no='$roll_no' AND reg_no='$reg_no' ORDER BY id ASC LIMIT 1");
    $rowNum = mysqli_num_rows($query);
    while ($row = mysqli_fetch_assoc($query)) {
        $data = $row;
    }
    $query2 = mysqli_query($db, "SELECT * FROM certificate");
    $rowNum2 = mysqli_num_rows($query2);
    while ($row = mysqli_fetch_assoc($query2)) {
        $key=$row['name'];
        $company[$key] = $row['value'];
    }
}
// echo  $rowNum2;
// print_r($company);
if ($rowNum === 1) {
    $license = "T/D/01704";
    $serial = $data['serial_no'];
    $role = $roll_no;
    $reg = $reg_no;
    $course_issue_date = $data['course_issue_date'];
    $test_issue_date = $data['test_issue_date'];
    $student_name = $data['full_name'];
    $father_name = $data['father_name'];
    $mother_name = $data['mother_name'];
    $course_name = $data['course_name'];
    $inst_name = $data['institute_name'];
    $inst_code = $data['institute_code'];
    $test_date = $data['test_date'];
    $grade = "(".$data['grade'].")";
    $recommendation = $data['recommendation'];
    $session_start = $data['session_start'];
    $session_end = $data['session_end'];
    $instructor_sign_img=$company['chief_sign'];
    $manager_sign_img=$company['manager_sign'];
    $qr_img= $company['qr_code'];
    $qr_img_path="../upload/certificate/".$qr_img;
    $instructor_sign_img_path="../upload/certificate/".$instructor_sign_img;
    $manager_sign_img_path="../upload/certificate/".$manager_sign_img;

    $font = "../fonts/times-new-roman-bold-italic.ttf"; // Ensure this font file exists
    $font2 = "../fonts/times-new-roman-bold.ttf"; // Ensure this font file exists
    $image = imagecreatefromjpeg("../upload/certificate/test-certificate-blank.jpg"); // Example of relative path

    $color = imagecolorallocate($image, 19, 21, 22); // Set the text color

    // ======================Certificate 1=====================

    imagettftext($image, 45, 0, 1770, 960, $color, $font2, $license); // Add serial number text

    imagettftext($image, 45, 0, 2670, 930, $color, $font, $serial); // Add serial number text

    imagettftext($image, 45, 0, 2670, 1010, $color, $font, $role); // Add serial number text

    imagettftext($image, 45, 0, 2670, 1090, $color, $font, $reg); // Add serial number text

    imagettftext($image, 45, 0, 2670, 1170, $color, $font, $test_issue_date); // Add serial number text

    imagettftext($image, 45, 0, 1200, 1270, $color, $font, $student_name); // Add serial number text

    imagettftext($image, 45, 0, 800, 1360, $color, $font, $father_name); // Add serial number text

    imagettftext($image, 45, 0, 800, 1460, $color, $font, $mother_name); // Add serial number text

    imagettftext($image, 45, 0, 1150, 1550, $color, $font, $course_name); // Add serial number text

    imagettftext($image, 45, 0, 700, 1645, $color, $font, $inst_name); // Add serial number text

    imagettftext($image, 45, 0, 2570, 1645, $color, $font, $inst_code); // Add serial number text

    imagettftext($image, 45, 0, 700, 1750, $color, $font, $test_date); // Add serial number text

    imagettftext($image, 45, 0, 1900, 1750, $color, $font, $grade); // Add serial number text

    imagettftext($image, 45, 0, 2670, 1750, $color, $font, $recommendation); // Add serial number text
// Load the already generated QR code image
    $qr_image = imagecreatefrompng($qr_img_path); // Path to the already generated QR code image

    // Define the desired size for the QR code (new width and height)
    $qr_width = 300; // New width of the QR code
    $qr_height = 300; // New height of the QR code

    // Define the position on the certificate for the QR code
    $qr_x = 1500; // X position on the certificate
    $qr_y = 1930; // Y position on the certificate

    // Resize the QR code to the desired dimensions
    $qr_resized = imagecreatetruecolor($qr_width, $qr_height); // Create a blank image for the resized QR code
    imagecopyresampled($qr_resized, $qr_image, 0, 0, 0, 0, $qr_width, $qr_height, imagesx($qr_image), imagesy($qr_image)); // Resize the QR code
    imagecopy($image, $qr_resized, $qr_x, $qr_y, 0, 0, $qr_width, $qr_height);
    // Load the already generated instructor sign image
    $instructor_sign = imagecreatefrompng($instructor_sign_img_path); // Path to the already generated QR code image

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
    $manager_sign = imagecreatefrompng($manager_sign_img_path); // Path to the manager sign image

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



    // ======================Certificate 2=====================
    $image2 = imagecreatefromjpeg("../upload/certificate/course-certificate-blank.jpg"); // Example of relative path
    $color = imagecolorallocate($image2, 19, 21, 22); // Set the text color

    imagettftext($image2, 45, 0, 1650, 960, $color, $font2, $license); // Add serial number text


    imagettftext($image2, 45, 0, 2670, 930, $color, $font, $serial); // Add serial number text

    imagettftext($image2, 45, 0, 2670, 1010, $color, $font, $role); // Add serial number text

    imagettftext($image2, 45, 0, 2670, 1090, $color, $font, $reg); // Add serial number text

    imagettftext($image2, 45, 0, 2670, 1170, $color, $font, $course_issue_date); // Add serial number text

    imagettftext($image2, 45, 0, 1200, 1260, $color, $font, $student_name); // Add serial number text

    imagettftext($image2, 45, 0, 800, 1350, $color, $font, $father_name); // Add serial number text

    imagettftext($image2, 45, 0, 800, 1450, $color, $font, $mother_name); // Add serial number text

    imagettftext($image2, 45, 0, 1150, 1550, $color, $font, $course_name); // Add serial number text

    imagettftext($image2, 45, 0, 700, 1640, $color, $font, $inst_name); // Add serial number text

    imagettftext($image2, 45, 0, 2570, 1645, $color, $font, $inst_code); // Add serial number text

    imagettftext($image2, 45, 0, 520, 1750, $color, $font, $session_start); // Add serial number text


    imagettftext($image2, 45, 0, 950, 1750, $color, $font, $session_end); // Add serial number text


    imagettftext($image2, 45, 0, 1900, 1745, $color, $font, $grade); // Add serial number text

    imagettftext($image2, 45, 0, 2670, 1750, $color, $font, $recommendation); // Add serial number text



    ///image

// Load the already generated QR code image
    $qr_image = imagecreatefrompng($qr_img_path); // Path to the already generated QR code image

    // Define the desired size for the QR code (new width and height)
    $qr_width = 300; // New width of the QR code
    $qr_height = 300; // New height of the QR code

    // Define the position on the certificate for the QR code
    $qr_x = 320; // X position on the certificate
    $qr_y = 830; // Y position on the certificate

    // Resize the QR code to the desired dimensions
    $qr_resized = imagecreatetruecolor($qr_width, $qr_height); // Create a blank image for the resized QR code
    imagecopyresampled($qr_resized, $qr_image, 0, 0, 0, 0, $qr_width, $qr_height, imagesx($qr_image), imagesy($qr_image)); // Resize the QR code
    imagecopy($image2, $qr_resized, $qr_x, $qr_y, 0, 0, $qr_width, $qr_height);
    // Load the already generated instructor sign image

    $instructor_sign = imagecreatefrompng($instructor_sign_img_path); // Path to the already generated QR code image

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
    imagecopy($image2, $instructor_sign_resized, $is_x, $is_y, 0, 0, $is_width, $is_height);

    // Load the already generated manager sign image
    $manager_sign = imagecreatefrompng($manager_sign_img_path); // Path to the manager sign image

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
    imagecopy($image2, $manager_sign_resized, $sm_x, $sm_y, 0, 0, $sm_width, $sm_height);

    // Capture the image output to a variable




    // Save the modified image to a temporary file
    $temp_image_path2 = "certificate_with_info2.png";
    imagepng($image2, $temp_image_path2);
    imagedestroy($image2);

    // Capture the image output to a variable


    // Save the modified image as a temporary file
    $temp_image_path = "certificate_with_info.png";
    imagepng($image, $temp_image_path); // Save the image
    imagedestroy($image); // Release memory


    require_once __DIR__ . '/../vendor/autoload.php'; // mPDF autoload file
// Initialize mPDF and add image to PDF


    $mpdf = new \Mpdf\Mpdf(
        [
            'tempDir' => sys_get_temp_dir(),  // Use system temp directory
            'useCache' => false,               // Disable cache
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'L', // 'P' for Portrait, 'L' for Landscape
            'dpi' => 96, // Higher DPI for better image quality
            'margin_top' => 0,
            'margin_bottom' => 0,
            'margin_right' => 2,
            'margin_left' => 2,
            'img_dpi' => 300,
        ]
    );
    // Add Certificate One to PDF
    $mpdf->AddPage();
    $pdf_width = 297; // A4 landscape width in mm
    $pdf_height = 210; // A4 landscape height in mm
    $mpdf->Image($temp_image_path, 8, 0, $pdf_width, $pdf_height, 'png');

    // Add Certificate Two to PDF
    $mpdf->AddPage();
    $mpdf->Image($temp_image_path2, 8, 0, $pdf_width, $pdf_height, 'png');


    // Output the PDF to the browser for download
    $mpdf->Output("Student_Certificate_{$roll_no}_{$reg}.pdf", "D");

    // Remove temporary image file
    unlink($temp_image_path);
    unlink($temp_image_path2);
    // Clear the output buffer after PDF output
}
?>