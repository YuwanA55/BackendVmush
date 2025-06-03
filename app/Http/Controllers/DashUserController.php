<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataFirebase;
use App\Models\AkunUser;
use App\Models\DataSewa;
use App\Models\PermintaanStok;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log; // Untuk logging error


class DashUserController extends Controller
{

    public function __construct()
    {
        $this ->DataFire = new DataFirebase();
        $this ->Akun = new akunuser();
        $this ->DataSewa = new DataSewa();
        $this ->PermintaanStok = new PermintaanStok();
    }


public function index()
{
    if (!session('login')) {
        return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
    }

    if (session('status') !== 'User') {
        abort(404); // Jika bukan User, tampilkan 404
    }

    $username = session('username');
    $permintaan = DB::select("SELECT * FROM `firebase` WHERE username = ?", [$username]);

    if (empty($permintaan)) {
        return view('User.dashboardnew', ['permintaan' => [], 'error' => 'No Firebase data found for user: ' . $username]);
    }

    return view('User.dashboardnew', ['permintaan' => $permintaan]);
}


public function upgradee(){

        // $data = [
        //     't_akun' =>$this->Akun->alldata(),
        //     't_firebase' => $this->DataFire->alldata(),
        // ];
    return view('User.upgrade' );

}

public function permintaanstok(){

$permintaan = DB::select("SELECT ps.*, au.gambar, au.alamat, au.nama, au.nohp, au.email, au.status
FROM permintaan_stok ps
JOIN akun_user au ON ps.username = au.username
WHERE ps.status_permintaan = 'Tersedia' AND (ps.user = '' OR ps.user IS NULL)");

  return view('tengkulak.trimaRequest', ['permintaan' => $permintaan]);

}

public function detailstok($id_stok){

        $data = [
            // 't_akun' =>$this->Akun->alldata(),
            'main' => $this->PermintaanStok->editfipaketfr($id_stok),
        ];
    return view('tengkulak.detailtengku', $data);

}


public function pack(){

    return view('User.pack' );

}


public function historyy($username){
    $data = [
        'main' => $this->DataSewa->sewabyuserr($username),
    ];
    return view('User.historypembelian', $data);
}


public function takeRequeststok(Request $request){
try {
            $request->validate([
                'id_stok' => 'exists:permintaan_stok,id_stok',
                'user' => 'required|string'
            ]);

            $stockRequest = PermintaanStok::find($request->id_stok);
            if (!$stockRequest) {
                return response()->json(['success' => false, 'message' => 'Permintaan tidak ditemukan'], 404);
            }

            if ($stockRequest->user && $stockRequest->user !== $request->user) {
                return response()->json(['success' => false, 'message' => 'Permintaan sudah diambil oleh pengguna lain'], 403);
            }

            $stockRequest->user = $request->user;
            $stockRequest->status_permintaan = 'Pending';
            $stockRequest->save();

            return response()->json(['success' => true, 'message' => 'Permintaan berhasil diambil']);
        } catch (\Exception $e) {
            \Log::error('Error in takeRequest: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function checkUserStatusstok(Request $request)
    {
try {
            $request->validate([
                'id_stok' => 'exists:permintaan_stok,id_stok'
            ]);

            $stockRequest = PermintaanStok::find($request->id_stok);
            if (!$stockRequest) {
                return response()->json(['user' => null], 404);
            }

            return response()->json(['user' => $stockRequest->user ?? null]);
        } catch (\Exception $e) {
            \Log::error('Error in checkUserStatus: ' . $e->getMessage());
            return response()->json(['user' => null, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }



public function markAsCompleted(Request $request){
        $validator = Validator::make($request->all(), [
            'id_stok' => 'required|string|exists:permintaan_stok,id_stok', // id_stok wajib ada dan ada di tabel
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 422);
        }

        try {
            $permintaan = PermintaanStok::find($request->id_stok);

            if (!$permintaan) {
                return response()->json(['success' => false, 'message' => 'Permintaan stok tidak ditemukan.'], 404);
            }

 

            // Cek apakah permintaan sudah selesai
            if (strtolower($permintaan->status_permintaan) === 'selesai') {
                return response()->json(['success' => false, 'message' => 'Permintaan ini sudah ditandai selesai sebelumnya.'], 400);
            }
            
            // Cek apakah permintaan sudah diambil (seharusnya sudah karena ada pengecekan $permintaan->user === $loggedInUser)
            if (empty($permintaan->user)) {
                // Ini seharusnya tidak terjadi jika otorisasi di atas sudah benar
                return response()->json(['success' => false, 'message' => 'Permintaan ini belum diambil dan tidak bisa ditandai selesai.'], 400);
            }

            $permintaan->status_permintaan = 'Selesai'; // Set status menjadi "Selesai" (Pastikan string ini konsisten)
            $permintaan->save();

            return response()->json(['success' => true, 'message' => 'Permintaan stok berhasil ditandai sebagai Selesai.']);

        } catch (\Exception $e) {
            // Log error yang lebih detail
            Log::error("Error completing request ID {$request->id_stok}: " . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan pada server saat menyelesaikan permintaan. Silakan cek log.'], 500);
        }
    }


public function historyystok(){
    $username = session('username');
    $permintaanhistory = DB::table('permintaan_stok as ps')
        ->join('akun_user as au', 'ps.username', '=', 'au.username')
        ->select('ps.*', 'au.gambar', 'au.alamat', 'au.nama', 'au.nohp', 'au.email', 'au.status')
        ->where(function ($query) {
            $query->where('ps.status_permintaan', 'Pending')
                  ->orWhere('ps.status_permintaan', 'Selesai');
        })
        ->where('ps.user', $username)
        ->get();

    return view('tengkulak.historytengku', ['permintaanhistory' => $permintaanhistory]);
}



public function markAsCompletedeleted(Request $request){
        $validator = Validator::make($request->all(), [
            'id_stok' => 'required|string|exists:permintaan_stok,id_stok', // id_stok wajib ada dan ada di tabel
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 422);
        }

        try {
            $permintaan = PermintaanStok::find($request->id_stok);

            if (!$permintaan) {
                return response()->json(['success' => false, 'message' => 'Permintaan stok tidak ditemukan.'], 404);
            }


            // Cek apakah permintaan sudah diambil (seharusnya sudah karena ada pengecekan $permintaan->user === $loggedInUser)
            if (empty($permintaan->user)) {
                // Ini seharusnya tidak terjadi jika otorisasi di atas sudah benar
                return response()->json(['success' => false, 'message' => 'Permintaan ini belum diambil dan tidak bisa ditandai selesai.'], 400);
            }

            $permintaan->user = ''; // Set status menjadi "Selesai" (Pastikan string ini konsisten)
            $permintaan->status_permintaan = 'Pending'; // Set status menjadi "Selesai" (Pastikan string ini konsisten)
            $permintaan->save();

            return response()->json(['success' => true, 'message' => 'Permintaan stok berhasil ditandai sebagai Selesai.']);

        } catch (\Exception $e) {
            // Log error yang lebih detail
            Log::error("Error completing request ID {$request->id_stok}: " . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan pada server saat menyelesaikan permintaan. Silakan cek log.'], 500);
        }
    }


public function detailadminmm($username){

    $data = [
        'main' => $this->Akun->detailadmin($username),
    ];
    return view('layoutUser.detailuser', $data);
}



}