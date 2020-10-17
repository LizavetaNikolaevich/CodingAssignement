<?php

use Behat\Behat\Context\Context;
use Behat\Mink\Mink;
use Behat\Mink\Session;
use DMore\ChromeDriver\ChromeDriver;


class FeatureContext implements Context
{
    public $mink;
    public $session;
    public static $arraySelectors = array(
        "Eine Tüte Luft" => '[data-gtm-type="checkout"][data-gtm-value="buybox"]',
        "E-Mail-Adresse" => '#cl_login',
        "weiter" => '#c24-uli-login-btn',
        "Passwort" => '#cl_pw_login',
        "anmelden" => '#c24-uli-pw-btn',
    );

    public static $testData = array(
        "Email" => 'lizaveta.nikolaevich@gmail.com',
        "password" => 'qwerty123!',
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
        $el1 = $this->session->getPage()->find('css', '.c24-cookie-consent-notice-buttons .c24-cookie-consent-button:last-child')->click();
    }

    /**
     * @When I click :arg1 button
     */
    public function iClickButton($button)
    {
        $el1 = $this->session->getPage()->find('css', self::$arraySelectors[$button]) ->click();
    }

    /**
     * @When I enter :arg1 to the :arg2 field
     */
    public function iEnterToTheField($arg1, $arg2)
    {
        $this->session->wait(2000);
        $this->session->visit($this->session->getCurrentUrl());
        $this->session->wait(5000);
        $element = $this->session->getPage()->find('css', '#cl_login')->click();
        $element->setValue('testtesttestest');
        $this->session->wait(5000);
    }
}
//$node_field = $page->findById('poney-button');
//$this->assertEquals('poney', $node_field->getValue(), 'ok');