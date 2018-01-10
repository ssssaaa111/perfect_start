<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','plan'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);

    }

    public function publish(Post $post)
    {
        $this->posts()->save($post);
    }

    public function subscribed($plan = null)
    {
        if ($plan) {
            return $this->plan == $plan;
        }
        return $this->plan;
        
    }

    public function owns($relationship)
    {
        return $this->id == $relationship->user_id;

    }


}
