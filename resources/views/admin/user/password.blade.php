@extends('layouts.admin_layout')
@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card pad">
                        <div class="card-header">
                            <h3 class="card-title">User Change Password</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ url('admin/user/password/' . $user->id . '/change') }}">
                                @csrf

                                <div class="mt-2">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" placeholder="*******" id="old_password" name="current_password" class="form-control  @error('current_password') is-invalid @enderror'"/>
                                    @error('current_password')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mt-2">
                                    <label for="new_password">New Password</label>
                                    <input type="password" placeholder="********" id="password" name="password" class="form-control  @error('password') is-invalid @enderror'" />
                                    @error('password')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mt-2">
                                    <label for="password">Confirm Password</label>
                                    <input type="password" placeholder="********" id="password" name="password_confirmation" class="form-control  @error('password') is-invalid @enderror'" >
                                    @error('password')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-dark">Update</button>
                                    <button type="button" class="btn btn-dark pr-4">
                                        <a href="{{ route('admin.edit_user', $user->id) }}" class="text-decoration-none text-white text-center">Back</a>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->

                        @if (session('message'))
                    <h5 class="alert alert-danger mb-2">{{ session('message') }}</h5>
                        @endif

                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script src="/js/sweetalert.min.js"></script>
@if (Session::has('success'))
    <script>
        swal("Message", "{{ Session::get('success') }}", 'success', {
            button: "Ok"
        });
    </script>
@endif

@endsection
