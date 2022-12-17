<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadedTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'file',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'employee_id');
    }
}
