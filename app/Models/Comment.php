<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function todo()
    {
        return $this->belongsTo(Todo::class);
    }
}

