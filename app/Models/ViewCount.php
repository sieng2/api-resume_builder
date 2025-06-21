<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewCount extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'view_count';

    public $timestamps = false;

    protected $fillable = [
        'resume_id',
        'user_id',
        'count',
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class, 'resume_id', 'resume_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
