<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    /**
     * @var Comment
     */
    protected $comment;

    /**
     * CommentRepository constructor.
     *
     * @param Comment $comment
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get all comment.
     *
     * @return Comment $comment
     */
    public function getAllComment()
    {
        return $this->comment
            ->get();
    }

    /**
     * Get comment by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->comment
            ->where('id', $id)
            ->get();
    }

    /**
     * Save Comment
     *
     * @param $data
     * @return Comment
     */
    public function save($data)
    {
        $comment = new $this->comment;

        $comment->body = $data['body'];
        $comment->post_id = $data['post_id'];

        $comment->save();

        return $comment->fresh();
    }

    /**
     * Update Comment
     *
     * @param $data
     * @return Comment
     */
    public function update($data, $id)
    {
        
        $comment = $this->comment->find($id);

        $comment->body = $data['body'];
        $comment->post_id = $data['post_id'];

        $comment->update();

        return $comment;
    }

    /**
     * Update Comment
     *
     * @param $data
     * @return Comment
     */
    public function delete($id)
    {
        
        $comment = $this->comment->find($id);
        $comment->delete();

        return $comment;
    }

}