<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\catin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class catinController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data filter dari request
        $search = $request->input('search');

        if (Auth::user()->role === 'admin') {
            $query = Catin::with('user');
        } else {
            $query = Catin::where('user_id', Auth::id())->with('user');
        }

        // Tambahkan filter pencarian jika ada
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                ->orWhere('nik', 'like', '%' . $search . '%')
                ->orWhere('agama', 'like', '%' . $search . '%')
                ->orWhere('kecamatan', 'like', '%' . $search . '%') // Filter untuk kolom 'kecamatan'
                ->orWhere('kelurahan_desa', 'like', '%' . $search . '%')
                ->orWhere('rw', 'like', '%' . $search . '%')
                ->orWhere('rt', 'like', '%' . $search . '%')
                ->orWhere('jalan_no', 'like', '%' . $search . '%')
                ->orWhere('kode_pos', 'like', '%' . $search . '%') // Filter untuk kolom 'kode_pos'
                ->orWhere('tanggal_lahir', 'like', '%' . $search . '%')
                ->orWhere('berat_badan', 'like', '%' . $search . '%')
                ->orWhere('tinggi', 'like', '%' . $search . '%')
                ->orWhere('lila', 'like', '%' . $search . '%')
                ->orWhere('hb', 'like', '%' . $search . '%')
                ->orWhere('tekanan_darah', 'like', '%' . $search . '%')
                ->orWhere('golongan_darah', 'like', '%' . $search . '%')
                ->orWhere('merokok_terpapar', 'like', '%' . $search . '%')
                ->orWhere('gizi', 'like', '%' . $search . '%')
                ->orWhere('kepesertaan_jkn', 'like', '%' . $search . '%')
                ->orWhere('pekerjaan', 'like', '%' . $search . '%')
                ->orWhere('pendidikan', 'like', '%' . $search . '%')
                ->orWhere('intervensi1', 'like', '%' . $search . '%')
                ->orWhere('intervensi2', 'like', '%' . $search . '%')
                ->orWhere('intervensi_lainnya1', 'like', '%' . $search . '%')
                ->orWhere('intervensi_lainnya2', 'like', '%' . $search . '%')
                ->orWhere('sumber_bantuan', 'like', '%' . $search . '%');
            });
        }

        // Ambil hasil dengan pagination
        $catins = $query->paginate();

        return view('catin.index', compact('catins'));
    }
    
    public function create()
    {
        return view('catin.create');
    }

    public function save(Request $request)
    {
        
        $validation = $request->validate([
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

        $validation['user_id'] = Auth::id(); // Menyimpan user_id

        $data = Catin::create($validation);

        if ($data) {
            session()->flash('success', 'Data berhasil ditambahkan');
            return redirect()->route('catin');
        } else {
            session()->flash('error', 'Terjadi kesalahan, coba lagi.');
            return redirect()->route('catin.create');
        }
    }

    public function edit($id)
    {
        if (Auth::user()->role === 'admin') {
            $catins = Catin::findOrFail($id);
        } else {
            $catins = Catin::where('id', $id)
                ->where('user_id', Auth::id())
                ->firstOrFail();
        }

        return view('catin.edit', compact('catins'));
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

        $validation = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:catins,nik,' . $catins->id,
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

        $catins->update($validation);

        session()->flash('success', 'Data berhasil diperbarui');

        return redirect()->route('catin');
    }

    public function delete($id)
    {
        if (Auth::user()->role === 'admin') {
            $catins = Catin::findOrFail($id);
        } else {
            $catins = Catin::where('id', $id)
                ->where('user_id', Auth::id())
                ->firstOrFail();
        }

        $catins->delete();

        session()->flash('success', 'Data berhasil dihapus');

        return redirect()->route('catin');
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

        $catins->tanggal_lahir = Carbon::parse($catins->tanggal_lahir);

        return view('catin.show', compact('catins'));
    }    
}
