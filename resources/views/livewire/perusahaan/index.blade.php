<div class="row">
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($formMode)
            @if ($editMode)
                @include('livewire.perusahaan.edit')
            @else
                @include('livewire.perusahaan.create')
            @endif
        @endif
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Data Perusahaan
                    <div class="float-right">
                        <button type="button" class="btn btn-sm btn-primary" wire:click="create">Tambah Perusahaan</button>
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
                                <th scope="col">Nama Perusahaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($companies as $company)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" wire:click="edit({{ $company->id }})">Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger" wire:click="alertConfirm({{ $company->id }})">Hapus</button>
                                    </td>
                                    <td>{{ $company->nama_perusahaan }}</td>
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