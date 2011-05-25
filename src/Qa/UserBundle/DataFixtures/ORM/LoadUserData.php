<?php

namespace Qa\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Qa\UserBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load($manager)
    {
        $userOne = new User();
        $userOne->setName('pilot');
        $userOne->setEmail('pilot@localhost.loc');

        $manager->persist($userOne);

        $userTwo = new User();
        $userTwo->setName('ingvar');
        $userTwo->setEmail('ingvar@localhost.loc');

        $manager->persist($userTwo);

		$userThree = new User();
        $userThree->setName('jack');
        $userThree->setEmail('jack@localhost.loc');

        $manager->persist($userThree);

        $manager->flush();

        $this->addReference('user-one', $userOne);
        $this->addReference('user-two', $userTwo);
        $this->addReference('user-three', $userThree);
    }
 
    public function getOrder()
    {
	    return 1;
    }
}