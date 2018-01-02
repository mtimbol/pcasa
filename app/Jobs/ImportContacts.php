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

    protected $skippedContacts = [];

    protected $newContacts = [];

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
        $excel->load($this->file, function($contacts) {
            list($this->skippedContacts, $this->newContacts) = collect($contacts->all())->partition(function($contact) {
                return Contact::whereEmail($contact->email)->count() > 0;
            });
        }, null, true);

        foreach (collect($this->newContacts)->chunk(100) as $rows) {
            foreach ($rows as $row) {
                $contact = Contact::firstOrCreate([
                    'contact_status' => null,
                    'client_type' => $row->client_type ?? null,
                    'salutation' => $row->salutation ?? null,
                    'name' => $row->full_name ?? null,
                    'first_name' => explode(' ', $row->full_name)[0] ?? null,
                    'last_name' => explode(' ', $row->full_name)[1] ?? null,
                    'nationality' => $row->nationality ?? null,
                    'email' => $row->email,
                    'mobile' => $row->mobile,
                    'phone' => $row->phone ?? null,
                    'fax' => $row->fax ?? null,
                    'passport_number' => $row->passport_number ?? null,
                    'source' => $row->database_source ?? null,
                    'notes' => $row->notes ?? null,
                ]);

                if ($property = Property::where('property_number', $row->property_number)->first()) {
                    // Skip
                } else {
                    $property = Property::create([
                        'property_number' => $row->property_number ?? 'dummy',
                        'developer' => $row->developer,
                        'community' => $row->community,
                        'subcommunity' => $row->subcommunity ?? null,
                        'property_type' => $row->property_type ?? null,
                        'size' => $row->property_size ?? null,
                        'property_details_1' => $row->property_details_1 ?? null,
                        'property_details_2' => $row->property_details_2 ?? null,
                    ]);
                }

                $property->contacts()->attach($contact); 
            }
        }

        event(new ContactsWasImported($this->skippedContacts));
        
        return $this->skippedContacts;

    }
}
