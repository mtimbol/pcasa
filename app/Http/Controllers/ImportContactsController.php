<?php

namespace App\Http\Controllers;

use App\Jobs\ImportContacts;
use Illuminate\Http\Request;

class ImportContactsController extends Controller
{
    // protected $excel;

    // public function __construct(Excel $excel)
    // {
    //     $this->excel = $excel;
    // }

    public function store(Request $request)
    {
    	$file = 'public/import/contacts.csv';

        dispatch(new ImportContacts($file));
    }
}
