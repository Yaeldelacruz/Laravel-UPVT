<div class="form-group">
    <!-- Aqui son etiquetas de html como lo son etiquetas tipo input ejemplo <input type="text" name="nombre" >-->
    {!! Form::label('name', 'Nombre: ')!!}
    <!-- Este form verifica que el campo nombre este lleno y utiliza un operador condicional en el cual si esta lleno lo deja en nulo de lo contrario
    lo marcara de rojo con la clase de bootstrap is-invalid-->
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Escriba un nombre: ']) !!}
    @error('name')
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
    @enderror
</div>
<strong>Permisos</strong>
@error('permissions')
        <small class="text-danger">
            <br>
            <strong>{{$message}}</strong>
            <br>
        </small>
@enderror

@foreach ($permissions as $permission)
    <div>
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
            {{$permission->name}}
        </label>
    </div>    
@endforeach
