<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit Data Kalibrasi</div>
            </div>
            <div class="card-body">
                <form method="post" wire:submit.prevent="update">
                    @csrf
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alatID">Alat</label>
                                <select class="form-control @error('alatID') is-invalid @enderror" id="alatID" wire:model="alatID">
                                    <option>Pilih Alat</option>
                                    @foreach ($tools as $alat)
                                        <option value="{{ $alat->id }}" @if($alat->id == $alatID) selected @endif>{{ $alat->nama_alat }}</option>
                                    @endforeach
                                </select>
                                @error('alatID')
                                    <small id="namaAlat" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="perusahaanID">Alat</label>
                                <select class="form-control @error('perusahaanID') is-invalid @enderror" id="perusahaanID" wire:model="perusahaanID">
                                    <option>Pilih Perusahaan</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}" @if($company->id == $perusahaanID) selected @endif>{{ $company->nama_perusahaan }}</option>
                                    @endforeach
                                </select>
                                @error('perusahaanID')
                                    <small id="namaAlat" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="twID">Tempat</label>
                                <select class="form-control @error('twID') is-invalid @enderror" id="twID" wire:model="twID">
                                    <option>Pilih Tempat</option>
                                    @foreach ($tempatWaktu as $tw)
                                        <option value="{{ $tw->id }}" @if($tw->id == $twID) selected @endif>{{ $tw->tempat }}</option>
                                    @endforeach
                                </select>
                                @error('twID')
                                    <small id="namaAlat" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tipe">Tipe / No Seri</label>
                                <input type="text" class="form-control @error('tipe') is-invalid @enderror" id="tipe" placeholder="Enter Tipe / Seri" required wire:model="tipe" value="{{ old('tipe',$tipe) }}">
                                @error('tipe')
                                    <small id="tipe" class="form-text text-danger">{{ $message }}</small>
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