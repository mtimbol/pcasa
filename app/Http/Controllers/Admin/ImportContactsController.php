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
    	$this->validate($request, [
    		'csv' => 'required'
    	]);

        dispatch(new ImportContacts($request->file('csv')->getRealPath()));
    }
}
