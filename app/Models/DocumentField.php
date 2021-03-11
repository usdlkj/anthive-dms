<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DocumentField
 * @package App\Models
 * @version March 11, 2021, 2:13 pm UTC
 *
 * @property \App\Models\Document $document
 * @property integer $document_id
 * @property string $field_code
 * @property string $field_value
 */
class DocumentField extends Model
{

    use HasFactory;

    public $table = 'document_fields';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'document_id',
        'field_code',
        'field_value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'document_id' => 'integer',
        'field_code' => 'string',
        'field_value' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'document_id' => 'required',
        'field_code' => 'required|string|max:255',
        'field_value' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function document()
    {
        return $this->belongsTo(\App\Models\Document::class, 'document_id');
    }
}
