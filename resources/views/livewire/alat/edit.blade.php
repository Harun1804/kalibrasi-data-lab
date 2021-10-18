<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit Data ALat</div>
            </div>
            <div class="card-body">
                <form method="post" wire:submit.prevent="update">
                    @csrf
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="merkID">Pilih Merk Alat</label>
                                <select class="form-control @error('merkID') is-invalid @enderror" id="merkID" wire:model="merkID">
                                    @foreach ($merks as $merk)
                                        <option>Pilih Merk Alat</option>
                                        <option value="{{ $merk->id }}" @if($merkID == $merk->id) selected @endif>{{ $merk->nama_merk }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="namaAlat">Nama Alat</label>
                                <input type="text" class="form-control @error('namaAlat') is-invalid @enderror" id="namaAlat" placeholder="Enter Merk Alat" required wire:model="namaAlat" value="{{ old('namaAlat',$namaAlat) }}">
                                @error('namaAlat')
                                    <small id="namaAlat" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-info">Ubah</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>