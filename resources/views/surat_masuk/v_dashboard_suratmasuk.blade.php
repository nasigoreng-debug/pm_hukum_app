@extends('layouts.v_template')

@section('content')

<div class = "container-fluid">
    <div class="col-sm-3">
        <div class="xe-widget xe-vertical-counter xe-vertical-counter-purple" data-count=".num" data-from="0" data-to="{{   $suratmasuk_total }}" data-decimal="," data-suffix="" data-duration="2.5">
        <div class="xe-icon">
            <i class="fa fa-users"></i>
            <h4>SURAT MASUK TOTAL </h4>
        </div>
        <div class="xe-icon">
            <a href="/suratmasuk_total" class="text-white">
            <h1 class="num">0</h1>
            </a>
        </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="xe-widget xe-vertical-counter xe-vertical-counter-purple" data-count=".num" data-from="0" data-to="{{   $suratmasuk_berjalan }}" data-decimal="," data-suffix="" data-duration="2.5">
        <div class="xe-icon">
            <i class="fa fa-users"></i>
            <h4>SURAT MASUK {{date('Y')}}</h4>
        </div>
        <div class="xe-icon">
            <a href="/suratmasuk_berjalan" class="text-white">
            <h1 class="num">0</h1>
            </a>
        </div>
        </div>
    </div>
</div>

@endsection