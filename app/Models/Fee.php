<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use App\Models\Grade;
use App\Models\Classroom;

class Fee extends Model
{
    use HasTranslations;
    public $translatable = ['title'];
    protected $fillable=['title','amount','Grade_id','Classroom_id','year','description','Fee_type'];


    // علاقة بين الرسوم الدراسية والمراحل الدراسية لجب اسم المرحلة

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id','id');
    }


    // علاقة بين الصفوف الدراسية والرسوم الدراسية لجب اسم الصف

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'Classroom_id' , 'id');
    }
}
