<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/18/15
 * Time: 9:27 PM
 */
namespace epicformbuilder\Wix\Models;

class StateLink extends Model
{
    /** @var  string - The href of the operation relevant to this resource, */
    public $href;

    /** @var  string - The relationship of this operation to the returned resource */
    public $rel;

    /**
     * @param string $href
     * @param string $rel
     */
    public function __construct($href=null, $rel=null)
    {
        $this->href = $href;
        $this->rel = $rel;
    }
}