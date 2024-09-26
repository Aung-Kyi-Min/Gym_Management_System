@extends('layouts.layout')

@section('content')
    <section class="contact_section layout_padding gradient-background">
        <div class="container w-50">
            <div class="heading_container">
                <h2>Reset Password Page</h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('auth.resetpsw') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div>
                            <input type="email" placeholder="Email" name="email" class="w-100 form-control @error('email') is-invalid @enderror" />
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div>
                            <input type="password" placeholder="Password" name="password" class="w-100 form-control @error('password') is-invalid @enderror" />
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div>
                            <input type="password" placeholder="Comfirm Password" name="password_confirmation"
                                class="w-100 form-control @error('password') is-invalid @enderror" />
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="mt-5">
                            <button type="submit" class=" btn btn-dark">
                                Confirm
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
