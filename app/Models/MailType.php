<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MailType
 * @package App\Models
 * @version March 11, 2021, 11:02 am UTC
 *
 * @property \App\Models\Project $project
 * @property \Illuminate\Database\Eloquent\Collection $mails
 * @property integer $project_id
 * @property string $mail_type
 * @property string $mail_type_code
 * @property string $last_mail_number
 * @property boolean $is_transmittal
 */
class MailType extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'mail_types';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'project_id',
        'mail_type',
        'mail_type_code',
        'last_mail_number',
        'is_transmittal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'project_id' => 'integer',
        'mail_type' => 'string',
        'mail_type_code' => 'string',
        'last_mail_number' => 'string',
        'is_transmittal' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_id' => 'required',
        'mail_type' => 'required|string|max:255',
        'mail_type_code' => 'required|string|max:50',
        'last_mail_number' => 'required|string|max:50',
        'is_transmittal' => 'required|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function project()
    {
        return $this->belongsTo(\App\Models\Project::class, 'project_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function mails()
    {
        return $this->hasMany(\App\Models\Mail::class, 'mail_type_id');
    }
}
