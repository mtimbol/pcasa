<?php

namespace App\Http\Controllers\Admin;

use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertiesController extends Controller
{
    public function store(Request $request)
    {
    	// Validate request
    	Property::create($request->all());
    }

    public function update(Request $request, Property $property)
    {
    	// TODO: Validate request
    	$property->update($request->all());
    }    
}
