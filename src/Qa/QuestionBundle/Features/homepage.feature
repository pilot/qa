Feature: Browse the Homepage
    Check that you see list of: 
    - questions
    - tags
    - hwo ask
    See a question with a comments via disqus.com

    Scenario:
        Given I am on /
         Then the response status code should be 200
          And I should see:
          | question |
          | What Really Happens When You Put Your Mac to Sleep? |
          | What is Thunderbolt High Speed I/O? |
          | Drive Icons Missing From Your Mac’s Desktop? |