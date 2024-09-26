@extends('layouts.layout')

@section('content')
    <section class="contact_section layout_padding gradient-background">
        <div class="container w-50">
            <div class="heading_container">
                <h2>Forget Password Page</h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('auth.forget') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email" class='auth-label'>Email</label>
                            <input type="email" placeholder="Email" name="email" class="w-100 form-control auth-label @error('email') is-invalid @enderror "/>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary">
                                Send
                            </button>
                            <button type="submit" class="btn btn-dark">
                                <a href="{{ route('auth.login') }} " class=" text-decoration-none text-white">Back</a>
                            </button>
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
@endsection
