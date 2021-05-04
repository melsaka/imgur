<?php

namespace Melsaka\Api;

use Melsaka\Traits\RequestTrait;

class Comment
{
    use RequestTrait;

    // Get information about a specific comment.
    public function info($commentId)
    {
        $this->setEndpoint(Endpoint::COMMENT);

        $this->setQueryCommentId($commentId);

        return $this->get();
    }

    // Creates a new comment, returns the ID of the comment.
    public function create($data)
    {
        $this->setEndpoint(Endpoint::COMMENT_CREATE);

        return $this->post($data);
    }

    // Delete a comment by the given id.
    public function remove($commentId)
    {
        $this->setEndpoint(Endpoint::COMMENT);

        $this->setQueryCommentId($commentId);

        return $this->delete();
    }

    // Get the comment with all of the replies for the comment.
    public function replies($commentId)
    {
        $this->setEndpoint(Endpoint::COMMENT_REPLIES);

        $this->setQueryCommentId($commentId);

        return $this->delete();
    }

    // Create a reply for the given comment.
    public function createReply($commentId, $data)
    {
        $this->setEndpoint(Endpoint::COMMENT);

        $this->setQueryCommentId($commentId);

        return $this->post($data);
    }

    // Vote on a comment. The vote parameter can only be set as up, down, or veto.
    public function vote($commentId, $vote)
    {
        $this->setEndpoint(Endpoint::COMMENT_VOTE);

        $this->setQueryCommentId($commentId);

        $this->setQueryVote($vote);

        return $this->post();
    }

    // Report a comment for being inappropriate.
    public function report($commentId)
    {
        $this->setEndpoint(Endpoint::COMMENT_REPORT);

        $this->setQueryCommentId($commentId);

        return $this->post();
    }
}
