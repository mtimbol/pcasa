<?php

namespace App\Http\Controllers\Api;

use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertiesController extends Controller
{
    public function index()
    {
    	return Property::orderBy('property_number', 'asc')->get();
    }
}
