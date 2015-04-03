<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/18/15
 * Time: 9:14 PM
 */
namespace epicformbuilder\Wix\Models;

class ContactEmail extends Model
{
    /** @var string */
    public $id;

    /** @var  string */
    public $tag;

    /** @var  string */
    public $email;

    /** @var string Accepted values - 'optOut' or 'transactional' or 'recurring'  */
    public $emailStatus;

    /**
     * @param string|null   $id
     * @param string $tag
     * @param string $email
     * @param string $emailStatus
     */
    public function __construct($id=null, $tag=null, $email=null, $emailStatus=null)
    {
        $this->id = $id;
        $this->tag = $tag;
        $this->email = $email;
        $this->emailStatus = $emailStatus;
    }

}