@extends('layouts.app')

{{-- Customize layout sections  --}}
@section('subtitle', 'User')
@section('content_header_title', 'User')
@section('content_header_subtitle', 'Create')

{{-- Content body:main page content  --}}
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Input User</h3>
        </div>

        <div class="card-body">
            <form method="post" action="../user">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror"
                           placeholder="Username">

                    @error('username')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
                           placeholder="Password">

                    @error('password')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                           placeholder="Nama">

                    @error('nama')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                    </div>
                    <select id="level_id" name="level_id" class="form-control @error('level_kode') is-invalid @enderror">
                        <option value="1">Administrator</option>
                        <option value="2">Manager</option>
                        <option value="3">Staff/Kasir</option>
                        <option value="4">Customer</option>
                    </select>

                    @error('level_kode')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
