@extends('layouts.admin')

@section('content')


    <h1>Posts</h1>

    <table class="table table-striped">
        <thead>
          <tr>
              <th>id</th>
              <th>Photo</th>
              <th>user</th>
              <th>category</th>
              <th>Title</th>
              <th>Body</th>
              <th>Created at</th>
              <th>Updated at</th>
          </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
            <td><img width="50px" height="50px" src="{{$post->photo ? $post->photo->file:'http://placehold.it/400x400'}}"></td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>


@stop