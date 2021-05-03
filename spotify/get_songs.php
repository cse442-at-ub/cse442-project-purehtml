<?php

include 'call_spotify.php';

function get_top_artists($artist, $token)
{
    $no_spec_artist = preg_replace("/[^a-zA-Z0-9 ]+/", "", $artist);

    $headers  = ['Content-Type: application/json',
                'Authorization: Bearer '.$token];
    $url      = "https://api.spotify.com/v1/search?q=".replace_spaces($no_spec_artist)."&type=track&limit=50";
    $options  = create_options($headers, $url);

    $features = call_spotify($options);
    $features = get_object_vars($features);

    // This turns features from stdClass to obj.
    $data = json_decode(json_encode($features), true);

    $tracks = $data["tracks"]["items"];

    return $tracks;
}


function get_artist_id($input, $tracks)
{
    // A dictionary storing k.v. pairs
    // of (artist) -> (similarity)
    $no_spec_input = preg_replace("/[^a-zA-Z0-9 ]+/", "", $input);
    $similarity = array();
    $artists = array();
    foreach($tracks as $track){
        foreach($track['artists'] as $artist){

            // Returns similarity as an integer (sim) and percentage (perc)
            $sim = similar_text(strtolower($artist["name"]), strtolower($no_spec_input), $perc);
            $similarity[$artist["id"]] = $perc;
            $artists[$artist["id"]] = $artist["name"];
         }
    }

    # Returns the id of the maximum similarity.
    $most_similar = array_search(max($similarity), $similarity);

    return array($most_similar, $artists[$most_similar], max($similarity));
}


function get_all_albums($id, $token)
{
    $headers  = ['Content-Type: application/json',
                'Authorization: Bearer '.$token];
    $url      = "https://api.spotify.com/v1/artists/".$id."/albums";
    $options  = create_options($headers, $url);

    $features = call_spotify($options);
    $features = get_object_vars($features);

    // This turns features from stdClass to obj.
    $data = json_decode(json_encode($features), true);

    $albums = array();

    foreach($data["items"] as $album){
        $albums[] = $album["id"];

        }

    return $albums;
}

function get_all_tracks($albums, $token)
{
    $headers  = ['Content-Type: application/json',
                'Authorization: Bearer '.$token];

    $songs = array();
    foreach($albums as $album){
        $url      = "https://api.spotify.com/v1/albums/".$album."/tracks";
        $options  = create_options($headers, $url);

        $features = call_spotify($options);
        $features = get_object_vars($features);

        // This turns features from stdClass to obj.
        $data = json_decode(json_encode($features), true);

        foreach($data["items"] as $song){
            $songs[] = $song;

            }


    }

    return $songs;
}


function get_artist_image($id, $token)
{
    $headers  = ['Content-Type: application/json',
                'Authorization: Bearer '.$token];

    $url      = "https://api.spotify.com/v1/artists/{$id}";
    $options  = create_options($headers, $url);

    $features = call_spotify($options);
    $data = json_decode(json_encode($features), true);

    $image = $data["images"][0];
    return $image;
}

function get_artist_info($id, $token)
{
    $headers  = ['Content-Type: application/json',
                'Authorization: Bearer '.$token];

    $url      = "https://api.spotify.com/v1/artists/{$id}";
    $options  = create_options($headers, $url);

    $features = call_spotify($options);
    $data = json_decode(json_encode($features), true);

    return $data;
}

?>
