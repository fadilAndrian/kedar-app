<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetilKelas extends Model
{
    use HasFactory;
    protected $table = 'detil_kelas';
    protected $fillable = [
    	'kelas_id', 'murid_id'
    ];

    public function murid(){
    	return $this->belongsTo(User::class, 'murid_id');
    }

    public function kelas(){
    	return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
