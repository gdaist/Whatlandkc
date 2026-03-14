<?php

$pixel_id = "1619767969174982";
$access_token = "EAAVdfbrPwlgBQ60oyZBmwqL1S6p3zkNuxGZAv9pZCVGyj8weVUnGIB80iAjqfqRIHZBhamihswD4TgiGDfdh2v7QlsWtP4ZBDM95HRhcUytWD06nicf4XFDHqZCsrRgN6jcPZB1AfyE8NZA175Err2NXkQqZBRXJRhWOvA1ZBv71B8X4SMeRcROLA6kYX0Mpt842yaNwZDZD";

$url = "https://graph.facebook.com/v18.0/$pixel_id/events?access_token=$access_token";

$data = [
    "data" => [
        [
            "event_name" => "Lead",
            "event_time" => time(),
            "action_source" => "website",
            "user_data" => [
                "client_ip_address" => $_SERVER['REMOTE_ADDR'],
                "client_user_agent" => $_SERVER['HTTP_USER_AGENT']
            ]
        ]
    ]
];

$options = [
    "http" => [
        "header" => "Content-Type: application/json",
        "method" => "POST",
        "content" => json_encode($data)
    ]
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

echo $result;

?>
