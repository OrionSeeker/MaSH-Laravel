@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- @if(session('success'))
                        <div class="alert alert-success alert-dismissable fade show" role="alert">
                            {{session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>
                    @endif -->


                    <!-- {{ __('Anda berhasil login, selamat datang ') }}{{ Auth::user()->name }}! -->
                    
                    <div class="row ml-2">
                        <h4 class="col-4">Nomor Induk</h4>
                        <h4 class="col-8">: {{$user_nomorInduk}}</h4>
                    </div>
                    <div class="row ml-2">
                        <h4 class="col-4">Nama</h4>
                        <h4 class="col-8">: {{$user_name}}</h4>
                    </div>
                    <div class="row ml-2">
                        <h4 class="col-4">Email</h4>
                        <h4 class="col-8">: {{$user_email}}</h4>
                    </div>
                    <div class="row ml-2">
                        <h4 class="col-4">Role</h4>
                        <h4 class="col-8">: {{$user_role}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
