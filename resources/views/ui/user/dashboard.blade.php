@extends('layouts.front')

@section('content')
<user-dashboard :user="{{ Auth::user() }}"></user-dashboard>
@endsection