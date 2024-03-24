@extends('layouts.app')

{{--Customize layout sections--}}

@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Create')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Buat Kategori baru</div>
            <div class="card-body">
                <form method="post" action="../kategori">
                    <div class="form-group">
                        <label for="kode_kategori">Kode Kategori</label>
                        <input type="text" id="kode_kategori" name="kategori_kode"
                               class="form-control @error('kategori_kode') is-invalid @enderror">

                        @error('kategori_kode')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="namaKategori">Kategori Nama</label>
                        <input type="text" class="form-control" id="namaKategori" name="kategori_nama" placeholder="">
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{url('/kategori')}}">Kembali</a>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
