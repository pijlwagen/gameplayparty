<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    /**
     * Tell laravel which table to use
     * @var string
     */
    protected $table = 'blocks';

    /**
     * Laravel will be able to edit data in these columns
     * @var array
     */
    protected $fillable = ['content', 'name', 'slug'];

    /**
     * Render a textblock via the slug
     * @param $slug
     * @return string
     */
    public static function render($slug)
    {
        return Block::where('slug', $slug)->first()->content ?? '';
    }
}
