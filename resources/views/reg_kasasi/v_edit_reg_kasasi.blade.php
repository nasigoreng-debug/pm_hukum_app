@extends('layouts.v_template')

@section('content')

@include('layouts.v_deskripsi')

<div class="panel panel-default container">

    <div class="panel-heading">
        <div class="panel-title">
            Ubah Data Regsiter Upaya Hukum
        </div>
    </div>

    <div class="panel-body">

        <form action="/reg_kasasi/update/{{$reg_kasasi->id_reg_kasasi}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary mt-3 ml-3 mb-3 mr-3">

                        <!-- /.card-header -->
                        <div class="form-group col-xs-4">
                            <label>Pengadilan Agama Pengaju</label>
                            <select name="pa_pengaju" class="form-control @error('pa_pengaju') is-invalid @enderror" autofocus>
                                <option>{{$reg_kasasi->pa_pengaju}}</option>
                                <option>Bandung</option>
                                <option>Bekasi</option>
                                <option>Bogor</option>
                                <option>Ciamis</option>
                                <option>Cianjur</option>
                                <option>Cibadak</option>
                                <option>Cibinong</option>
                                <option>Cikarang</option>
                                <option>Cimahi</option>
                                <option>Cirebon</option>
                                <option>Depok</option>
                                <option>Garut</option>
                                <option>Indramayu</option>
                                <option>Karawang</option>
                                <option>Kota Banjar</option>
                                <option>Kota Tasikmalaya</option>
                                <option>Kuningan</option>
                                <option>Majalengka</option>
                                <option>Ngamprah</option>
                                <option>Purwakarta</option>
                                <option>Soreang</option>
                                <option>Subang</option>
                                <option>Sukabumi</option>
                                <option>Sumber</option>
                                <option>Sumedang</option>
                                <option>Tasikmalaya</option>
                            </select>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('pa_pengaju')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-xs-4">
                            <label>Tanggal Masuk</label>
                            <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" value="{{$reg_kasasi->tgl_masuk}}" name="tgl_masuk">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_masuk')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-xs-4">
                            <label>Tanggal Register</label>
                            <input type="date" class="form-control @error('tgl_register') is-invalid @enderror" value="{{$reg_kasasi->tgl_register}}" name="tgl_register">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_register')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-xs-4">
                            <label>Nomor Kasasi</label>
                            <input type="text" class="form-control @error('no_kasasi') is-invalid @enderror" value="{{$reg_kasasi->no_kasasi}}" name="no_kasasi">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_kasasi')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-xs-4">
                            <label>Nomor Perkara Banding</label>
                            <input type="text" class="form-control @error('no_banding') is-invalid @enderror" value="{{$reg_kasasi->no_banding}}" name="no_banding">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_banding')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-xs-4">
                            <label>Tanggal Putus Banding</label>
                            <input type="date" class="form-control @error('tgl_put_banding') is-invalid @enderror" value="{{$reg_kasasi->tgl_put_banding}}" name="tgl_put_banding">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_put_banding')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-xs-4">
                            <label>Nomor Perkara PA</label>
                            <input type="text" class="form-control @error('no_pa') is-invalid @enderror" value="{{$reg_kasasi->no_pa}}" name="no_pa">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_pa')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-xs-4">
                            <label>Tanggal Putus PA</label>
                            <input type="date" class="form-control @error('tgl_put_pa') is-invalid @enderror" value="{{$reg_kasasi->tgl_put_pa}}" name="tgl_put_pa">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_put_pa')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-xs-4">
                            <label>Nama Pemohon Kasasi</label>
                            <input type="text" class="form-control @error('pemohon_kasasi') is-invalid @enderror" value="{{$reg_kasasi->pemohon_kasasi}}" name="pemohon_kasasi">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('pemohon_kasasi')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-xs-4">
                            <label>Nama Termohon Kasasi</label>
                            <input type="text" class="form-control @error('termohon_kasasi') is-invalid @enderror" value="{{$reg_kasasi->termohon_kasasi}}" name="termohon_kasasi">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('termohon_kasasi')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-xs-4">
                            <label>Tanggal Putus Kasasi</label> <label class="text-red">(Diisi jika sudah putus!!!)</label>
                            <input type="date" class="form-control @error('tgl_put_kasasi') is-invalid @enderror" value="{{$reg_kasasi->tgl_put_kasasi}}" name="tgl_put_kasasi">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_put_kasasi')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-xs-4">
                            <label>Nomor Box</label> <label class="text-red">(Diisi petugas arsip!!!)</label>
                            <select name="no_box" class="form-control @error('no_box') is-invalid @enderror">
                                <option>{{$reg_kasasi->no_box}}</option>
                                <option>Selesai</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                                <option>17</option>
                                <option>18</option>
                                <option>19</option>
                                <option>20</option>
                                <option>21</option>
                                <option>22</option>
                                <option>23</option>
                                <option>24</option>
                                <option>25</option>
                                <option>26</option>
                                <option>27</option>
                                <option>28</option>
                                <option>29</option>
                                <option>30</option>
                                <option>31</option>
                                <option>32</option>
                                <option>33</option>
                                <option>34</option>
                                <option>35</option>
                            </select>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_box')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-xs-4">
                            <label>Keterangan</label>
                            <select name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" autofocus>
                                <option>{{$reg_kasasi->keterangan}}</option>
                                <option>Kasasi</option>
                                <option>Peninjauan Kembali</option>
                            </select>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('keterangan')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-xs-4">
                            <button class="btn btn-success">Simpan</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <a href="/reg_kasasi" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

</div>
@endsection