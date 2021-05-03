<?php

namespace Melsaka\Api;

use Melsaka\Traits\RequestTrait;

class Account
{
    use RequestTrait;

    // Check the current rate limit status on your application.
    public function credits()
    {
        $this->setEndpoint(Endpoint::CREDITS);

        return $this->get();
    }

    // Generates new access token.
    public function newToken()
    {
        $this->setEndpoint(Endpoint::GENERATE_ACCESS_TOKEN);

        return $this->post($this->credentials->getAccessTokenGenerators());
    }

    // Request standard user information.
    public function profile($username = null)
    {
        $username = $username ?? $this->username;

        $this->setEndpoint(Endpoint::ACCOUNT);

        $this->setQueryUsername($username);

        return $this->get();
    }

    // Returns the account settings.
    public function settings()
    {
        $this->setEndpoint(Endpoint::SETTINGS);

        return $this->get();
    }

    // Updates the account settings.
    public function changeSettings($data)
    {
        $this->setEndpoint(Endpoint::SETTINGS);

        return $this->put($data);
    }

    // Checks to see if account has verified its email address.
    public function isVerified()
    {
        $this->setEndpoint(Endpoint::ACCOUNT_VERIFY_USER_EMAIL);

        $this->setQueryUsername($this->username);

        return $this->get();
    }

    // Sends an email to verify that your email is valid to upload to gallery.
    public function verify()
    {
        $this->setEndpoint(Endpoint::ACCOUNT_VERIFY_USER_EMAIL);
     
        $this->setQueryUsername($this->username);
     
        return $this->post();
    }

    // Get the list of available avatars for your account.
    public function avatars()
    {
        $this->setEndpoint(Endpoint::ACCOUNT_AVALIABLE_AVATARS);

        $this->setQueryUsername($this->username);

        return $this->get();
    }

    // Get the current account's avatar URL and avatar name.
    public function avatar()
    {
        $this->setEndpoint(Endpoint::ACCOUNT_AVATAR);

        $this->setQueryUsername($this->username);

        return $this->get();
    }

    // Returns all of the reply notifications for your account.
    public function replies($new = true)
    {
        $this->setEndpoint(Endpoint::ACCOUNT_REPLIES);

        $this->setQueryUsername($this->username);

        return $this->get(['new' => $new]);
    }

    // Follows the {tag}.
    public function followTag($tag)
    {
        $this->setEndpoint(Endpoint::ACCOUNT_TAG);

        $this->setQueryTag($tag);

        return $this->post();
    }

    // Unfollows the {tag}.
    public function unfollowTag($tag)
    {
        $this->setEndpoint(Endpoint::ACCOUNT_TAG);

        $this->setQueryTag($tag);

        return $this->delete();
    }

    // Return the images the user has favorited in the gallery.
    public function galleryFavorites($username = null, $page = 0, $sort = 'newest')
    {
        $username = $username ?? $this->username;

        $this->setEndpoint(Endpoint::ACCOUNT_GALLERY_FAVORITES);

        $this->setQueryUsername($username);

        $this->setQueryPage($page);

        $this->setQuerySort($sort);

        return $this->get();
    }

    // Returns the users favorited images.
    public function favorites($username = null, $page = 0, $sort = 'newest')
    {
        $username = $username ?? $this->username;

        $this->setEndpoint(Endpoint::ACCOUNT_FAVORITES);

        $this->setQueryUsername($username);

        $this->setQueryPage($page);

        $this->setQuerySort($sort);

        return $this->get();
    }

    // Return the images a user has submitted to the gallery.
    public function submissions($username = null, $page = 0, $sort = 'newest')
    {
        $username = $username ?? $this->username;

        $this->setEndpoint(Endpoint::ACCOUNT_SUBMISSIONS);

        $this->setQueryUsername($username);

        $this->setQueryPage($page);

        $this->setQuerySort($sort);

        return $this->get();
    }

    // ------------------------------------ //
    // --------- Blocks Section --------- //
    // ------------------------------------ //
    
    // List all accounts being blocked.
    public function blocks()
    {
        $this->setEndpoint(Endpoint::ACCOUNT_BLOCKS);

        return $this->get();
    }

    // Determine if the user making the request has blocked a username.
    public function blockStatus($username)
    {
        $this->setEndpoint(Endpoint::ACCOUNT_BLOCK_STATUS);

        $this->setQueryUsername($username);

        return $this->get();
    }

    // Block a user.
    public function block($username)
    {
        $this->setEndpoint(Endpoint::ACCOUNT_BLOCK_CREATE);

        $this->setQueryUsername($username);
        
        return $this->post();
    }

    // Unblock a user.
    public function unblock($username)
    {
        $this->setEndpoint(Endpoint::ACCOUNT_BLOCK_DELETE);
        
        $this->setQueryUsername($username);

        return $this->delete();
    }

    // ------------------------------------ //
    // --------- Images Section --------- //
    // ------------------------------------ //

    // Get all the images for the account that is currently authenticated.
    public function images($page = 0)
    {
        $this->setEndpoint(Endpoint::ACCOUNT_IMAGES);

        $this->setQueryUsername($this->username);

        $this->setQueryPage($page);
        
        return $this->get();
    }

    // Return information about a specific image.
    public function image($imageId)
    {
        $this->setEndpoint(Endpoint::ACCOUNT_IMAGE);

        $this->setQueryUsername($this->username);

        $this->setQueryImageId($imageId);

        return $this->get();
    }

    // Returns an array of Image IDs that are associated with the authenticated account.
    public function imageIds($page = 0)
    {
        $this->setEndpoint(Endpoint::ACCOUNT_IMAGE_IDS);

        $this->setQueryUsername($this->username);

        $this->setQueryPage($page);
        
        return $this->get();
    }

    // Returns the total number of images associated with the account.
    public function imageCount()
    {
        $this->setEndpoint(Endpoint::ACCOUNT_IMAGE_COUNT);

        $this->setQueryUsername($this->username);

        return $this->get();
    }

    // Deletes an Image. This requires a delete hash rather than an ID.
    public function imageDelete($imageHash)
    {
        $this->setEndpoint(Endpoint::ACCOUNT_IMAGE);

        $this->setQueryUsername($this->username);

        $this->setQueryImageId($imageHash);

        return $this->delete();
    }

    // ------------------------------------ //
    // --------- Albums Section --------- //
    // ------------------------------------ //

    // Get all the albums associated with the provided username.
    public function albums($username = null, $page = 0)
    {
        $username = $username ?? $this->username;

        $this->setEndpoint(Endpoint::ACCOUNT_ALBUMS);

        $this->setQueryUsername($username);

        $this->setQueryPage($page);

        return $this->get();
    }

    // Get additional information about an album.
    public function album($albumHash)
    {
        $this->setEndpoint(Endpoint::ACCOUNT_ALBUM);

        $this->setQueryUsername($this->username);

        $this->setQueryAlbumHash($albumHash);

        return $this->get();
    }

    // Return an array of all of the album IDs (hashes).
    public function albumIds($username = null, $page = 0)
    {
        $username = $username ?? $this->username;

        $this->setEndpoint(Endpoint::ACCOUNT_ALBUM_IDS);

        $this->setQueryUsername($username);

        $this->setQueryPage($page);

        return $this->get();
    }

    // Return the total number of albums associated with the account.
    public function albumCount($username = null)
    {
        $username = $username ?? $this->username;

        $this->setEndpoint(Endpoint::ACCOUNT_ALBUM_COUNT);

        $this->setQueryUsername($username);

        return $this->get();
    }

    // Delete an Album with a given id.
    public function albumDelete($albumHash)
    {
        $this->setEndpoint(Endpoint::ACCOUNT_ALBUM);

        $this->setQueryUsername($this->username);

        $this->setQueryAlbumHash($albumHash);

        return $this->delete();
    }

    // ------------------------------------ //
    // --------- Comments Section --------- //
    // ------------------------------------ //

    // Return the comments the user has created.
    public function comments($username = null, $page = 0, $sort = 'newest')
    {
        $username = $username ?? $this->username;

        $this->setEndpoint(Endpoint::ACCOUNT_COMMENTS);

        $this->setQueryUsername($username);

        $this->setQueryPage($page);

        $this->setQuerySort($sort);

        return $this->get();
    }

    // Return information about a specific comment.
    public function comment($commentId)
    {
        $this->setEndpoint(Endpoint::ACCOUNT_COMMENT);

        $this->setQueryUsername($this->username);

        $this->setQueryCommentId($commentId);

        return $this->get();
    }

    // Return an array of all of the comment IDs.
    public function commentIds($username = null, $page = 0, $sort = 'newest')
    {
        $username = $username ?? $this->username;

        $this->setEndpoint(Endpoint::ACCOUNT_COMMENT_IDS);

        $this->setQueryUsername($username);

        $this->setQueryPage($page);

        $this->setQuerySort($sort);

        return $this->get();
    }

    // Return a count of all of the comments associated with the account.
    public function commentCount($username = null)
    {
        $username = $username ?? $this->username;

        $this->setEndpoint(Endpoint::ACCOUNT_COMMENT_COUNT);

        $this->setQueryUsername($username);

        return $this->get();
    }

    // Delete a comment.
    public function commentDelete($commentId)
    {
        $this->setEndpoint(Endpoint::ACCOUNT_COMMENT);

        $this->setQueryUsername($this->username);

        $this->setQueryCommentId($commentId);

        return $this->delete();
    }
}
