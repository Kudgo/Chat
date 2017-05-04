<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    /** @var
     * CommentManager
     */
    protected $commentManager;

    /**
     * @Route("/changeComment", name="changeComment")
     * @param Request $request
     * @return Response
     */
    public function changeComment(Request $request){
        $this->commentManager = $this->container->get('app.comment_manager');
        $commentId      = $request->request->get('id');
        $commentContent = $request->request->get('commentText');
        $comment = $this->commentManager->findById($commentId);
        $comment->setCommentContent($commentContent);
        $this->commentManager->save($comment);
        return new Response("commentSuccessfullyAdded");
    }

    /**
     * @Route("/newComment", name="newComment")
     * @param Request $request
     * @return Response
     */
    public function newComment(Request $request){
        $this->commentManager = $this->container->get('app.comment_manager');
        $user = $this->getUser();
        $newCommentText = $request->request->get('commentText');
        $newComment = $this->commentManager->create();
        $newComment->setCommentContent($newCommentText);
        $newComment->setUser($user);
        $this->commentManager->save($newComment);
        return new Response($this->redirect("/chat"));
    }
}
