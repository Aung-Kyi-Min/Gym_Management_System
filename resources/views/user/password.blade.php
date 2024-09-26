@extends('layouts.layout')

@section('content')
    <section class="contact_section layout_padding">
        <div class="container w-50">
            <div class="heading_container">
                <h2>Change Password Page</h2>
            </div>
            <div class="card">
                @if (session('message'))
                    <h5 class="alert alert-danger mb-2">{{ session('message') }}</h5>
                @endif
                <div class="card-body">
                    <form action="{{ url('user/password/' . $user->id) }}" method="POST">
                        @csrf
                        <div class="mt-2">
                            <label for="current_password" class="auth-label">Current Password</label>
                            <input type="password" placeholder="*******" id="current_password" name="current_password" class="form-control w-100  @error('current_password') is-invalid @enderror"/>
                            @error('current_password')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="new_password" class="auth-label">New Password</label>
                            <input type="password" placeholder="********" id="password" name="password" class="form-control w-100 @error('password') is-invalid @enderror" value="{{ old('new_password') }}" />
                            @error('password')
                                <span class="error  text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="password_confirmation" class="auth-label">Confirm Password</label>
                            <input type="password" placeholder="********" id="password_confirmation" name="password_confirmation" class="form-control w-100 @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}"/>
                            @error('password_confirmation')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>

                            <button type="button" class="btn btn-dark pr-4">
                                <a href="{{ route('user.profile', $user->id) }}" class="text-decoration-none text-white text-center">Back</a>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<script src="/js/sweetalert.min.js"></script>
@if (Session::has('success'))
    <script>
        swal("Message", "{{ Session::get('success') }}", 'success', {
            button: "Ok"
        });
    </script>
@endif


@endsection
