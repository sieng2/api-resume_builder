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
        'user_id',
        'full_name',
        'phone',
        'address',
        'summary',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
