<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
    	'kelas_id', 'jam_mulai', 'jam_selesai', 'hari'
    ];

    public function kelas(){
    	return $this->belongsTo(Kelas::class);
    }
}
