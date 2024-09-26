@extends('layouts.layout')

@section('content')
    <section class="contact_section layout_padding gradient-background">
        <div class="container w-50">
            <div class="heading_container">
                <h2>Login</h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('auth.loginUser') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                        <label for="email" class='auth-label'>Email</label>
                            <input type="email" placeholder="Email" name="email" class="w-100 form-control @error('email') is-invalid @enderror" />
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                        <label for="password" class='auth-label'>Password</label>
                            <input type="password" class="w-100 form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" /><br>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <a href="{{ route('auth.forgetpassword') }}" class="small ">Forget Password</a>
                        </div>

                        <div class="mt-5">
                            <button type="submit" class=" btn btn-primary">
                                Login
                            </button>
                        </div>
                        <div class="text-center">
                            Not a member? <a href="{{ route('auth.register') }}">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="../js/sweetalert.min.js"></script>
    @if (Session::has('message'))
        <script>
            swal("Message", "{{ Session::get('message') }}", 'success', {
                button: true,
                button: "Ok",
            });
        </script>
    @endif
    @if (Session::has('change'))
        <script>
            swal("Message", "{{ Session::get('change') }}", 'success', {
                button: true,
                button: "Ok",
            });
        </script>
    @endif
@endsection
