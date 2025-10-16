@extends('layouts.v_template')

@section('content')
    @include('layouts.v_deskripsi')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Data Surat Masuk</h3>

            <div class="panel-options">
                <a href="#" data-toggle="panel">
                    <span class="collapse-icon">&ndash;</span>
                    <span class="expand-icon">+</span>
                </a>
                <a href="#" data-toggle="remove">&times;</a>
            </div>
        </div>

        <div class="panel-body">
            <!-- DataTable Script -->
            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    $("#example-4").dataTable({
                        dom: "<'row'<'col-sm-5'l><'col-sm-7'Tf>r>" +
                            "t" +
                            "<'row'<'col-xs-6'i><'col-xs-6'p>>",
                        tableTools: {
                            sSwfPath: "{{ asset('public/template/assets/js/datatables/tabletools/copy_csv_xls_pdf.swf') }}"
                        }
                    });
                });
            </script>

            <div class="text-center mb-3">
                <!-- Filter Form -->
                <form action="/search-date-range-surat-masuk" method="GET" class="form-inline mb-3">
                    <div class="form-group mr-3 mb-2">
                        <label for="start_date" class="mr-2"><strong>Dari Tanggal:</strong></label>
                        <input type="date" class="form-control form-control-sm" id="start_date" name="start_date"
                            value="{{ $startDate ?? '' }}" required>
                    </div>
                    <div class="form-group mr-3 mb-2">
                        <label for="end_date" class="mr-2"><strong>Sampai Tanggal:</strong></label>
                        <input type="date" class="form-control form-control-sm" id="end_date" name="end_date"
                            value="{{ $endDate ?? '' }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mr-2 mb-2">
                        <i class="fa fa-search"></i> Tampilkan Data
                    </button>
                    <a href="/suratmasuk_berjalan" class="btn btn-warning btn-sm mr-2 mb-2">
                        <i class="fa fa-refresh"></i> Reset Filter
                    </a>
                </form>
            </div>
            <br>
            <!-- Action Buttons -->
            <div class="text-start mb-3">


                @if (Auth::user()->level === 1)
                    <a href="/suratmasuk/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
                    <a href="/suratmasuk_total" class="btn btn-sm btn-success mb-2">All Data</a>
                    <a href="/suratmasuk" class="btn btn-sm btn-danger mb-2">Kembali</a>
                @elseif(Auth::user()->level === 2)
                    <a href="/suratmasuk/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
                    <a href="/suratmasuk_total" class="btn btn-sm btn-success mb-2">All Data</a>
                    <a href="/suratmasuk" class="btn btn-sm btn-danger mb-2">Kembali</a>
                @endif
            </div>

            <!-- Success Message -->
            @if (session('pesan'))
                <div class="alert alert-success alert-dismissible mt-2">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session('pesan') }}
                </div>
            @endif

            <!-- Data Table -->
            <table class="table table-sm table-hover" id="example-4">
                <thead>
                    <tr class="replace-inputs bg-gray">
                        <th style="width: 30px;">No</th>
                        <th style="width: 50px;">Index</th>
                        <th style="width: 50px;">Asal</th>
                        <th style="width: 150px;">Nomor</th>
                        <th style="width: 50px;">Tanggal</th>
                        <th style="width: 200px;">Perihal</th>
                        <th style="width: 20px;">Lampiran</th>
                        <th class="text-center" style="width: 100px;">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="bg-gray">
                        <th>No</th>
                        <th>Index</th>
                        <th>Asal</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Perihal</th>
                        <th>Lampiran</th>
                        <th class="text-center">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($suratmasuk as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-start">{{ $data->no_indeks }}</td>
                            <td class="text-start">{{ $data->asal_surat }}</td>
                            <td class="text-start">{{ $data->no_surat }}</td>
                            <td class="text-start">{{ date('d-m-Y', strtotime($data->tgl_surat)) }}</td>
                            <td class="text-start">{{ $data->perihal }}</td>
                            <td class="text-start">
                                @if (empty($data->lampiran))
                                    <span class="badge badge-danger">Belum upload</span>
                                @else
                                    <a href="{{ asset('surat_masuk/' . $data->lampiran) }}" class="text-danger"
                                        target="_blank" title="Lihat Lampiran">
                                        <i class="fa fa-file-pdf-o fa-lg"></i>
                                    </a>
                                @endif
                            </td>
                            <td class="text-center">
                                @if (Auth::user()->level === 1)
                                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                        data-target="#detail{{ $data->id }}" title="Detail">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a href="/suratmasuk/edit/{{ $data->id }}" class="btn btn-warning btn-xs"
                                        title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                        data-target="#delete{{ $data->id }}" title="Hapus">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                @elseif(Auth::user()->level === 2)
                                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                        data-target="#detail{{ $data->id }}" title="Detail">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a href="/suratmasuk/edit/{{ $data->id }}" class="btn btn-warning btn-xs"
                                        title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                @elseif(Auth::user()->level === 3)
                                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                        data-target="#detail{{ $data->id }}" title="Detail">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modals -->
    @foreach ($suratmasuk as $data)
        <!-- Modal Detail -->
        <div class="modal fade" id="detail{{ $data->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title">Detail Surat Masuk</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered table-hover">
                            <tr class="text-start">
                                <td style="width: 200px;"><strong>Tanggal Masuk Kepaniteraan</strong></td>
                                <td>{{ date('d-m-Y', strtotime($data->tgl_masuk_pan)) }}</td>
                            </tr>
                            <tr class="text-start">
                                <td><strong>Tanggal Masuk Kesekretariatan</strong></td>
                                <td>{{ date('d-m-Y', strtotime($data->tgl_masuk_umum)) }}</td>
                            </tr>
                            <tr class="text-start">
                                <td><strong>Nomor Indeks</strong></td>
                                <td>{{ $data->no_indeks }}</td>
                            </tr>
                            <tr class="text-start">
                                <td><strong>Asal Surat</strong></td>
                                <td>{{ $data->asal_surat }}</td>
                            </tr>
                            <tr class="text-start">
                                <td><strong>Nomor Surat</strong></td>
                                <td>{{ $data->no_surat }}</td>
                            </tr>
                            <tr class="text-start">
                                <td><strong>Tanggal Surat</strong></td>
                                <td>{{ date('d-m-Y', strtotime($data->tgl_surat)) }}</td>
                            </tr>
                            <tr class="text-start">
                                <td><strong>Perihal</strong></td>
                                <td>{{ $data->perihal }}</td>
                            </tr>
                            <tr class="text-start">
                                <td><strong>Lampiran</strong></td>
                                <td class="text-center">
                                    @if (!empty($data->lampiran))
                                        <a href="{{ asset('surat_masuk/' . $data->lampiran) }}" class="text-danger"
                                            target="_blank" title="Lihat Lampiran">
                                            <i class="fa fa-file-pdf-o fa-lg"></i> Lihat Dokumen
                                        </a>
                                    @else
                                        <span class="text-muted">Tidak ada lampiran</span>
                                    @endif
                                </td>
                            </tr>
                            <tr class="text-start">
                                <td><strong>Disposisi</strong></td>
                                <td>{{ $data->disposisi ?? '-' }}</td>
                            </tr>
                            <tr class="text-start">
                                <td><strong>Keterangan</strong></td>
                                <td>{{ $data->keterangan ?? '-' }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Hapus -->
        <div class="modal fade" id="delete{{ $data->id }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h6 class="modal-title">Konfirmasi Hapus</h6>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data ini?</p>
                        <p class="font-weight-bold">No: {{ $data->no_surat }}</p>
                        <p class="font-weight-bold">Perihal: {{ Str::limit($data->perihal, 50) }}</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <form action="/suratmasuk/delete/{{ $data->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-xs btn-danger">Ya, Hapus</button>
                        </form>
                        <button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
