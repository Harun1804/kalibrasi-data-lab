<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tambah Data User</div>
            </div>
            <div class="card-body">
                <form method="post" wire:submit.prevent="store">
                    @csrf
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Enter Username" required wire:model="username" value="{{ old('username') }}">
                                @error('username')
                                    <small id="username" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email" required wire:model="email" value="{{ old('email') }}">
                                @error('email')
                                    <small id="email" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter Password" required wire:model="password">
                                @error('password')
                                    <small id="password" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cpassword">Confirm Password</label>
                                <input type="password" class="form-control @error('cpassword') is-invalid @enderror" id="cpassword" placeholder="Enter Confirm Password" required wire:model="cpassword">
                                @error('cpassword')
                                    <small id="cpassword" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nohp">Nomor HP</label>
                                <input type="number" class="form-control @error('nohp') is-invalid @enderror" id="nohp" placeholder="Enter Phone Number" required wire:model="nohp" value="{{ old('nohp') }}">
                                @error('nohp')
                                    <small id="nohp" class="form-text text-danger">{{ $message }}</small>
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