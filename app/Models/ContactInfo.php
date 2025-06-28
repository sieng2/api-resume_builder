<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    protected $primaryKey = 'info_id';
    protected $table = 'contact_info';

    protected $fillable = [
        'resume_id',
        'full_name',
        'phone',
        'address',
        'summary',
    ];

    public $timestamps = false;

    public function resume()
    {
        return $this->belongsTo(Resume::class, 'resume_id', 'resume_id');
    }
    public function contactInfo()
    {
        return $this->hasOne(ContactInfo::class, 'resume_id', 'resume_id');
    }
}
