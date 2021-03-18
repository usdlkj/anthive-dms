<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class File
 * @package App\Models
 * @version March 18, 2021, 10:04 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $documents
 * @property string $file_name
 * @property string $file_hash
 * @property string $location
 * @property string $file_size
 * @property string $extension
 */
class File extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'files';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'file_name',
        'hash_name',
        'location',
        'file_size',
        'extension'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'file_name' => 'string',
        'hash_name' => 'string',
        'location' => 'string',
        'file_size' => 'string',
        'extension' => 'string'
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function documents()
    {
        return $this->hasMany(\App\Models\Document::class, 'file_id');
    }
}
