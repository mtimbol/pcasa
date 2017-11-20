<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['salutation', 'full_name', 'email', 'mobile', 'phone', 'fax', 'property_number', 'property_type', 'client_type'];
}
