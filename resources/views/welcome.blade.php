<x-app-layout>
    {{--Portada--}}
    <section class = "bg-cover" style="background-image: url({{asset('img/home/home.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">UPVT</h1>
                <p class="text-white text-lg mt-2 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, 
                quae? Aliquid porro soluta in doloribus, dolor at et provident deserunt recusandae 
                blanditiis aliquam mollitia nostrum aperiam vitae illo eveniet facilis?</p>
        
                @livewire('search')

            </div>
        </div>
    </section>

    <section class="mt-24">
        <h1 class="text-gray-600  text-center text-3xl mb-6">Contenido</h1>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/1.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Cursos y proyectos</h1>
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
    </section>

    <section class="mt-24 bg-blue-700 py-12">
        <h1 class="text-center text-white text-3xl ">Este curso</h1>
        <p class="text-center text-white">Texto</p>
        <div class="flex justify-center mt-4">
            <a href="{{route('courses.index')}}" class="py-2 px-4 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
                Click me
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