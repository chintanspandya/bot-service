<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function questions(){
        return $this->belongsToMany(Questionaire::class, 'templates_questions', 'template_id', 'question_id');
    }
}
