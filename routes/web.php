<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
use App\Http\Livewire\Roles;
use App\Http\Livewire\DashAdmin;
use App\Http\Livewire\DashboardGuru;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\GuruAdmin;
use App\Http\Livewire\MuridAdmin;
use App\Http\Livewire\Profile;
use App\Http\Livewire\RuangGuru;
use App\Http\Livewire\RuangKelas;
use App\Http\Livewire\MasukKelas;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){
	Route::get('/dashboard', Dashboard::class)->name('dashboard');
	Route::get('/profile', Profile::class)->name('profil');
	Route::get('/guru', GuruAdmin::class)->name('admin-guru');
	Route::get('/siswa', MuridAdmin::class)->name('admin-siswa');
	Route::get('/roles', Roles::class)->name('admin-role');
	Route::get('ruang-guru', RuangGuru::class);
	Route::get('ruang-kelas', RuangKelas::class)->name('ruangkelas');
	// Route::get('masuk-kelas/{id}', MasukKelas::class);
});

// Route::get('/datauser', Users::class)->name('users');

Route::group(['middleware' => ['guest']], function(){
	Route::get('/', function () {
	    return view('welcome2');
	});
	Route::get('login', Login::class)->name('login');
	Route::get('register', Register::class)->name('register');
});

// Route::get('tugas', Tugas::class);
