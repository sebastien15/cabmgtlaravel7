@extends('layouts.app')

@section('content')
<operatorlocation :user="{{ Auth::user() }}"></operatorlocation>
@endsection



