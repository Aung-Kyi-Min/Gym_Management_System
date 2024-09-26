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
                            <h3 class="card-title">Instructor Edit</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ url('/admin/instructor/'.$instructor->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{method_field('put')}} 

                                <div class="mt-3 clearfix">
                                    <img class="user_img none" id="output" name="image" alt="test">
                                    <img class="user_img" id="default-image" src="{{ asset('storage/images/admin/instructor/'.$instructor->image) }}">
                                    <label for="image" class="form-label upload">Upload</label>
                                    <input type="file" name="image" id="image" onchange="loadFile(event)" class="form-control img_upload" accept=".jpg, .jpeg, .png, image/*">
                                </div>

                                <div class="mt-3">
                                    <label for="name">Name</label>
                                    <input type="text" placeholder="Instructor Name" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$instructor->name}}" />
                                </div>
                                <span class="text-danger">{{$errors->first('name')}}</span>
                                <div class="mt-3">
                                    <label for="email">Email</label>
                                    <input type="email" placeholder="Email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{$instructor->email}}" />
                                </div>
                                <span class="text-danger">{{$errors->first('email')}}</span>

                                <div class="mt-3">
                                    <label for="price">Price</label>
                                    <input type="text" placeholder="Price" name="price" id="price" class="form-control @error('price') is-invalid @enderror"  value="{{$instructor->price}}" />
                                </div>
                                <span class="text-danger">{{$errors->first('price')}}</span>

                                <div class="mt-3">
                                    <label for="specialist">Specialist</label>
                                    <input type="text" placeholder="Specialist" name="speciality" id="speciality" class="form-control @error('speciality') is-invalid @enderror" value="{{$instructor->speciality}}" />
                                </div>
                                <span class="text-danger">{{$errors->first('speciality')}}</span>

                                <div class="mt-3">
                                    <label for="time">Time</label>
                                    <select name="access_time" id="time" class="form-control">
                                        <option value="morning" @if($instructor->access_time === 'morning') selected @endif>Morning Time</option>
                                        <option value="noon" @if($instructor->access_time === 'noon') selected @endif>Noon Time</option>
                                        <option value="evening" @if($instructor->access_time === 'evening') selected @endif>Evening Time</option>
                                    </select>
                                </div>
                                <span class="text-danger">{{$errors->first('access_time')}}</span>
                                <div class="mt-3">
                                    <label for="textarea">Description</label>
                                    <textarea id="textarea" placeholder="Instructor Description" name="description" rows="4" cols="40" class="form-control  @error('description') is-invalid @enderror">{{ $instructor->description }}</textarea>
                                    <span class="text-danger">{{$errors->first('description')}}</span>
                                </div>
                                
                                <div class="mt-4">
                                    <button type="submit" class=" btn btn-dark">
                                        Update
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
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        $("#output").removeClass("none");
        $("#default-image").addClass("none");
    }
</script>
@endsection