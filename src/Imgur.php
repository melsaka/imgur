<?php

namespace Melsaka;

use Melsaka\Api\Image;
use Melsaka\Api\Album;
use Melsaka\Api\Gallery;
use Melsaka\Api\Comment;
use Melsaka\Api\Account;
use Melsaka\Auth\Credentials;

class Imgur
{
    protected $credentials;

    public function __construct(array $credentials)
    {
        $this->credentials = new Credentials($credentials);
    }

    public function account()
    {
        return new Account($this->credentials);
    }

    public function comment()
    {
        return new Comment($this->credentials);
    }

    public function album()
    {
        return new Album($this->credentials);
    }

    public function image()
    {
        return new Image($this->credentials);
    }

    public function gallery()
    {
        return new Gallery($this->credentials);
    }
}
