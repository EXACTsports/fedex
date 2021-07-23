<?php

namespace EXACTSports\FedEx\OrderSubmissions;

class Webhook
{
    public string $url;     // N - Customer-provided URL for notification of order status updates
                            //  Mandatory when notificationRegistration is present in the request
    public string $auth;    // N - Token to be used for authorization of the webhook URL
                            //  Mandatory when notificationRegistration is present in the request
}