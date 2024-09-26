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
                                <h3 class="card-title list-header left">Discount List</h3>
                                <a href="{{route('admin.create_discount')}}" class="btn bg-gradient-primary margin-reset create-btn mt-3 right">Create</a>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Start Month</th>
                                        <th>End Month</th>
                                        <th>Discount</th> 
                                        <th>Action</th>                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($discounts as $discount)
                                        <tr>
                                            <td>{{$discount->id}}</td>
                                            <td>{{$discount->min_months}}</td>
                                            <td>{{$discount->max_months}}</td>
                                            <td>{{$discount->dis_percent}} %</td>
                                            <td>
                                                <form action="{{route('admin.destroy_discount' , $discount->id)}}" method="post">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <a href="{{route('admin.edit_discount' , $discount->id)}}" type="button" class="btn-sm bg-gradient-primary">Edit</a>
                                                    <button type="submit" name="delete" class="btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this discount?')">Delete</button>
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
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection