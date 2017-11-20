<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ImportContactsTest extends TestCase
{
    use DatabaseMigrations;

    public function test_an_admin_can_upload_contacts_in_a_csv_file()
    {
        // User should be logged-in.
        // User should have a permission to import contacts.

        // Upload contacts.csv
        $response = $this->json('GET', '/', [
            // 'file' => '/import/contacts.csv'
        ]);


        // $response->assertStatus(200);

        $this->assertDatabaseHas('contacts', [
            'salutation' => 'MR',
            'full_name' => 'Achraf Cherkaoui',
            'email' => 'a.cherkaoui@gmail.com',
            'mobile' => '971505599530',
            'property_number' => 'AFA2D1V5B-117',
            'property_type' => 'APARTMENT',
            'client_type' => 'LANDLORD',
        ]);

    }
}
