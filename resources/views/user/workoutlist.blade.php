@extends('layouts.layout')

@section('content')
<div class="gradient-background">
    <div class="container p-3">
        <h1 class="text-dark text-center mb-1">Workout List</h1>
      <div class="row justify-content-center gradient-background">
        @foreach ($workouts as $i => $workout)
        <div class="col-sm-5 card img-fluid border m-2 p-2 text-center gradient-background" style="width:500px">
          <img class="card-img-top image workout-img" src="{{ asset('storage/images/admin/workout/'.$workout->image) }}" alt="{{$workout->image}}">
          <div class="middle">
          </div>
          <h3 class="mt-5">{{$workout->name}}</h3>
          <div class="card-body">
              <p class="card-text">{{$workout->description}}</p>
              <h4>{{$workout->price}}</h4>
          </div>
          <div class="card-footer">
              <a href="{{route('member.purchase')}}" class="btn btn-primary">Start Membership</a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
</div>
@endsection
