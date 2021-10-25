@props(['course'])

<article class="card">
    <img class="h-36 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">

    <div class="card-body">
        <h1 class="card-title">{{Str::limit($course->title, 40)}}</h1>
        <p class="text-gray-500 text-sm mb-2">Prof: {{$course->teacher->name}}</p>
        {{--<ul class="flex text-sm">
            <li>
                <i class="fas fa-star"></i>
            </li>
            <li>
                <i class="fas fa-star"></i>
            </li>
            <li>
                <i class="fas fa-star"></i>
            </li>
            <li>
                <i class="fas fa-star"></i>
            </li>
            <li>
                <i class="fas fa-star"></i>
            </li>
        </ul>--}}
        <p class="text-sm text-green-500 ml-auto">
            <i class="fas fa-users"></i>
            {{$course->students_count}}
        </p>
        
    </div>
    <div class="px-6 py-4 ">
        <a  href="{{route('courses.show', $course)}}" class="mt-4 btn btn-primary btn-block">
            Entrar
        </a>
    </div>
</article>