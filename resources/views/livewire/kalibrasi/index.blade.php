<div class="row">
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($formMode)
            @if ($editMode)
                @include('livewire.kalibrasi.edit')
            @else
                @include('livewire.kalibrasi.create')
            @endif
        @endif
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Data Merk Alat
                    <div class="float-right">
                        <button type="button" class="btn btn-sm btn-primary" wire:click="create">Tambah Data</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mt-3 table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2">#</th>
                                <th scope="col" rowspan="2">Action</th>
                                <th scope="col" rowspan="2">Alat</th>
                                <th scope="col" rowspan="2">Scan</th>
                                <th scope="col" rowspan="2">Perusahaan</th>
                                <th scope="col" rowspan="2">Tempat Kalibrasi</th>
                                <th scope="col" rowspan="2">Merk</th>
                                <th scope="col" rowspan="2">Tipe / No Seri ALat</th>
                                <th scope="col" colspan="{{ count($lokasi) }}" class="kosong">Tahun</th>
                            </tr>
                            <tr>
                                @forelse ($lokasi as $kb)
                                    <th scope="col">{{ $kb->tahun }}</th>
                                @empty
                                    <th scope="col" class="kosong">Belum Ada Tahun</th>
                                @endforelse
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kalibrasi as $kb)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" wire:click="edit({{ $kb->id }})">Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger" wire:click="alertConfirm({{ $kb->id }})">Hapus</button>
                                    </td>
                                    <td>{{ $kb->alat->nama_alat }}</td>
                                    <td>
                                        <img src="{{ asset($kb->scan) }}" alt="{{ $kb->alat->nama_alat }}">
                                    </td>
                                    <td>{{ $kb->perusahaan->nama_perusahaan }}</td>
                                    <td>{{ $kb->tempatWaktu->tempat }}</td>
                                    <td>{{ $kb->alat->merk->nama_merk }}</td>
                                    <td>{{ $kb->tipe }}</td>
                                    @forelse ($lokasi as $lk)
                                        @if ($kb->tempatWaktu->tahun == $lk->tahun)
                                            <td>{{ $kb->tempatWaktu->tanggal }}</td>
                                        @else
                                            <td></td>
                                        @endif
                                    @empty
                                        <td scope="col" class="kosong">Belum Ada Tahun</td>
                                    @endforelse
                                </tr>
                            @empty
                                <tr>
                                    <td class="kosong" colspan="{{ 8 + count($lokasi) }}">Belum Ada Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>