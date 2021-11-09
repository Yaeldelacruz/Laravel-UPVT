<div>
    <section>
        <h1 class="text-2xl font-bold">Requerimientos del curso</h1>
        <hr class="mt-2 mb-6">
    
        @foreach ($course->requirements as $requirement1)
            <article class="card mb-4">
                <div class="card-body bg-gray-100">
                    @if ($requirement->id == $requirement1->id)
                        
                        <form wire:submit.prevent="update">
                            <input wire:model="requirement.name" class="form-input w-full">
    
                            @error('requirement.name')
                                <span class="text-xs text-red-500">{{$message}}</span>
                            @enderror
                        </form>
    
                    @else
    
                        <header class="flex justify-between">
                            <h1>{{$requirement1->name}}</h1>
                            
                            <div>
                                <i wire:click="editar({{$requirement1}})" class="fas fa-edit text-blue-500 cursor-pointer"></i>
                                <i wire:click="destroy({{$requirement1}})" class="fas fa-trash text-red-500 cursor-pointer ml-2"></i>
                            </div>
                        </header>
    
                    @endif
                </div>
            </article>
        @endforeach
    
        <article class="card">
            <div class="card-body bg-gray-100">
                <form wire:submit.prevent="store">
                    <input wire:model="name" class="form-input w-full" placeholder="Agregar nombre del requerimiento">
    
                    @error('name')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                    <div class="flex justify-end mt-2">
                        <button type="submit" class="btn btn-primary">Agregar requerimiento</button>
                    </div>
                </form>
            </div>
        </article>
    </section>
    
</div>
