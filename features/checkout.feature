Feature: Checkout process

  Scenario: 
    Given I am a Check24 user who hasn't logged in yet
    When I go to "https://preisvergleich.check24.de/testprodukte-spedition/eine-tuete-luft.html"
    Then "Eine Tüte Luft" title is displayed
    When I click "Accept" button
    When I click "Eine Tüte Luft" button
    # Then "Für die Bestellung benötigen wir Ihre E-Mail-Adresse" title is displayed
     When I enter "Email" to the "E-Mail-Adresse" field
     And I click "fistWeiter" button
    # Then "Willkommen" title is displayed
    # And there is a "Password" field
     When I enter "password" to the "Passwort" field
     And I click "anmelden" button
    # Then "CHECK24 Punkte sammeln" title is displayed
    # When I click "Nein, danke." button
     And I click "secondWeiter" button
    # Then "https://shopping.check24.de/checkout/bestellung.html" page is opened
    When I enter "First Name" to the "vorname" field
    And I click "Mr/Mrs" button
    And I enter "Surname" to the "Nachname" field
    And I enter "Postcode" to the "PLZ" field
    And I enter "place" to the "Ort" field
    And I enter "road" to the "Straße" field
    And I enter "No." to the "Nr" field
    And I enter "Phone number" to the "Telefonnummer" field
