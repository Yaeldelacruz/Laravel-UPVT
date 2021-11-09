<x-app-layout>
    <section class="bg-gray-700 py-12 mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                @if ($course->image)
                    <img class="h-60 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
                @else
                    <img class="h-60 w-full bg-cover bg-center" src="https://lh3.googleusercontent.com/463IwzOHzOVbDSbgfJ63Qyw2x_fgnPcfnHio9rig3QdAhiwdok0HmM4QHVpMecaHhLjR1w=s151" alt="">
                @endif
                
            </figure>

            <div class="text-white">
                <h1 class="text-4xl ">{{$course->tile}}</h1>
                <h2 class="text-xl mb-3">{{$course->subtitle}}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{$course->level->name}}</p>
                <p class="mb-2"><i class=""></i>Categoria: {{$course->category->name}}</p>
                <p class="mb-2"><i class="fas fa-users"></i>Matriculados: {{$course->students_count}}</p>
            </div>
        </div>
    </section>

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">

        @if (session('info'))
            <div class="lg:col-span-3" x-data="{open: true}" x-show="open">
                <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                    <span class="absolute inset-y-0 left-0 flex items-center ml-4">
                      <svg x-on:click="open=false" class="cursor-pointer w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                    </span>
                    <p class="ml-6"><a class="font-bold">Ocurrio un error! </a>{{session('info')}}</p>
                </div>
            </div>
            
        @endif

        <div class="order-2 lg:col-span-2">

            {{--Metas--}}
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">Lo que aprenderas</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">

                        @forelse ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"></i>{{$goal->name}}</li>
                        @empty
                            <li class="text-base">Este curso no tiene asigando ninguna meta</li>
                        @endforelse

                    </ul>
                </div>
            </section>
            {{--Temario--}}
            <section class="mb-12">
                <h1 class="font-bold text-3xl mb-2">Temario</h1>
                @forelse ($course->sections as $section)

                    <article class="mb-4 shadow " 
                    @if ($loop->first)
                        x-data="{abrir:true}"
                    @else
                        x-data="{abrir:false}"
                    @endif
                    >
                        <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200" x-on:click="abrir=!abrir">
                            <h1 class="font-bold text-lg text-gray-600">{{$section->name}} <i class="fas fa-angle-down text-sm ml-5"></i></h1>
                        </header>
                        <div class="bg-white py-2 px-4" x-show="abrir">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base"><i class="fas fa-play-circle mar-2 text-gray-600"></i>{{$lesson->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </article>

                @empty
                    <article class="card">
                        <div class="card-body">
                            Este curso no tiene ninguna seccion asignada
                        </div>
                    </article>
                @endforelse
            </section>
            {{--Requisitos--}}
            <section class="mb-8">
                <h1 class="font-bold text-3xl">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @forelse ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{$requirement->name}}</li>
                    
                    @empty
                        <article class="card">
                            <div class="card-body">
                                Este curso no tiene ningun requerimiento
                            </div>
                        </article>
                    @endforelse
                </ul>
            </section>
            {{--Descripcion--}}
            <section class="mb-12">
                <h1 class="font-bold text-3xl">Desripcion</h1>

                <div class="text-base">
                    <article class="card">
                        <div class="card-body">
                            {!!$course->description!!}
                        </div>
                    </article>
                </div>
            </section>
        </div>

        <div class="order-1">
            <section class="card">
                <div class="card-body">

                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
                        <div class="ml-4">
                            <h1 class="font-bold  text-gray-500 text-lg">Prof. {{$course->teacher->name}}</h1>
                            <a class="text-blue-700 text-sm font-bold" href="">{{'@'. Str::slug($course->teacher->name, '')}}</a>
                        </div>
                    </div>
                    <form action="{{route('admin.courses.approved', $course)}}" class="mt-4" method="POST">
                        @csrf

                        <button class="btn btn-primary w-full" type="submit">Aprobar curso</button>

                    </form>

                    <a class="btn btn-danger w-full block text-center mt-4" href="{{route('admin.courses.observation', $course)}}">Observar curso</a>
                </div>  
            </section>

        </div>
    </div>
</x-app-layout>