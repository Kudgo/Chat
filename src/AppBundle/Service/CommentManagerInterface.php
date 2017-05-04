<?php

namespace AppBundle\Service;

use AppBundle\Entity\Comment;
use Doctrine\ORM\EntityManagerInterface;

interface CommentManagerInterface
{
    /**
     * CommentManagerInterface constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em);

    /**
     * @return mixed
     */
    public function create();

    /**
     * @param $commentId
     * @return mixed
     */
    public function findById($commentId);

    /**
     * @return mixed
     */
    public function findAll();

    /**
     * @param Comment $comment
     * @return mixed
     */
    public function save(Comment $comment);
}