<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tambah / Edit Data Scan</div>
            </div>
            <div class="card-body">
                <form method="post" wire:submit.prevent="updateScan" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="scan">Scan File</label>
                                <input type="file" class="form-control-file" id="scan" wire:model="scan">
                            </div>
                            @error('scan')
                                <small id="namaAlat" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <h4>Gambar Lama</h4>
                            <img src="{{ asset($oldScan) }}" alt="Gambar Scan Lama" width="150px">
                        </div>
                        <div class="col-md-4">
                            <h4>Gambar Baru</h4>
                            @if ($scan != null)
                                <img src="{{ $scan->temporaryUrl() }}" alt="Gambar Scan Baru" width="150px">
                            @endif
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