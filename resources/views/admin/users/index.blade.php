@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_user'))
            <p class="bg-danger">{{session('deleted_user')}}</p>
        @endif
    <h1>Users</h1>
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Active</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>
        <tbody>

        @if($users)
            @foreach($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>

                      <td><img width="50px" height="50px" src="{{$user->photo ? $user->photo->file:'http://placehold.it/400x400'}}"></td>

                    <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                      @if($user->role!=null)
                            <td>{{$user->role->name}}</td>
                      @else
                          <td>Has no role</td>
                      @endif
                      @if($user->is_activate == 1)
                            <td style="color:green;">true</td>
                      @else
                            <td style="color: red;">false</td>
                      @endif
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                  </tr>
            @endforeach
        @endif
        </tbody>
      </table>

@stop