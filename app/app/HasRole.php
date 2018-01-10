<?php
/**
 * Created by PhpStorm.
 * User: zunhui
 * Date: 2017/7/24
 * Time: 下午10:59
 */

namespace App;


trait HasRole
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        if(is_string($role)){
            return $this->roles->contains('name', $role);
        }
        return !! $role->intersect($this->roles)->count();
        /*foreach ($role as $r){
            if($this->hasRole($r->name)){
                return true;
            }
        }*/
    }

    public function assignRole($role)
    {
        return $this->roles()->save(
            Role::whereName($role)->firstOrFail()
        );
    }
}