<x-app-layout> 
    {{--Cursos--}}
    <section class = "bg-cover" style="background-image: url({{asset('img/cursos/taza.jpg')}})">
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
    @livewire('courses-index')
</x-app-layout> 