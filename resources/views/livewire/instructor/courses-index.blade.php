<div class="container py-8">
    <!-- This example requires Tailwind CSS v2.0+ -->

<x-table-responsive>

    <div class="px-6 py-4 flex">
        <input type="text" wire:keydown="limpiar_page" wire:model="search" class="rounded form-input w-full shadow-sm flex-1" placeholder="Ingresa el nombre de un curso">
        <a class="btn btn-danger ml-2" href="{{route('instructor.courses.create')}}">Crear nuevo curso</a>
    </div>

    @if ($courses->count())

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Nombre
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Matriculados
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Estado
            </th>
            <th scope="col" class="relative px-6 py-3">
              <span class="sr-only">Edit</span>
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($courses as $course)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                      @isset($course->image)
                        <img class="h-10 w-10 rounded-full bg-cover bg-center" src="{{Storage::url($course->image->url)}}" alt="">
                      @else
                        <img class="h-10 w-10 rounded-full bg-cover bg-center" src="https://lh3.googleusercontent.com/463IwzOHzOVbDSbgfJ63Qyw2x_fgnPcfnHio9rig3QdAhiwdok0HmM4QHVpMecaHhLjR1w=s151" alt="">
                      @endisset
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{$course->title}}
                      </div>
                      <div class="text-sm text-gray-500">
                        {{$course->category->name}}
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{$course->students->count()}}</div>
                  <div class="text-sm text-gray-500">Alumnos matriculados</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">

                    @switch($course->status)
                        @case(1)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Borrador
                                </span>
                            @break
                        @case(2)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Revision
                                </span>
                            @break
                        @case(3)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Publicado
                                </span>
                            @break
                        @default
                            
                    @endswitch
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a href="{{route('instructor.courses.edit', $course)}}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                </td>
              </tr>
            @endforeach
          

          <!-- More people... -->
        </tbody>
      </table>
      <div class="px-6 py-3">
        {{$courses->links()}}
      </div>
    @else 
     <div class="px-6 py-4">
         No hay ningun registro coincidente
     </div>
    @endif

    </x-table-responsive> 
  
</div>
