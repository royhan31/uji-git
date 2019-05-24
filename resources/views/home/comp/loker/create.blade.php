@extends('templates.comp.default')

@section('content')
<!-- <div class="flot-right">
  <div class="col-md-4 float-right">
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Library</a></li>
        <li><a href="javascript:void(0);"><i class="material-icons">archive</i> Data</a></li>
        <li class="active"><i class="material-icons">attachment</i> File</li>
    </ol>
  </div>
</div> -->


<div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                      <div class="header">
                          <h2>
                              Tambah lowongan kerja
                          </h2>
                      </div>
                      <div class="body">
                          <form action="{{route('loker.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label>Bidang Kerja</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" name="bidang" class="form-control" placeholder="Masukan bidang kerja">
                                  </div>
                              </div>
                            <label>Penempatan Kerja</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" name="penempatan" class="form-control" placeholder="Masukan penempatan kerja">
                                  </div>
                              </div>
                            <label>Persyaratan</label>
                              <div class="form-group">
                                  <div class="form-line">
                                    <textarea id="ckeditor" name="persyaratan" rows="8" cols="80"></textarea>
                                  </div>
                              </div>
                            <label>Jenis Kelamin</label>
                            <br>
                            <input name="man" value="Laki-laki" type="checkbox" id="laki-laki" class="filled-in m-b-10">
                                <label for="laki-laki">Laki-laki</label>
                                <br>
                            <input name="woman" value="Perempuan" type="checkbox" id="perempuan" class="filled-in m-b-15">
                            <label for="perempuan">Remember Me</label>
                            <br>
                            <br>
                            <!-- <div class="form-group">
                              <div class="form-line">
                                  <input type="text" class="datepicker form-control" placeholder="Masukan Tanggal Daftar">
                              </div>
                            </div> -->
                            <div class="row clearfix">
                              <div class="col-sm-4">
                            <label>Tanggal Daftar</label>
                              <div class="form-group col-4">
                                <div class="form-line" id="bs_datepicker_container">
                                      <input type="text" name="tgl_daftar" class="form-control" placeholder="Masukan tanggal daftar">
                                  </div>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <label>Tanggal penutup</label>
                              <div class="form-group">
                                <div class="form-line" id="bs_datepicker_container">
                                      <input type="text" name="tgl_penutup" class="form-control" placeholder="Masukan tanggal penutup">
                                  </div>
                              </div>
                            </div>
                          </div>
                            <label>Gambar</label>
                              <div class="form-group">
                                  <div class="form-line">
                                    <input type="file" name="image" class="form-control">
                                  </div>
                              </div>
                              <button type="submit" class="btn btn-primary m-t-15 waves-effect">Simpan</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>

@endsection
