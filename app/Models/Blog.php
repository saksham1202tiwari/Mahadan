<?php

namespace App\Models;

use App\Traits\Multitenancy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use tizis\laraComments\Contracts\ICommentable;
use tizis\laraComments\Traits\Commentable;

class Blog extends Model implements HasMedia, ICommentable
{
    use HasFactory;
    use Multitenancy;
    use InteractsWithMedia;
    use Commentable;


    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function scopeApproved($query)
    {
        return $query->where('approved', true);
    }
    public function getDisplayImage()
    {
        if ($this->hasMedia() && $this->getFirstMediaUrl() !== null) {
            return $this->getFirstMediaUrl();
        }
        return asset('images/cause1.jpg');
    }
}
