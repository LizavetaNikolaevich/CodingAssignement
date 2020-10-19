<?php

use Behat\Behat\Context\Context;
use Behat\Mink\Mink;
use Behat\Mink\Session;
use DMore\ChromeDriver\ChromeDriver;
use Behat\Mink\WebAssert;



class FeatureContext implements Context
{
    public $mink;
    public $session;
    public $assertSession;
    public static $arraySelectors = array(
        "Accept" => '.c24-cookie-consent-notice-buttons.clearfix .c24-cookie-consent-button:last-child',
        "Eine Tüte Luft" => 'h1[class="product-title qa-product-title"]',
        "zur Kasse" => '[data-gtm-type="checkout"][data-gtm-value="buybox"]',
        "fistWeiter" => '#c24-uli-login-btn',
        "anmelden" => '#c24-uli-pw-btn',
        "secondWeiter" => '#c24-uli-points-btn',
        "MaleSelectOption" => "[for='address-male-title-billing']",
        "FemaleSelectOption" => "[for='address-female-title-billing']",
        "vorname" => '#address-first-name-billing',
        "Nachname" => '#address-last-name-billing',
        "PLZ" => '#address-po-number-billing',
        "Ort" => '#address-city-billing',
        "Straße" => '#address-street-billing',
        "Nr" => '#address-house-number-billing',
        "Telefonnummer" => '#address-phone-number-billing',
        "Checkout" => '.submit-btn',
        "Article overview" => '#module-order-positions .item__name'
    );

    public static $testData = array(
        "Email" => 'lizaveta.nikolaevich@gmail.com',
        "password" => 'qwerty123!',
        "First Name" => 'Liza',
        "Surname" => 'Nikolaevich',
        "Postcode" => '20095',
        "place" => 'Minsk',
        "road" => 'Hamburg Krasnaya',
        "No." => '11',
        "Phone number" => '2969761',
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
            'browser' => new Session(new ChromeDriver('http://localhost:9222', null, 'https://shopping.check24.de/'))
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
    }

    /**
     * @Given I am a Check24 user with :arg1 screen
     */
    public function iAmACheckUserWithMobileScreen($arg1)
    {
        if ($arg1 === 'mobile') {
            $this->session->resizeWindow(375, 667);
        }
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
        $this->assertSession->elementContains('css', self::$arraySelectors[$locator], $locator);  
     }

    /**
     * @Then :arg1 contains :arg2 product from the basket
     */
    public function containsProductFromTheBasket($locator1, $locator2)
    {
       $this->session->wait(10000, "document.querySelector('".self::$arraySelectors[$locator1]."') !== null");;
       $this->assertSession->elementContains('css', self::$arraySelectors[$locator1], $locator2);  
    }

    /**
     * @Then :arg1 page is opened
     */
    public function pageIsOpened($link)
    {
        $this->session->wait(3000);
        $this->assertSession->addressMatches("|".preg_quote($link, "|")."|");  
    }

    /**
     * @When I enter :arg1 to the :arg2 field
     */
    public function iEnterToTheField($data, $locator)
    {
        $this->session->wait(10000, "document.querySelector('".self::$arraySelectors[$locator]."') !== null");
        $element = $this->session->getPage()->find('css', self::$arraySelectors[$locator]);
        $element->focus();
        $element->setValue(self::$testData[$data]);
        $element->blur();
    }
}