<x-app-layout>
    {{--Portada--}}
    <section class = "bg-cover" style="background-image: url({{asset('img/home/upvtlogo3.1.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">Universidad Politecnica del Valle de Toluca</h1>
                <p class="text-white text-lg mt-2 mb-4">La Universidad Politecnica del Valle de Toluca con el fin de combatir
                    el resago academico que se ha generado a partir del virus COVID 19 ha puesto a dispocision de los alumnos
                    la plataforma de cursos en linea, la cual podras consultas, buscar contenido dependiendo tu rama para poder
                    ayudarte a resolver problemas y seguir aprendiendo.
                </p>
        
                @livewire('search') 

            </div>
        </div>
    </section>

    <!--section class="mt-24">
        <h1 class="text-gray-600  text-center text-3xl mb-6">Otros contenidos</h1>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/1.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700"></h1>
                </header>
                <p class="text-sm text-gray-700">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam sequi odio sit</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/2.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Cursos y proyectos</h1>
                </header>
                <p class="text-sm text-gray-700">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam sequi odio sit</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/3.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Cursos y proyectos</h1>
                </header>
                <p class="text-sm text-gray-700">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam sequi odio sit</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/4.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Cursos y proyectos</h1>
                </header>
                <p class="text-sm text-gray-700">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam sequi odio sit</p>
            </article>
        </div>
    </section-->

    <section class="mt-24 bg-green-700 py-12">
        <h1 class="text-center text-white text-3xl ">Cursos de la Universidad</h1>
        <p class="text-center text-white">Estas son algunos cursos que estan disponibles para que sigas fortaleciendo tus conocimientos</p>
        <div class="flex justify-center mt-4">
            <a href="{{route('courses.index')}}" class="py-2 px-4 bg-red-700 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
                Todos los cursos
              </a>
        </div>
        
    </section>

    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-600">Recientes Cursos</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Listado de cursos</p>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
                    @isset($course->image)
                        <x-course-card :course="$course"/>
                        @else
                            {{--<!--otra imagen, una imagen de prueba
                            @for ($i = 0; $i <4; $i++)
                                <article>
                                    <img src="{{asset('img/home/1.jpg')}}" alt="">
                                </article>-->
                            @endfor--}}
                        @endisset
            @endforeach

        </div>
    </section>
</x-app-layout>    