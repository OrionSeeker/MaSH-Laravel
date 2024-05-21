@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Edit Data Diri') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="nomorInduk">{{ __('Password (isi - jika tidak ingin mengganti)') }}</label>
                            <input id="nomorInduk" type="text" class="form-control" name="password" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check2-circle"></i> Edit Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
