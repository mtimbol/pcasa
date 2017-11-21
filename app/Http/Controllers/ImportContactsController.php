<?php

namespace App\Http\Controllers;

use Excel;
use App\Developer;
use App\Community;
use App\Contact;
use Illuminate\Http\Request;

class ImportContactsController extends Controller
{
    public function store(Request $request)
    {
    	$file = 'public/import/contacts.csv';
    	Excel::filter('chunk')->load($file)->chunk(1, function($rows) {
    		foreach ($rows as $row) {
                // $developer = Developer::firstOrCreate([
                //     'name' => $row->developer
                // ]);

                // $community = Community::firstOrCreate([
                //     'name' => $row->community
                // ]);

                $contact = [
                    'country' => $row->country,
                    'city' => $row->city,
                    'area' => $row->area,
                    'developer' => $row->developer,
                    'community' => $row->community,
                    'subcommunity' => $row->subcommunity,
                    'salutation' => $row->salutation,
                    'full_name' => $row->full_name,
                    'email' => $row->email,
                    'mobile' => $row->mobile,
                    'property_number' => $row->property_number,
                    'property_type' => $row->property_type,
                    'client_type' => $row->client_type,
                ];
                $contact = Contact::firstOrCreate($contact);

                // $developer->contacts()->attach($contact);
                // $community->contacts()->attach($contact);
    		}
    	});
    }
}
