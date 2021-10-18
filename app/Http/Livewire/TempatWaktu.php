<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TempatWaktuKalibrasi;
use Carbon\Carbon;

class TempatWaktu extends Component
{
    public $tempat,$waktu,$selectedID;
    public $formMode = false;
    public $editMode = false;

    protected $rules = [
        'tempat'    => 'required',
        'waktu'     => 'required|date'
    ];

    protected $listeners = ['destroy'];

    public function render()
    {
        $places = TempatWaktuKalibrasi::orderBy('id','desc')->get();
        return view('livewire.tempatwaktu.index',compact('places'));
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
        $this->tempat   = null;
        $this->waktu    = null;
    }

    public function create()
    {
        $this->formMode = true;
    }

    public function store()
    {
        $this->validate();

        TempatWaktuKalibrasi::create([
            'tempat'    => $this->tempat,
            'tahun'     => Carbon::parse($this->waktu)->year,
            'tanggal'   => $this->waktu,
        ]);

        $this->resetInput();
        $this->formMode = false;
        session()->flash('success','Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $twk = TempatWaktuKalibrasi::findOrFail($id);
        $this->selectedID   = $twk->id;
        $this->tempat       = $twk->tempat;
        $this->waktu      = $twk->tanggal;
        $this->formMode = true;
        $this->editMode = true;
    }

    public function update()
    {
        $twk = TempatWaktuKalibrasi::findOrFail($this->selectedID);
        $twk->update([
            'tempat'    => $this->tempat,
            'tahun'     => Carbon::parse($this->waktu)->year,
            'tanggal'   => $this->waktu,
        ]);

        $this->resetInput();
        $this->formMode = false;
        $this->editMode = false;
        session()->flash('success','Data Berhasil Diubah');
    }

    public function destroy()
    {
        TempatWaktuKalibrasi::destroy($this->selectedID);
        session()->flash('success','Data Berhasil Dihapus');
    }
}
