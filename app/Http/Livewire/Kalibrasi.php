<?php

namespace App\Http\Livewire;

use App\Models\Alat;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\TempatWaktuKalibrasi;
use Illuminate\Support\Facades\Auth;
use App\Models\kalibrasi as ModelsKalibrasi;
use App\Models\Perusahaan;

class Kalibrasi extends Component
{
    use WithFileUploads;

    public $tools,$companies,$tempatWaktu;
    public $alatID,$perusahaanID,$twID,$scan,$tipe,$selectedID,$oldScan;
    public $formMode = false;
    public $editMode = false;
    public $uploadScan = false;

    protected $rules = [
        'alatID'        => 'required',
        'perusahaanID'  => 'required',
        'twID'          => 'required',
        'tipe'          => 'required'
    ];

    protected $listeners = ['destroy'];

    public function render()
    {
        $kalibrasi = ModelsKalibrasi::with(['user','alat','perusahaan','tempatWaktu','alat.merk'])->orderBy('id','desc')->get();
        $lokasi     = TempatWaktuKalibrasi::select('tahun')->distinct()->get();
        return view('livewire.kalibrasi.index',compact(['kalibrasi','lokasi']));
    }

    public function mount()
    {
        $this->tools    = Alat::all();
        $this->companies= Perusahaan::all();
        $this->tempatWaktu= TempatWaktuKalibrasi::all();
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
        $this->alatID       = null;
        $this->perusahaanID = null;
        $this->twID         = null;
        $this->scan         = null;
        $this->tipe         = null;
    }

    public function create()
    {
        $this->formMode = true;
    }

    public function store()
    {
        $this->validate();

        ModelsKalibrasi::create([
            'user_id'  => Auth::id(),
            'alat_id'  => $this->alatID,
            'perusahaan_id'  => $this->perusahaanID,
            'tempat_waktu_id'  => $this->twID,
            'tipe'  => $this->tipe,
        ]);

        $this->resetInput();
        $this->formMode = false;
        session()->flash('success','Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $kalibrasi = ModelsKalibrasi::findOrFail($id);
        $this->selectedID   = $kalibrasi->id;
        $this->alatID       = $kalibrasi->alat_id;
        $this->perusahaanID = $kalibrasi->perusahaan_id;
        $this->twID         = $kalibrasi->tempat_waktu_id;
        $this->tipe         = $kalibrasi->tipe;
        $this->formMode     = true;
        $this->editMode     = true;
    }

    public function update()
    {
        $merk = ModelsKalibrasi::findOrFail($this->selectedID);
        $merk->update([
            'user_id'  => Auth::id(),
            'alat_id'  => $this->alatID,
            'perusahaan_id'  => $this->perusahaanID,
            'tempat_waktu_id'  => $this->twID,
            'tipe'  => $this->tipe,
        ]);

        $this->resetInput();
        $this->formMode = false;
        $this->editMode = false;
        session()->flash('success','Data Berhasil Diubah');
    }

    public function editScan($id)
    {
        $kalibrasi = ModelsKalibrasi::findOrFail($id);
        $this->selectedID   = $kalibrasi->id;
        $this->oldScan      = $kalibrasi->scan;
        $this->formMode     = true;
        $this->uploadScan   = true;
    }

    public function updateScan()
    {
        $this->validate([
            'scan'  => 'required|image|max:2048|mimes:png,jpg,jpeg'
        ]);

        $scanData = $this->scan->store('img/scan','public');
        $merk = ModelsKalibrasi::findOrFail($this->selectedID);
        $merk->update([
            'scan'  => $scanData
        ]);

        $this->resetInput();
        $this->formMode = false;
        $this->uploadScan = false;
        session()->flash('success','Data Scan Berhasil Ditambahkan');
    }

    public function destroy()
    {
        ModelsKalibrasi::destroy($this->selectedID);
        session()->flash('success','Data Berhasil Dihapus');
    }
}
