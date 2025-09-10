@extends('layouts.v_template')

@section('content')
    @include('layouts.v_deskripsi')
    
    <!-- DASHBOARD JDIH -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-info" data-count=".num" data-from="0" data-to="{{ $arsip_perkara_total }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-file-text-o"></i>
                        <h4>Total Arsip Perkara</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/arsip_perkara_total" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-success" data-count=".num" data-from="0" data-to="{{ $arsip_perkara_upload }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-file-text-o"></i>
                        <h4>Sudah Upload Bundel B</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/arsip_perkara_upload" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-danger" data-count=".num" data-from="0" data-to="{{ $arsip_perkara_blm_upload }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-file-text-o"></i>
                        <h4>Belum Upload Bundel B</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/arsip_perkara_blm_upload" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection