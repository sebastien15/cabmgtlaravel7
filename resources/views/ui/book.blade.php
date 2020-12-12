@extends('layouts.front')
@section('content')
<research></research>
{{-- <book-header></book-header> --}}
{{-- <no-cab></no-cab> --}}
@guest
<cab-list></cab-list>
@else
<cab-list :user="{{ Auth::user() }}"></cab-list>
@endguest
@endsection