## Introduction

This is an Object Oriented PHP client for the Imgur API. It can be used to interact with the Imgur API in your projects.

### Before Installation

You must have an app on imgur to use this package and make sure to obtain account: `username, client_id, client_secret, access_token, refresh_token`.

If you have an application but you don't know how to get your `access_token` and `refresh_token` do the following:

Go to this url `https://api.imgur.com/oauth2/authorize?client_id=CLIENT_ID&response_type=token` after changing `CLIENT_ID` with yours.

You should now be redirected to imgur asking you for permission, click on `Allow` button.

Then you will be redirected to imgur homepage and the url should contain info about your `access_token`, `refresh_token` and your `account_username`.

### Installation

melsaka/imgur may be installed via the Composer package manager:

```bash
composer require melsaka/imgur
```

### Basic Usage

```php
$credentials = [
    'username'          => '{{ your username }}',
    'client_id'         => '{{ your client_id }}',
    'client_secret'     => '{{ your client_secret }}',
    'access_token'      => '{{ your access_token }}',
    'refresh_token'     => '{{ your refresh_token }}',
];

$imgur = new Imgur($credentials);

$yourAccountCredits = $imgur->account()->credits();

$accountImages = $imgur->account()->images($username);

$myAccountImages = $imgur->account()->images();

$imageInfo = $imgur->image()->info($imageHash);

$albumInfo = $imgur->album()->info($albumHash);
```

To know more about available methods check out the classes in src/Api folder.

The method `$imgur->account()` returns an Account object and other methods return their related object as well [image, album..]

Make sure to check out: [Imgur Api Documentation](https://apidocs.imgur.com/)

## License

melsaka/imgur is open-sourced library licensed under the [MIT license](LICENSE.md).
