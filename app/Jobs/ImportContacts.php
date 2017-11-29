<?php

namespace App\Jobs;

use App\Contact;
use App\Events\ContactsWasImported;
use App\Property;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Excel;

class ImportContacts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;

    protected $excel;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Excel $excel)
    {
        $skipped_contacts = [];

        // TODO
        // Check if the contact is already existing on the database.
        $excel->filter('chunk')->load($this->file)->chunk(1, function($contacts)
        {
            list($skipped_contacts, $contacts) = collect($contacts)->partition(function($contact) {
                return Contact::whereEmail($contact->email)->first();
            });

            collect($contacts)->each(function($row, $key) {
                $contact = Contact::firstOrCreate(collect($row)->toArray());

                if ($property = Property::where('property_number', $row->property_number)->first()) {

                } else {
                    $property = Property::create([
                        'property_number' => $row->property_number,
                        'developer' => $row->developer,
                        'community' => $row->community,
                        'subcommunity' => $row->subcommunity,
                        'property_type' => $row->property_type,
                        'size' => $row->property_size,
                        'property_details_1' => $row->property_details_1,
                        'property_details_2' => $row->property_details_2,
                    ]);
                }

                $property->contacts()->attach($contact);
            });
        });

        event(new ContactsWasImported($skipped_contacts));
    }
}
