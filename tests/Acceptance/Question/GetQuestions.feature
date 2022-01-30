@Question
Feature: GetQuestions
  Scenario: Respond successfully
    When Request "GET" to "/getQuestions"
    Then Should respond with "200" code