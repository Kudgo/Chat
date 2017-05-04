<?php

namespace AppBundle\Service;

use AppBundle\Entity\User;
use Facebook\Facebook;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class FacebookFriendManager implements SocialFriendManagerInterface
{
    protected $tokenStorage;

    /**
     * @var string
     */
    protected $facebookClientId;

    /**
     * @var string
     */
    protected $facebookClientSecret;

    /**
     * FacebookFriendManager constructor.
     * @param TokenStorage $tokenStorage
     * @param $facebookClientId
     * @param $facebookClientSecret
     */
    public function __construct(TokenStorage $tokenStorage, $facebookClientId, $facebookClientSecret)
    {
        $this->tokenStorage = $tokenStorage;
        $this->facebookClientId = $facebookClientId;
        $this->facebookClientSecret = $facebookClientSecret;
    }

    /**
     * @param User $user
     * @return array
     */
    public function getFriendsList(User $user)
    {
        $friendsList = [];
        $token = $this->tokenStorage->getToken()->getAccessToken();
        $fb = new Facebook([
            'app_id' => $this->facebookClientId,
            'app_secret' => $this->facebookClientSecret,
            'default_graph_version' => 'v2.2',
        ]);
        $response = $fb->get('/me/friends', $token);
        $graphEdge = $response->getGraphEdge();
        foreach ($graphEdge as $graphNode) {
            $friendsList[] = $graphNode['name'];
        }
        return $friendsList;
    }
}