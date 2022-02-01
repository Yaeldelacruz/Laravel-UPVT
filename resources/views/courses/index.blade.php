<x-app-layout> 
    {{--Cursos--}}
    <section class = "bg-cover" style="background-image: url({{asset('img/cursos/PortadaOficial.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">Universidad Politecnica del Valle de Toluca</h1>
                <p class="text-white text-lg mt-2 mb-4">La Universidad Politecnica del Valle de Toluca con el fin de combatir
                    el resago academico que se ha generado a partir del virus COVID 19 ha puesto a dispocision de los alumnos
                    la plataforma de cursos en linea, la cual podras consultas, buscar contenido dependiendo tu rama para poder
                    ayudarte a resolver problemas y seguir aprendiendo.</p>
        
                @livewire('search') 
            </div>
        </div>
    </section>
    @livewire('courses-index')
</x-app-layout> 