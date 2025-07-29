<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    protected $fillable = ['name', 'description', 'due_data', 'status', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
