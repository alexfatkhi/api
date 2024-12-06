<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Tampilkan semua data mahasiswa.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::with('progdi')->get();

        return response()->json([
            'code' => 200,
            'message' => 'Daftar mahasiswa berhasil diambil',
            'data' => $mahasiswa
        ]);
    }
}
