<div class="row">
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($formMode)
            @if ($editMode)
                @include('livewire.merkalat.edit')
            @else
                @include('livewire.merkalat.create')
            @endif
        @endif
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Data Merk Alat
                    <div class="float-right">
                        <button type="button" class="btn btn-sm btn-primary" wire:click="create">Tambah Merk Alat</button>
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
                                <th scope="col">Nama Merk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($merks as $merk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" wire:click="edit({{ $merk->id }})">Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger" wire:click="alertConfirm({{ $merk->id }})">Hapus</button>
                                    </td>
                                    <td>{{ $merk->nama_merk }}</td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="kosong">Belum Ada Data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>