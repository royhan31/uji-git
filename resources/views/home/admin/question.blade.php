@extends('templates.admin.default')

@section('content')
<div class="container-fluid">
  <div class="page-header">
    <div class="row">
      <div class="col">
        <div class="page-header-left">
          <h3>Pertanyaan</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('company.dashboard')}}"><i data-feather="home"></i></a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</div>
@if(Session::has('success'))
<div class="col-12">
  <div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="icon-check"></i>{{Session::get('success')}}</strong>
    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>
</div>
@endif

<div class="container-fluid">
 <div class="row">
   <!-- Zero Configuration  Starts-->
   <div class="col-sm-12">
     <div class="card">
       <div class="card-header">
         <div class="pull-right">
           <button type="button" class="btn btn-primary" data-target="#tambah" data-toggle="modal">Tambah</button>
         </div>
       </div>
       <div class="card-body">
         <div class="table-responsive">
           <table class="display" id="basic-1">
             <thead>
               <tr>
                 <th>No</th>
                 <th>Pertanyaan</th>
                 <th>Kategori</th>
                 <th>Poin</th>
                 <th>Aksi</th>
               </tr>
             </thead>
             <tbody>
               @php($no = 1)
               @foreach($questions as $question)
               <tr>
                 <td width="1%">{{$no}}</td>
                 <td width="50%">{{$question->name}}</td>
                 <td>{{$question->category}}</td>
                 <td width="5%">{{$question->point}}</td>
                 <td width="15%">
                   <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{$question->id}}"> <i class="fa fa-pencil"></i> </button>
                   <button type="button" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </button>
                 </td>
               </tr>
               @php($no++)
               @endforeach
               <!-- Modal Tambah Pertanyaan -->
               <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                       <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title">Tambah Pertanyaan</h5>
                           <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                         </div>
                         <div class="modal-body">
                           <form action="{{route('admin.question.store')}}" method="post">
                             @csrf
                            <div class="form-row">
                             <div class="col-12 mb-3">
                               <label>Nama Pertanyaan</label>
                               <textarea name="name" class="form-control" rows="3" cols="30" required></textarea>
                             </div>
                           </div>
                           <div class="form-row">
                            <div class="col-md-6 mb-2">
                              <label>Kategori</label>
                              <select name="category" class="form-control digits">
                                @foreach($categories as $category)
                                <option value="{{$category}}">{{$category}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="col-md-2 mb-2">
                              <label>Poin</label>
                              <input class="form-control" maxlength=2 name="point" type="number" required="">
                            </div>
                          </div>
                         </div>
                         <div class="modal-footer">
                           <button class="btn btn-light" type="button" data-dismiss="modal">Kembali</button>
                           <button class="btn btn-primary" type="submit">Simpan</button>
                         </div>
                          </form>
                       </div>
                     </div>
                   </div>


             </tbody>
           </table>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>

@endsection
