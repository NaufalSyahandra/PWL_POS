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
                        <label for="kodeKategori">Kategori Kode</label>
                        <input type="text" class="form-control" id="kodeKategori" name="kodeKategori">
                    </div>

                    <div class="form-group">
                        <label for="namaKategori">Kategori Nama</label>
                        <input type="text" class="form-control" id="namaKategori" name="namaKategori">
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{url('/kategori')}}">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
