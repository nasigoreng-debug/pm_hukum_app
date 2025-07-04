@extends('layouts.v_template')

@section('content')

<div class = "container-fluid">
    <div class="col-sm-3">
        <div class="xe-widget xe-vertical-counter xe-vertical-counter-success" data-count=".num" data-from="0" data-to="{{ $pengaduan_total }}" data-decimal="," data-suffix="" data-duration="2.5">
        <div class="xe-icon">
            <i class="fa fa-users"></i>
            <h4>TOTAL PENGADUAN</h4>
        </div>
        <div class="xe-icon">
            <a href="/pgd_total" class="text-white">
            <h1 class="num">0</h1>
            </a>
        </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="xe-widget xe-vertical-counter xe-vertical-counter-purple" data-count=".num" data-from="0" data-to="{{ $pengaduan_berjalan }}" data-decimal="," data-suffix="" data-duration="2.5">
        <div class="xe-icon">
            <i class="fa fa-users"></i>
            <h4>PENGADUAN {{date('Y')}}</h4>
        </div>
        <div class="xe-icon">
            <a href="/pgd_berjalan" class="text-white">
            <h1 class="num">0</h1>
            </a>
        </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="xe-widget xe-vertical-counter xe-vertical-counter-danger" data-count=".num" data-from="0" data-to="{{ $pengaduan_blm_selesai }}" data-decimal="," data-suffix="" data-duration="2.5">
        <div class="xe-icon">
            <i class="fa fa-users"></i>
            <h4>PENGADUAN BELUM SELESAI</h4>
        </div>
        <div class="xe-icon">
            <a href="/pengaduan_blm_selesai" class="text-white">
            <h1 class="num">0</h1>
            </a>
        </div>
        </div>
    </div>
</div>

@endsection