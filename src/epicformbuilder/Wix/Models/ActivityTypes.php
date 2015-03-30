<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 2:15 PM
 */
namespace epicformbuilder\Wix\Models;

class ActivityTypes extends Model
{
    /** @var array */
    public $types;

    /**
     * @param array $types
     */
    public function __construct(array $types)
    {
        $this->types = $types;
    }

}