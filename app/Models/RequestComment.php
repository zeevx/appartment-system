<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestComment extends Model
{
    use HasFactory;

    public function request()
    {
        return $this->belongsTo(Request::class);
    }
}
