<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Document
 * @package App\Models
 * @version March 19, 2021, 6:20 am UTC
 *
 * @property \App\Models\File $file
 * @property \App\Models\Project $project
 * @property \Illuminate\Database\Eloquent\Collection $companies
 * @property \Illuminate\Database\Eloquent\Collection $documentFields
 * @property string $document_code
 * @property integer $project_id
 * @property integer $file_id
 * @property boolean $version
 * @property boolean $latest_version
 */
class Document extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'documents';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'document_code',
        'project_id',
        'file_id',
        'version',
        'latest_version'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'document_code' => 'string',
        'project_id' => 'integer',
        'file_id' => 'integer',
        'version' => 'boolean',
        'latest_version' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function file()
    {
        return $this->belongsTo(\App\Models\File::class, 'file_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function project()
    {
        return $this->belongsTo(\App\Models\Project::class, 'project_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function companies()
    {
        return $this->belongsToMany(\App\Models\Company::class, 'company_document');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function documentFields()
    {
        return $this->hasMany(\App\Models\DocumentField::class, 'document_id');
    }
}
