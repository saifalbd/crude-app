<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['disk','file_name','path'];

    protected $appends = ['url'];


    public function getUrlAttribute()
    {
        return Storage::disk($this->disk)->url($this->path);
    }
  
}
