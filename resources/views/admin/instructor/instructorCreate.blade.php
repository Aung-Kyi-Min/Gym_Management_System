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
                            <h3 class="card-title">Instructor Create</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('admin.store_instructor') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mt-3">
                                    <label for="name">Name</label>
                                    <input type="text" placeholder="Instructor Name" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" />
                                </div>
                                <small class="text-danger">{{$errors->first('name')}}</small>
                                
                                <div class="mt-3">
                                    <label for="email">Email</label>
                                    <input type="email" placeholder="Email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" />
                                </div>
                                <small class="text-danger">{{$errors->first('email')}}</small>

                                <div class="mt-3">
                                    
                                    <label for="specialist">Specialist</label>
                                    <input type="text" placeholder="specialist" name="speciality" id="specialist" class="form-control @error('speciality') is-invalid @enderror"  value="{{ old('speciality') }}" />
                                </div>
                                <small class="text-danger">{{$errors->first('speciality')}}</small>

                                <div class="mt-3">
                                <label for="Price">Price</label>
                                    <input type="text"  name="price" class="form-control @error('price') is-invalid @enderror"  value="{{ old('price') }}" placeholder="Price" />
                                </div>
                                <small class="text-danger">{{$errors->first('price')}}</small>

                                <div class="mt-3">
                                    <label for="time">Time</label>
                                    <select name="access_time" id="time" class="form-control @error('access_time') is-invalid @enderror">
                                        <option value="morning"  @if(old('access_time') =='morning') selected @endif>Morning Time</option>
                                        <option value="noon"  @if(old('access_time') == 'noon') selected @endif>Noon Time</option>
                                        <option value="evening"  @if(old('access_time') == 'evening') selected @endif>Evening Time</option>
                                    </select>
                                </div>
                                <small class="text-danger">{{$errors->first('access_time')}}</small>
                                
                                <div class="mt-3">
                                    <label for="image">Image</label>
                                    <input type="file"  name="image" id="image" class="form-control @error('image') is-invalid @enderror"  value="{{ old('image') }}"  />
                                </div>
                                <small class="text-danger">{{$errors->first('image')}}</small>

                                <div class="mt-3">
                                    <label for="textarea">Description</label>
                                    <textarea id="textarea" placeholder="Instructor Description" name="description" rows="4" cols="40" class="form-control  @error('description') is-invalid @enderror" >{{ old('description') }}</textarea>
                                    <small class="text-danger">{{$errors->first('description')}}</small>
                                </div>
                                
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary btn-sm float-end">Create</button>
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