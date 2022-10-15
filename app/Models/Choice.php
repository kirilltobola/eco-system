<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function vote()
    {
        return $this->belongsTo(Vote::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
