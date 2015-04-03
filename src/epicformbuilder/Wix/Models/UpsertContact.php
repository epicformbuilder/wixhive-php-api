<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/26/15
 * Time: 3:31 PM
 */
namespace epicformbuilder\Wix\Models;

class UpsertContact extends Model
{
    /** @var  string */
    public $phone;

    /** @var string */
    public $email;

    /** @var string */
    public $userSessionToken;

    /**
     * @param string $phone
     * @param string $email
     * @param string $userSessionToken
     */
    public function __construct($phone=null, $email=null, $userSessionToken=null)
    {
        $this->phone = $phone;
        $this->email = $email;
        $this->userSessionToken = $userSessionToken;
    }
}