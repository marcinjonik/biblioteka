<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    public function category(){
        return $this->BelongsTo('App\Models\Category');
    }

    public function author(){
        return $this->BelongsTo('App\Models\Author');
    }

    public function borrow(){
        return $this->hasMany('App\Models\Borrow');
    }
}
