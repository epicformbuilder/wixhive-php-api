<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/18/15
 * Time: 9:34 PM
 */
namespace epicformbuilder\Wix\Models;

class WixAPIError extends Model
{
    /** @var  string The HTTP error code for this API error */
    public $errorCode;

    /** @var  string A short description of the error that occurred */
    public $errorMessage;

    /** @var  string The internal WIX API error code */
    public $wixErrorCode;

    /**
     * @param string $errorCode
     * @param string $errorMessage
     * @param string $wixErrorCode
     */
    public function __construct($errorCode="", $errorMessage="", $wixErrorCode="" )
    {
        $this->errorCode = $errorCode;
        $this->errorMessage = $errorMessage;
        $this->wixErrorCode = $wixErrorCode;
    }

}
