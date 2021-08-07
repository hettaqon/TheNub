<?php

namespace App;
use App\Models\Comment;
use App\Models\Group;
use App\Models\Post;
use App\Models\User;

class Groups
{
    /**
     * @var Comment
     */
    protected $comment;
    /**
     * @var Group
     */
    protected $group;
    /**
     * @var Post
     */
    protected $post;
    /**
     * @var User
     */
    protected $user;

    public function __construct(Comment $comment, Group $group, Post $post, User $user)
    {
        $this->comment = $comment;
        $this->group = $group;
        $this->post = $post;
        $this->user = $user;
    }

    /**
     * Returns User instance with group relation.
     *
     * @param int $userId
     *
     * @return User
     */
    public function getUser($userId)
    {
        return $this->user->find($userId);
    }

    /**
     * Creates a group.
     *
     * @param int   $userId owner of group
     * @param array $data   group information
     *
     * @return Group
     */
    public function create($userId, $data)
    {
        return $this->group->make($userId, $data);
    }

    /**
     * Returns a group.
     *
     * @param int $groupId
     *
     * @return Group
     */
    public function group($groupId)
    {
        return $this->group->findOrFail($groupId);
    }

    /**
     * Creates a post.
     *
     * @param array $data
     *
     * @return Post
     */
    public function createPost($data)
    {
        return $this->post->make($data);
    }

    /**
     * Returns a post.
     *
     * @param int $postId
     *
     * @return Post
     */
    public function post($postId)
    {
        return $this->post->findOrFail($postId);
    }

    /**
     * Adds a comment.
     *
     * @param array $comment
     *
     * @return Comment
     */
    public function addComment($comment)
    {
        return $this->comment->add($comment);
    }

    /**
     * Returns a comment.
     *
     * @param int $commentId
     *
     * @return Comment
     */
    public function comment($commentId)
    {
        return $this->comment->findOrFail($commentId);
    }
}
