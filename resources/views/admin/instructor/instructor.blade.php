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
                                <h3 class="card-title list-header left">Instructor List</h3>
                                <a href="{{route('admin.create_instructor')}}"  class="btn bg-gradient-primary margin-reset create-btn mt-3 right">Create</a>
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
                                    <a href="{{ route('export.instructors') }}" class="btn btn-info btn-sm margin-reset mt-3" id="export-excel">Export</a>
                                    <a href="{{ route('import-views') }}" class="btn btn-primary btn-sm margin-reset mt-3">Import</a>
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
                                        <th>Speciality</th>
                                        <th>Price</th>
                                        <th>Access Time</th>
                                        <th>Description</th>
                                        <th>Photos</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($instructors as $instructor)
                                    <tr>

                                        <td>{{ $instructor->id }}</td>
                                        <td>{{ $instructor->name }}</td>
                                        <td>
                                        {{ $instructor->email}}
                                        </td>
                                        <td>{{ $instructor->speciality }}</td>
                                        <td>{{ $instructor->price }}</td>
                                        <td>{{ $instructor->access_time}}</td>
                                        <td>
                                            <p class="width-text text-wrap">{{$instructor->limitedDsec}}</p>
                                        </td>
                                        <td>
                                            <img src="{{ asset('storage/images/admin/instructor/' . $instructor->image) }}" alt="Instructor Image" class="img-width">
                                        </td>
                                        <td>
                                            <form action="{{ url('/admin/instructor/destroy/'.$instructor->id) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <a href="{{ url('/admin/instructor/'.$instructor->id.'/edit') }}" class="btn bg-gradient-primary btn-sm">Edit</a>
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this instructor?')"> Delete </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="container center">
                        {{ $instructors->links()}}
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
