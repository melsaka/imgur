<?php

namespace Melsaka\Api;

use Melsaka\Traits\RequestTrait;

class Image
{
    use RequestTrait;

    // Get information about an image.
    public function info($imageHash)
    {
        $this->setEndpoint(Endpoint::IMAGE);

        $this->setQueryImageHash($imageHash);

        return $this->get();
    }

    // Upload a new image or video.
    public function upload($data)
    {
        $this->setEndpoint(Endpoint::IMAGE_UPLOAD);

        return $this->post($data);
    }

    // Updates the title or description of an image.
    public function update($imageHash, $data)
    {
        $this->setEndpoint(Endpoint::IMAGE);

        $this->setQueryImageHash($imageHash);

        return $this->post($data);
    }

    // Deletes an image.
    public function delete($imageHash)
    {
        $this->setEndpoint(Endpoint::IMAGE);

        $this->setQueryImageHash($imageHash);

        return $this->delete();
    }

    // Favorite an image with the given ID.
    public function favorite($imageHash)
    {
        $this->setEndpoint(Endpoint::IMAGE_FAVORITE);

        $this->setQueryImageHash($imageHash);

        return $this->post();
    }
}
