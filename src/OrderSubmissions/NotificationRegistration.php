<?php

namespace EXACTSports\FedEx\OrderSubmissions;

use EXACTSports\FedEx\OrderSubmissions\Webhook;

class NotificationRegistration
{
    public Webhook $webhook; // N - Contains the URL and Auth parameters for the webhook

    public function __construct()
    {
        $this->webhook = new Webhook();    
    }
}