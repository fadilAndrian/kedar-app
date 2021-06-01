<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $fillable = [
    	'kelas_id', 'tugas', 'mulai', 'akhir'
    ];

    public function kelas(){
    	$this->belongsTo(Kelas::class);
    }
}
