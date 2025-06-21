<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $table = 'resume';
    protected $primaryKey = 'resume_id';

    protected $fillable = [
        'user_id',
        'template_id',
        'name',
        'description',
        'status',
        'image_url',
        'code',
        'share_url',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function template()
    {
        return $this->belongsTo(Template::class, 'template_id', 'template_id');
    }
}
