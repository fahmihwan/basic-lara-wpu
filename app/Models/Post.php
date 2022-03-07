<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;              //library namanya Eloquent-Sluggable = untuk membuat slug otomatis

class Post extends Model
{
    use HasFactory, Sluggable;
    // use Sluggable;

    protected $fillable = ['category_id', 'user_id', 'title', 'slug', 'image', 'excerpt', 'body'];
    protected $with = ['category', 'author'];


    public function scopeFilter($query, array $filters)
    {
        // <!-- OPSI 1 -->
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }

        // <!-- OPSI 2 sudah di koreksi oleh WPU-->
        $query->when($filters['search'] ?? false, function ($q, $s) {
            return $q->where(function ($q) use ($s) {
                $q->where('title', 'like', '%' . $s . '%')
                    ->orWhere('body', 'like', '%' . $s . '%')
                    ->orWhere('excerpt', 'like', '%' . $s . '%');
            });
        });

        $query->when($filters['category'] ?? false, function ($q, $c) {     //tidak menggunakan arrow function 
            return $q->whereHas('category', function ($q) use ($c) {
                $q->where('slug', $c);
            });
        });

        $query->when($filters['author'] ?? false, function ($q, $a) {
            $q->whereHas('author', function ($q) use ($a) {
                $q->where('username', $a);
            });
        });

        // $query->when(                                                    //versi menggunakna arrow function
        //     $filters['author'] ?? false,
        //     fn ($query, $a) => $query->whereHas(
        //         'author',
        //         fn ($query) =>
        //         $query->where('username', $a)
        //     )
        // );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()        //fitur bawaan laravel untuk menduplicate id menjadi slug jadi yang keluar akan slug nantinya bukan id
    {
        return 'slug';
    }

    public function sluggable(): array      //library namanya Eloquent-Sluggable = untuk membuat slug otomatis
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
