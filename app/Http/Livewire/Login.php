<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
	public $email, $password;

    public function render()
    {
        return view('livewire.login');
    }

    public function login(){
  		$messages = [
            'required' => 'Form ini jangan dilupakan ya',
            'email' => 'Tolong diisi dengan email ya',
            'min' => 'Jumlah karakter kurang dari 8 nih'
        ];

    	$this->validate([
    		'email'=> 'required|email',
    		'password' => 'required|min:8'
    	], $messages);
    	
    	// if (auth()->Auth::attempt([
    	// 	'email' => $this->email,
    	// 	'password' => $this->password,
    	// ])) {
    	// 	if (auth()->user()->role_id == 1) {
	    // 		return redirect()->to('/admin.dashboard');
    	// 	} else{
    	// 		return redirect()->to('/dashboard');
    	// 	}
    	// } else {
    	// 	return redirect()->to('/login')->with('error', 'Nampaknya email atau passwordnya salah');
    	// }

        // $auth = Auth::attempt(['email'=>$this->email, 'password'=>$this->password]);
        // dd($auth);

        if (Auth::attempt(['email'=>$this->email, 'password'=>$this->password])) {
            if (Auth()->user()->role_id == 2) {
                return redirect()->route('ruangguru');
            } else if (Auth()->user()->role_id == 3) {
                return redirect()->route('ruangkelas');
            } else {
                return redirect()->route('admin-role');
            }
            
        } else {
            session()->flash('error', 'Kayaknya email atau passwordmu salah, tuh 🤔');
            return redirect()->route('login');
        }
    }
}
