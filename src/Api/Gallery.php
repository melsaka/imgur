<?php

namespace Melsaka\Api;

use Melsaka\Traits\RequestTrait;

class Gallery
{
    use RequestTrait;

    // Search the gallery with a given query string.
    public function search($data, $page = 0, $sort = 'viral', $window = 'day')
    {
        $this->setEndpoint(Endpoint::GALLEREY_SEARCH);

        $this->setQueryPage($page);

        $this->setQuerySort($sort);

        $this->setQueryWindow($window);

        return $this->get($data);
    }

    public function section($section = 'hot', $sort = 'viral', $page = 0, $window = 'day', $data = [])
    {
        $this->setEndpoint(Endpoint::GALLERY_SECTION);

        $this->setQuerySection($section);

        $this->setQuerySort($sort);

        $this->setQueryPage($page);

        $this->setQueryWindow($window);

        return $this->get($data);
    }

    // View gallery images for a subreddit
    public function subreddit($subreddit, $sort = 'time', $page = 0, $window = 'week')
    {
        $this->setEndpoint(Endpoint::GALLEREY_SUBREDDIT);

        $this->setQuerySubreddit($subreddit);

        $this->setQuerySort($sort);

        $this->setQueryPage($page);

        $this->setQueryWindow($window);

        return $this->get();
    }

    // View a single image in the subreddit.
    public function subredditImage($subreddit, $imageId)
    {
        $this->setEndpoint(Endpoint::GALLEREY_SUBREDDIT_IMAGE);

        $this->setQuerySubreddit($subreddit);

        $this->setQueryImageId($imageId);

        return $this->get();
    }

    // Gets a list of default tags
    public function defaultTags()
    {
        $this->setEndpoint(Endpoint::GALLEREY_DEFAULT_TAGS);

        return $this->get();
    }

    // Returns tag metadata, and posts tagged with the tagName provided
    public function tags($galleryHash)
    {
        $this->setEndpoint(Endpoint::GALLEREY_TAGS);

        $this->setQueryGalleryHash($galleryHash);

        return $this->get();
    }

    // Update the tags for a post in the gallery
    public function tagsUpdate($galleryHash, $data)
    {
        $this->setEndpoint(Endpoint::GALLEREY_UPDATE_TAGS);

        $this->setQueryGalleryHash($galleryHash);

        return $this->post($data);
    }

    // Returns tag metadata, and posts tagged with the tagName provided
    public function tag($tagName, $page = 0, $sort = 'top', $window = 'day')
    {
        $this->setEndpoint(Endpoint::GALLEREY_TAG);

        $this->setQueryTagName($tagName);

        $this->setQueryPage($page);

        $this->setQuerySort($sort);

        $this->setQueryWindow($window);

        return $this->get();
    }

    // Gets metadata about a tag
    public function tagInfo($tagName)
    {
        $this->setEndpoint(Endpoint::GALLEREY_TAG_INFO);

        $this->setQueryTagName($tagName);

        return $this->get();
    }

    public function imageShare($imageHash, $data)
    {
        $this->setEndpoint(Endpoint::GALLEREY_IMAGE);

        $this->setQueryImageHash($imageHash);

        return $this->post($data);
    }

    public function albumShare($albumHash, $data)
    {
        $this->setEndpoint(Endpoint::GALLEREY_ALBUM);
        
        $this->setQueryAlbumHash($albumHash);

        return $this->post($data);
    }

    // Remove an image from the public gallery.
    public function remove($galleryHash)
    {
        $this->setEndpoint(Endpoint::GALLEREY);
        
        $this->setQueryGalleryHash($galleryHash);

        return $this->delete();
    }

    // Get additional information about an album in the gallery.
    public function album($albumHash)
    {
        $this->setEndpoint(Endpoint::GALLEREY_ALBUM);
        
        $this->setQueryAlbumHash($albumHash);

        return $this->get();
    }

    // Get additional information about an album in the gallery.
    public function image($imageHash)
    {
        $this->setEndpoint(Endpoint::GALLEREY_IMAGE);
        
        $this->setQueryImageHash($imageHash);

        return $this->get();
    }

    // Report an Image in the gallery
    public function imageReport($galleryHash, $data)
    {
        $this->setEndpoint(Endpoint::GALLEREY_ALBUM_IMAGE_REPORT);
        
        $this->setQueryGalleryHash($galleryHash);

        return $this->post($data);
    }

    // Get the vote information about an image.
    public function vote($galleryHash)
    {
        $this->setEndpoint(Endpoint::GALLEREY_ALBUM_IMAGE_VOTE);
        
        $this->setQueryGalleryHash($galleryHash);

        return $this->get();
    }

    // Vote for an image, up or down vote. Send veto to undo a vote.
    public function vote($galleryHash, $vote)
    {
        $this->setEndpoint(Endpoint::GALLEREY_ALBUM_IMAGE_VOTE);
        
        $this->setQueryGalleryHash($galleryHash);
        
        $this->setQueryVote($vote);

        return $this->post();
    }

    // Get comments on an image or album in the gallery.
    public function comments($galleryHash, $commentSort = 'best')
    {
        $this->setEndpoint(Endpoint::GALLEREY_ALBUM_IMAGE_COMMENTS);
        
        $this->setQueryGalleryHash($galleryHash);
        
        $this->setQueryCommentSort($commentSort);

        return $this->get();
    }

    // Information about a specific comment.
    public function comments($galleryHash, $commentId)
    {
        $this->setEndpoint(Endpoint::GALLEREY_ALBUM_IMAGE_COMMENT);
        
        $this->setQueryGalleryHash($galleryHash);
        
        $this->setQueryCommentId($commentId);

        return $this->get();
    }


    // Album / Image Comment Creation
    public function commentCreate($galleryHash, $data)
    {
        $this->setEndpoint(Endpoint::GALLEREY_ALBUM_IMAGE_COMMENT_CREATE);
        
        $this->setQueryGalleryHash($galleryHash);
        
        return $this->post($data);
    }
}
