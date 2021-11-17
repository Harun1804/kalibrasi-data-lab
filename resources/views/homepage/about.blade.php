@extends('layouts.homepage')

@section('header-title',"About")

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <center>
                        <img src="{{ asset('assets/img/organisasi.jpeg') }}" alt="Struktur Organisasi" class="img img-fluid">
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
