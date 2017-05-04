<?php

namespace AppBundle\Service;

use AppBundle\Entity\User;

class FriendManager
{
    /**
     * @var FacebookFriendManager
     */
    protected $fm;

    /**
     * FriendManager constructor.
     * @param FacebookFriendManager $facebookFriendManager
     */
    public function __construct(FacebookFriendManager $facebookFriendManager)
    {
        $this->fm = $facebookFriendManager;
    }

    /**
     * @param User $user
     * @return array|null
     */
    public function getFriendsList(User $user)
    {
        $friendsList = [];
        if ($user->getFacebookId() !== null){
            $friendsList = $this->fm->getFriendsList($user);
        }
        return $friendsList;
    }
}
