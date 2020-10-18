<?php

use Behat\Behat\Context\Context;
use Behat\Mink\Mink;
use Behat\Mink\Session;
use DMore\ChromeDriver\ChromeDriver;
use Behat\Mink\WebAssert;

//require_once 'PHPUnit/Framework/Assert/Functions.php';


class FeatureContext implements Context
{
    public $mink;
    public $session;
    public $assertSession;
    public static $arraySelectors = array(
        "Accept" => '.c24-cookie-consent-notice-buttons.clearfix .c24-cookie-consent-button:last-child',
        "Eine Tüte Luft" => '[data-gtm-type="checkout"][data-gtm-value="buybox"]',
        "fistWeiter" => '#c24-uli-login-btn',
        "anmelden" => '#c24-uli-pw-btn',
        "secondWeiter" => '#c24-uli-points-btn',
        "vorname" => '#address-first-name-billing',
        "Nachname" => '#address-last-name-billing',
        "PLZ" => ' #address-po-number-billing',
        "Ort" => '[for="address-city-billing"]',
        "Straße" => '[for="address-street-billing"]',
        "Nr" => '[for="address-house-number-billing"]',
        "Telefonnummer" => '[for="address-phone-number-billing"]',
        "Checkout" => '.submit-btn',
        "Card" => '#c24-sps-number',
        "CardName" => '#c24-sps-name'
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
        "Card Number" => '5555555555554444',
        "Card Name" => 'test'
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
        $this->assertSession = $this->mink->assertSession();
    }

    /**
     * @When I go to :arg1
     */
    public function iGoTo($arg1)
    {
        $this->session->visit($arg1);
        $this->session->setCookie('c24session', '2cb36f368b72f4292f8cd56a583d47d5');
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
     public function titleIsDisplayed($locator)
     {
        $this->assertSession->elementExists('css', self::$arraySelectors[$locator]);  
     }

     /**
     * @Given I am a Check24 user who hasn't logged in yet
     */
    public function iAmACheckUserWhoHasntLoggedInYet()
    {
    }
    /**
     * @When I enter :arg1 to the :arg2 field
     */
    public function iEnterToTheField($data, $locator)
    {
        $this->session->wait(10000, "document.querySelector('".self::$arraySelectors[$locator]."') !== null");
        $element = $this->session->getPage()->find('css', self::$arraySelectors[$locator]);
        $element->setValue(self::$testData[$data]);
    }

        /**
     * @When I enter :arg1 to the :arg2 iframe field
     */
    public function iEnterToTheIframeField($data, $locator)
    {
        $this->session->wait(10000, "document.querySelector('".self::$arraySelectors[$locator]."') !== null");
        print("document.querySelector('".self::$arraySelectors[$locator]."').value = '".self::$testData[$data]."'");
        $this->session->evaluateScript(
         "document.querySelector('".self::$arraySelectors[$locator]."').value = '".self::$testData[$data]."'"
        );
    }

}
//$node_field = $page->findById('poney-button');
//$this->assertEquals('poney', $node_field->getValue(), 'ok');