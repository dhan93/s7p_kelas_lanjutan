<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'message',
      'resent',
      'resent_by',
    ];

    public function users()
    {
      return $this->hasOne(User::class);
    }
}
