<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\User;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
// necesario para la carga de archivos
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic;

class PerfilComponent extends Component
{

    //necesario par al accraga de archivos
    use WithFileUploads;

    public $name;
    public $img;
    public $password, $password1, $password2;
    public $form_password = false;
    public $form_nombre = false;
    public $select_image = false;
    public $password_ok, $confir_password;
    public $show_password = 'password';

    public function render(){        

        if(Auth::check()){
            $user_name = User::find(auth()->user()->id);
            $this->name = $user_name->name;
            return view('livewire.perfil.perfil-component');
        }else{
            redirect()->route('login');
            return view('livewire.perfil.perfil-component');
        }
    }

    public function open_form(){
        $this->form_nombre = !$this->form_nombre;
        $this->select_image = false;
    }

    public function update(){

        $this->validate([
            'name' => 'required'
        ]);

        $user_old = User::find(auth()->user()->id);
        $user_old->name = $this->name;
        $user_old->save();

        redirect()->route('perfil');
        session()->flash('update-name','ok');

    }

    public function open_img(){
        $this->select_image = !$this->select_image;
        $this->form_nombre = false;
    }

    public function updateimg(){

        $this->validate([
            'img' => 'required|image|max:1024',
        ]);

        $user_old = User::find(auth()->user()->id);

        $name = Str::random(20).'.jpg';

        // redimencionamos la img y le cambiamos el formato
        $imgNew = ImageManagerstatic::make($this->img)->widen(130)->encode('jpg');

        // la guardamos en el storage
        Storage::disk('avatar')->put($name, $imgNew);

        $user_old->avatar = $name;
        $user_old->save();

        redirect()->route('perfil');
        session()->flash('update-img','ok');

    }

    public function form_password(){
        $this->form_password = !$this->form_password;
        $this->reset('password','password1','password2');
    }

    public function reset_password(){

        $this->password_ok = '';
        $this->confir_password = '';

         $this->validate([
             'password' => 'required',
             'password1' => 'required',
             'password2' => 'required',
         ]);

         $user = User::find(auth()->user()->id);

        if (Hash::check($this->password, $user->password)) {

            if($this->password1 == $this->password2){

                $user->password = Hash::make($this->password1);
                $user->save();

                Auth::logout();
                redirect()->route('home');
                session()->flash('password_update','ok');

            }else{

                $this->confir_password = 'failed';

            }

        }else{

            $this->password_ok = 'failed';

        }

    }

    public function show_password(){
        if($this->show_password == 'password'){
            $this->show_password = 'text';
        }else{
            $this->show_password = 'password';
        }
    }
}
