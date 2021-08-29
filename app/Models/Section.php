<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use App\Models\Classroom;
use App\Models\Teacher;

class Section extends Model
{
    use HasTranslations;
    public $translatable = ['Name_Section'];
    protected $fillable=['Name_Section','Grade_id','Class_id'];

    protected $table = 'sections';
    public $timestamps = true;


    // علاقة بين الاقسام والصفوف لجلب اسم الصف في جدول الاقسام

    public function My_classs()
    {
        return $this->belongsTo(Classroom::class, 'Class_id' , 'id');
    }

    // علاقة الاقسام مع المعلمين
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,'teacher_section' , 'id');
    }

}
