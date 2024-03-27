
@extends('layouts.app')

{{--Customize layout sections--}}
@section('subtitle', 'M_User')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'M_User')

{{-- Content body:main page content  --}}
@section('content')
    <div class="container">
        <div class="card card-info">
            <div class="card-header">CRUD m_user</div>
            <div class="card-body">
                {{ $dataTable->table() }}
                <div class="float-left">
                    <a href="{{ route('m_user.create') }}" class="btn btn-success">
                        Input User</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
