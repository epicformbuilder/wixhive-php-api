# WixHive API PHP Library

[![Build Status](https://travis-ci.org/epicformbuilder/wixhive-php-api.svg?branch=0.0.4)](https://travis-ci.org/epicformbuilder/wixhive-php-api)

This library is a PHP wrapper WixHive API.

## Usage
```php
        // create WixHive object
        $wixHive = new WixHive("{app_id}", "{app_secret_key}");
        
        // generate data for activity                    
        $field = new \stdClass();
        $field->name = "Name";
        $field->value = "Value";
            
        $activityInfo = new \stdClass();
        $activityInfo->fields = [$field];
            
        // create the model    
        $createActivity = new CreateActivity(
            new DateTime(), 
            ActivityType::CONTACT_CONTACT_FORM, 
            null, 
            null, 
            $activityInfo, 
        );
        
        // create the command to execute
        $command = new CreateContactActivity($createActivity);    
        
        try{
            
            /** @var ActivityResult $data */
            $data = $wixHive->execute($command, "{instance_id}" $userSessionToken); // <-- $userSessionToken comes from Wix JS SDK
            
        }catch (WixHiveException $e){
            // catch an error here
            print_r($e->getMessage());
        }
        
        // check what we got
        print_r($data);
        exit;
        
```

WixHive documentation live [here](http://dev.wix.com/docs/wixhive/http-api)
