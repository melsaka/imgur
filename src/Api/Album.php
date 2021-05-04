<?php

namespace Melsaka\Api;

use Melsaka\Traits\RequestTrait;

class Album
{
    use RequestTrait;

    // Get additional information about an album.
    public function info($albumHash)
    {
        $this->setEndpoint(Endpoint::ALBUM);

        $this->setQueryAlbumHash($albumHash);

        return $this->get();
    }

    // Return all of the images in the album.
    public function images($albumHash)
    {
        $this->setEndpoint(Endpoint::ALBUM_IMAGES);

        $this->setQueryAlbumHash($albumHash);

        return $this->get();
    }

    // Get information about an image in an album.
    public function imageInfo($albumHash, $imageHash)
    {
        $this->setEndpoint(Endpoint::ALBUM_IMAGE);

        $this->setQueryAlbumHash($albumHash);

        $this->setQueryImageHash($imageHash);

        return $this->get();
    }

    // Create a new album.
    public function create($data)
    {
        $this->setEndpoint(Endpoint::ALBUM_CREATE);

        return $this->post($data);
    }

    // Update the information of an album.
    public function update($albumHash, $data)
    {
        $this->setEndpoint(Endpoint::ALBUM);

        $this->setQueryAlbumHash($albumHash);

        return $this->put($data);
    }

    // Delete an album with a given ID.
    public function remove($albumHash)
    {
        $this->setEndpoint(Endpoint::ALBUM);
        
        $this->setQueryAlbumHash($albumHash);

        return $this->delete();
    }

    // Favorite an album with a given ID.
    public function favorite($albumHash)
    {
        $this->setEndpoint(Endpoint::ALBUM_FAVORITE);
        
        $this->setQueryAlbumHash($albumHash);

        return $this->post();
    }

    // Sets the images for an album, removes all other images and only uses the images in this request.
    public function setImages($albumHash, $data)
    {
        $this->setEndpoint(Endpoint::ALBUM);
        
        $this->setQueryAlbumHash($albumHash);

        return $this->post($data);
    }

    // Adds the images to an album.
    public function addImages($albumHash, $data)
    {
        $this->setEndpoint(Endpoint::ALBUM_ADD_IMAGES);
        
        $this->setQueryAlbumHash($albumHash);

        return $this->post($data);
    }

    // Delete Images from an album.
    public function deleteImages($albumHash, $data)
    {
        $this->setEndpoint(Endpoint::ALBUM_DELETE_IMAGES);
        
        $this->setQueryAlbumHash($albumHash);

        return $this->post($data);
    }
}
