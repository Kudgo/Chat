<?php

namespace AppBundle\Service;

use AppBundle\Entity\Comment;
use Doctrine\ORM\EntityManagerInterface;

class CommentManager implements CommentManagerInterface
{
    /** @var
     * EntityManagerInterface
     */
    protected $em;

    /**
     * CommentManager constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @return Comment
     */
    public function create()
    {
        return new Comment();
    }

    /**
     * @param $commentId
     * @return Comment|object
     */
    public function findById($commentId)
    {
        return $this->em->getRepository('AppBundle:Comment')->find($commentId);
    }

    /**
     * @return Comment[]|array
     */
    public function findAll()
    {
        return $this->em->getRepository('AppBundle:Comment')->findAll();
    }

    /**
     * @param Comment $comment
     */
    public function save(Comment $comment)
    {
        $this->em->persist($comment);
        $this->em->flush();
    }
}
