<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CompanyDocument
 * @package App\Models
 * @version March 11, 2021, 2:10 pm UTC
 *
 * @property \App\Models\Company $company
 * @property \App\Models\Document $document
 * @property integer $company_id
 * @property integer $document_id
 */
class CompanyDocument extends Model
{

    use HasFactory;

    public $table = 'company_document';
    
    public $timestamps = false;




    public $fillable = [
        'company_id',
        'document_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'company_id' => 'integer',
        'document_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'company_id' => 'required',
        'document_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function document()
    {
        return $this->belongsTo(\App\Models\Document::class, 'document_id');
    }
}
