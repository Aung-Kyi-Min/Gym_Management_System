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
                            <h3 class="card-title">Workout Edit</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{route('admin.update_workout' , $workout->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-2 clearfix">
                                    <label for="my-file" class="form-label upload">Upload</label>
                                    <input type="file" name="image" id="my-file" onchange="loadFile(event)" class="form-control img_upload" accept=".jpg, .jpeg, .png, image/*" style="display: none;">
                                    <img class="user_img none" id="output" name="image" alt="test">
                                    <img class="user_img" id="default-image" name="image" src="{{ asset('storage/images/admin/workout/'.$workout->image) }}">
                                    <span class="error">@error('image'){{ $message }}@enderror</span>
                                </div>


                                <div class="mt-2">
                                    <label for="name">Name</label>
                                    <input type="text" placeholder="Workout Name" id="name" value="{{$workout->name}}" name="name" class="form-control  @error('name') is-invalid @enderror" />
                                    <span class="error">@error('name'){{$message}}@enderror</span>
                                </div>
                                <div class="mt-2">
                                    <label for="price">Price</label>
                                    <input type="text" placeholder="Price" id="price" value="{{$workout->price}}" name="price" class="form-control  @error('price') is-invalid @enderror" />
                                    <span class="error">@error('price'){{$message}}@enderror</span>
                                </div>

                                <div class="mt-2">
                                    <label for="textarea">Description</label>
                                    <textarea id="textarea" placeholder="Workout Description" name="description" rows="4" cols="40" class="form-control  @error('description') is-invalid @enderror">{{$workout->description}}</textarea>
                                    <span class="error">@error('description'){{$message}}@enderror</span>
                                </div>

                                <div class="mt-5">
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