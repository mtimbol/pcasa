<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\ImportContacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImportContactsController extends Controller
{
	public function index()
	{
		return view('admin.contacts.import.index');
	}

    public function store(Request $request)
    {
    	// $path = $request->file('csv')->store('imports');

    	$this->validate($request, [
    		'csv' => 'required'
    	]);

    	// Storage::disk('local')->put($request->csv);

        dispatch(new ImportContacts($request->csv));
    }
}
