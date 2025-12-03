<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';
    protected $fillable = ['tag', 'article_id'];
    public function article()
    {
        return $this->belongsTo(Articles::class, 'article_id');
    }
}
