<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kaizen extends Model
{
    use HasFactory;

    public const AUTHOR = 'author';
    public const BS_SPECIALIST = 'bs_specialist';

    protected $fillable = [
        'name',
        'description',
        'improvement',
        'result',
        'reference_number'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function authors()
    {
        return $this->belongsToMany(User::class)->wherePivot('type', 'author');
    }

    public function implementationGroup()
    {
        return $this->belongsToMany(User::class)->wherePivot('type', 'implementation_group');
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function bsSpecialist()
    {
        return $this->belongsTo(User::class, 'bs_specialist_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
}
