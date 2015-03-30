<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 4:01 PM
 */


use epicformbuilder\Wix\Scope;
use epicformbuilder\WixHiveApi\Commands\Insights\GetContactActivitySummary as GetContactActivitySummaryCommand;

class GetContactActivitySummaryTest extends \PHPUnit_Framework_TestCase
{

    public function testGetContactActivitySummaryCommandShouldReturnExpectedData()
    {
        $contactId = "12345";
        $from = new DateTime("2015-01-01 12:12:12", new DateTimeZone("UTC"));
        $until = new DateTime("2015-01-01 12:12:12", new DateTimeZone("UTC"));

        $command = new GetContactActivitySummaryCommand($contactId, Scope::SITE, $from, $until);

        $this->assertEquals("https://openapi.wix.com/v1/insights/contacts/$contactId/activities/summary?scope=site&form=2015-01-01T12%3A12%3A12.000Z&until=2015-01-01T12%3A12%3A12.000Z", $command->getEndpointUrl());
        $this->assertEquals("/insights/contacts/$contactId/activities/summary", $command->getCommand());
        $this->assertEquals("GET", $command->getHttpMethod());
        $this->assertEquals([], $command->getHttpHeaders());
        $this->assertEmpty($command->getBody());

    }

}

