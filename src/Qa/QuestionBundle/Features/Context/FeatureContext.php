<?php

namespace Qa\QuestionBundle\Features\Context;

use Behat\BehatBundle\Context\BehatContext,
    Behat\BehatBundle\Context\MinkContext;
use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Exception\PendingException,
    Behat\Behat\Context\Step;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;


// Require 3rd-party libraries here:
require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';


/**
 * Feature context.
 */
class FeatureContext extends MinkContext //MinkContext if you want to test web
{
//
// Place your definition and hook methods here:
//
//    /**
//     * @Given /^I have done something with "([^"]*)"$/
//     */
//    public function iHaveDoneSomethingWith($argument)
//    {
//        $container = $this->getContainer();
//        $container->get('some_service')->doSomethingWith($argument);
//    }
//

    /**
     * @Then /^I should see questions with tags and athor:$/
     */
    public function iShouldSeeQuestionsWithTagsAndAthor(TableNode $table)
    {
        foreach ($table->getHash() as $raw) {
        assertRegExp('/'.preg_quote($raw['questions'], '/').'/', $world->getSession()->getPage()->getContent());
        assertRegExp('/'.preg_quote($raw['author'], '/').'/', $world->getSession()->getPage()->getContent());

        foreach (json_decode($raw['tags']) as $tag) {
            assertRegExp('/'.preg_quote($tag, '/').'/', $world->getSession()->getPage()->getContent());
        }
    }

    /**
     * @Then /^the response status code should be "([^"]*)"$/
     */
    public function theResponseStatusCodeShouldBe($argument1)
    {
        throw new PendingException();
    }
}
