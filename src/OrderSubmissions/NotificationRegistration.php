<?php

namespace EXACTSports\FedEx\OrderSubmissions;

use JetBrains\PhpStorm\Pure;

class NotificationRegistration
{
    public Webhook $webhook; // N - Contains the URL and Auth parameters for the webhook

    #[Pure]
    public function __construct()
    {
        $this->webhook = new Webhook();
    }
}
