@extends('adminlte::page')

@section('title', 'UPVT')

@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')
    <p>Bienvenido al panel administrador de la Universidad Politecnica del Valle de Toluca</p>
    @livewire('admin.users-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop