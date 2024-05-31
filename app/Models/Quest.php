<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "id",
        "name",
        "pool",
    ];

    protected $with = ['pool'];

    public function pool()
    {
        return $this->belongsTo(Pool::class,'pool');
    }
}
