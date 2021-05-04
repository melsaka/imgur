<?php

namespace Melsaka\Api;

class Endpoint
{
    // ACCOUNT ENPOINTS
    const CREDITS = 'https://api.imgur.com/3/credits';
    const GENERATE_ACCESS_TOKEN = 'https://api.imgur.com/oauth2/token';

    const ACCOUNT = 'https://api.imgur.com/3/account/{username}';
    const SETTINGS = 'https://api.imgur.com/3/account/me/settings';
    const ACCOUNT_VERIFY_USER_EMAIL = 'https://api.imgur.com/3/account/{username}/verifyemail';
    const ACCOUNT_AVALIABLE_AVATARS = 'https://api.imgur.com/3/account/{username}/available_avatars';
    const ACCOUNT_AVATAR = 'https://api.imgur.com/3/account/{username}/avatar';

    const ACCOUNT_REPLIES = 'https://api.imgur.com/3/account/{username}/notifications/replies';
    const ACCOUNT_TAG = 'https://api.imgur.com/3/account/me/follow/tag/{tag}';

    const ACCOUNT_GALLERY_FAVORITES = 'https://api.imgur.com/3/account/{username}/gallery_favorites/{page}/{sort}';
    const ACCOUNT_FAVORITES = 'https://api.imgur.com/3/account/{username}/favorites/{page}/{sort}';
    const ACCOUNT_SUBMISSIONS = 'https://api.imgur.com/3/account/{username}/submissions/{page}/{sort}';

    const ACCOUNT_BLOCKS = 'https://api.imgur.com/3/account/me/block';
    const ACCOUNT_BLOCK_STATUS = 'https://api.imgur.com/account/v1/{username}/block';
    const ACCOUNT_BLOCK_CREATE = 'https://api.imgur.com/account/v1/{username}/block'; // POST
    const ACCOUNT_BLOCK_DELETE = 'https://api.imgur.com/account/v1/{username}/block'; // DELETE

    const ACCOUNT_IMAGES = 'https://api.imgur.com/3/account/{username}/images/{page}';
    const ACCOUNT_IMAGE = 'https://api.imgur.com/3/account/{username}/image/{imageId}';
    const ACCOUNT_IMAGE_IDS = 'https://api.imgur.com/3/account/{username}/images/ids/{page}';
    const ACCOUNT_IMAGE_COUNT = 'https://api.imgur.com/3/account/{username}/images/count';

    const ACCOUNT_ALBUMS = 'https://api.imgur.com/3/account/{username}/albums/{page}';
    const ACCOUNT_ALBUM = 'https://api.imgur.com/3/account/{username}/album/{albumHash}';
    const ACCOUNT_ALBUM_IDS = 'https://api.imgur.com/3/account/{username}/albums/ids/{page}';
    const ACCOUNT_ALBUM_COUNT = 'https://api.imgur.com/3/account/{username}/albums/count';

    const ACCOUNT_COMMENTS = 'https://api.imgur.com/3/account/{username}/comments/{sort}/{page}';
    const ACCOUNT_COMMENT = 'https://api.imgur.com/3/account/{username}/comment/{commentId}';
    const ACCOUNT_COMMENT_IDS = 'https://api.imgur.com/3/account/{username}/comments/ids/{sort}/{page}';
    const ACCOUNT_COMMENT_COUNT = 'https://api.imgur.com/3/account/{username}/comments/count';

    // COMMENT ENPOINTS
    const COMMENT = 'https://api.imgur.com/3/comment/{commentId}';
    const COMMENT_CREATE = 'https://api.imgur.com/3/comment';
    const COMMENT_REPLIES = 'https://api.imgur.com/3/comment/{commentId}/replies';
    const COMMENT_VOTE = 'https://api.imgur.com/3/comment/{commentId}/vote/{vote}';
    const COMMENT_REPORT = 'https://api.imgur.com/3/comment/{commentId}/report';

    // IMAGE ENDPOINT
    const IMAGE_UPLOAD = 'https://api.imgur.com/3/image';
    const IMAGE = 'https://api.imgur.com/3/image/{imageHash}';
    const IMAGE_FAVORITE = 'https://api.imgur.com/3/image/{imageHash}/favorite';
 
    // ALBUM ENDPOINT
    const ALBUM = 'https://api.imgur.com/3/album/{albumHash}';
    const ALBUM_IMAGES = 'https://api.imgur.com/3/album/{albumHash}/images';
    const ALBUM_IMAGE = 'https://api.imgur.com/3/album/{albumHash}/image/{imageHash}';
    const ALBUM_CREATE = 'https://api.imgur.com/3/album';
    const ALBUM_FAVORITE = 'https://api.imgur.com/3/album/{albumHash}/favorite';
    const ALBUM_ADD_IMAGES = 'https://api.imgur.com/3/album/{albumHash}/add';
    const ALBUM_DELETE_IMAGES = 'https://api.imgur.com/3/album/{albumHash}/remove_images';

    // GALLEREY ENDPOINT
    const GALLERY_SECTION = 'https://api.imgur.com/3/gallery/{section}/{sort}/{window}/{page}';
    const GALLEREY = 'https://api.imgur.com/3/gallery/{galleryHash}';
    const GALLEREY_SUBREDDIT = 'https://api.imgur.com/3/gallery/r/{subreddit}/{sort}/{window}/{page}';
    const GALLEREY_SUBREDDIT_IMAGE = 'https://api.imgur.com/3/gallery/r/{subreddit}/{imageId}';
    const GALLEREY_TAG = 'https://api.imgur.com/3/gallery/t/{tagName}/{sort}/{window}/{page}';
    const GALLEREY_TAGS = 'https://api.imgur.com/3/gallery/{galleryHash}/tags';
    const GALLEREY_UPDATE_TAGS = 'https://api.imgur.com/3/gallery/tags/{galleryHash}';
    const GALLEREY_DEFAULT_TAGS = 'https://api.imgur.com/3/tags';
    const GALLEREY_TAG_INFO = 'https://api.imgur.com/3/gallery/tag_info/{tagName}';
    const GALLEREY_SEARCH = 'https://api.imgur.com/3/gallery/search/{sort}/{window}/{page}';
    const GALLEREY_IMAGE = 'https://api.imgur.com/3/gallery/image/{imageHash}';
    const GALLEREY_ALBUM = 'https://api.imgur.com/3/gallery/album/{albumHash}';

    const GALLEREY_ALBUM_IMAGE_REPORT = 'https://api.imgur.com/3/gallery/image/{galleryHash}/report';
    const GALLEREY_ALBUM_IMAGE_VOTE = 'https://api.imgur.com/3/gallery/{galleryHash}/votes';
    const GALLEREY_ALBUM_IMAGE_VOTE_CREATE = 'https://api.imgur.com/3/gallery/{galleryHash}/vote/{vote}';
    const GALLEREY_ALBUM_IMAGE_COMMENTS = 'https://api.imgur.com/3/gallery/{galleryHash}/comments/{commentSort}';
    const GALLEREY_ALBUM_IMAGE_COMMENT = 'https://api.imgur.com/3/gallery/{galleryHash}/comments/{commentId}';
    const GALLEREY_ALBUM_IMAGE_COMMENT_CREATE = 'https://api.imgur.com/3/gallery/{galleryHash}/comment';
}
