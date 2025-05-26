<?php
require_once 'session.php';


if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not authenticated']);
    exit();
}


$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!isset($data['action']) || $data['action'] !== 'purchase_premium' || !isset($data['plan'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
    exit();
}

echo json_encode([
    'success' => true,
    'message' => 'Premium subscription activated successfully',
    'plan' => $data['plan']
]);
?>