<?php

namespace EXACTSports\FedEx\OrderSubmissions;

class NotificationRegistration
{
    public Webhook $webhook; // N - Contains the URL and Auth parameters for the webhook

    public function __construct()
    {
        $this->webhook = new Webhook();
    }
}
