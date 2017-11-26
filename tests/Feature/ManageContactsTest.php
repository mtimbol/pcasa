<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ManageContactsTest extends TestCase
{
	use DatabaseMigrations;

    public function test_an_authorized_user_can_create_a_new_contact()
    {
        // TODO: User should be authorized to process this request.
        $response = $this->json('POST', '/contacts', [
            // Personal Information
            'salutation' => 'MR.',
            'full_name' => 'Mark Timbol',
            'passport_number' => 'EB6159498',
            'nationality' => 'Filipino',
            // 'passport_expiry' => = '', 
            // 'birthdate' => = '', 
            // Contact Information
            'email' => 'mark@timbol.com',
            'phone' => '+971 56 820 7189',
            // Company Information
            'company' => 'Belpro Digital',
            'position' => 'Web Developer',
            // Property Information
            'property_number' => '12345',
            // Contact statuses
            'contact_status' => 'lead',
            'source' => 'propertyfinder',
            'client_type' => 'buyer',
        ]);

        $this->assertDatabaseHas('contacts', [
            'salutation' => 'MR.',
            'full_name' => 'Mark Timbol',
            'passport_number' => 'EB6159498',
            'email' => 'mark@timbol.com',
            'phone' => '+971 56 820 7189',
            'company' => 'Belpro Digital',
            'position' => 'Web Developer',
            'nationality' => 'Filipino',
            'property_number' => '12345',
            'contact_status' => 'lead',
            'source' => 'propertyfinder',
            'client_type' => 'buyer',
        ]);
    }

    public function test_an_authorized_user_can_update_any_contact_information()
    {
    	// TODO: User should be authorized to process this request.
    	$contact = factory(\App\Contact::class)->create([
    		'email' => 'mark@timbol.com',
    		'client_type' => 'buyer',
    	]);

    	// PUT request to update contact status only
    	$response = $this->json('PUT', '/contacts/1', [
    		'contact_status' => 'LEAD',
    	]);

    	$this->assertDatabaseHas('contacts', [
    		'email' => 'mark@timbol.com',
    		'contact_status' => 'LEAD'
    	]);     	

    	// PUT request to update mobile only
    	$this->json('PUT', '/contacts/1', [
    		'mobile' => '+971 56 820 7189',
    	]);

    	$this->assertDatabaseHas('contacts', [
    		'email' => 'mark@timbol.com',
    		'mobile' => '+971 56 820 7189'
    	]); 

    	// PUT request to update notes only
    	$response = $this->json('PUT', '/contacts/1', [
    		'notes' => 'A sample note',
    	]);

    	$this->assertDatabaseHas('contacts', [
    		'email' => 'mark@timbol.com',
    		'notes' => 'A sample note'
    	]);   	
    }
}
