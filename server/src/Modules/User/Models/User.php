<?php

namespace Mega\Modules\User\Models;

use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use Bican\Roles\Traits\HasRoleAndPermission;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Mega\Services\Core\Model\Abstracts\Model;
use Mega\Services\Authentication\Portals\TokenTrait;

/**
 * Class User
 *
 * @type Model
 * @package  Mega\Modules\User\Models
 * @author   Mahmoud Zalt <mahmoud@zalt.me>
 */
class User extends Model implements
    AuthenticatableContract,
    CanResetPasswordContract,
    HasRoleAndPermissionContract
{

    use Authenticatable, CanResetPassword, TokenTrait, HasRoleAndPermission;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'token'
    ];
    
}
