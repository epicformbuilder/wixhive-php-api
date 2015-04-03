<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/18/15
 * Time: 9:25 PM
 */
namespace epicformbuilder\Wix\Models;

use epicformbuilder\WixHiveApi\Signature;

class ImportantDate extends Model
{

    /** @var string - The id of this information within the Contact, */
    public $id;

    /** @var string  - The context tag associated with this date, */
    public $tag;

    /** @var  \DateTime */
    public $date;

    /**
     * @param string|null $id
     * @param string      $tag
     * @param \DateTime   $date
     */
    public function __construct($id=null, $tag=null, \DateTime $date = null)
    {
        $this->id = $id;
        $this->tag = $tag;
        $this->date = $date !== null ? $date->format(Signature::TIME_FORMAT) : null;
    }
}