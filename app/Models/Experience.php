<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $table = 'experience';
    protected $primaryKey = 'exp_id';

    protected $fillable = [
        'resume_id',
        'company_name',
        'job_title',
        'start_date',
        'end_date',
        'description',
    ];

    public $timestamps = false;

    public function resume()
    {
        return $this->belongsTo(Resume::class, 'resume_id', 'resume_id');
    }
}
