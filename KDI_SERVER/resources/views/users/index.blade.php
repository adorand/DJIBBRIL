@extends('layouts.app')

@section('content')
  <h2>Users list</h2>
  <ul>
  @foreach($users as $user)
    <li>{{ $user->username }}</li>
  @endforeach
  </ul>
@stop
