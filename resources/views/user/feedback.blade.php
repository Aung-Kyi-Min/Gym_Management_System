
@extends('layouts.layout')

@section('content')
    <section class="contact_section layout_padding gradient-background">
        <div class="container w-50">
            <div class="heading_container">
                <h2>Send Feedback Page</h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.send_feedback') }}" method="POST">
                        @csrf
                        <div class="mt-2">
                            <label for="" class="auth-label">Name</label>
                            <input type="text" placeholder="Name" name="name" value="{{$user->name}}" readonly class='form-control w-100'/>
                            <input type="hidden" placeholder="Name" name="id" value="{{$user->id}}" readonly class='form-control w-100'/>
                            @error('name')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="email" class="auth-label">Email</label>
                            <input type="email" placeholder="Email"  name="email" value="{{$user->email}}" readonly class='form-control w-100'/>
                            @error('password')
                                <span class="error  text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="phone" class="auth-label">Phone</label>
                            <input type="number" placeholder="Phone Number"  name="phone" value="{{$user->phone}}" readonly class='form-control w-100'/>
                            @error('phone')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="phone" class="auth-label">Message</label>
                            <textarea id="textarea" placeholder="What do you want to say?Send your message." name="message" rows="4" cols="40" class="form-control @error('message') is-invalid @enderror"></textarea>
                            @error('message')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary">
                                Send
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>

    <script src="../js/sweetalert.min.js"></script>
    @if (Session::has('success'))
      <script>
          swal("Message", "{{ Session::get('success') }}", 'success', {
              button: true,
              button: "Ok",
          });
      </script>
    @endif
@endsection

