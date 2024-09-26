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
                            <h3 class="card-title">Discount Create</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{route('admin.store_discount')}}" method="POST">
                                @csrf
                                <div class="mt-2">
                                    <label for="min_months">Min Months</label>
                                    <input type="text" placeholder="1-12" id="min_months" value="{{ old('min_months') }}" name="min_months" class="form-control  @error('min_months') is-invalid @enderror" />
                                    <span class="error">@error('min_months'){{$message}}@enderror</span>
                                </div>
                                <div class="mt-2">
                                    <label for="max_months">Max Months</label>
                                    <input type="text" placeholder="1-12" id="max_months" value="{{ old('max_months') }}" name="max_months" class="form-control  @error('max_months') is-invalid @enderror" />
                                    <span class="error">@error('max_months'){{$message}}@enderror</span>
                                </div>
                                <div class="mt-2">
                                    <label for="dis_percent">Dis Percent</label>
                                    <input type="text" placeholder="dis_percent" id="dis_percent" value="{{ old('dis_percent') }}" name="dis_percent" class="form-control  @error('dis_percent') is-invalid @enderror" />
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