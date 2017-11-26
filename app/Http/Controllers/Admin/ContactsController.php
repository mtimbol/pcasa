<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
	public function store(Request $request)
	{
		// TODO: Validate request
		Contact::create($request->all());
	}

    public function update(Request $request, Contact $contact)
    {
    	// TODO: Validate request
    	$contact->update($request->all());
    }
}
