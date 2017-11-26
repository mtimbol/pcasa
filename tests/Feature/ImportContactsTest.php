<?php

namespace Feature;

use App\Events\ContactsWasImported;
use App\Jobs\ImportContacts;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ImportContactsTest extends TestCase
{
    use DatabaseMigrations;

    public function test_importing_contacts_should_fire_an_import_contact_job()
    {
        $this->expectsJobs(ImportContacts::class);

        $this->json('POST', '/contacts/import', [
            'file' => '/import/contacts.csv'
        ]);
    }

    public function test_it_fires_an_event_when_the_importing_of_contacts_is_finished()
    {
        $this->expectsEvents(ContactsWasImported::class);

        $this->json('POST', '/contacts/import', []);
    }

    public function test_an_admin_can_upload_contacts_in_a_csv_file()
    {
        // TODO
        // User should be logged-in.
        // User should have a permission to import contacts.

        // Upload contacts.csv
        $response = $this->json('POST', '/contacts/import', [
            'file' => '/import/contacts.csv'
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('contacts', [
            'id' => 1,
            'country' => 'UAE',
            'city' => 'Dubai',
            'developer' => 'NAKHEEL',
            'community' => 'Al Furjan',
            'salutation' => 'MR',
            'full_name' => 'Achraf Cherkaoui',
            'email' => 'a.cherkaoui@gmail.com',
            'mobile' => '971505599530',
            'property_number' => 'AFA2D1V5B-117',
            'property_type' => 'APARTMENT',
            'client_type' => 'LANDLORD',
        ]);
    }

    public function test_skip_contacts_that_are_already_saved_in_the_database()
    {
        factory(\App\Contact::class)->create([
            'email' => 'a.cherkaoui@gmail.com',
        ]);

        $this->assertDatabaseHas('contacts', [
            'email' => 'a.cherkaoui@gmail.com' // Existing email in the CSV file
        ]);

        $response = $this->JSON('POST', '/contacts/import', []);

        $response->assertStatus(200);
    }
}
