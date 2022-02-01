@extends('adminlte::page')

@section('title', 'UPVT')

@section('content_header')
    <h1>Universidad Politecnica del Valle de Toluca</h1>
@stop

@section('content')
    <p>Bienvenido al panel administrador de la Universidad Politecnica del Valle de Toluca.</p>
    <p>En esta vista se puede consultar lo siguiente: </p>
    <p>1._ Ver la lista de roles: En este punto, se puede ver los roles que se tienen como lo son de profesor o administrador.</p>
    <p>2._ Ver los usuarios: Donde se puede encontrar todo usuario perteneciente a la comunidad universitaria, se puede realizar el cambio de roles, entre otras cosas.</p>
    <p>3._ Categorias: Se puede agregar una nueva categoria para agregar en un curso.</p>
    <p>4._ Niveles: Se puede agregar un nuevo nivel para agregar en un curso.</p>
    <p>5._Cursos pendientes: En esta seccion se puede verificar un curso para su posterior publicacion en la vista principal de los cursos.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop