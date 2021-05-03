<?php

require __DIR__ . '/vendor/autoload.php';

use Melsaka\Imgur;

$credentials = [
    'username'          => '{{ your username }}',
    'client_id'         => '{{ your client_id }}',
    'client_secret'     => '{{ your client_secret }}',
    'access_token'      => '{{ your access_token }}',
    'refresh_token'     => '{{ your refresh_token }}',
];

$imgur = new Imgur($credentials);

$account = $imgur->account();

$account->changeSettings([
    'bio' => 'just for test'
]);

$images = $account->images();

$credits = $account->credits();

var_dump($credits);
