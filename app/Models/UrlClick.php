<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlClick extends Model
{
    use HasFactory;

    protected $fillable = ['url_id', 'ip', 'location'];

    public function url()
    {
        return $this->belongsTo(Url::class);
    }
}
