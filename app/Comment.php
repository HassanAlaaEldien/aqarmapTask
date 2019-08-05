<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    /**
     * @var string
     */
    protected $table = 'comments';

    /**
     * @var array
     */
    protected $fillable = ['comment', 'article_id'];

    /**
     * @return BelongsTo
     */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
