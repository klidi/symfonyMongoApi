## About
Assessment for **********

First , thank you for the opportunity and taking time to review this.

Before i started the project i took a look around the symfony community to find the best way to do this 
at least in terms of libraries to use etc.
After the wondering around a bit i was left with 2 options, FOSRestBundle or Api-platform.
The second one offered a lot of scaffolding features and it reminded me of jHipster in java.  A tool
i have used and admired back in 2017.

Setting up the the right env did not take long though i had to do it natively on my macbook as i dont have
the luxury to run docker while having 5-6 java microservices running locally on 5 different intelliJ windows
for my daily job (and no i cant shut them :P :P)

On a side note: For someone like me who was not updated with latest events in symfony world 
and never used mongoDb with php before it took some time to complete this(at least 10hrs). Going through
documentation for various libs takes a lot of time.
I tend to use frameworks that boost rapid development , that are not over layered and specially that dont 
have an orm that uses data mapper pattern :P :P, lets say im more a fan of rails, laravel, django
and phoenix(elixir) and less of a fan of (symfony , zend, springboot, .net etc).

Now back to the project implementation. 
I decided to use symfony 4.4 (req was symfony 4) with api-platform core to build this api.
I have used lexi_jwt for a very very basic jwt authentication , adapted the security configuration
to make it work with mongoDb since the the official documentation has only the doctrine orm described.
The project also includes swagger for api documentation and symfony profiler for dev.

Doctrine orm is disabled as i prefer to use only one (odm) in this case

I have implement most of basic requirements but for soft deletes it required another mongo bundle 
and i really really did not want to go through another documentation a config. Though in the code i have left the posibility 
for it to be implemented easely.

Regarding test , there was at least 2 more libs to pull in and a lot more time to spend,
regarding docker i tried to pull the already dockerized version of symfony-mongo but my laptop started to freeze the same momment i run the containers

If what i have is acceptable but u want to see the tests and dockerized version plz let me know so i take some time and complete during upcoming weekend

NOTE: I am keeping things very very basic, nothing is granular as it should be in a real project. Basic acl , basic authntication, basic validation

## Usage

In .env modify relevant variables to your local env 
- composer install
- bin/console doctrine:mongodb:schema:create

Additional info can be found in
https://api-platform.com/docs/core/
https://github.com/lexik/LexikJWTAuthenticationBundle

To create a user :
- Make a Post request at /register with body {"username":"what ever user", "password":"super_duper_secret_password"}

To authenticate
- Make a post request to /login_check with username password and u will receive a jwt
- Use this jwt in the Authorization header

