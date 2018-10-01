@extends('layouts.master')

@section('content')



        <h2>Detail <small><mark>{{$obj->id}}</mark></small></h2>
        <table class="table">

        <tbody>


        <tr>
            <th>Name</th>
            <td>{{$obj->name}}</td>
        </tr>

        <tr>
            <th>Email</th>
            <td>{{$obj->email}}</td>
        </tr>

        <tr>
            <th>Phone</th>
            <td>{{$obj->phone}}</td>
        </tr>

        <tr>
            <th>Address</th>
            <td>{{$obj->address}}</td>
        </tr>

        <tr>
            <th>Position</th>
            <td>{{$obj->position}}</td>
        </tr>

        <tr>
            <th>Salary</th>
            <td>{{$obj->salary}}</td>
        </tr>

        <tr>
            <th>Skills</th>
            <td>@foreach($obj->skills as $skill) <span class="badge badge-success">{{$skill->skill}}</span>@endforeach</td>
        </tr>
        </tbody>
    </table>

    <div class="row">
        <div class="col-lg-12 text-center">
            <a class="btn btn-success" href="{{route('index')}}"><i class="fas fa-home"></i> Back</a>
        </div>
    </div>


@endsection
