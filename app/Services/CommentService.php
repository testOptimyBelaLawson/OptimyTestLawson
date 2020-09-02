<?php

namespace App\Services;

use App\Models\Comment;
use App\Repositories\CommentRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class CommentService
{
    /**
     * @var $commentRepository
     */
    protected $commentRepository;

    /**
     * CommentService constructor.
     *
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * Delete comment by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $comment = $this->commentRepository->delete($id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to delete comment data');
        }

        DB::commit();

        return $comment;

    }

    /**
     * Get all comment.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->commentRepository->getAllComment();
    }

    /**
     * Get comment by id.
     *
     * @param $id
     * @return String
     */
    public function getById($id)
    {
        return $this->commentRepository->getById($id);
    }

    /**
     * Update comment data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function updateComment($data, $id)
    {
        $validator = Validator::make($data, [
            'body' => 'bail|max:255'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $comment = $this->commentRepository->update($data, $id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to update comment data');
        }

        DB::commit();

        return $comment;

    }

    /**
     * Validate comment data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function saveCommentData($data)
    {
        $validator = Validator::make($data, [
            'body' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->commentRepository->save($data);

        return $result;
    }

}