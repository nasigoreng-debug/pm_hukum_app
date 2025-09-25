@extends('layouts.v_template')

@section('content')

<div class = "container-fluid">
    <div class="col-sm-3">
        <div class="xe-widget xe-vertical-counter xe-vertical-counter-success" data-count=".num" data-from="0" data-to="{{   $suratkeluar_total }}" data-decimal="," data-suffix="" data-duration="2.5">
        <div class="xe-icon">
            <i class="fa fa-envelope-o"></i>
            <h4>TOTAL SURAT KELUAR</h4>
        </div>
        <div class="xe-icon">
            <a href="/suratkeluar_total" class="text-white">
            <h1 class="num">0</h1>
            </a>
        </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="xe-widget xe-vertical-counter xe-vertical-counter-purple" data-count=".num" data-from="0" data-to="{{   $suratkeluar_berjalan }}" data-decimal="," data-suffix="" data-duration="2.5">
        <div class="xe-icon">
            <i class="fa fa-envelope-o"></i>
            <h4>SURAT KELUAR {{date('Y')}}</h4>
        </div>
        <div class="xe-icon">
            <a href="/suratkeluar_berjalan" class="text-white">
            <h1 class="num">0</h1>
            </a>
        </div>
        </div>
    </div>
</div>

@endsection