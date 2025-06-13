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
                    <td>{{$badg_eksekusi_selesai}}</td>
                    <td>{{$badg_eksekusi_sisa}}</td>
                    <td>{{$badg_eksekusi_progres}}</td>
                    <td>{{$badg_eksekusi_bobot_nilai}}</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Indramayu</td>
                    <td>{{$im_eksekusi}}</td>
                    <td>{{$im_eksekusi_riil}}</td>
                    <td>{{$im_eksekusi_lelang}}</td>
                    <td>{{$im_eksekusi_dicabut}}</td>
                    <td>{{$im_eksekusi_dicoret}}</td>
                    <td>{{$im_eksekusi_ne}}</td>
                    <td>{{$im_eksekusi_selesai}}</td>
                    <td>{{$im_eksekusi_sisa}}</td>
                    <td>{{$im_eksekusi_progres}}</td>
                    <td>{{$im_eksekusi_bobot_nilai}}</td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>Majalengka</td>
                    <td>{{$mjl_eksekusi}}</td>
                    <td>{{$mjl_eksekusi_riil}}</td>
                    <td>{{$mjl_eksekusi_lelang}}</td>
                    <td>{{$mjl_eksekusi_dicabut}}</td>
                    <td>{{$mjl_eksekusi_dicoret}}</td>
                    <td>{{$mjl_eksekusi_ne}}</td>
                    <td>{{$mjl_eksekusi_selesai}}</td>
                    <td>{{$mjl_eksekusi_sisa}}</td>
                    <td>{{$mjl_eksekusi_progres}}</td>
                    <td>{{$mjl_eksekusi_bobot_nilai}}</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Sumber</td>
                    <td>{{$sbr_eksekusi}}</td>
                    <td>{{$sbr_eksekusi_riil}}</td>
                    <td>{{$sbr_eksekusi_lelang}}</td>
                    <td>{{$sbr_eksekusi_dicabut}}</td>
                    <td>{{$sbr_eksekusi_dicoret}}</td>
                    <td>{{$sbr_eksekusi_ne}}</td>
                    <td>{{$sbr_eksekusi_selesai}}</td>
                    <td>{{$sbr_eksekusi_sisa}}</td>
                    <td>{{$sbr_eksekusi_progres}}</td>
                    <td>{{$sbr_eksekusi_bobot_nilai}}</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Ciamis</td>
                    <td>{{$cms_eksekusi}}</td>
                    <td>{{$cms_eksekusi_riil}}</td>
                    <td>{{$cms_eksekusi_lelang}}</td>
                    <td>{{$cms_eksekusi_dicabut}}</td>
                    <td>{{$cms_eksekusi_dicoret}}</td>
                    <td>{{$cms_eksekusi_ne}}</td>
                    <td>{{$cms_eksekusi_selesai}}</td>
                    <td>{{$cms_eksekusi_sisa}}</td>
                    <td>{{$cms_eksekusi_progres}}</td>
                    <td>{{$cms_eksekusi_bobot_nilai}}</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Tasikmalaya</td>
                    <td>{{$tsm_eksekusi}}</td>
                    <td>{{$tsm_eksekusi_riil}}</td>
                    <td>{{$tsm_eksekusi_lelang}}</td>
                    <td>{{$tsm_eksekusi_dicabut}}</td>
                    <td>{{$tsm_eksekusi_dicoret}}</td>
                    <td>{{$tsm_eksekusi_ne}}</td>
                    <td>{{$tsm_eksekusi_selesai}}</td>
                    <td>{{$tsm_eksekusi_sisa}}</td>
                    <td>{{$tsm_eksekusi_progres}}</td>
                    <td>{{$tsm_eksekusi_bobot_nilai}}</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Karawang</td>
                    <td>{{$krw_eksekusi}}</td>
                    <td>{{$krw_eksekusi_riil}}</td>
                    <td>{{$krw_eksekusi_lelang}}</td>
                    <td>{{$krw_eksekusi_dicabut}}</td>
                    <td>{{$krw_eksekusi_dicoret}}</td>
                    <td>{{$krw_eksekusi_ne}}</td>
                    <td>{{$krw_eksekusi_selesai}}</td>
                    <td>{{$krw_eksekusi_sisa}}</td>
                    <td>{{$krw_eksekusi_progres}}</td>
                    <td>{{$krw_eksekusi_bobot_nilai}}</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Cimahi</td>
                    <td>{{$cmi_eksekusi}}</td>
                    <td>{{$cmi_eksekusi_riil}}</td>
                    <td>{{$cmi_eksekusi_lelang}}</td>
                    <td>{{$cmi_eksekusi_dicabut}}</td>
                    <td>{{$cmi_eksekusi_dicoret}}</td>
                    <td>{{$cmi_eksekusi_ne}}</td>
                    <td>{{$cmi_eksekusi_selesai}}</td>
                    <td>{{$cmi_eksekusi_sisa}}</td>
                    <td>{{$cmi_eksekusi_progres}}</td>
                    <td>{{$cmi_eksekusi_bobot_nilai}}</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Subang
                    <td>{{$sbg_eksekusi}}</td>
                    <td>{{$sbg_eksekusi_riil}}</td>
                    <td>{{$sbg_eksekusi_lelang}}</td>
                    <td>{{$sbg_eksekusi_dicabut}}</td>
                    <td>{{$sbg_eksekusi_dicoret}}</td>
                    <td>{{$sbg_eksekusi_ne}}</td>
                    <td>{{$sbg_eksekusi_selesai}}</td>
                    <td>{{$sbg_eksekusi_sisa}}</td>
                    <td>{{$sbg_eksekusi_progres}}</td>
                    <td>{{$sbg_eksekusi_bobot_nilai}}</td>
                </tr>
                    <tr>
                    <td>10</td>
                    <td>Sumedang
                    <td>{{$smdg_eksekusi}}</td>
                    <td>{{$smdg_eksekusi_riil}}</td>
                    <td>{{$smdg_eksekusi_lelang}}</td>
                    <td>{{$smdg_eksekusi_dicabut}}</td>
                    <td>{{$smdg_eksekusi_dicoret}}</td>
                    <td>{{$smdg_eksekusi_ne}}</td>
                    <td>{{$smdg_eksekusi_selesai}}</td>
                    <td>{{$smdg_eksekusi_sisa}}</td>
                    <td>{{$smdg_eksekusi_progres}}</td>
                    <td>{{$smdg_eksekusi_bobot_nilai}}</td>
                </tr> 
                <tr>
                    <td>11</td>
                    <td>Purwakarta
                    <td>{{$pwk_eksekusi}}</td>
                    <td>{{$pwk_eksekusi_riil}}</td>
                    <td>{{$pwk_eksekusi_lelang}}</td>
                    <td>{{$pwk_eksekusi_dicabut}}</td>
                    <td>{{$pwk_eksekusi_dicoret}}</td>
                    <td>{{$pwk_eksekusi_ne}}</td>
                    <td>{{$pwk_eksekusi_selesai}}</td>
                    <td>{{$pwk_eksekusi_sisa}}</td>
                    <td>{{$pwk_eksekusi_progres}}</td>
                    <td>{{$pwk_eksekusi_bobot_nilai}}</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>Sukabumi
                    <td>{{$smi_eksekusi}}</td>
                    <td>{{$smi_eksekusi_riil}}</td>
                    <td>{{$smi_eksekusi_lelang}}</td>
                    <td>{{$smi_eksekusi_dicabut}}</td>
                    <td>{{$smi_eksekusi_dicoret}}</td>
                    <td>{{$smi_eksekusi_ne}}</td>
                    <td>{{$smi_eksekusi_selesai}}</td>
                    <td>{{$smi_eksekusi_sisa}}</td>
                    <td>{{$smi_eksekusi_progres}}</td>
                    <td>{{$smi_eksekusi_bobot_nilai}}</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>Cianjur
                    <td>{{$cjr_eksekusi}}</td>
                    <td>{{$cjr_eksekusi_riil}}</td>
                    <td>{{$cjr_eksekusi_lelang}}</td>
                    <td>{{$cjr_eksekusi_dicabut}}</td>
                    <td>{{$cjr_eksekusi_dicoret}}</td>
                    <td>{{$cjr_eksekusi_ne}}</td>
                    <td>{{$cjr_eksekusi_selesai}}</td>
                    <td>{{$cjr_eksekusi_sisa}}</td>
                    <td>{{$cjr_eksekusi_progres}}</td>
                    <td>{{$cjr_eksekusi_bobot_nilai}}</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>Kuningan
                    <td>{{$kng_eksekusi}}</td>
                    <td>{{$kng_eksekusi_riil}}</td>
                    <td>{{$kng_eksekusi_lelang}}</td>
                    <td>{{$kng_eksekusi_dicabut}}</td>
                    <td>{{$kng_eksekusi_dicoret}}</td>
                    <td>{{$kng_eksekusi_ne}}</td>
                    <td>{{$kng_eksekusi_selesai}}</td>
                    <td>{{$kng_eksekusi_sisa}}</td>
                    <td>{{$kng_eksekusi_progres}}</td>
                    <td>{{$kng_eksekusi_bobot_nilai}}</td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>Cibadak
                    <td>{{$cbd_eksekusi}}</td>
                    <td>{{$cbd_eksekusi_riil}}</td>
                    <td>{{$cbd_eksekusi_lelang}}</td>
                    <td>{{$cbd_eksekusi_dicabut}}</td>
                    <td>{{$cbd_eksekusi_dicoret}}</td>
                    <td>{{$cbd_eksekusi_ne}}</td>
                    <td>{{$cbd_eksekusi_selesai}}</td>
                    <td>{{$cbd_eksekusi_sisa}}</td>
                    <td>{{$cbd_eksekusi_progres}}</td>
                    <td>{{$cbd_eksekusi_bobot_nilai}}</td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>Cirebon
                    <td>{{$cn_eksekusi}}</td>
                    <td>{{$cn_eksekusi_riil}}</td>
                    <td>{{$cn_eksekusi_lelang}}</td>
                    <td>{{$cn_eksekusi_dicabut}}</td>
                    <td>{{$cn_eksekusi_dicoret}}</td>
                    <td>{{$cn_eksekusi_ne}}</td>
                    <td>{{$cn_eksekusi_selesai}}</td>
                    <td>{{$cn_eksekusi_sisa}}</td>
                    <td>{{$cn_eksekusi_progres}}</td>
                    <td>{{$cn_eksekusi_bobot_nilai}}</td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>Garut
                    <td>{{$grt_eksekusi}}</td>
                    <td>{{$grt_eksekusi_riil}}</td>
                    <td>{{$grt_eksekusi_lelang}}</td>
                    <td>{{$grt_eksekusi_dicabut}}</td>
                    <td>{{$grt_eksekusi_dicoret}}</td>
                    <td>{{$grt_eksekusi_ne}}</td>
                    <td>{{$grt_eksekusi_selesai}}</td>
                    <td>{{$grt_eksekusi_sisa}}</td>
                    <td>{{$grt_eksekusi_progres}}</td>
                    <td>{{$grt_eksekusi_bobot_nilai}}</td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>Bogor
                    <td>{{$bgr_eksekusi}}</td>
                    <td>{{$bgr_eksekusi_riil}}</td>
                    <td>{{$bgr_eksekusi_lelang}}</td>
                    <td>{{$bgr_eksekusi_dicabut}}</td>
                    <td>{{$bgr_eksekusi_dicoret}}</td>
                    <td>{{$bgr_eksekusi_ne}}</td>
                    <td>{{$bgr_eksekusi_selesai}}</td>
                    <td>{{$bgr_eksekusi_sisa}}</td>
                    <td>{{$bgr_eksekusi_progres}}</td>
                    <td>{{$bgr_eksekusi_bobot_nilai}}</td>
                </tr>
                    <tr>
                    <td>19</td>
                    <td>Bekasi
                    <td>{{$bks_eksekusi}}</td>
                    <td>{{$bks_eksekusi_riil}}</td>
                    <td>{{$bks_eksekusi_lelang}}</td>
                    <td>{{$bks_eksekusi_dicabut}}</td>
                    <td>{{$bks_eksekusi_dicoret}}</td>
                    <td>{{$bks_eksekusi_ne}}</td>
                    <td>{{$bks_eksekusi_selesai}}</td>
                    <td>{{$bks_eksekusi_sisa}}</td>
                    <td>{{$bks_eksekusi_progres}}</td>
                    <td>{{$bks_eksekusi_bobot_nilai}}</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>Cibinong
                    <td>{{$cbn_eksekusi}}</td>
                    <td>{{$cbn_eksekusi_riil}}</td>
                    <td>{{$cbn_eksekusi_lelang}}</td>
                    <td>{{$cbn_eksekusi_dicabut}}</td>
                    <td>{{$cbn_eksekusi_dicoret}}</td>
                    <td>{{$cbn_eksekusi_ne}}</td>
                    <td>{{$cbn_eksekusi_selesai}}</td>
                    <td>{{$cbn_eksekusi_sisa}}</td>
                    <td>{{$cbn_eksekusi_progres}}</td>
                    <td>{{$cbn_eksekusi_bobot_nilai}}</td>
                </tr>
                <tr>
                    <td>21</td>
                    <td>Cikarang
                    <td>{{$ckr_eksekusi}}</td>
                    <td>{{$ckr_eksekusi_riil}}</td>
                    <td>{{$ckr_eksekusi_lelang}}</td>
                    <td>{{$ckr_eksekusi_dicabut}}</td>
                    <td>{{$ckr_eksekusi_dicoret}}</td>
                    <td>{{$ckr_eksekusi_ne}}</td>
                    <td>{{$ckr_eksekusi_selesai}}</td>
                    <td>{{$ckr_eksekusi_sisa}}</td>
                    <td>{{$ckr_eksekusi_progres}}</td>
                    <td>{{$ckr_eksekusi_bobot_nilai}}</td>
                </tr>
                <tr>
                    <td>22</td>
                    <td>Depok
                    <td>{{$dpk_eksekusi}}</td>
                    <td>{{$dpk_eksekusi_riil}}</td>
                    <td>{{$dpk_eksekusi_lelang}}</td>
                    <td>{{$dpk_eksekusi_dicabut}}</td>
                    <td>{{$dpk_eksekusi_dicoret}}</td>
                    <td>{{$dpk_eksekusi_ne}}</td>
                    <td>{{$dpk_eksekusi_selesai}}</td>
                    <td>{{$dpk_eksekusi_sisa}}</td>
                    <td>{{$dpk_eksekusi_progres}}</td>
                    <td>{{$dpk_eksekusi_bobot_nilai}}</td>
                </tr>
                <tr>
                    <td>23</td>
                    <td>Kota Tasikmalaya
                    <td>{{$tmk_eksekusi}}</td>
                    <td>{{$tmk_eksekusi_riil}}</td>
                    <td>{{$tmk_eksekusi_lelang}}</td>
                    <td>{{$tmk_eksekusi_dicabut}}</td>
                    <td>{{$tmk_eksekusi_dicoret}}</td>
                    <td>{{$tmk_eksekusi_ne}}</td>
                    <td>{{$tmk_eksekusi_selesai}}</td>
                    <td>{{$tmk_eksekusi_sisa}}</td>
                    <td>{{$tmk_eksekusi_progres}}</td>
                    <td>{{$tmk_eksekusi_bobot_nilai}}</td>
                </tr>
                <tr>
                    <td>24</td>
                    <td>Kota Banjar
                    <td>{{$bjr_eksekusi}}</td>
                    <td>{{$bjr_eksekusi_riil}}</td>
                    <td>{{$bjr_eksekusi_lelang}}</td>
                    <td>{{$bjr_eksekusi_dicabut}}</td>
                    <td>{{$bjr_eksekusi_dicoret}}</td>
                    <td>{{$bjr_eksekusi_ne}}</td>
                    <td>{{$bjr_eksekusi_selesai}}</td>
                    <td>{{$bjr_eksekusi_sisa}}</td>
                    <td>{{$bjr_eksekusi_progres}}</td>
                    <td>{{$bjr_eksekusi_bobot_nilai}}</td>
                </tr>
                <tr>
                    <td>25</td>
                    <td>Soreang
                    <td>{{$sor_eksekusi}}</td>
                    <td>{{$sor_eksekusi_riil}}</td>
                    <td>{{$sor_eksekusi_lelang}}</td>
                    <td>{{$sor_eksekusi_dicabut}}</td>
                    <td>{{$sor_eksekusi_dicoret}}</td>
                    <td>{{$sor_eksekusi_ne}}</td>
                    <td>{{$sor_eksekusi_selesai}}</td>
                    <td>{{$sor_eksekusi_sisa}}</td>
                    <td>{{$sor_eksekusi_progres}}</td>
                    <td>{{$sor_eksekusi_bobot_nilai}}</td>
                </tr>
                <tr>
                    <td>26</td>
                    <td>Ngamprah
                    <td>{{$nph_eksekusi}}</td>
                    <td>{{$nph_eksekusi_riil}}</td>
                    <td>{{$nph_eksekusi_lelang}}</td>
                    <td>{{$nph_eksekusi_dicabut}}</td>
                    <td>{{$nph_eksekusi_dicoret}}</td>
                    <td>{{$nph_eksekusi_ne}}</td>
                    <td>{{$nph_eksekusi_selesai}}</td>
                    <td>{{$nph_eksekusi_sisa}}</td>
                    <td>{{$nph_eksekusi_progres}}</td>
                    <td>{{$nph_eksekusi_bobot_nilai}}</td>
                </tr>
            </tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection