@extends('layouts.v_template')

@section('content')



<!-- PRESENTASE END -->
<!-- Xenon Verical Counter -->
<div class="col-sm-3">
  <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary" data-count=".num" data-from="0" data-to="{{ $jdih_uu }}" data-decimal="," data-suffix="" data-duration="2.5">
    <div class="xe-icon">
      <i class="fa fa-users"></i>
      <h4>Undang-Undang</h4>
    </div>
    <div class="xe-icon">
      <a href="/himper/undang_undang" class="text-white">
        <h1 class="num">0</h1>
      </a>
    </div>
  </div>
</div>
<div class="col-sm-3">
  <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary" data-count=".num" data-from="0" data-to="{{ $jdih_perpu }}" data-decimal="," data-suffix="" data-duration="2.5">
    <div class="xe-icon">
      <i class="fa fa-users"></i>
      <h4>PERPU</h4>
    </div>
    <div class="xe-icon">
      <a href="/himper/perpu" class="text-white">
        <h1 class="num">0</h1>
      </a>
    </div>
  </div>
</div>
<div class="col-sm-3">
  <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary" data-count=".num" data-from="0" data-to="{{ $jdih_pp }}" data-decimal="," data-suffix="" data-duration="2.5">
    <div class="xe-icon">
      <i class="fa fa-users"></i>
      <h4>Peraturan Pemerintah</h4>
    </div>
    <div class="xe-icon">
      <a href="/himper/pp" class="text-white">
        <h1 class="num">0</h1>
      </a>
    </div>
  </div>
</div>
<div class="col-sm-3">
  <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary" data-count=".num" data-from="0" data-to="{{ $jdih_inpres }}" data-decimal="," data-suffix="" data-duration="2.5">
    <div class="xe-icon">
      <i class="fa fa-users"></i>
      <h4>Instruksi Presiden</h4>
    </div>
    <div class="xe-icon">
      <a href="/himper/inpres" class="text-white">
        <h1 class="num">0</h1>
      </a>
    </div>
  </div>
</div>
<div class="col-sm-3">
  <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary" data-count=".num" data-from="0" data-to="{{ $jdih_perma }}" data-decimal="," data-suffix="" data-duration="2.5">
    <div class="xe-icon">
      <i class="fa fa-users"></i>
      <h4>PERMA</h4>
    </div>
    <div class="xe-icon">
      <a href="/himper/perma" class="text-white">
        <h1 class="num">0</h1>
      </a>
    </div>
  </div>
</div>
<div class="col-sm-3">
  <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary" data-count=".num" data-from="0" data-to="{{ $jdih_sema }}" data-decimal="," data-suffix="" data-duration="2.5">
    <div class="xe-icon">
      <i class="fa fa-users"></i>
      <h4>SEMA</h4>
    </div>
    <div class="xe-icon">
      <a href="/himper/sema" class="text-white">
        <h1 class="num">0</h1>
      </a>
    </div>
  </div>
</div>
<div class="col-sm-3">
  <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary" data-count=".num" data-from="0" data-to="{{ $jdih_sk_kma }}" data-decimal="," data-suffix="" data-duration="2.5">
    <div class="xe-icon">
      <i class="fa fa-users"></i>
      <h4>SK KMA</h4>
    </div>
    <div class="xe-icon">
      <a href="/himper/sk_kma" class="text-white">
        <h1 class="num">0</h1>
      </a>
    </div>
  </div>
</div>
<div class="col-sm-3">
  <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary" data-count=".num" data-from="0" data-to="{{ $jdih_sk_sekma }}" data-decimal="," data-suffix="" data-duration="2.5">
    <div class="xe-icon">
      <i class="fa fa-users"></i>
      <h4>SK SEKMA</h4>
    </div>
    <div class="xe-icon">
      <a href="/himper/sk_sekma" class="text-white">
        <h1 class="num">0</h1>
      </a>
    </div>
  </div>
</div>
<div class="col-sm-3">
  <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary" data-count=".num" data-from="0" data-to="{{ $jdih_se_dirjen }}" data-decimal="," data-suffix="" data-duration="2.5">
    <div class="xe-icon">
      <i class="fa fa-users"></i>
      <h4>SE Dirjen Badilag</h4>
    </div>
    <div class="xe-icon">
      <a href="/himper/se_dirjen_badilag" class="text-white">
        <h1 class="num">0</h1>
      </a>
    </div>
  </div>
</div>
<div class="col-sm-3">
  <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary" data-count=".num" data-from="0" data-to="{{ $jdih_sk_dirjen }}" data-decimal="," data-suffix="" data-duration="2.5">
    <div class="xe-icon">
      <i class="fa fa-users"></i>
      <h4>SK Dirjen Badilag</h4>
    </div>
    <div class="xe-icon">
      <a href="/himper/sk_dirjen_badilag" class="text-white">
        <h1 class="num">0</h1>
      </a>
    </div>
  </div>
</div>
<div class="col-sm-3">
  <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary" data-count=".num" data-from="0" data-to="{{ $jdih_se_kpta }}" data-decimal="," data-suffix="" data-duration="2.5">
    <div class="xe-icon">
      <i class="fa fa-users"></i>
      <h4>SE KPTA Bandung</h4>
    </div>
    <div class="xe-icon">
      <a href="/himper/se_kpta" class="text-white">
        <h1 class="num">0</h1>
      </a>
    </div>
  </div>
</div>
<div class="col-sm-3">
  <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary" data-count=".num" data-from="0" data-to="{{ $jdih_sk_kpta }}" data-decimal="," data-suffix="" data-duration="2.5">
    <div class="xe-icon">
      <i class="fa fa-users"></i>
      <h4>SK KPTA Bandung</h4>
    </div>
    <div class="xe-icon">
      <a href="/himper/sk_kpta" class="text-white">
        <h1 class="num">0</h1>
      </a>
    </div>
  </div>
</div>
<div class="col-sm-3">
  <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary" data-count=".num" data-from="0" data-to="{{ $jdih_peraturan_lainnya }}" data-decimal="," data-suffix="" data-duration="2.5">
    <div class="xe-icon">
      <i class="fa fa-users"></i>
      <h4>Peraturan lainnya</h4>
    </div>
    <div class="xe-icon">
      <a href="/himper/peraturan_lainnya" class="text-white">
        <h1 class="num">0</h1>
      </a>
    </div>
  </div>
</div>
@endsection