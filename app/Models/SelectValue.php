<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SelectValue
 * @package App\Models
 * @version March 11, 2021, 11:00 am UTC
 *
 * @property \App\Models\ProjectField $projectField
 * @property integer $project_field_id
 * @property string $value_code
 * @property string $value_text
 */
class SelectValue extends Model
{
    use HasFactory;

    public $table = 'select_values';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'project_field_id',
        'value_code',
        'value_text'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'project_field_id' => 'integer',
        'value_code' => 'string',
        'value_text' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_field_id' => 'required',
        'value_code' => 'required|string|max:20',
        'value_text' => 'required|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function projectField()
    {
        return $this->belongsTo(\App\Models\ProjectField::class, 'project_field_id');
    }
}
