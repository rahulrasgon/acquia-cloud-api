# Acquia Cloud API interaction

This is a basic PHP app that interacts with Acquia Cloud API

## How to use?
- Run `composer install`
- Add your `clientId` and `clientSecret` from Acquia Cloud in /auth/secrets.php
- Add variables needed in `ops/Vars.php` like env_id, config_set_id, and so on and create getters
- For an example, check run.php file
- You can use the API calls in command line as :
```
php run.php
```

## What operations can be performed?
For now, following can be performed using this app:
- Solr 7 Indexes
    - Get all indexes
    - Get a specific index
    - Create new indexes (multiple indexes at once)
    - Delete existing index (multiple indexes at once)
