<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $fillable = ['guru_id', 'matkul', 'kelas', 'kode_join_kelas'];

    public function guru(){
    	return $this->belongsTo(User::class, 'guru_id');
    }

    public function jadwal(){
    	return $this->hasMany(Jadwal::class);
    }
}
