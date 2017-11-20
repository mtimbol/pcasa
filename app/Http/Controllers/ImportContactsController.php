<?php

namespace App\Http\Controllers;

use Excel;
use App\Contact;
use Illuminate\Http\Request;

class ImportContactsController extends Controller
{
    public function store(Request $request)
    {
    	$file = 'public/import/contacts.csv';
    	Excel::load($file, function($reader) {
    		$rows = $reader->get();
    		// dd($rows->groupBy('community'));
            $contacts_lists = [];
    		foreach ($rows->groupBy('community') as $community => $contacts) {
                foreach ($contacts as $key => $contact) {
                    $lead = new Contact;
                    $lead->salutation = $contact->salutation;
                    $lead->full_name = $contact->full_name;
                    $lead->email = $contact->email;
                    $lead->mobile = $contact->mobile;
                    $lead->property_number = $contact->property_number;
                    $lead->property_type = $contact->property_type;
                    $lead->client_type = $contact->client_type;
                    $lead->save();
                }
    		}
    	})->get();
    }
}
