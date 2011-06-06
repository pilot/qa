Feature: Lookup a tag

    Scenario:
        Given I am on /tag/ipad
         Then the response status code should be 404
        Given I am on /tag/mac
          And I follow "sleep"
         Then the response status code should be 200
          And I should see question with tags and author:
          | question | tags | author |
          | What Really Happens When You Put Your Mac to Sleep? | ["Mac", "sleep", "security"] | pilot |