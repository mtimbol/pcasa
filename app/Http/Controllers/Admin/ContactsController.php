<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
	public function index()
	{
		$alertTitle = 'Contacts';
		$contacts = Contact::with(['properties' => function($query) {
			$query->get(['community', 'name', 'property_number']);
		}])->orderBy('name', 'asc')->get();
		// dd($contacts->toArray());
		
		return view('admin.contacts.index', compact('contacts', 'alertTitle'));
	}

	public function show($contact)
	{
		return view('admin.contacts.show', compact('contact'));
	}

	public function create()
	{
		return view('admin.contacts.create');
	}

	public function store(Request $request)
	{
		// TODO: Validate request
		$contact = Contact::create($request->all());

		if ($request->has('properties')) {
			$contact->interestedIn($request->properties);
		}
	}

    public function update(Request $request, Contact $contact)
    {
    	// TODO: Validate request
    	if ($contact->update($request->all())) {
    		return response()->json([
    			'status' => 1,
    			'contact' => 'Contact has been successfully updated.'
    		]);
    	}

    	return response()->json([
    		'status' => 0,
    		'message' => 'Oops. Something went wrong. Please try again.'
    	]);
    }
}
