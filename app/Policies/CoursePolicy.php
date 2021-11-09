<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 
    }
    public function enrolled(User $user, Course $course){
        return $course->students->contains($user->id); //Este metodo verifica si el registro del usuario se encuentra en esta coleccion si se encuentra es true si no false
    }
    
    //Metodo para proteger las url de los borradores, y de los cursos publicados
    public function published(?User $user, Course $course){
        //Si es 3 retorna el curso de lo contrario impide el camino
        if($course->status == 3){
            return true;
        }else{
            return false;
        }
    }

    public function dicatated(User $user, Course $course){
        if($course->user_id == $user->id){
            return true;
        }
        else{
            return false;
        }
    }
    public function revision(User $user, Course $course){
        if ($course->status == 2) {
            return true;
        }
        else{
            return false;
        }
    }
}
