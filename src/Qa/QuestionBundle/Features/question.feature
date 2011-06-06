Feature: Read a question

    Scenario:
        Given I am on /
          And follow "What Really Happens When You Put Your Mac to Sleep?"
         Then the response status code should be 200
          And I should see question with tags and author:
          | question | tags | author |
          | What Really Happens When You Put Your Mac to Sleep? | ["Mac", "sleep", "security"] | pilot |
          And I follow "Mac"
         Then the response status code should be 200