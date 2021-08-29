<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Student;

class PaymentStudent extends Model
{
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id' , 'id');
    }
}
