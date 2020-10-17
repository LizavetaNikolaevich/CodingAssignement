Feature: Checkout process

  Scenario: 
    Given I am a Check24 user who hasn't logged in yet
    When I go to "https://preisvergleich.check24.de/testprodukte-spedition/eine-tuete-luft.html"
    # Then "Eine Tüte Luft" title is displayed
     When I click "Eine Tüte Luft" button
    # Then "Für die Bestellung benötigen wir Ihre E-Mail-Adresse" title is displayed
     When I enter "lizaveta.nikolaevich@gmail.com" for the "Email" field
    # And I click "weiter" button
    # Then "Willkommen" title is displayed
    # And there is a "Password" field
    # When I enter "qwerty123!" for the "Password" field
    # And I click "anmelden" button
    # Then "CHECK24 Punkte sammeln" title is displayed
    # When I click "Nein, danke." radio-button
    # And I click "weiter" button
    # Then "https://shopping.check24.de/checkout/bestellung.html" page is opened