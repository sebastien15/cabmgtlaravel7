@extends('layouts.app')
@section('content')
<operatordashboard :user="{{ Auth::user() }}"></operatordashboard>
@endsection
