<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'title',
        'slug'
    ];
    use HasFactory;
    public function projects() {
        return $this->hasMany(Project::class);
    }

}
