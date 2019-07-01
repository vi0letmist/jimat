<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use GrahamCampbell\Mardown\Facades\Markdown;

class Post extends Model
{
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
