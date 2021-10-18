<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tambah Data Perusaan/div>
            </div>
            <div class="card-body">
                <form method="post" wire:submit.prevent="store">
                    @csrf
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="namaPerusahaan">Nama Perusahaan</label>
                                <input type="text" class="form-control @error('namaPerusahaan') is-invalid @enderror" id="namaPerusahaan" placeholder="Enter Nama Perusahaan" required wire:model="namaPerusahaan" value="{{ old('namaPerusahaan') }}">
                                @error('namaPerusahaan')
                                    <small id="namaPerusahaan" class="form-text text-danger">{{ $message }}</small>
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