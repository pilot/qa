Feature: View the question

  Scenario:
    Given I am on "/"
    And I follow "What Really Happens When You Put Your Mac to Sleep?"
    Then I should see "What Really Happens When You Put Your Mac to Sleep?"
    And I should see multiline text
      """
      Putting Your Mac to Sleep: When I use the Mac's sleep mode, what really happens? 
      Is sleep the same as safe sleep? Are sleep or safe sleep modes really safe? 
      Are there any security concerns? And can I change the Mac's method of sleeping?
      """
    And I should see text "tag: sleep, Mac"
    And I should see "by: pilot"
    And I follow "Mac"
    Then I should be on "/tag/mac"
    And I should see "Drive Icons Missing From Your Mac’s Desktop?"
    And I should see "What is Thunderbolt High Speed I/O?"