@extends('layouts.front')

@section('content')
<user-page :user="{{ Auth::user() }}"></user-page>
@endsection