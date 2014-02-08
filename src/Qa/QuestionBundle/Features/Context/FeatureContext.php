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
class FeatureContext extends MinkContext
{
    /**
     * @Then /^I should see questions with tags and athor:$/
     */
    public function iShouldSeeQuestionsWithTagsAndAthor(TableNode $table)
    {
        // Get page content
        $content = $this->getSession()->getPage()->getContent();

        foreach ($table->getHash() as $raw) {
            assertRegExp('/'.preg_quote($raw['questions'], '/').'/', $content);
            assertRegExp('/'.preg_quote($raw['author'], '/').'/', $content);

            foreach (json_decode($raw['tags']) as $tag) {
                assertRegExp('/'.preg_quote($tag, '/').'/', $content);
            }
        }
    }

    /**
     * @Given /^I should see multiline text$/
     */
    public function iShouldSeeMultilineText(PyStringNode $string)
    {
        $expected = $string->getRaw();
        $actual   = $this->getSession()->getPage()->getContent();

        try {
            assertNotContains($expected, $actual);
        } catch (AssertException $e) {
            $message = sprintf('The question "%s" appears in the HTML response of this page, but it should not.', $expected);
            throw new ExpectationException($message, $this->getSession(), $e);
        }

    }

    /**
     * @Given /^I should see text "([^"]*)"$/
     */
    public function iShouldSeeText($text)
    {
        $expected = str_replace('\\"', '"', $text);
        $actual   = $this->getSession()->getPage()->getContent();

        try {
            assertNotContains($expected, $actual);
        } catch (AssertException $e) {
            $message = sprintf('The question "%s" appears in the HTML response of this page, but it should not.', $expected);
            throw new ExpectationException($message, $this->getSession(), $e);
        }
    }
}
