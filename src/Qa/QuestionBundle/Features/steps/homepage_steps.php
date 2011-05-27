<?php

$steps->And('/^I should see:$/', function($world, $table) {
	foreach ($table->getHash() as $raw) {
        assertRegExp('/'.preg_quote($raw['question'], '/').'/', $world->getSession()->getPage()->getContent());
	}
});