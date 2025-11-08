<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'title_ua',
        'title_en',
        'description_ua',
        'description_en',
        'poster',
        'trailer_id',
        'release_year',
        'start_at',
        'end_at'
    ];
    public function screenshots()
    {
        return $this->hasMany(Screenshot::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function people()
    {
        return $this->belongsToMany(Person::class)
            ->withPivot('role');
    }

    public function actors()
    {
        return $this->people()->wherePivot('role', 'actor');
    }

    public function directors()
    {
        return $this->people()->wherePivot('role', 'director');
    }

    public function writers()
    {
        return $this->people()->wherePivot('role', 'writer');
    }

    public function composers()
    {
        return $this->people()->wherePivot('role', 'composer');
    }

}
