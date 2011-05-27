Feature: Browse the Homepage with Hello word

    Scenario:
        Given I am on /
         Then the response status code should be 200
          And I should see "Hello!"