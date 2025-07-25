
@extends('layout.main_layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-8">
            <div class="card p-5">
                
                <!-- logo -->
                <div class="text-center p-3">
                    <img src="assets/images/logo.png" alt="Notes logo">
                </div>

                <!-- form -->
                <div class="row justify-content-center">
                    <div class="col-md-10 col-12">
                        <form action="login" method="post" novalidate>
                            @csrf 
                            <div class="mb-3">
                                <label for="text_username" class="form-label">Username</label>
                                <input type="text" class="form-control bg-dark text-info" name="text_username" required>
                                 @error('text_username')
                               <div class="text-danger">{{$message}}</div> 
                            @enderror
                            </div>
                           
                            <div class="mb-3">
                                <label for="text_password" class="form-label">Password</label>
                                <input type="password" class="form-control bg-dark text-info" name="text_password" required>
                                @error('text_password')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-secondary w-100">LOGIN</button>
                            </div>
                            @if(session('loginError'))
                                <div class="text-danger bg-danger p-3 text-center text-white rounded">
                                    {{session('loginError')}}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>

                <!-- copy -->
                <div class="text-center text-secondary mt-3">
                    <small>&copy; <?= date('Y') ?> Notes</small>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

