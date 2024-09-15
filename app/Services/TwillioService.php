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


public function sendSMSimg($to, $message, $imageUrl)
{
    // Parameters array for sending the message
    $params = [
        'from' => env('TWILIO_PHONE_NUMBER'),
        'body' => $message
    ];

    // If a media URL is provided, add it to the parameters for MMS
    if ($imageUrl) {
        $params['mediaUrl'] = [$imageUrl];  // Twilio expects an array for media URLs
    }

    // Create the message using the Twilio client
    $this->twilio->messages->create($to, $params);
}



}
