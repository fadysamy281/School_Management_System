<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Section;
use App\Models\Student;
use App\Models\Fee;

class Fee_invoice extends Model
{
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id' , 'id');
    }


    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'Classroom_id', 'id');
    }


    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function fees()
    {
        return $this->belongsTo(Fee::class, 'fee_id', 'id');
    }
}
