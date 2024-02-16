* Given that the job description is available at https://www.cvkeskus.ee/php-arendaja-tartus-traffic-control-ou-894619, then I don't have to be worry about the privacy and secrecy of this puzzle contents.
* Next I crafted a simple starting prompt for the LLM
```php
write a php script, that solves this puzzle Send a POST request to https://cv.microservices.credy.com/v1 in JSONx format (don't worry, we don't use this format in our daily lives) with the required fields that are listed below:
* first_name | string 255 - your first name
* last_name | string 255 - your last name
* email | string 255, must be a valid email address - your email address we can contact you by
* bio | free text - introduction about yourself and why you would be a great fit for the position
* technologies | array - the technologies you master ex. PHP, HTML, docker
* timestamp | integer - current unix timestamp, deviation of +/-10 seconds is allowed
* signature | string 255 - SHA1 hash of concatenation of current unix timestamp and the word "credy"
* vcs_uri | string 255 - public git repository url where the solution to the puzzle is hosted
```

* Next I generated a starting boilerplate with public LLM Phind.com and then copy-pasted the offered solution
* Next I asked about the ambiguities in the puzzle, to make sure, I didn't miss anything
*



RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'edb40769019ccf227279e3bdd1f5b2e9950eb000c3233ee85148944e555d97be3ea4f40c3c2fe73b22f875385f6a5155') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN mv composer.phar /root/
RUN php -r "unlink('composer-setup.php');"
