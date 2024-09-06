<?php
include 'includes/db-con.php';
$conn = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUsername, $dbPassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Get file ID from the request
$file_id = isset($_POST['file_id']) ? (int)$_POST['file_id'] : 0;

if ($file_id > 0) {
    // Check if the record exists in the database
    $sql = "SELECT * FROM file_downloads WHERE file_id = :file_id LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['file_id' => $file_id]);

    // Fetch the result
    $download = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($download) {
        // Increment download count
        $updateSql = "UPDATE file_downloads SET download_count = download_count + 1, last_downloaded = NOW() WHERE file_id = :file_id";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->execute(['file_id' => $file_id]);
    } else {
        // Insert a new record if not exists
        $insertSql = "INSERT INTO file_downloads (file_id, download_count) VALUES (:file_id, 1)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->execute(['file_id' => $file_id]);
    }

    // Return a success response
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['error' => 'Invalid file ID']);
}
?>
