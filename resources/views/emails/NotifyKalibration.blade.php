@component('mail::message')
# Introduction

Ada Alat Yang Perlu Dikalibrasi pada {{ $tanggal }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
