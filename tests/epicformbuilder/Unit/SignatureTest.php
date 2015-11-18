<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/21/15
 * Time: 11:02 PM
 */

use epicformbuilder\WixHiveApi\Signature;

class SignatureTest extends \PHPUnit_Framework_TestCase
{

    public function testSignShouldReturnCorrectToken()
    {
        $expectedToken = "FjWuQVWOM9WikSetMMI8W3YFJ8yG8lJXSCbQbrA6O_o";
        $date = new \DateTime("2015-01-01 12:12:12");

        $token = Signature::sign("aaaa", "bbbb", "cccc", "dddd", "1.0", "v1", "/command", "{test:1}", "POST", $date);

        $this->assertEquals($expectedToken, $token);
    }

}