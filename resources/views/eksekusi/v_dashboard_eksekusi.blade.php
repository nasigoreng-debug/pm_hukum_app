@extends('layouts.v_template')

@section('content')



<!-- DASHBOARD EKSEKUSI -->

<div class = "container-fluid">
  <div class="col-sm-3">
    <div class="xe-widget xe-vertical-counter xe-vertical-counter-purple" data-count=".num" data-from="0" data-to="{{ $eksekusi_total }}" data-decimal="," data-suffix="" data-duration="2.5">
      <div class="xe-icon">
        <i class="fa fa-users"></i>
        <h4>PERKARA EKSEKUSI SE WILAYAH PTA BANDUNG</h4>
      </div>
      <div class="xe-icon">
        <a href="/eks/total" class="text-white">
          <h1 class="num">0</h1>
        </a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="xe-widget xe-vertical-counter xe-vertical-counter-success" data-count=".num" data-from="0" data-to="{{$eksekusi_selesai}}" data-decimal="," data-suffix="" data-duration="2.5">
      <div class="xe-icon">
        <i class="fa fa-users"></i>
        <h4>PERKARA EKSEKUSI <br> SUDAH SELESAI</h4>
      </div>
      <div class="xe-icon">
        <a href="/eks/selesai" class="text-white">
          <h1 class="num">0</h1>
        </a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="xe-widget xe-vertical-counter xe-vertical-counter-danger" data-count=".num" data-from="0" data-to="{{ $eksekusi_blm_selesai }}" data-decimal="," data-suffix="" data-duration="2.5">
      <div class="xe-icon">
        <i class="fa fa-users"></i>
        <h4>PERKARA EKSEKUSI <br> BELUM SELESAI</h4>
      </div>
      <div class="xe-icon">
        <a href="/eks/berjalan" class="text-white">
          <h1 class="num">0</h1>
        </a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary" data-count=".num" data-from="0" data-to="{{$eksekusi_presentase}} " data-decimal="," data-suffix="%" data-duration="2.5">
      <div class="xe-icon">
        <i class="fa fa-users"></i>
        <h4>PRESENTASE PENYELESAIAN PERKARA EKSEKUSI</h4>
      </div>
      <div class="xe-icon">
        <a href="/eks/progres" class="text-white">
          <h1 class="num">0,0%</h1>
        </a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary" data-count=".num" data-from="0" data-to="{{ $eksekusi_riil }}" data-decimal="," data-suffix="" data-duration="2.5">
      <div class="xe-icon">
        <i class="fa fa-users"></i>
        <h4>EKSEKUSI RIIL</h4>
      </div>
      <div class="xe-icon">
        <a href="/eks/berjalan" class="text-white">
          <h1 class="num">0</h1>
        </a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary" data-count=".num" data-from="0" data-to="{{ $eksekusi_lelang }}" data-decimal="," data-suffix="" data-duration="2.5">
      <div class="xe-icon">
        <i class="fa fa-users"></i>
        <h4>PENYERAHAN HASIL LELANG</h4>
      </div>
      <div class="xe-icon">
        <a href="/eks/berjalan" class="text-white">
          <h1 class="num">0</h1>
        </a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary" data-count=".num" data-from="0" data-to="{{ $eksekusi_dicabut }}" data-decimal="," data-suffix="" data-duration="2.5">
      <div class="xe-icon">
        <i class="fa fa-users"></i>
        <h4>DICABUT</h4>
      </div>
      <div class="xe-icon">
        <a href="/eks/berjalan" class="text-white">
          <h1 class="num">0</h1>
        </a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary" data-count=".num" data-from="0" data-to="{{ $eksekusi_dicoret }}" data-decimal="," data-suffix="" data-duration="2.5">
      <div class="xe-icon">
        <i class="fa fa-users"></i>
        <h4>DICORET</h4>
      </div>
      <div class="xe-icon">
        <a href="/eks/berjalan" class="text-white">
          <h1 class="num">0</h1>
        </a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary" data-count=".num" data-from="0" data-to="{{ $eksekusi_ne }}" data-decimal="," data-suffix="" data-duration="2.5">
      <div class="xe-icon">
        <i class="fa fa-users"></i>
        <h4>NON-EKSEKUTABLE</h4>
      </div>
      <div class="xe-icon">
        <a href="/eks/berjalan" class="text-white">
          <h1 class="num">0</h1>
        </a>
      </div>
    </div>
  </div>  
</div>




@endsection