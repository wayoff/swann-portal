<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'photo_id', 'video_id', 'title', 'content', 'name'
    ];

    protected function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    protected function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function when()
    {
        return Carbon::now()->diffForHumans($this->updated_at);
    }
}
