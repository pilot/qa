<?php

namespace Qa\QuestionBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Qa\UserBundle\Entity\User;
use Qa\QuestionBundle\Entity\Question;

class LoadQuestionData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load($manager)
    {
        $questionOne = new Question();
        $questionOne->setTitle('What Really Happens When You Put Your Mac to Sleep?');
        $questionOne->setSlug('what-really-happens-when-you-put-your-mac-to-sleep');
        $questionOne->setContent("Putting Your Mac to Sleep: When I use the Mac's sleep mode, what really happens? 
                                  Is sleep the same as safe sleep? Are sleep or safe sleep modes really safe? 
                                  Are there any security concerns? And can I change the Mac's method of sleeping?");
        $questionOne->setViews(5);
        $questionOne->setUser($manager->merge($this->getReference('user-one')));
        $questionOne->addTags($manager->merge($this->getReference('tag-one')));
        $questionOne->addTags($manager->merge($this->getReference('tag-two')));
        $questionOne->addTags($manager->merge($this->getReference('tag-three')));

        $manager->persist($questionOne);

        $questionTwo = new Question();
        $questionTwo->setTitle('What is Thunderbolt High Speed I/O?');
        $questionTwo->setSlug('what-is-thunderbolt-high-speed-io');
        $questionTwo->setContent("What is Thunderbolt High Speed I/O?: With the introduction of new MacBook Pros in early 2011, 
                                  Apple became the first manufacturer to use Intel's Thunderbolt technology, which provides 
                                  a high-speed data and video connection for computing devices. Thunderbolt was originally 
                                  called Light Peak, because Intel intended the technology to use fiber...");
        $questionTwo->setViews(10);
        $questionTwo->setUser($manager->merge($this->getReference('user-two')));
        $questionTwo->addTags($manager->merge($this->getReference('tag-two')));
        $questionTwo->addTags($manager->merge($this->getReference('tag-four')));

        $manager->persist($questionTwo);

        $questionThree = new Question();
        $questionThree->setTitle("Drive Icons Missing From Your Mac’s Desktop?");
        $questionThree->setSlug('drive-icons-missing-from-your-macs-desktop?');
        $questionThree->setContent("Hard Drive Icons Not On Your Mac’s Desktop: It’s the Finder’s job to display the desktop 
                                    and all of its icons, including those for hard drives. The problem is that a default 
                                    install of OS X renders the desktop without the drive icons.");
        $questionThree->setViews(3);
        $questionThree->setUser($manager->merge($this->getReference('user-three')));
        $questionThree->addTags($manager->merge($this->getReference('tag-two')));
        $questionThree->addTags($manager->merge($this->getReference('tag-five')));

        $manager->persist($questionThree);

        $manager->flush();
    }
 
    public function getOrder()
    {
	    return 3;
    }
}