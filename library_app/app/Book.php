<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = [ 'title', 'isbn', 'author_id' ];

    public function author() {
        return $this->belongsTo(Author::class);
    }
}
