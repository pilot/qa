Feature: Browse the Homepage
  Check that you see list of: 
  - questions
  - tags
  - who ask

  Scenario:
    Given I am on "/"
    Then I should see questions with tags and athor:
      | questions                                           | tags                                        | author |
      | What Really Happens When You Put Your Mac to Sleep? | ["sleep", "Mac"]                            | pilot  |
      | What is Thunderbolt High Speed I/O?                 | ["sleep", "Mac", "security"]                | ingvar |
      | Drive Icons Missing From Your Mac’s Desktop?        | ["sleep", "Mac", "security", "Thunderbolt"] | jack   |

  Scenario:
    Given I am on "/2"
    Then I should see "Drive Icons Missing From Your Mac’s Desktop?"
    When I follow "Previous"
    Then the url should match "/1"
    And I should see "What Really Happens When You Put Your Mac to Sleep?"