@extends('layouts.v_template')

@section('content')
@include('layouts.v_deskripsi')
<!-- DASHBOARD JDIH -->

<div class = "container-fluid">
    <div class="col-sm-3">
        <div class="xe-widget xe-vertical-counter xe-vertical-counter-info" data-count=".num" data-from="0" data-to="{{ $retensi_total }}" data-decimal="," data-suffix="" data-duration="2.5">
        <div class="xe-icon">
        <i class="fa fa-file-text-o"></i>
            <h4>Retensi Arsip</h4>
        </div>
        <div class="xe-icon">
            <a href="/retensi_total" class="text-white">
            <h1 class="num">0</h1>
            </a>
        </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="xe-widget xe-vertical-counter xe-vertical-counter-success" data-count=".num" data-from="0" data-to="{{ $retensi_selesai }}" data-decimal="," data-suffix="" data-duration="2.5">
        <div class="xe-icon">
        <i class="fa fa-file-text-o"></i>
            <h4>Sudah upload</h4>
        </div>
        <div class="xe-icon">
            <a href="/retensi_sdh" class="text-white">
            <h1 class="num">0</h1>
            </a>
        </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="xe-widget xe-vertical-counter xe-vertical-counter-danger" data-count=".num" data-from="0" data-to="{{ $retensi_blm_selesai }}" data-decimal="," data-suffix="" data-duration="2.5">
        <div class="xe-icon">
        <i class="fa fa-file-text-o"></i>
            <h4>Belum Upload</h4>
        </div>
        <div class="xe-icon">
            <a href="/retensi_blm" class="text-white">
            <h1 class="num">0</h1>
            </a>
        </div>
        </div>
    </div>
@endsection