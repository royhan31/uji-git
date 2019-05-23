@extends('templates.comp.default')

@push('css')
<!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
@endpush

@section('content')

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    PELAMAR KERJA
                </h2>
            </div>
<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tabel Lowongan Kerja
                            </h2>
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
                            <div class="uper">
                                @if(session()->get('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}  
                            </div><br />
                                @endif
                            <div class="table-responsive">
                                <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                    <div class="dt-buttons">
                                        <a class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_1" href="#"><span>PDF</span></a>
                                        <a class="btn btn-success waves-effect glyphicon glyphicon-plus" tabindex="0" aria-controls="DataTables_Table_1" href="loker/create"><span>Tambah Data</span></a>
                            </div>
                            <div id="DataTables_Table_1_filter" class="dataTables_filter">
                                <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="DataTables_Table_1">
                                </label>
                            </div>
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 73px;">No</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;" >Bidang</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 235px;">Lokasi penempatan</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 235px;">Persyaratan</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 103px;">Klasifikasi</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 46px;">Tanggal daftar</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 235px;">Tanggal tutup</th>
                    <th class="text" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 235px;">Aksi</th>
                </tr>
            </thead>
            <tfoot>
            </tfoot>

                    <tbody>
                        @php
                            $no= 1;
                        @endphp
                        <!-- pengecekan data ada / tidak -->
                        @if(sizeof($datalokers)>0)

                    @foreach($datalokers as $dataloker)
                        <tr>
                        <td> {{ $no++ }}</td>
                        <td> {{ $dataloker->bidang }}</td>
                        <td> {{ $dataloker->loc_penempatan }}</td>
                        <td> {{ $dataloker->persyaratan }}</td>
                        <td> {{ $dataloker->jenis_kel }}</td>
                        <td> {{ $dataloker->tgl_daftar }}</td>
                        <td> {{ $dataloker->tgl_penutup }}</td>
                            <td width="150px"> 
                                <form class="text-center" action="#" method="#">
                                    <a href="#" class="glyphicon glyphicon-edit btn btn-primary"></a>
                                        <button type="submit" class="glyphicon glyphicon-trash btn btn-danger"></button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    @else
                    <tr>
                        <td class="text-center" colspan="6"><i>Tida ada Data</i></td>
                    </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 </div>
</div>     
@endsection
