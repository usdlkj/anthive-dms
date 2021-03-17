<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Project
 * @package App\Models
 * @version March 15, 2021, 4:45 am UTC
 *
 * @property \App\Models\Company $projectOwner
 * @property \Illuminate\Database\Eloquent\Collection $documents
 * @property \Illuminate\Database\Eloquent\Collection $mailTypes
 * @property \Illuminate\Database\Eloquent\Collection $projectFields
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @property string $project_name
 * @property string $project_code
 * @property string $description
 * @property string $location
 * @property string $city
 * @property string $country
 * @property string $start_date
 * @property string $end_date
 * @property integer $project_value
 * @property integer $project_owner_id
 */
class Project extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'projects';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'project_name',
        'project_code',
        'description',
        'location',
        'city',
        'country',
        'start_date',
        'end_date',
        'project_value',
        'project_owner_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'project_name' => 'string',
        'project_code' => 'string',
        'description' => 'string',
        'location' => 'string',
        'city' => 'string',
        'country' => 'string',
        'start_date' => 'date',
        'end_date' => 'date',
        'project_value' => 'integer',
        'project_owner_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_name' => 'required|string|max:255',
        'project_code' => 'required|string|max:255',
        'description' => 'nullable|string|max:255',
        'location' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'country' => 'nullable|string|max:255',
        'start_date' => 'required',
        'end_date' => 'nullable',
        'project_value' => 'required|integer',
        'project_owner' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function projectOwner()
    {
        return $this->belongsTo(\App\Models\Company::class, 'project_owner_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function documents()
    {
        return $this->hasMany(\App\Models\Document::class, 'project_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function mailTypes()
    {
        return $this->hasMany(\App\Models\MailType::class, 'project_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function projectFields()
    {
        return $this->hasMany(\App\Models\ProjectField::class, 'project_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class, 'project_user');
    }
}
