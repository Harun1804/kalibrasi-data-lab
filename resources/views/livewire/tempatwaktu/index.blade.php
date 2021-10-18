<div class="row">
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($formMode)
            @if ($editMode)
                @include('livewire.tempatwaktu.edit')
            @else
                @include('livewire.tempatwaktu.create')
            @endif
        @endif
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Data Tempat Waktu Kalibrasi
                    <div class="float-right">
                        <button type="button" class="btn btn-sm btn-primary" wire:click="create">Tambah Tempat Waktu Kalibrasi</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Action</th>
                                <th scope="col">Tempat</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($places as $place)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" wire:click="edit({{ $place->id }})">Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger" wire:click="alertConfirm({{ $place->id }})">Hapus</button>
                                    </td>
                                    <td>{{ $place->tempat }}</td>
                                    <td>{{ $place->tahun }}</td>
                                    <td>{{ $place->tanggal }}</td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="kosong">Belum Ada Data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>