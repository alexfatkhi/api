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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'progdi_id' => 'required|exists:progdi,id',
            'nim' => 'required|unique:mahasiswa,nim',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'umur' => 'required|integer|min:0',
        ]);

        $mahasiswa = Mahasiswa::create($validated);

        return response()->json([
            'code' => 201,
            'message' => 'Mahasiswa created successfully',
            'data' => $mahasiswa,
        ], 201);
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'progdi_id' => 'exists:progdi,id',
            'nim' => 'unique:mahasiswa,nim,' . $mahasiswa->id,
            'nama' => 'string',
            'alamat' => 'string',
            'umur' => 'integer|min:0',
        ]);

        $mahasiswa->update($validated);

        return response()->json([
            'code' => 200,
            'message' => 'Mahasiswa updated successfully',
            'data' => $mahasiswa,
        ]);
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return response()->json([
            'code' => 200,
            'message' => 'Mahasiswa deleted successfully',
        ]);
    }
}
