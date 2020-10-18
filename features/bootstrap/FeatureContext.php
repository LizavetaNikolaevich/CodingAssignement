<?php

use Behat\Behat\Context\Context;
use Behat\Mink\Mink;
use Behat\Mink\Session;
use DMore\ChromeDriver\ChromeDriver;

require_once 'PHPUnit/Framework/Assert/Functions.php';


class FeatureContext implements Context
{
    public $mink;
    public $session;
    public static $arraySelectors = array(
        "Accept" => '.c24-cookie-consent-notice-buttons.clearfix .c24-cookie-consent-button:last-child',
        "Eine Tüte Luft" => '[data-gtm-type="checkout"][data-gtm-value="buybox"]',
        "E-Mail-Adresse" => '#cl_login',
        "fistWeiter" => '#c24-uli-login-btn',
        "Passwort" => '#cl_pw_login',
        "anmelden" => '#c24-uli-pw-btn',
        "Nein, danke." => '',
        "secondWeiter" => '#c24-uli-points-btn',
        "vorname" => '#address-first-name-billing',
        "Nachname" => '#address-last-name-billing',
        "PLZ" => ' #address-po-number-billing',
        "Ort" => '[for="address-city-billing"]',
        "Straße" => '[for="address-street-billing"]',
        "Nr" => '[for="address-house-number-billing"]',
        "Telefonnummer" => '[for="address-phone-number-billing"]',
    );

    public static $testData = array(
        "Email" => 'lizaveta.nikolaevich@gmail.com',
        "password" => 'qwerty123!',
        "First Name" => 'Liza',
        "Surname" => 'Nikolaevich',
        "Postcode" => '74232',
        "place" => 'Minsk',
        "road" => 'Krasnaya',
        "No." => '11',
        "Phone number" => '5402293',
    );


    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->mink = new Mink(array(
            'browser' => new Session(new ChromeDriver('http://localhost:9222', null, 'http://www.google.com'))
        ));
    
        $this->mink->setDefaultSessionName('browser');

        $this->session = $this->mink->getSession();
        $this->session->start();
    }

 /**
     * @Given I am a Check24 user who hasn't logged in yet
     */
    public function iAmACheckUserWhoHasntLoggedInYet()
    {
        #throw new PendingException();
    }

    /**
     * @When I go to :arg1
     */
    public function iGoTo($arg1)
    {
        $this->session->visit($arg1);
    }

    /**
     * @When I click :arg1 button
     */
    public function iClickButton($locator)
    {
        $el1 = $this->session->getPage()->find('css', self::$arraySelectors[$locator]) ->click();
    }

        /**
     * @Then :arg1 title is displayed
     */
    public function titleIsDisplayed($arg1)
    {
        \PHPUnit\Framework\Assert::assertEquals('heh2', 'heh');
    }
 
    /**
     * @When I enter :arg1 to the :arg2 field
     */
    public function iEnterToTheField($data, $locator)
    {
        print($this->session->getCurrentUrl());
        $this->getSession()->reload();

        $element = $this->session->getPage()->find('css', self::$arraySelectors[$locator])->click();
        $element->setValue(self::$testData[$data]);
    }
}
//$node_field = $page->findById('poney-button');
//$this->assertEquals('poney', $node_field->getValue(), 'ok');