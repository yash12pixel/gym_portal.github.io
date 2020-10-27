<?php
//session_start();
    include('connection.php');

    $sql = "SELECT * FROM dietchart";
$result = mysqli_query($con, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);


// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM dietchart WHERE dietchart_id=$id";
    $result = mysqli_query($con, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'dietchart_files/' . $file['dietchart_name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('dietchart_files/' . $file['dietchart_name']));
        readfile('dietchart_files/' . $file['dietchart_name']);

        // Now update downloads count
        $newCount = $file['downloads'] +1;
        $updateQuery = "UPDATE dietchart SET downloads=$newCount WHERE dietchart_id=$id";
        mysqli_query($con, $updateQuery);
        exit;
    }

}
?>