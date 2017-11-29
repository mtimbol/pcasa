<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
    	'name', 'property_number', 'developer', 'community',
    	'property_type', 'bedrooms', 'unit_type', 'size', 'view',
    	'property_details_1', 'property_details_2'
    ];

    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'property_contacts');
    }    
}
