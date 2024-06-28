<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsletter extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'content'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($newsletter) {
            $newsletter->deleted_at = now();
            $newsletter->save();
        });

        static::deleted(function ($newsletter) {
            if ($newsletter->deleted_at->diffInMinutes(now()) >= 2) {
                $newsletter->forceDelete();
            }
        });
    }
}
