<?php

namespace Qa\QuestionBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Qa\QuestionBundle\Entity\Tag;

class LoadTagData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load($manager)
    {
        $tagOne = new Tag();
        $tagOne->setName('sleep');
        $tagOne->setSlug('sleep');
        
        $manager->persist($tagOne);

        $tagTwo = new Tag();
        $tagTwo->setName('Mac');
        $tagTwo->setSlug('mac');

        $manager->persist($tagTwo);

        $tagThree = new Tag();
        $tagThree->setName('security');
        $tagThree->setSlug('security');

        $manager->persist($tagThree);
        
        $tagFour = new Tag();
        $tagFour->setName('Thunderbolt');
        $tagFour->setSlug('thunderbolt');

        $manager->persist($tagFour);

        $tagFive = new Tag();
        $tagFive->setName('Drive Icons');
        $tagFive->setSlug('drive-icons');

        $manager->persist($tagFive);

        $manager->flush();

        $this->addReference('tag-one', $tagOne);
        $this->addReference('tag-two', $tagTwo);
        $this->addReference('tag-three', $tagThree);
        $this->addReference('tag-four', $tagFour);
        $this->addReference('tag-five', $tagFive);
    }
 
    public function getOrder()
    {
	    return 2;
    }
}