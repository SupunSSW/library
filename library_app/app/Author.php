<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    protected $fillable = ['fname', 'lname'];

    public function book() {
        return $this->hasMany(Book::class);
    }
}
