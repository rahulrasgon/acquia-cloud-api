This is a basic PHP app that interacts with Acquia Cloud API


##How to use?
- Run `composer install`
- Add your `clientId` and `clientSecret` from Acquia Cloud in /auth/secrets.php
- Add variables needed in `ops/Vars.php` like env_id, config_set_id, and so on and create getters
- For an example, check run.php file
- You can use the API calls in command line as :
```
php run.php
```
