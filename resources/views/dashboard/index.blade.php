@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="flex justify-center items-center text-center">
    <h1>Dashboard</h1>
</div>
@stop

@section('content')


<div class="flex justify-center items-center text-center">
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(Auth::check())
    @if(Auth::user()->esAdmin())
    <p>Bienvenido, Admin {{ Auth::user()->nombre }}</p>
    @elseif(Auth::user()->esEmpleado())
    <p>Bienvenido, Empleado {{ Auth::user()->nombre }}</p>
    @endif
    @endif
</div>
@stop