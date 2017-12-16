<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
		return Contact::with(['properties' => function($query) {
			$query->get(['community', 'name', 'property_number']);
		}])->orderBy('name', 'asc')->get();
    }
}
