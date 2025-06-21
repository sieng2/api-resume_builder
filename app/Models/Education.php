<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'education'; // <-- add this line
    protected $primaryKey = 'edu_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'school_name',
        'degree',
        'field',
        'start_date',
        'end_date',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
