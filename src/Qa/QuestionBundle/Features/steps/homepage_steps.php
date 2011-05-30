<?php

$steps->And('/^I should see questions with tags:$/', function($world, $table) {
	foreach ($table->getHash() as $raw) {
        assertRegExp('/'.preg_quote($raw['questions'], '/').'/', $world->getSession()->getPage()->getContent());
        assertRegExp('/'.preg_quote($raw['author'], '/').'/', $world->getSession()->getPage()->getContent());

        foreach (json_decode($raw['tags']) as $tag) {
	        assertRegExp('/'.preg_quote($tag, '/').'/', $world->getSession()->getPage()->getContent());
        }
	}
});