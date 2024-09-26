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
                            <h3 class="card-title">User Create</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{route('admin.store_user')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mt-2">
                                    <label for="name">Name</label>
                                    <input type="text" placeholder="User Name" id="name" name="name" value="{{ old('name') }}" class="form-control  @error('name') is-invalid @enderror" />
                                    <span class="error">@error('name'){{$message}}@enderror</span>
                                </div>
                                <div class="mt-2">
                                    <label for="email">Email</label>
                                    <input type="text" placeholder="Email" id="email" name="email" value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror" />  
                                    <span class="error">@error('email'){{$message}}@enderror</span>                                 
                                </div>
                                
                                <div class="mt-2">
                                    <label for="password">Password</label>
                                    <input type="password" id="password"  name="password" class="form-control  @error('password') is-invalid @enderror" />
                                    <span class="error">@error('password'){{$message}}@enderror</span>
                                </div>

                                <div class="mt-2">
                                    <label for="phone">Phone</label>
                                    <input type="number" id="phone"  name="phone" value="{{ old('phone') }}" class="form-control  @error('phone') is-invalid @enderror" />
                                    <span class="error">@error('phone'){{$message}}@enderror</span>
                                </div>
                                
                                <div class="mt-2">
                                    <label for="gender">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" checked="checked" name="gender" value="male">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" value="female">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
    
                                <div class="mt-2">
                                    <label for="age">Age</label>
                                    <input type="number" id="age" value="{{ old('age') }}"  name="age" class="form-control  @error('age') is-invalid @enderror" />
                                    <span class="error">@error('age'){{$message}}@enderror</span>
                                </div>

                                <div class="mt-2">
                                    <input type="hidden" id="role" value="1"  name="role"  class='form-control' />
                                </div>

                                <div class="mt-2">
                                    <label for="image">Image</label>
                                    <input type="file" id="image" name="image" class="form-control" />
                                    <span class="error">@error('image'){{$message}}@enderror</span>
                                </div>

                                <div class="mt-2">
                                    <label for="textarea">Address</label>
                                    <textarea id="textarea" placeholder="Address" name="address" rows="4" cols="40" class="form-control  @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                                    <span class="error">@error('address'){{$message}}@enderror</span>
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