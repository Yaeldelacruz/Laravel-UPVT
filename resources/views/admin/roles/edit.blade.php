@extends('adminlte::page')

@section('title', 'UPVT')

@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')
    <p>Bienvenido al panel administrador para administrar los roles.</p>
    <div class="card">
        <div class="card-body">
            <!--Se crea un nuevo fomrulario con laravel collective para iniciar es form::open y cierre form::close con la ruta store
            gracias al metodo post--> 
            {!! Form::model($role,['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
               <!-- Se extiende de una platilla ya que se utiliza el mismo formulario en otras vistas de este CRUD en la carpeta admin/roles/partials,
                el archivo form.blade.php--> 
                @include('admin.roles.partials.form')

                {!! Form::submit('Actualizar rol', ['class' => 'btn btn-primary mt-2']) !!}

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