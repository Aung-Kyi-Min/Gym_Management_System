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
                            <h3 class="card-title">Workout Create</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{route('admin.store_workout')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mt-2">
                                    <label for="name">Name</label>
                                    <input type="text" placeholder="Workout Name" id="name" value="{{ old('name') }}" name="name" class="form-control  @error('name') is-invalid @enderror" />
                                    <span class="error">@error('name'){{$message}}@enderror</span>
                                </div>
                                <div class="mt-2">
                                    <label for="price">Price</label>
                                    <input type="text" placeholder="Price" id="price" value="{{ old('price') }}" name="price" class="form-control  @error('price') is-invalid @enderror" />
                                    <span class="error">@error('price'){{$message}}@enderror</span>
                                </div>
                                
                                <div class="mt-2">
                                    <label for="image">Image</label>
                                    <input type="file" id="image"  name="image" class="form-control  @error('image') is-invalid @enderror" />
                                    <span class="error">@error('image'){{$message}}@enderror</span>
                                </div>

                                <div class="mt-2">
                                    <label for="textarea">Description</label>
                                    <textarea id="textarea" placeholder="Workout Description" name="description" rows="4" cols="40" class="form-control  @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                    <span class="error">@error('description'){{$message}}@enderror</span>
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