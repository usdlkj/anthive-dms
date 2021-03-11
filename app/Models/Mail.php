<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Mail
 * @package App\Models
 * @version March 11, 2021, 2:19 pm UTC
 *
 * @property \App\Models\MailType $mailType
 * @property \App\Models\User $sender
 * @property \Illuminate\Database\Eloquent\Collection $mailAttachments
 * @property \Illuminate\Database\Eloquent\Collection $user1s
 * @property integer $thread_starter_id
 * @property integer $previous_mail_id
 * @property integer $mail_type_id
 * @property integer $sender_id
 * @property string $mail_code
 * @property boolean $mail_status
 * @property string $subject
 * @property string $message
 */
class Mail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'mails';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'thread_starter_id',
        'previous_mail_id',
        'mail_type_id',
        'sender_id',
        'mail_code',
        'mail_status',
        'subject',
        'message'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'thread_starter_id' => 'integer',
        'previous_mail_id' => 'integer',
        'mail_type_id' => 'integer',
        'sender_id' => 'integer',
        'mail_code' => 'string',
        'mail_status' => 'boolean',
        'subject' => 'string',
        'message' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'thread_starter_id' => 'nullable',
        'previous_mail_id' => 'nullable',
        'mail_type_id' => 'nullable',
        'sender_id' => 'required',
        'mail_code' => 'required|string|max:255',
        'mail_status' => 'required|boolean',
        'subject' => 'required|string|max:255',
        'message' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function mailType()
    {
        return $this->belongsTo(\App\Models\MailType::class, 'mail_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sender()
    {
        return $this->belongsTo(\App\Models\User::class, 'sender_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function mailAttachments()
    {
        return $this->hasMany(\App\Models\MailAttachment::class, 'mail_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function user1s()
    {
        return $this->belongsToMany(\App\Models\User::class, 'mail_user');
    }
}
