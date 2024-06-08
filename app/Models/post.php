<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'post_users');
    }
}
