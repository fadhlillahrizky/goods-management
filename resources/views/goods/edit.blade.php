@extends('layouts.master')

@section('content')
    <h1>Edit Data Barang</h1>
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
        <div class="col-lg-12">
        <form action="/barang/{{$barang->id}}/update" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}    
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Barang</label>
                <input name="NamaBarang" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang" value="{{$barang->NamaBarang}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Harga Beli</label>
                <input name="HargaBeli" type="text" class="form-control" id="exampleInputEmail1" placeholder="Harga Beli" value="{{$barang->HargaBeli}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Harga Jual</label>
                <input name="HargaJual" type="integer" class="form-control" id="exampleInputEmail1" placeholder="Harga Jual" value="{{$barang->HargaJual}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Stok</label>
                <input name="Stok" type="integer" class="form-control" id="exampleInputPassword1" placeholder="Stok" value="{{$barang->Stok}}">
            </div>
            <div class="input-group">
                <div class="custom-file">
                    <input name="FotoBarang" type="file" class="custom-file-input">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>  
                <button type="submit" class="btn btn-primary">Update</button>               
            </form>
            </div>
@endsection



