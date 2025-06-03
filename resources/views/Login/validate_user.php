<?php
require_once 'path/to/your/config.php'; // Adjust path to your Laravel config

use App\Models\AkunUser; // Adjust namespace to your model

header('Content-Type: application/json');

try {
    $username = request()->input('username');
    $email = request()->input('email');

    if (empty($username) || empty($email)) {
        echo json_encode([
            'success' => false,
            'message' => 'Username dan email harus diisi'
        ]);
        exit;
    }

    $user = AkunUser::where('username', $username)
        ->where('email', $email)
        ->first();

    if ($user) {
        echo json_encode([
            'success' => true,
            'status' => $user->status
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Kombinasi username dan email tidak ditemukan'
        ]);
    }

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Terjadi kesalahan: ' . $e->getMessage()
    ]);
}
?>