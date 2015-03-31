# WixHive API PHP Library

[![Build Status](https://travis-ci.org/Epicformbuilder/wixhive-php-api.svg?branch=master)](https://travis-ci.org/Epicformbuilder/wixhive-php-api)

This library is a PHP wrapper WixHive API.

## Usage
```php
        // create WixHive object
        $wixHive = new WixHive("{app_id}", "{app_secret_key}", "{instance_id}");
        
        // generate data for activity                    
        $field = new strClass();
        $field->name = "Name";
        $field->value = "Value";
            
        $activityInfo = new stdClass();
        $activityInfo->fields = [$field];
            
        // create the model    
        $createActivity = new CreateActivity(
            new DateTime(), 
            ActivityType::CONTACT_CONTACT_FORM, 
            null, 
            null, 
            $activityInfo, 
            null
        );
        
        // create the command to execute
        $command = new CreateActivity($createActivity);    
        
        try{
            
            /** @var ActivityResult $data */
            $data = $wixHive->execute($command, $userSessionToken); // <-- $userSessionToken comes from Wix JS SDK
            
        }catch (WixHiveException $e){
            // catch an error here
            print_r($e->getMessage());
        }
```

WixHive documentation live [here](http://dev.wix.com/docs/wixhive/introduction)