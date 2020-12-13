@extends('layouts.front')

@section('content')
<user-profile :user="{{ Auth::user() }}"></user-profile>
@endsection