@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Employees - <a href="/employee/create">New</a></div>
                <form method="POST" action="/employee/search">
                  {{ csrf_field() }}
                  <input class="form-control" id="search" type="text" name="name" placeholder="type a name here">
                  <button type="submit" id="search_submit" class="btn btn-primary">
                      Find
                  </button>
                </form>
                <div class="panel-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Salary</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                        <tr>
                          <th scope="row">{{$user->id}}</th>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->role}}</td>
                          <td>{{$user->phone}}</td>
                          <td>{{$user->address}}</td>
                          <td>{{$user->salary}}</td>
                          <td><a href="/employee/{{$user->id}}/edit">edit</a></td>
                          <td><a href="/employee/{{$user->id}}/delete">delete</a></td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
