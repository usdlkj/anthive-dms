<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ProjectField
 * @package App\Models
 * @version March 16, 2021, 6:54 am UTC
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

    const FIELD_SHORT_TEXT = 1;
    const FIELD_TEXT = 2;
    const FIELD_TEXT_AREA = 3;
    const FIELD_DATE = 4;
    const FIELD_SINGLE_SELECT = 5;
    const FIELD_MULTI_SELECT =6;

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
        'field_type' => 'integer',
        'field_text' => 'string',
        'visible' => 'boolean',
        'mandatory' => 'boolean',
        'sequence' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'field_code' => 'required|string|max:10',
        'field_type' => 'required|integer',
        'field_text' => 'required|string|max:20',
        'visible' => 'required|boolean',
        'mandatory' => 'required|boolean',
        'sequence' => 'required|integer'
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
