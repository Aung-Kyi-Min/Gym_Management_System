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
                    <div class="card-header clearfix">
                            <div class="left clearfix">
                                <h3 class="card-title list-header left">User List</h3>
                                <a href="{{route('admin.create_user')}}"  class="btn bg-gradient-primary margin-reset create-btn mt-3 right">Create</a>
                            </div>
                            <div class="card-tools search-header right clearfix">
                                <form method="GET" class="left">
                                    <div class="input-group input-group-sm " style="width: 150px;">
                                    <input type="text" name="search" class="form-control  float-right" placeholder="Search" value="{{ $search }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                                </div>
                                <div class="right exim">
                                    <a href="{{ route('export.users') }}" class="btn btn-info btn-sm margin-reset mt-3" id="export-excel">Export</a>
                                    <a href="{{ route('importusers') }}" class="btn btn-primary btn-sm margin-reset mt-3">Import</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users_search as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>
                                            <p class="width-text text-wrap">{{$user->limitedAddress}}</p>
                                        </td>
                                        <td>{{$user->gender}}</td>
                                        <td>{{$user->age}}</td>
                                        <td>
                                            <img class="img-width" src="{{ asset('storage/images/admin/user/'.$user->image)}}">
                                        </td>
                                        <td>
                                            <form action="{{route('admin.destroy_user' , $user->id)}}" method="post">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <a href="{{route('admin.edit_user' , $user->id)}}" type="button" class="btn-sm bg-gradient-primary">Edit</a>
                                                <button type="submit" name="delete" class="btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this User?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    @if ($users_search instanceof \Illuminate\Contracts\Pagination\Paginator)
                    <div class="center">{{$users_search->links()}}</div> 
                    @endif

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script src="/js/sweetalert.min.js"></script>
{{--<script src="js/jquery-3.4.1.min.js"></script>--}}
@if (Session::has('message'))
    <script>
        swal("Message", "{{ Session::get('message') }}", 'success', {
            button: true,
            button: "Ok",
        });
    </script>
@endif
@endsection
