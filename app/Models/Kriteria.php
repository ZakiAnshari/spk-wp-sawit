<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kriteria extends Model
{
    use HasFactory;
    use Sluggable;
    
    protected $fillable = [
        'kriteria','slug','kepentingan','benefit',
    ];

    public function sluggable(): array
    {
        return[
            'slug'=> [
                'source'=>'kriteria'
            ]
        ];
    }
}
