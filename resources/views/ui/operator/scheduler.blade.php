@extends('layouts.app')

@section('content')
<operatorscheduler :user="{{ Auth::user() }}"></operatorscheduler>
{{-- {{ auth()->user()->name }} --}}
@endsection



