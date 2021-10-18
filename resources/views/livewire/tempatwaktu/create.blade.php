<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tambah Data Tempat Waktu Kalibrasi</div>
            </div>
            <div class="card-body">
                <form method="post" wire:submit.prevent="store">
                    @csrf
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tempat">Tempat Kalibrasi</label>
                                <input type="text" class="form-control @error('tempat') is-invalid @enderror" id="tempat" placeholder="Enter Tempat Kalibrasi" required wire:model="tempat" value="{{ old('tempat') }}">
                                @error('tempat')
                                    <small id="tempat" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="waktu">Waktu Kalibrasi</label>
                                <input type="date" class="form-control @error('waktu') is-invalid @enderror" id="waktu" placeholder="Enter Waktu Kalibrasi" required wire:model="waktu" value="{{ old('waktu') }}">
                                @error('waktu')
                                    <small id="waktu" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-info">Tambah</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>