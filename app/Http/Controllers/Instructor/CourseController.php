<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Level;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:Leer cursos')->only('index');
        $this->middleware('can:Crear cursos')->only('create', 'store');
        $this->middleware('can:Actualizar cursos')->only('edit', 'update', 'goals');
        $this->middleware('can:Eliminar cursos')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructor.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        return view('instructor.courses.create', compact('categories', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses',
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'file' => 'image',
        ]);

        $course = Course::create($request->all());

        if($request->file('file')){
           $url = Storage::put('courses',$request->file('file')); //Se genera una carpeta de imagenes donde se alojan las imagenes de los cursos
           /* y si se quiere cambiar el nombre de la carpeta se tiene que ir a el factory del database en el seeder de imagenes cambiar 
           tambien el nombre de courses por el nombre deseado*/
        
        $course->image()->create([
            'url' => $url
        ]);
        }

        return redirect()->route('instructor.courses.edit', $course);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('instructor.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $this->authorize('dicatated', $course);

        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        
        return view('instructor.courses.edit', compact('course', 'categories', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->authorize('dicatated', $course);

        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses,slug,' . $course->id, //Se ignoran los cursos con ese id es decir los que esten en la DB
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'file' => 'image',
        ]);

       $course->update($request->all());

       if($request->file('file')){ /*Si se esta enviando una imagen desde el formulario, se va a subir la imagen a la carpeta courses 
        en la variable url*/
           $url = Storage::put('courses', $request->file('file'));

           if($course->image){ /*Si el curso ahora ya tenia una imagen asociada, lo que hace es eliminarla, de courses y despues se actualiza*/
               Storage::delete($course->image->url);

               $course->image->update([
                   'url' => $url
               ]);
           }
           else{ /* Caso contrario se crea un nuevo registro en image */
               $course->image()->create([
                   'url' => $url
               ]);           
            }
       }

       return redirect()->route('instructor.courses.edit', $course);

    }

    public function goals(Course $course){
        $this->authorize('dicatated', $course);
        return view('instructor.courses.goals', compact('course'));
    }

    public function status(Course $course){

        $course->status = 2; //Se actualiza en la BD
        $course->save();

        if($course->observation){
            $course->observation->delete();    
        }
        
        return redirect()->route('instructor.courses.edit', $course);
    }

    public function observation(Course $course){
        return view('instructor.courses.observation', compact('course'));
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        $course = Course::find($course->id);
        return redirect()->route('instructor.courses.index')->with('info', 'El curso se ha eliminado con exito!');

        /*return redirect()->route('instructor.courses-index', $course)->with('info', 'El curso se ha eliminado con exito');*/
    }
}
