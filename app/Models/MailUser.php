<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MailUser
 * @package App\Models
 * @version March 11, 2021, 2:22 pm UTC
 *
 * @property \App\Models\Mail $mail
 * @property \App\Models\User $user
 * @property integer $mail_id
 * @property integer $user_id
 */
class MailUser extends Model
{

    use HasFactory;

    public $table = 'mail_user';
    
    public $timestamps = false;




    public $fillable = [
        'mail_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'mail_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'mail_id' => 'required',
        'user_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function mail()
    {
        return $this->belongsTo(\App\Models\Mail::class, 'mail_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
