@extends('templates.comp.default')

@push('css')

@endpush

@section('content')

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    FORM LOWONGAN KERJA
                </h2>
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Form Loker</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" action="loker/create">
                                @csrf 
                                <!-- untuk mencegah serangan hacker -->
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="bidang" required>
                                        <label class="form-label">Bidang</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="loc_penempatan" required>
                                        <label class="form-label">Lokasi Penempatan</label>
                                    </div>
                                </div>
                               <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="persyaratan" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                        <label class="form-label">Persyaratan</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Klasifikasi</h5>
                                    <input type="radio" name="jenis_kel" id="laki" class="with-gap">
                                    <label for="laki">Laki-Laki</label>

                                    <input type="radio" name="jenis_kel" id="wanita" class="with-gap">
                                    <label for="wanita" class="m-l-20">Wanita</label>

                                    <input type="radio" name="jenis_kel" id="umum" class="with-gap">
                                    <label for="umum" class="m-l-20">Umum</label>
                                </div>
                               <div class="body">
                            <div class="row clearfix">
                                <div class="col-xs-6">
                                    <h2 class="card-inside-title">Tanggal Masuk</h2>
                                    <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                        <div class="form-line">
                                            <input type="Date" class="form-control" name="tgl_daftar" placeholder="Date start...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <h2 class="card-inside-title">Tanggal Penutup</h2>
                                    <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                        <div class="form-line">
                                            <input type="Date" class="form-control" name="tgl_penutup" placeholder="Date start...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="keterangan" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                        <label class="form-label">Keterangan</label>
                                    </div>
                                </div> -->
                                <div class="form-group form-float">
                                </div>
                                <div>
                                    <button class="btn btn-success waves-effect" type="submit"> SUBMIT</button>
                                    <button class="btn btn-danger waves-effect" type="reset">CLEAR</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->

@endsection