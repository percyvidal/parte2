@extends('layouts.master')

@section('content')



        <form method="GET" action="{{route('index')}}">

            <div class="input-group mb-3">
            <input type="text" class="form-control" name="email" placeholder="Search by email" aria-label="" aria-describedby="button-addon2" value="{{request()->email}}">
            <div class="input-group-append">
                <button class="btn btn-success" type="submit" id="button-addon2"><i class="fa fa-search"></i> Search</button>
            </div>
            </div>
        </form>
        @if(request()->has('email'))
        <div class="row pb-4">
            <div class="col-lg-12 text-center">
                <h4>Busqueda realizada para : <mark>{{request()->email}}</mark></h4>
                <a class="btn btn-success" href="{{route('index')}}"><i class="fas fa-home"></i> All results</a>
            </div>
        </div>

        @endif

        @if(count($jsonArray) == 0)
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4>Sin resultados</h4>
                </div>
            </div>
        @else

        <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Position</th>
            <th scope="col">Salary</th>
            <th scope="col">View</th>
        </tr>
        </thead>
        <tbody>

        @foreach($jsonArray as $row)
        <tr>
            <td>{{$row->name}}</td>
            <td>{{$row->email}}</td>
            <td>{{$row->position}}</td>
            <td>{{$row->salary}}</td>
            <td><a href="{{route('detail', ['id'=>$row->id])}}" class="btn btn-primary btn-sm">View detail</a>
            </td>

        </tr>
        @endforeach
        </tbody>
        </table>
         @endif

        <hr>


        <div class="card border-secondary mb-3" >
            <div class="card-header"><i class="fas fa-align-justify"></i> Web Service XML </div>
            <div class="card-body text-secondary">
                <h5 class="card-title"></h5>

                <form class="form-inline row" target="_blank" method="GET" action="{{route('webservice')}}">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only">Min</label>
                        <input type="number" name="min" class="form-control" id="" placeholder="Min Salary" required>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only">Password</label>
                        <input type="number" name="max"  class="form-control" id="" placeholder="Max Salary" required>
                    </div>
                    <button type="submit" class="btn btn-success mb-2"><i class="fa fa-check"></i> Servicio Web</button>
                </form>
            </div>
        </div>




@endsection
