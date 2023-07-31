<?php
// application/helpers/mailjet_helper.php
require 'vendor/autoload.php';
require 'C:\Users\laual\vendor\autoload.php';

use Mailjet\Client;
use Mailjet\Resources;

function send_email_via_mailjet($to, $from, $subject, $message, $recipientName)
{
    // Replace with your Mailjet API key and secret key
    $api_key = 'a933a6023bde09846649c33f2ed5d7f7';
    $secret_key = '4dce262a27054882de21ec42b229d097';

    $mj = new Client($api_key, $secret_key, true, ['version' => 'v3.1']);
    $body = [
        'Messages' => [
            [
                'From' => [
                    'Email' => $from,
                    'Name' => 'Dementia Web', // Replace with your name
                ],
                'To' => [
                    [
                        'Email' => $to,
                        'Name' => $recipientName, // Use the recipient's name from the parameter
                    ],
                ],
                'Subject' => $subject,
                'TextPart' => $message,
            ],
        ],
    ];

    // Send email using Mailjet API
    $response = $mj->post(Resources::$Email, ['body' => $body]);
    $response_data = $response->getData();

    // Check if the email was successfully sent
    if ($response->success()) {
        return true;
    } else {
        // You can handle errors here if needed
        return false;
    }
}
