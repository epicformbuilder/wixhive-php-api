<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/21/15
 * Time: 11:02 PM
 */

use epicformbuilder\Wix\ActivityType;
use epicformbuilder\Wix\Models\CreateActivity;
use epicformbuilder\WixHiveApi\Signature;
use epicformbuilder\WixHiveApi\WixHive;
use epicformbuilder\WixHiveApi\Commands\Activity\CreateActivity as CreateActivityCommand;

class SignatureTest extends \PHPUnit_Framework_TestCase
{


    public function testSignShouldReturnCorrectToken()
    {
        $expectedToken = "FjWuQVWOM9WikSetMMI8W3YFJ8yG8lJXSCbQbrA6O_o";
        $date = new \DateTime("2015-01-01 12:12:12");

        $token = Signature::sign("aaaa", "bbbb", "cccc", "dddd", "1.0", "v1", "/command", "{test:1}", "POST", $date);

        $this->assertEquals($expectedToken, $token);
    }


    public function testasad(){

        $date = new \DateTime();
        $item = new \stdClass();
        $item->name = "test name";
        $item->value = "test value";

        $activityInfo = new \stdClass();
        $activityInfo->fields = [$item];

        $createActivityDto = new CreateActivity($date, ActivityType::CONTACT_CONTACT_FORM, null, null, $activityInfo, null);
        $createActivity = new CreateActivityCommand($createActivityDto);

        $data = (new WixHive("13b13f1b-b45e-8d90-607e-3f8ae78686af","dbc9c5a9-9640-4b11-bf16-80c8c3ff0d2f","13b13fe0-dffa-0996-964f-28afb7815736"))->execute($createActivity, "d19d4be41cbefd75da5e0db960d023172a14a9b544538a5837b62bda5330f80e43e4e3811998a43dc1c80c4f043b4e211e60994d53964e647acf431e4f798bcd26c661227a36b59b83c1ce99465ca384d5e5b841c2e286a6308cfdbe5bb490ae");

        $t = 1;
    }



}