<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Section;

class Quizze extends Model
{
    use HasTranslations;
    public $translatable = ['name'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id' , 'id');
    }



    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id' , 'id');
    }


    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id' , 'id');
    }


    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id' , 'id');
    }


    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id' , 'id');
    }
}
