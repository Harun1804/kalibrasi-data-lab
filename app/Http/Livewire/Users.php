<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class Users extends Component
{
    public $role,$username,$email,$nohp,$password,$cpassword,$selectedID;
    public $formMode = false;
    public $editMode = false;

    protected $rules = [
        'username'  => 'required|unique:users,username|min:6',
        'email'     => 'required|unique:users,email|email:dns',
        'nohp'      => 'nullable|numeric',
        'password'  => 'required|min:8|same:cpassword',
        'cpassword'  => 'required|min:8|same:password'
    ];

    protected $listeners = ['destroy'];

    public function render()
    {
        $users = User::orderBy('id','desc')->where('role',$this->role)->get();
        return view('livewire.users.index',compact('users'));
    }

    public function mount()
    {
        $this->role = Request::segment(3);
    }

    public function resetInput()
    {
        $this->username     = null;
        $this->email        = null;
        $this->nohp         = null;
        $this->password     = null;
        $this->cpassword    = null;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function alertConfirm($id)
    {
        $this->selectedID = $id;

        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',  
            'message' => 'Apakah Kamu Yakin ?', 
            'text' => 'Jika terhapus, Kamu tidak bisa mengembalikannya lagi'
        ]);
    }

    public function create()
    {
        $this->formMode = true;
    }

    public function store()
    {
        $this->validate();

        User::create([
            'username'  => $this->username,
            'email'     => $this->email,
            'password'  => Hash::make($this->password),
            'no_hp'     => $this->nohp,
            'role'      => $this->role
        ]);

        $this->resetInput();
        $this->formMode = false;
        session()->flash('success','Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->selectedID   = $user->id;
        $this->username     = $user->username;
        $this->email        = $user->email;
        $this->nohp         = $user->no_hp;
        $this->formMode = true;
        $this->editMode = true;
    }

    public function update()
    {
        $user = User::findOrFail($this->selectedID);
        $user->update([
            'username'  => $this->username,
            'email'     => $this->email,
            'no_hp'     => $this->nohp
        ]);

        $this->resetInput();
        $this->formMode = false;
        $this->editMode = false;
        session()->flash('success','Data Berhasil Diubah');
    }

    public function destroy()
    {
        User::destroy($this->selectedID);
        session()->flash('success','Data Berhasil Dihapus');
    }
}
