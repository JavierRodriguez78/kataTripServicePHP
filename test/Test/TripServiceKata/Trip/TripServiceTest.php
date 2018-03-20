<?php

namespace Test\TripServiceKata\Trip;

use PHPUnit\Framework\TestCase;
use TripServiceKata\Trip\TripService;
use TripServiceKata\User\User;
use TripServiceKata\Trip\Trip;

class TripServiceTest extends TestCase
{
    private $tripService;

    protected function setUp()
    {
        $this->tripService = new TestableTripService();
    }

    /**
     * @test
     * @expectedException  \TripServiceKata\Exception\UserNotLoggedInException
     */
    public function itShoudThrownExceptionWhenUserIsNotLooged()
    {
        $user = new User('Xavi');
        $this->tripService->getTripsByUser($user);
    }

    /**
     * @test
    */
    public function itShoudNotReturnArrayAnyTripsWhenUsersAreNotFriends()
    {
        $loggedInUser = new User('Pepe');
        $friend = new User('Jose');
        $loggedInUser->addFriend($friend);
        $jappanTrip  = new Trip();
        $loggedInUser ->addTrip($jappanTrip);

        $otherUser = new User('Dani');
        $tripService = new TestableTripService($loggedInUser);
        $trips = $tripService->getTripsByUser($otherUser);

        $this->assertTrue(is_array($trips));
        $this->assertEmpty($trips);


    }


}

 class TestableTripService extends  TripService
 {
     private $loggedInUser;

     public function __construct(User $loggedInUser = null)
     {
         $this->loggedInUser = $loggedInUser;
     }


     protected function getLoggedInUser()
     {
         return $this->loggedInUser;
     }
 }
