@Topic
Feature: GetAllTopics
  Scenario: Respond successfully
    When Request "GET" to "/getTopics"
    Then Should respond with "200" code