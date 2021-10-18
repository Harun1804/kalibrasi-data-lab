<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MerkAlat;
use App\Models\Alat as ModelsAlat;

class Alat extends Component
{
    public $namaAlat,$selectedID,$merks,$merkID;
    public $formMode = false;
    public $editMode = false;

    protected $rules = [
        'namaAlat'  => 'required',
        'merkID'    => 'required'
    ];

    protected $listeners = ['destroy'];

    public function render()
    {
        $tools = ModelsAlat::with('merk')->orderBy('id','desc')->get();
        return view('livewire.alat.index',compact('tools'));
    }

    public function mount()
    {
        $this->merks = MerkAlat::all();
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
        $this->namaAlat = null;
        $this->merkID   = null;
    }

    public function create()
    {
        $this->formMode = true;
    }

    public function store()
    {
        $this->validate();

        ModelsAlat::create([
            'nama_alat'     => $this->namaAlat,
            'merk_alat_id'  => $this->merkID,
        ]);

        $this->resetInput();
        $this->formMode = false;
        session()->flash('success','Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $merk = ModelsAlat::findOrFail($id);
        $this->selectedID   = $merk->id;
        $this->namaAlat     = $merk->nama_alat;
        $this->merkID       = $merk->merk_alat_id;
        $this->formMode = true;
        $this->editMode = true;
    }

    public function update()
    {
        $merk = ModelsAlat::findOrFail($this->selectedID);
        $merk->update([
            'nama_alat'     => $this->namaAlat,
            'merk_alat_id'  => $this->merkID,
        ]);

        $this->resetInput();
        $this->formMode = false;
        $this->editMode = false;
        session()->flash('success','Data Berhasil Diubah');
    }

    public function destroy()
    {
        ModelsAlat::destroy($this->selectedID);
        session()->flash('success','Data Berhasil Dihapus');
    }
}
