<?php
require_once __DIR__ . '/vendor/autoload.php';

use Mpdf\Mpdf;

try {
    // Initialize mPDF with custom DPI (optional)
    $mpdf = new Mpdf([
        'tempDir' => sys_get_temp_dir(),  // Use system temp directory
        'useCache' => false,               // Disable cache
        'mode' => 'utf-8',
        'format' => 'A4',
        'orientation' => 'L', // 'P' for Portrait, 'L' for Landscape
        'dpi' => 96, // Higher DPI for better image quality
        'margin_top' => 0,
        'margin_bottom' => 0,
        'margin_right' => 0,
        'margin_left' => 0,
        'img_dpi' => 300,
    ]);

// Get HTML Content from file
$htmlContent = file_get_contents('layout.html');

    // Write HTML to PDF
    $mpdf->WriteHTML($htmlContent);

    // Output to Browser
    $mpdf->Output('high_quality_pdf.pdf', \Mpdf\Output\Destination::INLINE);
} catch (\Mpdf\MpdfException $e) {
    echo 'Error creating PDF: ' . $e->getMessage();
}
