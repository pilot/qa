#!/usr/bin/env php
<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

set_time_limit(0);

$vendorDir = __DIR__;
$deps = array(
    array('symfony', 'http://github.com/symfony/symfony', isset($_SERVER['SYMFONY_VERSION']) ? $_SERVER['SYMFONY_VERSION'] : 'origin/master'),
    array('doctrine-common', 'http://github.com/doctrine/common.git', 'origin/master'),
    array('doctrine-dbal', 'http://github.com/doctrine/dbal.git', 'origin/master'),
    array('doctrine', 'http://github.com/doctrine/doctrine2.git', 'origin/master'),
    array('behat', 'https://github.com/Behat/Behat.git', 'origin/master'),
    array('BehatBundle', 'https://github.com/Behat/BehatBundle.git', 'origin/master'),
    array('mink', 'https://github.com/Behat/Mink.git', 'origin/master'),
    array('MinkBundle', 'https://github.com/Behat/MinkBundle.git', 'origin/master'),
    array('doctrine-fixtures', 'https://github.com/doctrine/data-fixtures.git', 'origin/master'),
    array('DoctrineFixturesBundle', 'http://github.com/symfony/DoctrineFixturesBundle.git', 'origin/master'),
    array('swiftmailer', 'http://github.com/swiftmailer/swiftmailer.git', 'origin/master'),
);

foreach ($deps as $dep) {
    list($name, $url, $rev) = $dep;

    echo "> Installing/Updating $name\n";

    $installDir = $vendorDir.'/'.$name;
    if (!is_dir($installDir)) {
        system(sprintf('git clone -q %s %s', escapeshellarg($url), escapeshellarg($installDir)));
    }

    system(sprintf('cd %s && git fetch -q origin && git reset --hard %s', escapeshellarg($installDir), escapeshellarg($rev)));
}