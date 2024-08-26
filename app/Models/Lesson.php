<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'audio_file',
        'order',
    ];

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
