<?php
namespace App\Pesi\Traits;

use App\Institucion;

trait UserTrait{

    public function roles()
    {
        return $this->belongsToMany('App\Pesi\Models\Role')->withTimestamps();
    }

    public function institucion()
    {
        return $this->hasOne('App\Institucion', 'id_inst', 'id_inst');
    }

    public function havePermission($permission)
    {
        foreach($this->roles as $role)
        {
            if($role['full-access'] == 'yes')
            {
                return true;
            }
            foreach($role->permissions as $perm)
            {
                if($perm->slug == $permission)
                {
                    return true;
                }
            }
        }
        return false;
    }
    
    public function authorizeRoles($roles)
    {
        abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                 return true; 
            }   
        }
        return false;
    }
    
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
}