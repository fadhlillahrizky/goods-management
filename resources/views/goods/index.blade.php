@extends('layouts.master')

@section('content')
    <form class="form-inline my-2 my-lg-0" action="/barang/search" method="GET">
      <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search" aria-label="Search" value="{{ old('search') }}">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  
        @if(session('success'))
        <div class="alert alert-success" role="alert">
           {{session('success')}}
        </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
        <div class="col-6">
            <h1>Data Barang<h1>
        </div>
        <div class="col-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-right btm-sm" data-toggle="modal" data-target="#createModal">
            Tambah Data
            </button>
        </div>
            <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Barang</th>
                    <th>Foto Barang</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th></th>
                </tr>
            </thead>
                @foreach($data as $goods)
                <tr>
                    <td>{{$goods->NamaBarang}}</td>
                    <td><img width="150px" src="{{ url('/uploads/FotoBarang/'.$goods->FotoBarang) }}"></td>
                    <td>{{$goods->HargaBeli}}</td>
                    <td>{{$goods->HargaJual}}</td>
                    <td>{{$goods->Stok}}</td>
                    <td><a href="/barang/{{$goods->id}}/edit" class="btn btn-warning btn-sm" >Edit</a>
                        <a href="/barang/{{$goods->id}}/delete" class="btn btn-danger btn-sm"
                        onClick="return confirm('Yakin mau dihapus ?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
        

  <!-- Modal Create-->
  <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form action="/barang/create" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Barang</label>
                        <input name="NamaBarang" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Beli</label>
                        <input name="HargaBeli" type="text" class="form-control" id="exampleInputEmail1" placeholder="Harga Beli">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Jual</label>
                        <input name="HargaJual" type="integer" class="form-control" id="exampleInputEmail1" placeholder="Harga Jual">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Stok</label>
                        <input name="Stok" type="integer" class="form-control" id="exampleInputPassword1" placeholder="Stok">
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="FotoBarang" type="file" class="custom-file-input">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
                </div>
            </div>
            
    {{ $data->links()}}
@endsection