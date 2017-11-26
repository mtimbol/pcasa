<?php

namespace App\Jobs;

use App\Contact;
use App\Events\ContactsWasImported;
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
        $excel->filter('chunk')->load($this->file)->chunk(1, function($contacts) {
            foreach ($contacts as $row) {
                if (Contact::whereEmail($row->email)->first()) {
                    $skipped_contacts[] = $row;
                } else {
                    Contact::firstOrCreate(collect($row)->toArray());
                }
            }
        });

        event(new ContactsWasImported($skipped_contacts));
    }
}
