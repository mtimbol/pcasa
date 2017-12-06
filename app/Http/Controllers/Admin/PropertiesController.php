<?php

namespace App\Http\Controllers\Admin;

use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertiesController extends Controller
{
    public function index()
    {
        $alertTitle = 'Properties';
        // flash('New property was successfully created.')->success();
        return view('admin.properties.index', compact('alertTitle'));
    }

    public function create()
    {
        return view('admin.properties.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'property_number' => 'required',
            'name' => 'required'
        ]);

    	// Validate request
    	Property::create($request->all());
    }

    public function update(Request $request, Property $property)
    {
    	// TODO: Validate request
    	$property->update($request->all());
    }    
}
