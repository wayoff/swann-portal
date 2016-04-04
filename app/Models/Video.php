<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'title', 'description', 'name', 'extension', 'converted', 'featured'
    ];

    public function getMP4()
    {
        return url( config('swannportal.path.videos') . $this->name . '.' . 'mp4');
    }

    public function getOGG()
    {
        return url( config('swannportal.path.videos') . $this->name . '.' . 'ogg');
    }

    public function news()
    {
        return $this->hasOne(News::class);
    }
}
