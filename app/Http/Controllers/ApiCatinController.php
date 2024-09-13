<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catin;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\catinResource;
use App\Http\Resources\catinCollection;

class ApiCatinController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $catins = Catin::with('user')->paginate(2);
        } else {
            $catins = Catin::where('user_id', Auth::id())->with('user')->paginate(2);
        }

        return new catinCollection($catins);
    }

    public function show($id)
    {
        if (Auth::user()->role === 'admin') {
            $catins = Catin::findOrFail($id);
        } else {
            $catins = Catin::where('id', $id)
                ->where('user_id', Auth::id())
                ->firstOrFail();
        }

        return new catinResource($catins);
    }

    public function store(Request $request)
    {
        dd($request->all());
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:catins,nik',
            'agama' => 'required|string',
            'provinsi' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan_desa' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'jalan_no' => 'required|string',
            'kode_pos' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'berat_badan' => 'required|numeric',
            'tinggi' => 'required|numeric',
            'lila' => 'required|numeric',
            'hb' => 'required|numeric',
            'tekanan_darah' => 'required|string',
            'golongan_darah' => 'required|string',
            'merokok_terpapar' => 'required|string',
            'gizi' => 'required|string',
            'kepesertaan_jkn' => 'required|string',
            'pekerjaan' => 'required|string',
            'pendidikan' => 'required|string',
            'intervensi1' => 'nullable|string',
            'intervensi2' => 'nullable|string',
            'intervensi_lainnya1' => 'nullable|string',
            'intervensi_lainnya2' => 'nullable|string',
            'sumber_bantuan' => 'nullable|string',
        ]);

        $validatedData['user_id'] = Auth::id();

        $catins = Catin::create($validatedData);

        return response()->json(['message' => 'Data berhasil ditambahkan', 'data' => new catinResource($catins)], 201);
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->role === 'admin') {
            $catins = Catin::findOrFail($id);
        } else {
            $catins = Catin::where('id', $id)
                ->where('user_id', Auth::id())
                ->firstOrFail();
        }

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:catins,nik',
            'agama' => 'required|string',
            'provinsi' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan_desa' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'jalan_no' => 'required|string',
            'kode_pos' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'berat_badan' => 'required|numeric',
            'tinggi' => 'required|numeric',
            'lila' => 'required|numeric',
            'hb' => 'required|numeric',
            'tekanan_darah' => 'required|string',
            'golongan_darah' => 'required|string',
            'merokok_terpapar' => 'required|string',
            'gizi' => 'required|string',
            'kepesertaan_jkn' => 'required|string',
            'pekerjaan' => 'required|string',
            'pendidikan' => 'required|string',
            'intervensi1' => 'nullable|string',
            'intervensi2' => 'nullable|string',
            'intervensi_lainnya1' => 'nullable|string',
            'intervensi_lainnya2' => 'nullable|string',
            'sumber_bantuan' => 'nullable|string',
        ]);

        $catins->update($validatedData);

        return response()->json(['message' => 'Data berhasil diperbarui', 'data' => new catinResource($catins)], 200);
    }

    public function destroy($id)
    {
        if (Auth::user()->role === 'admin') {
            $catins = Catin::findOrFail($id);
        } else {
            $catins = Catin::where('id', $id)
                ->where('user_id', Auth::id())
                ->firstOrFail();
        }

        $catins->delete();

        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
