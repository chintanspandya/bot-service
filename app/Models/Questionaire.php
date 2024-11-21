<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questionaire extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function templates(){
        return $this->belongsToMany(Template::class, 'templates_questions', 'template_id', 'question_id');
    }
}
