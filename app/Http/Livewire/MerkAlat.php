<?php

namespace App\Http\Livewire;

use App\Models\MerkAlat as ModelsMerkAlat;
use Livewire\Component;

class MerkAlat extends Component
{
    public $namaMerk,$selectedID;
    public $formMode = false;
    public $editMode = false;

    protected $rules = [
        'namaMerk'  => 'required'
    ];

    protected $listeners = ['destroy'];

    public function render()
    {
        $merks = ModelsMerkAlat::orderBy('id','desc')->get();
        return view('livewire.merkalat.index',compact('merks'));
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

    public function resetInput()
    {
        $this->namaMerk = null;
    }

    public function create()
    {
        $this->formMode = true;
    }

    public function store()
    {
        $this->validate();

        ModelsMerkAlat::create([
            'nama_merk' => $this->namaMerk
        ]);

        $this->resetInput();
        $this->formMode = false;
        session()->flash('success','Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $merk = ModelsMerkAlat::findOrFail($id);
        $this->selectedID   = $merk->id;
        $this->namaMerk     = $merk->nama_merk;
        $this->formMode = true;
        $this->editMode = true;
    }

    public function update()
    {
        $merk = ModelsMerkAlat::findOrFail($this->selectedID);
        $merk->update([
            'nama_merk' => $this->namaMerk
        ]);

        $this->resetInput();
        $this->formMode = false;
        $this->editMode = false;
        session()->flash('success','Data Berhasil Diubah');
    }

    public function destroy()
    {
        ModelsMerkAlat::destroy($this->selectedID);
        session()->flash('success','Data Berhasil Dihapus');
    }
}
