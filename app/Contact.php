<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'type'
    ];

    /**
     * The model's default values for attributes.
     * Type is addded as making it fillable removed the default value
     * functionality in the database when inserted as null using the create
     * method.
     * 
     * @var array
     */
    protected $attributes = [
        'type' => 'personal',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Sets the type to personal if nothing is passed into the validator
     * Prevents an error being thrown if type is passed as an empty string.
     * Again an error due to 'type' being fillable and the model ignoring the
     * db default value for 'type'.
     * 
     * @var mixed
     */
    public function setTypeAttribute($type) {
        $this->attributes['type'] = $type ?? 'personal';
    }

}
