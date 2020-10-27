<?php
session_start();
    include('connection.php');
//include('security.php');
    $sql = "SELECT * FROM dietchart";
$result = mysqli_query($con, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['save'])) { 
    // if save button on the form is clicked
    // name of the uploaded file
    // if(empty($_POST['dietchart_name']))
    // {
    //     $_SESSION['message1'] = "Plz enter Dietchart Name..";
    //     header("Location:insertdietchart.php");
    // }
    // else
    // {
    //     //$plan_name=$_POST['txtplan'];
    //     $dietchart_name = $_POST['dietchart_name'];
    // }

    if($_POST['dct']=='')
    {
        $_SESSION['message2'] = "Plz Select Diet Chart Type..";
        header("Location:insertdietchart.php");
    }
    else
    {
        
        $dietchart_type = $_POST['dct'];
    }

    // if(empty($_POST['myfile']))
    // {
    //     $_SESSION['message3'] = "Plz Upload File..";
    //     header("Location:insertdietchart.php");
    // }
    // else
    // {
    $filename = $_FILES['myfile']['name'];
        
    // }

    // $filename = $_FILES['myfile']['name'];
   // $dietchart_name = $_POST['dietchart_name'];
   // $dietchart_type = $_POST['dietchart_type'];

    // destination of the file on the server
    $destination = '../gym_portal1/dietchart_files/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 5000000) { // file shouldn't be larger than 5Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO dietchart (dietchart_name, dietchart_type, size, downloads) VALUES ('$filename','$dietchart_type', $size, 0)";
            if (mysqli_query($con, $sql)) {
                $_SESSION['success'] = "File Upload Successfully..";
        header("Location:insertdietchart.php");
            }
        } else {
            $_SESSION['status'] = "Error While Uploading File..";
            header("Location:insertdietchart.php");
        }
    }
}


if(isset($_POST['btn_delete']))
{
    $delete_id = $_POST['delete_dietchart_id'];

    $que = "DELETE FROM dietchart WHERE dietchart_id = '$delete_id'";
    $run = mysqli_query($con,$que);

    if($run)
    {
         $_SESSION['success'] = "Your Data is Deleted";
         header('Location:insertdietchart.php');   
    }
    else
    {
         $_SESSION['status'] = "Your Data is Not Deleted";
         header('Location:insertdietchart.php');    
    }
}



// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../gym_portal1/dietchart_files/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}
?>