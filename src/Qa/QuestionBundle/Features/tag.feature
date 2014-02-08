Feature: See a tag

  Scenario:
    Given I am on "/tag/ipad"
    Then the response status code should be 404
    Given I am on "/tag/mac"
    And I should see "Drive Icons Missing From Your Mac’s Desktop?"
    And I should see "What is Thunderbolt High Speed I/O?"
    And I should see text "tag: sleep, Mac"
    And I should see "by: ingvar"
    And I should see "by: pilot"
    Then I follow "sleep"
    And I should see "What is Thunderbolt High Speed I/O?"
    And I should see "What Really Happens When You Put Your Mac to Sleep?"