<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MailAttachment
 * @package App\Models
 * @version March 11, 2021, 2:23 pm UTC
 *
 * @property \App\Models\Mail $mail
 * @property integer $mail_id
 * @property integer $attachment_id
 * @property boolean $attachment_type
 */
class MailAttachment extends Model
{

    use HasFactory;

    public $table = 'mail_attachments';
    
    public $timestamps = false;




    public $fillable = [
        'mail_id',
        'attachment_id',
        'attachment_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'mail_id' => 'integer',
        'attachment_id' => 'integer',
        'attachment_type' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'mail_id' => 'required',
        'attachment_id' => 'required',
        'attachment_type' => 'required|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function mail()
    {
        return $this->belongsTo(\App\Models\Mail::class, 'mail_id');
    }
}
