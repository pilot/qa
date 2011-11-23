Feature: Browse the Homepage
    Check that you see list of: 
    - questions
    - tags
    - who ask

    Scenario:
      Given I am on "/"
      Then I should see questions with tags and athor:
        | questions                                           | tags                         | author |
        | What Really Happens When You Put Your Mac to Sleep? | ["Mac", "sleep", "security"] | pilot  |
        | What is Thunderbolt High Speed I/O?                 | ["Mac", "Thunderbolt"]       | ingvar |
        | Drive Icons Missing From Your Mac’s Desktop?        | ["Mac", "Drive Icons"]       | jack   |

    Scenario:
      Given I am on "/page/2"
      When I follow "1"
      Then the response status code should be "200"