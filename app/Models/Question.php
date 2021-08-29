<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Quizze;

class Question extends Model
{
    public function quizze()
    {
        return $this->belongsTo(Quizze::class);
    }
}
