<?php

/**
 * Place environment initialization scripts here:
 *
 *   $world->initialSum = 231;
 *   $world->calc = function() {
 *       // ...
 *   };
 *
 */

// Get entity manager
$world->em = $world->getKernel()->getContainer()
                   ->get('doctrine.orm.entity_manager');