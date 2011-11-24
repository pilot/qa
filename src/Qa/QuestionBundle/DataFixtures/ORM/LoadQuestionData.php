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
        // Generate more question for pages test
        $questionsPull = array(
        	'title' => array(
        		'What Really Happens When You Put Your Mac to Sleep?',
                'What is Thunderbolt High Speed I/O?',
                "Drive Icons Missing From Your Mac’s Desktop?"
        	),
            'slug' => array(
            	'what-really-happens-when-you-put-your-mac-to-sleep',
                'what-is-thunderbolt-high-speed-io',
                'drive-icons-missing-from-your-macs-desktop'
            ),
            'content' => array(
            	"Putting Your Mac to Sleep: When I use the Mac's sleep mode, what really happens? 
		         Is sleep the same as safe sleep? Are sleep or safe sleep modes really safe? 
		         Are there any security concerns? And can I change the Mac's method of sleeping?",
		
		        "What is Thunderbolt High Speed I/O?: With the introduction of new MacBook Pros in early 2011, 
		         Apple became the first manufacturer to use Intel's Thunderbolt technology, which provides 
		         a high-speed data and video connection for computing devices. Thunderbolt was originally 
		         called Light Peak, because Intel intended the technology to use fiber...",
		
		         "Hard Drive Icons Not On Your Mac’s Desktop: It’s the Finder’s job to display the desktop 
		          and all of its icons, including those for hard drives. The problem is that a default 
		          install of OS X renders the desktop without the drive icons."
            )
        );

        $userPull = array('user-one', 'user-two', 'user-three');
        $tagPull = array('tag-one', 'tag-two','tag-three','tag-four');

        // Add questions for test purpose
        for ($i = 0; $i < 3; $i++) {
            $question = new Question();
            $question->setTitle($questionsPull['title'][$i]);
            $question->setSlug($this->getSlug($question->getTitle()));
            $question->setContent($questionsPull['content'][$i]);
            $question->setViews(mt_rand(0,20));
            $question->setUser($manager->merge($this->getReference($userPull[$i])));
            
            // Add tags
            for ($t = 0; $t < ($i+2); $t++) {
                $question->addTags($manager->merge($this->getReference($tagPull[$t])));
            }

            $manager->persist($question);
        }

        // Add rendomized questions for better user view
        for ($i = 0; $i < 20; $i++) {
	        $question = new Question();
	        $question->setTitle($questionsPull['title'][mt_rand(0,2)] . ' #' . substr(md5($questionsPull['title'][mt_rand(0,2)] . $i), 0, 5));
	        $question->setSlug($this->getSlug($question->getTitle()));
	        $question->setContent($questionsPull['content'][mt_rand(0,2)]);
	        $question->setViews(mt_rand(0,20));
	        $question->setUser($manager->merge($this->getReference($userPull[mt_rand(0,2)])));
	        
	        // Add random tags
	        shuffle($tagPull);
	        for ($t = 0; $t < mt_rand(1,4); $t++) {
	            $question->addTags($manager->merge($this->getReference($tagPull[$t])));
            }

	        $manager->persist($question);
        }

        $manager->flush();
    }
 
    public function getOrder()
    {
	    return 3;
    }

    public function getSlug($srting)
    {
        $result = strtolower($srting);

        $result = preg_replace('/[^a-z0-9\s-]/', '', $result);
        $result = trim(preg_replace('/[\s-]+/', ' ', $result));
        $result = preg_replace('/\s/', '-', $result);

        return $result;
    }
}