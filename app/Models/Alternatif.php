<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alternatif extends Model
{
    use HasFactory;
    use Sluggable;
    
    protected $fillable = [
        'alteratif','slug','k1','k2','k3','k4','k5'
    ];

    public function sluggable(): array
    {
        return[
            'slug'=> [
                'source'=>'alteratif'
            ]
        ];
    }
}
