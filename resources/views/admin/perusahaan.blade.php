@extends('layouts.main')

@section('css-vendor')
@livewireStyles
@endsection

@section('content')
<div class="page-inner">
    <livewire:perusahaan />
</div>
@endsection

@section('js-vendor')
@livewireScripts
@endsection
