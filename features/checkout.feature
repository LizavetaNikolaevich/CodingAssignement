Feature: Checkout process

  Scenario: 
    Given I am a Check24 user with "web" screen
    When I go to "https://preisvergleich.check24.de/testprodukte-spedition/eine-tuete-luft.html"
    Then "Eine Tüte Luft" title is displayed
    When I click "Accept" button
    When I click "zur Kasse" button
    Then "https://shopping.check24.de/checkout/bestellung.html" page is opened
    And "Article overview" contains "Eine Tüte Luft" product from the basket
    When I enter "First Name" to the "vorname" field
    And I click "FemaleSelectOption" button
    And I enter "Surname" to the "Nachname" field
    And I enter "Postcode" to the "PLZ" field
    And I enter "place" to the "Ort" field
    And I enter "road" to the "Straße" field
    And I enter "No." to the "Nr" field
    And I enter "Phone number" to the "Telefonnummer" field
    #When I click "Checkout" button
    #Then "https://shopping.check24.de/pay" page is opened
    And I wait 

    Scenario: 
    Given I am a Check24 user with "mobile" screen
    When I go to "https://preisvergleich.check24.de/testprodukte-spedition/eine-tuete-luft.html"
    Then "Eine Tüte Luft" title is displayed
    When I click "Accept" button
    When I click "zur Kasse" button
    Then "https://shopping.check24.de/checkout/bestellung.html" page is opened
    And "Article overview" contains "Eine Tüte Luft" product from the basket
    When I enter "First Name" to the "vorname" field
    And I click "FemaleSelectOption" button
    And I enter "Surname" to the "Nachname" field
    And I enter "Postcode" to the "PLZ" field
    And I enter "place" to the "Ort" field
    And I enter "road" to the "Straße" field
    And I enter "No." to the "Nr" field
    And I enter "Phone number" to the "Telefonnummer" field
    #When I click "Checkout" button
    #Then "https://shopping.check24.de/pay" page is opened
    And I wait 