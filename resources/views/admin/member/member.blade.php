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
                                <h3 class="card-title list-header left">Member List</h3>
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
                                    <a href="{{ route('export.members') }}" class="btn btn-info btn-sm margin-reset mt-3" id="export-excel">Export</a>
                                    <a href="{{ route('import-member') }}" class="btn btn-primary btn-sm margin-reset mt-3">Import</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>Instructor Name</th>
                                        <th>Workout Name</th>
                                        <th>Join Duration</th>
                                        <th>Join Date</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($members as $index => $member)
                                    <tr>
                                        <td>{{$member->id}}</td>
                                        <td>{{$member->user->name}}</td>
                                        <td>{{$member->instructor ? $member->instructor->name : '-'}}</td>
                                        <td>{{$member->workout->name}}</td>
                                        <td>{{$member->sub_month}}</td>
                                        <td>{{$member->joining_date}}</td>
                                        <td>{{$member->end_date}}</td>
                                        <td>
                                            <form action="{{route('admin.destroy_member' , $member->id)}}" method="post">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <input type="hidden" name="email" value="{{ $member->user->email }}">
                                                <button type="submit" name="delete" class="btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this Member?')">Delete</button>
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
                </div>
                <div class="center">{{ $members->links() }}</div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
