<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class UpdateSkippedContactsController extends Controller
{
    public function update(Request $request)
    {
    	if ($request->has('contacts')) {
    		foreach ($request->contacts as $row) {
    			$contact = Contact::whereEmail($row['email'])->first();
    			$contact->update($row);
    		}
    	}
    }
}
