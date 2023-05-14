@extends('layouts.admin_layout')
@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Instructor List</h3>

                            <form action="{{ route('admin.search_instructor') }}" method="GET" class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ request('search') }}">
                                    <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    </div>
                                </div>
                                <a href="{{ route('export.instructors') }}" class="btn btn-info btn-sm mt-3">Export</a>
                                <a href="{{ route('import-views') }}" class="btn btn-primary btn-sm mt-3">Import</a>
                            </form>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Speciality</th>
                                        <th>Price</th>
                                        <th>Access Time</th>
                                        <th>Photos</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($instructors as $instructor)
                                    <tr>

                                        <td>{{ $instructor->id }}</td>
                                        <td>{{ $instructor->name }}</td>
                                        <td>{{ $instructor->email }}</td>
                                        <td>{{ $instructor->speciality }}</td>
                                        <td>{{ $instructor->price }}</td>
                                        <td>{{ $instructor->access_time}}</td>
                                        <td>
                                            <img src="{{ asset('images/' . $instructor->image) }}" width="50px" alt="Instructor Image" >
                                        </td>
                                        <td>
                                            <form action="{{ url('/admin/instructorlist/'.$instructor->id) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <a href="{{ url('/admin/instructor/'.$instructor->id.'/edit') }}"class="btn bg-gradient-primary">Edit</a>
                                                <button type="submit" class="btn btn-danger"> Delete </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="container">
                        {{ $instructors->links() }}
                           @if (session()->has('success'))
                           <div class="alert alert-success">
                               {{ session('success') }}
                           </div>
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

@endsection

