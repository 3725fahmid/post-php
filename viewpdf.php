<?php
// Get the file name from the query string
if (isset($_GET['filename'])) {
    $fileName = urldecode($_GET['filename']); // Decode the filename from the URL
    $filePath = 'uploads/' . $fileName; // Path to your files

    // Check if the file exists
    if (file_exists($filePath)) {
        // Get the file extension
        $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

        switch ($fileExtension) {
            // For PDF files
            case 'pdf':
                header('Content-type: application/pdf');
                header('Content-Disposition: inline; filename="' . $fileName . '"');
                break;

            // For images (JPEG, PNG, GIF)
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
                $imageInfo = getimagesize($filePath); // Get image MIME type
                header('Content-type: ' . $imageInfo['mime']);
                header('Content-Disposition: inline; filename="' . $fileName . '"');
                break;

            // For XML files
            case 'xml':
                header('Content-type: text/xml');
                header('Content-Disposition: inline; filename="' . $fileName . '"');
                break;

            case 'doc':
                header('Content-type: application/msword');
                header('Content-Disposition: inline; filename="' . $fileName . '"');
                break;

            case 'docx':
                header('Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
                header('Content-Disposition: inline; filename="' . $fileName . '"');
                break;

            default:
                echo 'Unsupported file type.';
                exit;
        }

        // Set the Content-Length header for all file types
        header('Content-Length: ' . filesize($filePath));

        // Output the file content
        readfile($filePath);
        exit;
    } else {
        echo 'File not Support Please Download This file';
    }
} else {
    echo 'No file specified.';
}
