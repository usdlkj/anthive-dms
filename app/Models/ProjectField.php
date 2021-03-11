<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ProjectField
 * @package App\Models
 * @version March 11, 2021, 12:48 pm UTC
 *
 * @property \App\Models\Project $project
 * @property \Illuminate\Database\Eloquent\Collection $selectValues
 * @property integer $project_id
 * @property string $field_code
 * @property boolean $field_type
 * @property string $field_text
 * @property boolean $visible
 * @property boolean $mandatory
 * @property boolean $sequence
 */
class ProjectField extends Model
{
    use HasFactory;

    public $table = 'project_fields';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'project_id',
        'field_code',
        'field_type',
        'field_text',
        'visible',
        'mandatory',
        'sequence'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'project_id' => 'integer',
        'field_code' => 'string',
        'field_type' => 'boolean',
        'field_text' => 'string',
        'visible' => 'boolean',
        'mandatory' => 'boolean',
        'sequence' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_id' => 'required',
        'field_code' => 'required|string|max:10',
        'field_type' => 'required|boolean',
        'field_text' => 'required|string|max:20',
        'visible' => 'required|boolean',
        'mandatory' => 'required|boolean',
        'sequence' => 'required|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
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
    public function selectValues()
    {
        return $this->hasMany(\App\Models\SelectValue::class, 'project_field_id');
    }
}
