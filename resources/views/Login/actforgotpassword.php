<?php
require_once 'path/to/your/config.php'; // Adjust path to your Laravel config

use App\Models\AkunUser; // Adjust namespace to your model
use Illuminate\Support\Facades\Hash;

header('Content-Type: application/json');

try {
    $username = request()->input('username');
    $email = request()->input('email');
    $newPassword = request()->input('pass');
    $confirmPassword = request()->input('konfirmasi_password');

    // Validate input
    if (empty($username) || empty($email) || empty($newPassword) || empty($confirmPassword)) {
        echo json_encode([
            'success' => false,
            'message' => 'Semua kolom harus diisi'
        ]);
        exit;
    }

    // Verify passwords match
    if ($newPassword !== $confirmPassword) {
        echo json_encode([
            'success' => false,
            'message' => 'Konfirmasi sandi tidak cocok'
        ]);
        exit;
    }

    // Find user
    $user = AkunUser::where('username', $username)
        ->where('email', $email)
        ->first();

    if (!$user) {
        echo json_encode([
            'success' => false,
            'message' => 'Kombinasi username dan email tidak ditemukan'
        ]);
        exit;
    }

    // Update password
    $user->password = Hash::make($newPassword);
    $user->save();

    echo json_encode([
        'success' => true,
        'message' => 'Sandi berhasil diubah'
    ]);

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Terjadi kesalahan: ' . $e->getMessage()
    ]);
}
?>