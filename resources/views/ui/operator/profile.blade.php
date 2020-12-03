@extends('layouts.app')

@section('content')
<operatorProfile :user="{{ Auth::user() }}"></operatorProfile>
@endsection
