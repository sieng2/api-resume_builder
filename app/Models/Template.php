<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $primaryKey = 'template_id';
    protected $table = 'template';

    protected $fillable = [
        'name',
        'status',
        'template_html',
        'template_url',
    ];

    public $timestamps = false; // since only created_at present?

    protected $dates = [
        'created_at',
    ];

    public function resumes()
    {
        return $this->hasMany(Resume::class, 'template_id', 'template_id');
    }
}
