@extends('adminlte::page')

@section('title', 'UPVT')

@section('content_header')
    <h1>Creacion de nuevos roles</h1>
@stop

@section('content')
    <p>Panel administrador de la Universidad Politecnica del Valle de Toluca</p>
    <div class="card">
        <div class="card-body">
            <!--Se crea un nuevo fomrulario con laravel collective para iniciar es form::open y cierre form::close con la ruta store
            gracias al metodo post--> 
            {!! Form::open(['route' => 'admin.roles.store']) !!}
               <!-- Se extiende de una platilla ya que se utiliza el mismo formulario en otras vistas de este CRUD en la carpeta admin/roles/partials,
                el archivo form.blade.php--> 
                @include('admin.roles.partials.form')

                {!! Form::submit('Crear rol', ['class' => 'btn btn-primary mt-2']) !!}

            {!! Form::close() !!}
        </div>
    </div>
    @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop