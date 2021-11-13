<div>
    <div class="bg-gray-200 py-4 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4" wire:click=" resetFilters">
                <i class="fas fa-box-open text-xs mr-2"></i>
                Todos los cursos
            </button>
            <!-- Dropdown categorias-->
            <div class="relative" x-data = "{ abrir:false }">
                <button class=" px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click = "abrir = true">
                    <i class="fas fa-list-ul text-sm mr-2"></i>
                    Categoria
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show = "abrir" x-on:click.away = "abrir = false">   
                    @foreach ($categories as $category)
                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-green-700 hover:text-white" wire:click = "$set('category_id', {{$category->id}})" x-on:click = "abrir=false">{{$category->name}}</a>
                    @endforeach
                    
                </div>
                <!-- // Dropdown Body -->
            </div>
            <!-- Dropdown niveles-->
            <div class="relative" x-data = "{ abrir:false }">
                <button class=" ml-4 px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click = "abrir = true">
                    <i class="fas fa-list-ul text-sm mr-2"></i>
                    Niveles
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show = "abrir" x-on:click.away = "abrir = false">   
                    @foreach ($levels as $level)
                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-green-700 hover:text-white" wire:click = "$set('level_id', {{$level->id}})" x-on:click = "abrir=false">{{$level->name}}</a>
                    @endforeach
                </div>
                <!-- // Dropdown Body -->
            </div>
        </div>
    </div> 

    
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

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 mb-8">
        {{$courses->links()}}
    </div>
</div>
