<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 3:39 PM
 */

use epicformbuilder\Wix\Scope;
use epicformbuilder\WixHiveApi\Commands\Insights\GetActivitySummary as GetActivitySummaryCommand;

class GetActivitySummaryTest extends \PHPUnit_Framework_TestCase
{

    public function testGetActivitySummaryCommandShouldReturnExpectedData()
    {
        $from = new DateTime("2015-01-01 12:12:12", new DateTimeZone("UTC"));
        $until = new DateTime("2015-01-01 12:12:12", new DateTimeZone("UTC"));

        $command = new GetActivitySummaryCommand(Scope::SITE, $from, $until);

        $this->assertEquals("https://openapi.wix.com/v1/insights/activities/summary?scope=site&form=2015-01-01T12%3A12%3A12.000Z&until=2015-01-01T12%3A12%3A12.000Z", $command->getEndpointUrl());
        $this->assertEquals("/insights/activities/summary", $command->getCommand());
        $this->assertEquals("GET", $command->getHttpMethod());
        $this->assertEquals([], $command->getHttpHeaders());
        $this->assertEmpty($command->getBody());

    }

}

