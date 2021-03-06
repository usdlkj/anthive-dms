<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App\Models
 * @version March 13, 2021, 12:24 pm UTC
 *
 * @property \App\Models\Company $company
 * @property \Illuminate\Database\Eloquent\Collection $mails
 * @property \Illuminate\Database\Eloquent\Collection $mail1s
 * @property \Illuminate\Database\Eloquent\Collection $projects
 * @property string $name
 * @property string $email
 * @property string|\Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property string $address
 * @property string $city
 * @property string $country
 * @property string $phone_number
 * @property string $position
 * @property boolean $role
 * @property integer $company_id
 */
class User extends Authenticatable
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const ROLE_SUPER_ADMIN = 1;
    const ROLE_OPS_ADMIN = 2;
    const ROLE_COMPANY_ADMIN = 3;
    const ROLE_MANAGER = 4;
    const ROLE_STAFF = 5;


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'address',
        'city',
        'country',
        'phone_number',
        'position',
        'role',
        'company_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string',
        'address' => 'string',
        'city' => 'string',
        'country' => 'string',
        'phone_number' => 'string',
        'position' => 'string',
        'role' => 'integer',
        'company_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'address' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'country' => 'nullable|string|max:255',
        'phone_number' => 'nullable|string|max:255',
        'position' => 'nullable|string|max:255',
        'role' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function mails()
    {
        return $this->belongsToMany(\App\Models\Mail::class, 'mail_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function mail1s()
    {
        return $this->hasMany(\App\Models\Mail::class, 'sender_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function projects()
    {
        return $this->belongsToMany(\App\Models\Project::class, 'project_user')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currentProject()
    {
        return $this->belongsTo(\App\Models\Project::class, 'current_project_id');
    }
}