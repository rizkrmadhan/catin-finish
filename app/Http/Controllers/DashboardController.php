<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catin;  
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{   
    public function index()
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            // Menghitung total data catin dan user
            $totalCatin = Catin::count();
            $totalUser = User::count();

            // Query to get count of 'catin' by 'kecamatan'
            $catinByKecamatan = Catin::select('kecamatan', DB::raw('count(*) as total'))
                                    ->groupBy('kecamatan')
                                    ->pluck('total', 'kecamatan')->toArray();

            // Mengirim data ke view admin.dashboard
            return view('admin.dashboard', compact('totalCatin', 'totalUser', 'catinByKecamatan'));
        } elseif ($user->role == 'user') {
            // Cek semua data catin berdasarkan user_id
            $catins = Catin::where('user_id', $user->id)->get();

            // Tentukan status data catin
            if ($catins->count() > 0) {
                $statusCatin = "Selesai";
                $catinSubmittedAt = $catins->pluck('created_at')->map(function ($createdAt) {
                    return $createdAt->setTimezone('Asia/Jakarta'); // Menyimpan instance Carbon tanpa memformat
                })->toArray();                                
            } else {
                $statusCatin = "Belum Dibuat";
                $catinSubmittedAt = [];
            }
    
            // Mendapatkan waktu login terakhir
            $lastLoginAt = $user->last_login_at ? $user->last_login_at->format('H:i') : 'Tidak Tersedia';
    
            // Mengirim status data catin ke view user.dashboard
            return view('user.dashboard', compact('statusCatin', 'catinSubmittedAt', 'lastLoginAt'));
        }
    }
}