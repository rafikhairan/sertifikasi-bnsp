@extends('layouts.main')

@section('content')
  <h3>Welcome, {{ auth()->user()->name }}</h3>
@endsection