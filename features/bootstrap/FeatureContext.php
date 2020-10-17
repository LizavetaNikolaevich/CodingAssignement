<?php

use Behat\Behat\Context\Context;
use Behat\Mink\Mink;
use Behat\Mink\Session;
use DMore\ChromeDriver\ChromeDriver;


class FeatureContext implements Context
{
    public $mink;
    public $session;
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
        
        $el1 = $this->session->getPage()->find('css', '.c24-cookie-consent-notice-buttons .c24-cookie-consent-button:last-child');
        $el1->click();
        $el2 = $this->session->getPage()->find('css', '[data-gtm-type="checkout"][data-gtm-value="buybox"]');
        $el2->click();
        $this->session->wait(5000);
    }

}
