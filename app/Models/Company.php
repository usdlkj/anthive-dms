<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Company
 * @package App\Models
 * @version March 11, 2021, 11:51 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $documents
 * @property \Illuminate\Database\Eloquent\Collection $projects
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @property string $company_name
 * @property string $trading_name
 * @property string $company_code
 * @property string $address
 * @property string $city
 * @property string $post_code
 * @property string $country
 * @property string $phone_number
 * @property string $email
 */
class Company extends Model
{

    use HasFactory;

    public $table = 'companies';

    public $fillable = [
        'company_name',
        'trading_name',
        'company_code',
        'address',
        'city',
        'post_code',
        'country',
        'phone_number',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_name' => 'string',
        'trading_name' => 'string',
        'company_code' => 'string',
        'address' => 'string',
        'city' => 'string',
        'post_code' => 'string',
        'country' => 'string',
        'phone_number' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'company_name' => 'required|string|max:255',
        'trading_name' => 'required|string|max:255',
        'company_code' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'post_code' => 'nullable|string|max:255',
        'country' => 'required|string|max:255',
        'phone_number' => 'required|string|max:255',
        'email' => 'required|string|max:255'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function documents()
    {
        return $this->belongsToMany(\App\Models\Document::class, 'company_document');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function projects()
    {
        return $this->hasMany(\App\Models\Project::class, 'project_owner_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\Models\User::class, 'company_id');
    }
}
