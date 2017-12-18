<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
    	// return Contact::with('properties')->orderBy('name', 'asc')->get();
		return Contact::with(['properties' => function($query) {
			$query->count() ? $query->get(['community', 'name', 'property_number']) : $query;
		}])->orderBy('name', 'asc')->get();
    }
}
