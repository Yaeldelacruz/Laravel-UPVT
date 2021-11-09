<div class="mb-4">
    {!! Form::label('title', 'Titulo del curso') !!}
    {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1'. ($errors->has('title') ? ' border-red-600': '')]) !!}

    @error('title')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror

</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug del curso') !!}
    {!! Form::text('slug', null, ['readonly' => 'readonly' ,'class' => 'form-input block w-full mt-1'. ($errors->has('slug') ? ' border-red-600': '')]) !!}

    @error('slug')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror

</div>

<div class="mb-4">
    {!! Form::label('subtitle', 'Subtitulo del curso') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1'. ($errors->has('subtitle') ? ' border-red-600': '')]) !!}

    @error('subtitle')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror

</div>

<div class="mb-4">
    {!! Form::label('description', 'Descripcion del curso') !!}
    {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1'. ($errors->has('description') ? ' border-red-600': '')]) !!}

    @error('description')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror

</div>

<div class="grid grid-cols-2 gap-4">

    <div>
        {!! Form::label('category_id', 'Categoria') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>

    <div>
        {!! Form::label('level_id', 'Niveles') !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>

</div>

<h1 class="text-2xl mt-8 mb-2 font-bold">Imagen del curso</h1>
<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
            <img id="picture" class="w-full h-64 bg-cover bg-center" src="{{Storage::url($course->image->url)}}" alt="">
        @else
            <img id="picture" class="w-full h-64 bg-cover bg-center" src="https://lh3.googleusercontent.com/463IwzOHzOVbDSbgfJ63Qyw2x_fgnPcfnHio9rig3QdAhiwdok0HmM4QHVpMecaHhLjR1w=s151" alt="">
        @endisset
    </figure>

    <div>
        <p class="mb-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus iste debitis sapiente
        ducimus alias aperiam voluptate voluptas laborum ullam mollitia dolores culpa, nihil illum
        consectetur voluptatibus cum veniam error blanditiis!</p>
        {!! Form::file('file', ['class' => 'form-input w-full'. ($errors->has('file') ? ' border-red-600': ''), 'id' => 'file', 'accept' => 'image/*']) !!} <!-- Aqui solo se validan las 
        imagenes por si alguien ademas de querer poner todos los archivos en la ventana emergente para seleccionar archivos, se protege a nivel
        de frontend con el accept y con back en el controlador coursecontroller-->

        @error('file')
            <strong class="text-xs text-red-600">{{$message}}</strong>
        @enderror
    </div>
</div>