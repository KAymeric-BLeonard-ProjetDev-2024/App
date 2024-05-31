<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
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
        "instructions",
        "quest",
        "file",
        "path",
        "testScript",
    ];

    protected $with = ['quest'];

    public function quest()
    {
        return $this->belongsTo(Quest::class,'quest');
    }

}
