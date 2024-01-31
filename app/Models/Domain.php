<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;
     protected $fillable = [
        'domain', 'status'
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }





}
