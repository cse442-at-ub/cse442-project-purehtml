<?php

include 'get_credentials.php';

function call_spotify($options)
{
    $curl  = curl_init();
    curl_setopt_array($curl, $options);

    $json  = curl_exec($curl);

    $error = curl_error($curl);

    curl_close($curl);

    if ($error) {
            return ['error'   => TRUE,
                    'message' => $error];
    }

    $data  = json_decode($json);

        if (is_null($data)) {
                return ['error'   => TRUE,
                        'message' => json_last_error_msg()];

    }

    return $data;
}

function get_authenicated($client_id, $client_secret)
{

    $headers  = ['Authorization: Basic '.base64_encode($client_id.':'.$client_secret)];
    $url      = 'https://accounts.spotify.com/api/token';
    $options  =     [CURLOPT_URL            => $url,
                    CURLOPT_RETURNTRANSFER => TRUE,
                    CURLOPT_POST           => TRUE,
                    CURLOPT_POSTFIELDS     => 'grant_type=client_credentials',
                    CURLOPT_HTTPHEADER     => $headers];
    $credentials = call_spotify($options);
    $token = $credentials->access_token;

    return $token;

}

function replace_spaces($artist){
    return str_replace(" ", "&20", $artist);
}

function create_options($headers, $url){

    $options  = [CURLOPT_URL            => $url,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_FOLLOWLOCATION => TRUE,
                CURLOPT_ENCODING       => '',
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 30,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => 'GET',
                CURLOPT_HTTPHEADER     => $headers];


    return $options;

}

?>
