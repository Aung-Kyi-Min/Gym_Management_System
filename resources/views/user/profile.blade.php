@extends('layouts.layout')

@section('content')

<div class="gradient-background">
    <div class="container py-4 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 shadow-sm">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-pills-primary nav-justified">
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active show"><i class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                            </li>
                        </ul>
                        <div class="tab-content p-3">

                            <div class="tab-pane active show" id="profile">
                                <img class="card-img-top rounded-circle img-circle mt-5 profile-image" src="{{$user->image ? asset('storage/images/admin/user/' . $user->image) : 'https://bootdey.com/img/Content/avatar/avatar7.png' }}" alt="Default Image">

                                <h5 class="mb-3 profile-name">{{ $user->name }} </h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profile clearfix">
                                            <h6>Email :</h6>
                                            <p>
                                                {{ $user->email }}
                                            </p>
                                        </div>
                                        <div class="profile clearfix">
                                            <h6>Role :</h6>
                                            <p>
                                                @if ($user->role == 1)
                                                User
                                                @elseif ($user->role == 0)
                                                Admin
                                                @endif
                                            </p>
                                        </div>
                                        <div class="profile clearfix">
                                            <h6>Gender :</h6>
                                            <p>
                                                {{ $user->gender}}
                                            </p>
                                        </div>
                                        <div class="profile clearfix">
                                            <h6>Age :</h6>
                                            <p>
                                                {{ $user->age}}
                                            </p>
                                        </div>
                                        <div class="profile clearfix">
                                            <h6>Phone :</h6>
                                            <p>
                                                {{ $user->phone}}
                                            </p>
                                        </div>
                                        <div class="profile clearfix">
                                            <h6>Address :</h6>
                                            <p>
                                                {{ $user->address}}
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <!--/row-->
                            </div>

                            <div class="tab-pane" id="edit">
                                <form action="{{ url('/user/update/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <img id="preview" src="#" alt="Preview Image" style="display: none;" class="card-img-top rounded-circle img-circle mt-5 profile-image">
                                        <img id="default-image" class="card-img-top rounded-circle img-circle mt-5 profile-image" src="{{ $user->image ? asset('storage/images/admin/user/' . $user->image) : 'https://bootdey.com/img/Content/avatar/avatar7.png' }}" alt="Default Image">
                                        <input type="file" name="image" id="my-file" onchange="previewImage(event)" style="display:none">
                                        <button type="button" class="btn btn-outline-dark profile-edit-rounded" onclick="document.getElementById('my-file').click()">Upload</button>
                                        <span class="text-danger">{{$errors->first('image')}}</span>
                                    </div>

                                    <div class="form-group row pad">
                                        <label class="col-lg-3 col-form-label form-control-label">ID</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="id" type="text" placeholder="Enter ID" value="{{ $user->id }}" readonly>
                                        </div>
                                    </div>
                                    <div for="name" class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Name</label>
                                        <div class="col-lg-9">
                                            <input id="name" class="form-control  @error('name') is-invalid @enderror" name="name" type="text" placeholder="John" value="{{ $user->name }}">
                                            <span class="text-danger">{{$errors->first('name')}}</span>
                                        </div>

                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Gender</label>
                                        <div class="p-t-10">
                                            <label class="radio-container m-r-45">Male
                                                <input type="radio" name="gender" value="male" {{ $user->gender == 'male' ? 'checked' : '' }}>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio-container">Female
                                                <input type="radio" name="gender" value="female" {{ $user->gender == 'female' ? 'checked' : '' }}>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="age" class="col-lg-3 col-form-label form-control-label">Age</label>
                                        <div class="col-lg-9">
                                            <input id="age" class="form-control  @error('age') is-invalid @enderror" type="text" placeholder="20" value="{{ $user->age}}" name="age">
                                            <span class="text-danger">{{$errors->first('age')}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-lg-3 col-form-label form-control-label">Phone</label>
                                        <div class="col-lg-9">
                                            <input id="phone" class="form-control  @error('phone') is-invalid @enderror" type="text" value="{{ $user->phone}}" name="phone" placeholder="+95">
                                            <span class="text-danger">{{$errors->first('phone')}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-lg-3 col-form-label form-control-label">Address</label>
                                        <div class="col-lg-9">
                                            
                                            <textarea class="form-control  @error('address') is-invalid @enderror"  placeholder="Pyay" name="address">{{ $user->address}}</textarea>
                                            <span class="text-danger">{{$errors->first('address')}}</span> <br>
                                            <small><a href="{{url('/user/password/'.$user->id.'/edit') }}" class="text-primary">Are you need to change Passowrd?: Click me!</a></small>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">

                                            <input type="submit" class="btn btn-primary" value="Update">
                                            <input type="reset" class="btn btn-secondary" value="Cancel">

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../js/sweetalert.min.js"></script>
    @if (Session::has('success'))
      <script>
          swal("Message", "{{ Session::get('success') }}", 'success', {
              button: true,
              button: "Ok",
          });
      </script>
    @endif

<script>
    function previewImage(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').setAttribute('src', e.target.result);
                document.getElementById('preview').style.display = 'block';
                document.getElementById('default-image').style.display = 'none';
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            document.getElementById('preview').style.display = 'none';
            document.getElementById('default-image').style.display = 'block';
        }
    }
</script>

@endsection

