<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;

class Register extends Component
{
    public $user_id;
	public $name;
	public $email;
	public $password;
    public $password_confirmation;
    public $role_id;
	public $roles;

    public function render()
    {
        $x = Role::all()->count();
        $jml = $x - 1;
        // dd($jml);
    	$this->roles = Role::take($jml)->orderBy('id', 'DESC')->get();
        return view('livewire.register');
    }

    public function register(){
        $messages = [
            'required' => 'Form ini jangan dilupakan ya',
            'unique' => 'Maaf, email sudah terdaftar',
            'email' => 'Tolong diisi dengan email ya',
            'min' => 'Jumlah karakter kurang dari 8 nih',
        ];

    	$this->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'min:8|required|confirmed',
            'role_id' => 'required'
        ], $messages);

    	User::updateOrCreate(['id'=> $this->user_id], [
    		'name' => $this->name,
    		'email' => $this->email,
    		'password' => bcrypt($this->password),
    		'role_id' => $this->role_id,
            'nomor_identitas' => '-',
            'alamat' => '-',
            'no_tlp' => '-',
            'sekolah' => '-',
    	]);

        // session()->flash('message', 'Selamat! Kamu berhasil mendaftar');

        return redirect()->route('login');
        // dd($data);
    }

    public function logout(){
        Auth::logout();

        return redirect()->to('/login');
    }
}
