<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    use HasFactory;
    use Sluggable;
    
    protected $fillable = [
        'nama_karyawan','slug','alamat','no_hp','jenis_kelamin'
    ];

    public function sluggable(): array
    {
        return[
            'slug'=> [
                'source'=>'nama_karyawan'
            ]
        ];
    }
}
