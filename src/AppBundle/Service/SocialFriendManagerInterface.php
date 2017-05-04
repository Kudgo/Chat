<?php

namespace AppBundle\Service;

use AppBundle\Entity\User;

interface SocialFriendManagerInterface
{
    /**
     * @param User $user
     * @return mixed
     */
    public function getFriendsList(User $user);
}
