<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['user_id', 'nama_lengkap', 'nama_belakang', 'jenis_kelamin', 'alamat', 'avatar', 'Agama'];

    public function getavatar()
    {
        if (!$this->avatar) {
            return asset('images/default.jpg');
        }

        return asset('images/' . $this->avatar);
    }

    public function mapel()
    {
        return $this->belongsToMany(mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }
}
