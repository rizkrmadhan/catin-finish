<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class catinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'nama' => $this->nama,
            'nik' => $this->nik,
            'agama' => $this->agama,
            'alamat' => $this->alamat,
            'tanggal_lahir' => $this->tanggal_lahir,
            'berat_badan' => $this->berat_badan,
            'tinggi' => $this->tinggi,
            'lila' => $this->lila,
            'hb' => $this->hb,
            'tekanan_darah' => $this->tekanan_darah,
            'golongan_darah' => $this->golongan_darah,
            'merokok_terpapar' => $this->merokok_terpapar,
            'gizi' => $this->gizi,
            'kepesertaan_jkn' => $this->kepesertaan_jkn,
            'pekerjaan' => $this->pekerjaan,
            'pendidikan' => $this->pendidikan,
            'intervensi' => $this->intervensi,
            'intervensi_lainnya' => $this->intervensi_lainnya,
            'sumber_bantuan' => $this->sumber_bantuan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
