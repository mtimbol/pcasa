<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\ImportContacts;
use Illuminate\Http\Request;

class ImportContactsController extends Controller
{
	public function index()
	{
		return view('admin.contacts.import.index');
	}

    public function store(Request $request)
    {
    	// dd($request->all());
    	$file = 'public/import/contacts.csv';
    	if ($request->hasFile('csv')) {
    		$file = $request->csv;
    	}

        dispatch(new ImportContacts($file));
    }
}
