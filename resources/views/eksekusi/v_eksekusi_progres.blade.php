@extends('layouts.v_template')

@section('content')
@include('layouts.v_deskripsi')
<!-- Table exporting -->

<!-- Table exporting -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Table exporting</h3>

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

        <table class="table table-bordered table-striped" id="example-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pengadilan Agama</th>
                    <th>Permohonan Eksekusi</th>
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
                <tr>
                    <td>1</td>
                    <td>Bandung</td>
                    <td>{{$badg_eksekusi}}</td>
                    <td>{{$badg_eksekusi_riil}}</td>
                    <td>{{$badg_eksekusi_lelang}}</td>
                    <td>{{$badg_eksekusi_dicabut}}</td>
                    <td>{{$badg_eksekusi_dicoret}}</td>
                    <td>{{$badg_eksekusi_ne}}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Sumedang</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td>$170,750</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Cimahi</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                    <td>2009/01/12</td>
                    <td>$86,000</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Ciamis</td>
                    <td>Senior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2012/03/29</td>
                    <td>$433,060</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Tasikmalaya</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>33</td>
                    <td>2008/11/28</td>
                    <td>$162,700</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection