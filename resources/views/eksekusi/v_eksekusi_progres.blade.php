@extends('layouts.v_template')

@section('content')
@include('layouts.v_deskripsi')
<!-- Table exporting -->

<!-- Table exporting -->
<div class="panel panel-default">
    <div class="panel-heading text-center">
        <h3 class="panel-title ">Progres Penyelesaian Perkara EKsekusi Pengadilan Agama Di Wilayah Pengadilan Tinggi Agama Bandung</h3>

        <div class="panel-options">
            <a href="#" data-toggle="panel">
                <span class="collapse-icon">&ndash;</span>
                <span class="expand-icon">+</span>
            </a>
            <a href="#" data-toggle="remove">
                &times;
            </a>
        </div>
    </div>
    <div class="panel-body">

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#example-4").dataTable({
                    dom: "<'row'<'col-sm-5'l><'col-sm-7'Tf>r>" +
                        "t" +
                        "<'row'<'col-xs-6'i><'col-xs-6'p>>",
                    tableTools: {
                        sSwfPath: "{{ asset('public/template')}}/assets/js/datatables/tabletools/copy_csv_xls_pdf.swf"
                    }
                });
            });
        </script>
        <td class="text-center" style="font-size: 5px;">
            @if(Auth::user()->level===1)
            
            <a href="/eks" class="btn btn-sm btn-danger mb-2">Kembali</a>
            @elseif(Auth::user()->level===2)
            
            <a href="/eks" class="btn btn-sm btn-danger mb-2">Kembali</a>
            @elseif(Auth::user()->level===3)

            @endif
        </td>
        
        <table class="table table-sm table-hover" id="example-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pengadilan Agama</th>
                    <th>Permohonan Eksekusi</th>
                    <th>Eksekusi Putusan</th>
                    <th>Eksekusi Hak Tanggungan</th>
                    <th>Eksekusi Rill</th>
                    <th>Eksekusi Lelang</th>
                    <th>Eksekusi dicabut</th>
                    <th>Eksekusi dicoret</th>
                    <th>Eksekusi Ne</th>
                    <th>Total Selesai</th>
                    <th>Sisa</th>
                    <th>Presentase</th>
                    <th>Bobot Nilai</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Pengadilan Agama</th>
                    <th>Permohonan Eksekusi</th>
                    <th>Eksekusi Putusan</th>
                    <th>Eksekusi Hak Tanggungan</th>
                    <th>Eksekusi Rill</th>
                    <th>Eksekusi Lelang</th>
                    <th>Eksekusi dicabut</th>
                    <th>Eksekusi dicoret</th>
                    <th>Eksekusi Ne</th>
                    <th>Total Selesai</th>
                    <th>Sisa</th>
                    <th>Presentase</th>
                    <th>Bobot Nilai</th>
                </tr>
            </tfoot>

            <tbody>
    
@foreach($results as $satker => $data)
    <tr>
        <td class="text-start">{{$loop->iteration}}</td>
        <td>{{ ucfirst($satker) }}</td>
        <td>{{ $data['total'] }}</td>
        <td>{{ $data['putusan'] }}</td>
        <td>{{ $data['ht'] }}</td>
        <td>{{ $data['riil'] }}</td>
        <td>{{ $data['lelang'] }}</td>
        <td>{{ $data['dicabut'] }}</td>
        <td>{{ $data['dicoret'] }}</td>
        <td>{{ $data['ne'] }}</td>
        <td>{{ $data['selesai'] }}</td>
        <td>{{ $data['sisa'] }}</td>
        <td>{{ $data['presentase'] }}</td>
        <td>{{ $data['bobot_nilai'] }}</td>
        <!-- dan seterusnya -->
    </tr>
@endforeach
            </tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection