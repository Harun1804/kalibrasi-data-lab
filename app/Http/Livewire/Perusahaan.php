<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Perusahaan as ModelPerusahaan;

class Perusahaan extends Component
{
    public $namaPerusahaan,$selectedID;
    public $formMode = false;
    public $editMode = false;

    protected $rules = [
        'namaPerusahaan'  => 'required'
    ];

    protected $listeners = ['destroy'];

    public function render()
    {
        $companies = ModelPerusahaan::orderBy('id','desc')->get();
        return view('livewire.perusahaan.index',compact('companies'));
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
        $this->namaPerusahaan = null;
    }

    public function create()
    {
        $this->formMode = true;
    }

    public function store()
    {
        $this->validate();

        ModelPerusahaan::create([
            'nama_perusahaan' => $this->namaPerusahaan
        ]);

        $this->resetInput();
        $this->formMode = false;
        session()->flash('success','Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $merk = ModelPerusahaan::findOrFail($id);
        $this->selectedID       = $merk->id;
        $this->namaPerusahaan   = $merk->nama_perusahaan;
        $this->formMode = true;
        $this->editMode = true;
    }

    public function update()
    {
        $merk = ModelPerusahaan::findOrFail($this->selectedID);
        $merk->update([
            'nama_perusahaan' => $this->namaPerusahaan
        ]);

        $this->resetInput();
        $this->formMode = false;
        $this->editMode = false;
        session()->flash('success','Data Berhasil Diubah');
    }

    public function destroy()
    {
        ModelPerusahaan::destroy($this->selectedID);
        session()->flash('success','Data Berhasil Dihapus');
    }
}
