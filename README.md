## Check24 coding assignment

The project is based on behat framework and mink controller with ChromeDriver driver.

To run tests do the following steps:
* run ```composer install``` in project directory to install dependencies
* Start Chrome in development mode <br/>For windows: ```chrome.exe --remote-debugging-address=0.0.0.0 --remote-debugging-port=9222```. <br/>For mac: ```/Applications/Google\ Chrome.app/Contents/MacOS/Google\ Chrome --remote-debugging-address=0.0.0.0 --remote-debugging-port=9222```
* execute```vendor/bin/behat``` in project directory to run tests

Powered by Elizaveta Nikolaevich