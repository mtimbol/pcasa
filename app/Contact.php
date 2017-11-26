<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
    	'salutation', 'full_name', 'passport_number', 'nationality',
    	'email', 'mobile', 'phone', 'fax',
    	'company', 'position',
    	'property_number', 'property_type', 'developer', 'community', 'subcommunity', 'area', 'city', 'country',
    	'contact_status', 'source', 'client_type', 'notes'
    ];

    public static function exists($value)
    {
    	if (str_contains($value, '@')) {
	    	return static::where('email', $value)->count() > 0;
    	}
    	
    	return static::where('phone', $value)->count() > 0;
    }
}
