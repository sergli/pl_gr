<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SomeForeignersNearExpiryEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $foreigners;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($foreigners)
    {
        $this->foreigners = $foreigners;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('mail@plg.ru', 'Mail example')
            ->subject('Some foreigners near expiry')
            ->html('Please pay attention');
    }
}
