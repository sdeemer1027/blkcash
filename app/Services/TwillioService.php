<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwillioService
{
    protected $twilio;

    public function __construct()
    {
        $this->twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
    }

    public function sendSMS($to, $message)
    {
        $this->twilio->messages->create($to, [
            'from' => env('TWILIO_PHONE_NUMBER'),
            'body' => $message,
        ]);
    }
}
