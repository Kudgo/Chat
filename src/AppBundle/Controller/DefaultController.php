<?php

namespace AppBundle\Controller;

use AppBundle\Service\CommentManager;
use AppBundle\Service\FriendManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @var  CommentManager
     */
    protected $commentManager;

    /**
     * @var FriendManager
     */
    protected $friendManager;

    /**
     * @Route("/chat", name="homepage")
     * @return Response
     */
    public function chatAction()
    {
        $this->commentManager = $this->container->get('app.comment_manager');
        $this->friendManager = $this->container->get('app.friend_manager');
        $user = $this->getUser();
        $commentsList = $this->commentManager->findAll();
        $friendsList = $this->friendManager->getFriendsList($user);
        $response = new Response($this->renderView('default/index.html.twig', array(
            'commentsList' => $commentsList,
            'friendsList' => $friendsList,
            'currentUser' => $user
        )));
        return $response;
    }
}
