@extends('layouts.layout')
@section('content')
<div class="">
    <div class="mt-5 ">
    <div class="container mt-5 ">
        <div class="card mb-5">
            <div class="card-header d-flex bg-dark mb-3">
                <div class="">
                    <h2 class="text-light ">Purchase History
                    </h2>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped ">
                    <thead class=" bg-info text-center text-dark mt-2">
                        <tr>
                            <th>Id</th>
                            <th>Workout</th>
                            <th>Instructor Name</th>
                            <th>Numbers Of Months</th>
                            <th>Payment Method</th>
                            <th>Total Amount</th>
                            <th>Joining Date</th>
                            <th>Expired Date</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @if ($m > 0)
                        @foreach ($members as $m)
                            <tr>
                                <td>{{ $a++ }}</td>
                                <td>{{ $m->workout->name }}</td>
                                <td>{{ $m->instructor_id == '' ? '------' : $m->instructor->name }}</td>
                                <td>{{ $m->sub_month }}</td>
                                <td>{{ $purchases[$b][0]['payment'] }}</td>
                                <td>{{ $purchases[$b][0]['amount'] }}</td>
                                <td>{{ $m->joining_date }}</td>
                                <td>{{ $m->end_date }}</td>
                                <input type="hidden" value="{{ $b++ }}">
                            </tr>
                        @endforeach
                    </tbody>
                @else
                <p class="mx-auto text-center text-light p-2 bg-danger w-25 mb-3">
                    No History Here...
                </p>
                @endif
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
