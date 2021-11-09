<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        return view('courses.index'); 
    }
    public function show(Course $course){

        $this->authorize('published', $course); //Verifica el metodo authorize con el creado en la politica en CoursePolicy
        return view('courses.show', compact('course'));
    }
    public function enrolled(Course $course){
        $course->students()->attach(auth()->user()->id);

        return redirect()->route('courses.status', $course);
    }
}
