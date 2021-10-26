<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    public function user(){
        return $this->BelongsTo('App\Models\User');
    }

    public function book(){
        return $this->BelongsTo('App\Models\Book');
    }
}
