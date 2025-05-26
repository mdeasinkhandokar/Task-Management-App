<?php
require_once 'session.php';



if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not authenticated']);
    exit();
}



$upload_dir = '../uploads/' . $_SESSION['user_id'] . '/';


if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

$response = ['success' => false, 'message' => ''];

if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

   
    $allowed = ['txt', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'jpg', 'jpeg', 'png'];

    if (in_array($file_ext, $allowed)) {
        if ($file_error === 0) {
            if ($file_size <= 5242880) { 
               
                $file_name_new = uniqid('', true) . '.' . $file_ext;
                $file_destination = $upload_dir . $file_name_new;

                if (move_uploaded_file($file_tmp, $file_destination)) {
                    $response = [
                        'success' => true,
                        'message' => 'File uploaded successfully',
                        'file_name' => $file_name_new
                    ];
                } else {
                    $response['message'] = 'Error moving uploaded file';
                }
            } else {
                $response['message'] = 'File size too large. Maximum size is 5MB';
            }
        } else {
            $response['message'] = 'Error uploading file';
        }
    } else {
        $response['message'] = 'Invalid file type. Allowed types: ' . implode(', ', $allowed);
    }
} else {
    $response['message'] = 'No file uploaded';
}

header('Content-Type: application/json');
echo json_encode($response);
?>