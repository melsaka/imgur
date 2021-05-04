## Introduction

This is an Object Oriented PHP client for the Imgur API. It can be used to interact with the Imgur API in your projects.

### Before Installation

You must have an app on imgur to use this package and make sure to obtain account: 

`username, client_id, client_secret, access_token, refresh_token`.

If you have an application but you don't know how to get your `access_token` and `refresh_token` do the following:

Go to this url `https://api.imgur.com/oauth2/authorize?client_id=CLIENT_ID&response_type=token` 

after changing `CLIENT_ID` with yours.

You should now be redirected to imgur asking you for permission, click on `Allow` button.

Then you will be redirected to imgur homepage and the url should contain info about 

your `access_token`, `refresh_token` and your `account_username`.

**Note:** Imgur upload limit is 50 images per hour, and there is no upload limit per account.

For more info: [What files can I upload? What is the size limit?](https://help.imgur.com/hc/en-us/articles/115000083326-What-files-can-I-upload-What-is-the-size-limit-) 

### Installation

melsaka/imgur may be installed via the Composer package manager:

```bash
composer require melsaka/imgur
```

### Usage

```php
use Melsaka\Imgur;

$credentials = [
    'username'          => '{{ your username }}',
    'client_id'         => '{{ your client_id }}',
    'client_secret'     => '{{ your client_secret }}',
    'access_token'      => '{{ your access_token }}',
    'refresh_token'     => '{{ your refresh_token }}',
];

$imgur = new Imgur($credentials);

// If $username defaulted to null then the method will return data related to the authenticated user
// $data is an associative array, for example ?query=test should be ['query' => 'test']
// For more info about what kind of $data should be sent check out: https://apidocs.imgur.com 

/** ACCOUNT SECTION **/

// Check the current rate limit status on your application.
$imgur->account()->credits();

// Generates new access token.
$imgur->account()->newToken();

// Request standard user information. 
$imgur->account()->profile($username = null);

// Returns the account settings.
$imgur->account()->settings();

// Updates the account settings.
$imgur->account()->changeSettings($data = []);

// Checks to see if account has verified its email address.
$imgur->account()->isVerified();

// Sends an email to verify that your email is valid to upload to gallery.
$imgur->account()->verify();

// Get the list of available avatars for your account.
$imgur->account()->avatars();

// Get the current account's avatar URL and avatar name.
$imgur->account()->avatar();

// Returns all of the reply notifications for your account.
$imgur->account()->replies($new = true);

// Follows the {tag}.
$imgur->account()->followTag($tag);

// Unfollows the {tag}.
$imgur->account()->unfollowTag($tag);

// Return the images the user has favorited in the gallery.
$imgur->account()->galleryFavorites($username = null, $page = 0, $sort = 'newest');

// Returns the users favorited images.
$imgur->account()->favorites($username = null, $page = 0, $sort = 'newest');

// Return the images a user has submitted to the gallery.
$imgur->account()->submissions($username = null, $page = 0, $sort = 'newest');

// List all accounts being blocked.
$imgur->account()->blocks();

// Determine if the user making the request has blocked a username.
$imgur->account()->blockStatus($username);

// Block a user.
$imgur->account()->block($username);

// Unblock a user.
$imgur->account()->unblock($username);

// Get all the images for the account that is currently authenticated.
$imgur->account()->images($page = 0);

// Return information about a specific image.
$imgur->account()->image($imageId);

// Returns an array of Image IDs that are associated with the authenticated account.
$imgur->account()->imageIds($page = 0);

// Returns the total number of images associated with the account.
$imgur->account()->imageCount();

// Deletes an Image. This requires a delete hash rather than an ID.
$imgur->account()->imageDelete($imageHash);

// Get all the albums associated with the provided username.
$imgur->account()->albums($username = null, $page = 0);

// Get additional information about an album.
$imgur->account()->album($albumHash);

// Return an array of all of the album IDs (hashes).
$imgur->account()->albumIds($username = null, $page = 0);

// Return the total number of albums associated with the account.
$imgur->account()->albumCount($username = null);

// Delete an Album with a given id.
$imgur->account()->albumDelete($albumHash);

// Return the comments the user has created.
$imgur->account()->comments($username = null, $page = 0, $sort = 'newest');

// Return information about a specific comment.
$imgur->account()->comment($commentId);

// Return an array of all of the comment IDs.
$imgur->account()->commentIds($username = null, $page = 0, $sort = 'newest');

// Return a count of all of the comments associated with the account.
$imgur->account()->commentCount($username = null);

// Delete a comment.
$imgur->account()->commentDelete($commentId);

// -----------------------------------------------------------

/** GALLERY SECTION **/

$imgur->gallery()->section($section = 'hot', $sort = 'viral', $page = 0, $window = 'day', $data = []);
// Search the gallery with a given query string.
$imgur->gallery()->search($data, $page = 0, $sort = 'viral', $window = 'day');

// View gallery images for a subreddit
$imgur->gallery()->subreddit($subreddit, $sort = 'time', $page = 0, $window = 'week');

// View a single image in the subreddit.
$imgur->gallery()->subredditImage($subreddit, $imageId);

// Gets a list of default tags
$imgur->gallery()->defaultTags();

// Returns tag metadata, and posts tagged with the tagName provided
$imgur->gallery()->tags($galleryHash);

// Update the tags for a post in the gallery
$imgur->gallery()->tagsUpdate($galleryHash, $data);

// Returns tag metadata, and posts tagged with the tagName provided
$imgur->gallery()->tag($tagName, $page = 0, $sort = 'top', $window = 'day');

// Gets metadata about a tag
$imgur->gallery()->tagInfo($tagName);

// Share an Image to the Gallery.
$imgur->gallery()->imageShare($imageHash, $data);

// Share an Album to the Gallery.
$imgur->gallery()->albumShare($albumHash, $data);

// Remove an image from the public gallery.
$imgur->gallery()->remove($galleryHash);

// Get additional information about an album in the gallery.
$imgur->gallery()->album($albumHash);

// Get additional information about an image in the gallery.
$imgur->gallery()->image($imageHash);

// Report an Image in the gallery
$imgur->gallery()->imageReport($galleryHash, $data);

// Get the vote information about an image.
$imgur->gallery()->voteInfo($galleryHash);

// Vote for an image, up or down vote. Send veto to undo a vote.
$imgur->gallery()->vote($galleryHash, $vote);

// Get comments on an image or album in the gallery.
$imgur->gallery()->comments($galleryHash, $commentSort = 'best');

// Information about a specific comment.
$imgur->gallery()->comment($galleryHash, $commentId);

// Album / Image Comment Creation
$imgur->gallery()->commentCreate($galleryHash, $data)

// -----------------------------------------------------------

/** ALBUM SECTION **/

// Get additional information about an album.
$imgur->album()->info($albumHash);

// Return all of the images in the album.
$imgur->album()->images($albumHash);

// Get information about an image in an album.
$imgur->album()->imageInfo($albumHash, $imageHash);

// Create a new album.
$imgur->album()->create($data);

// Update the information of an album.
$imgur->album()->update($albumHash, $data);

// Delete an album with a given ID.
$imgur->album()->remove($albumHash);

// Favorite an album with a given ID.
$imgur->album()->favorite($albumHash);

// Sets the images for an album, removes all other images and only uses the images in this request.
$imgur->album()->setImages($albumHash, $data);

// Adds the images to an album.
$imgur->album()->addImages($albumHash, $data);

// Delete Images from an album.
$imgur->album()->deleteImages($albumHash, $data);

// -----------------------------------------------------------

/** Image SECTION **/

// Get information about an image.
$imgur->image()->info($imageHash);

// Upload a new image or video.
$imgur->image()->upload($data);

// Updates the title or description of an image.
$imgur->image()->update($imageHash, $data);

// Deletes an image.
$imgur->image()->remove($imageHash);

// Favorite an image with the given ID.
$imgur->image()->favorite($imageHash);

// -----------------------------------------------------------

/** COMMENT SECTION **/

// Get information about a specific comment.
$imgur->comment()->info($commentId);

// Creates a new comment, returns the ID of the comment.
$imgur->comment()->create($data);

// Delete a comment by the given id.
$imgur->comment()->remove($commentId);

// Get the comment with all of the replies for the comment.
$imgur->comment()->replies($commentId);

// Create a reply for the given comment.
$imgur->comment()->createReply($commentId, $data);

// Vote on a comment. The vote parameter can only be set as up, down, or veto.
$imgur->comment()->vote($commentId, $vote);

// Report a comment for being inappropriate.
$imgur->comment()->report($commentId);
```

Make sure to check out: [Imgur Api Documentation](https://apidocs.imgur.com/)

## License

melsaka/imgur is open-sourced library licensed under the [MIT license](LICENSE.md).
