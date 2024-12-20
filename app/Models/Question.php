<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function answers(){
        return $this->hasMany(QuestionAnswer::class);
    }

    public function templates(){
        return $this->belongsToMany(Template::class, 'templates_questions');
    }

}
