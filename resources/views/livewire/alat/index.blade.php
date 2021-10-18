<div class="row">
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($formMode)
            @if ($editMode)
                @include('livewire.alat.edit')
            @else
                @include('livewire.alat.create')
            @endif
        @endif
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Data Merk Alat
                    <div class="float-right">
                        <button type="button" class="btn btn-sm btn-primary" wire:click="create">Tambah Alat</button>
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
                                <th scope="col">Merk Alat</th>
                                <th scope="col">Nama Alat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tools as $tool)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" wire:click="edit({{ $tool->id }})">Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger" wire:click="alertConfirm({{ $tool->id }})">Hapus</button>
                                    </td>
                                    <td>{{ $tool->merk->nama_merk }}</td>
                                    <td>{{ $tool->nama_alat }}</td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="kosong">Belum Ada Data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>