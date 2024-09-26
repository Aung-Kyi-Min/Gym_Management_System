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
                            <h3 class="card-title">Discount Edit</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{route('admin.update_discount' , $discount->id)}}" method="POST">
                                @csrf
                                <div class="mt-2">
                                    <label for="min_months">Min Months</label>
                                    <input type="text" placeholder="1-12" id="min_months" value="{{ $discount->min_months }}" name="min_months" class="form-control  @error('min_months') is-invalid @enderror" />
                                    <span class="error">@error('min_months'){{$message}}@enderror</span>
                                </div>
                                <div class="mt-2">
                                    <label for="max_months">Max Months</label>
                                    <input type="text" placeholder="max_months" id="max_months" value="{{ $discount->max_months }}" name="max_months" class="form-control  @error('max_months') is-invalid @enderror" />
                                    <span class="error">@error('max_months'){{$message}}@enderror</span>
                                </div>
                                <div class="mt-2">
                                    <label for="dis_percent">Dis Percent</label>
                                    <input type="text" placeholder="dis_percent" id="dis_percent" value="{{ $discount->dis_percent }}" name="dis_percent" class="form-control  @error('dis_percent') is-invalid @enderror" />
                                    <span class="error">@error('dis_percent'){{$message}}@enderror</span>
                                </div>
                                <div class="mt-5">
                                    <button type="submit" class=" btn btn-dark">
                                        Create
                                    </button>
                                </div>  
                            </form>
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