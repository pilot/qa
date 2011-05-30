Feature: Browse the Homepage
    Check that you see list of: 
    - questions
    - tags
    - hwo ask

    Scenario:
        Given I am on /
         Then the response status code should be 200
          And I should see questions with tags:
          | questions | tags | author |
          | What Really Happens When You Put Your Mac to Sleep? | ["Mac", "sleep", "security"] | pilot |
          | What is Thunderbolt High Speed I/O? | ["Mac", "Thunderbolt"] | ingvar |
          | Drive Icons Missing From Your Mac’s Desktop? | ["Mac", "Drive Icons"] | jack |