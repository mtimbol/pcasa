<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\ImportContacts;
use Illuminate\Http\Request;

class ImportContactsController extends Controller
{
    public function store(Request $request)
    {
    	$file = 'public/import/contacts.csv';

        dispatch(new ImportContacts($file));
    }
}
