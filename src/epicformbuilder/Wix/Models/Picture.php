<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 12:13 PM
 */
namespace epicformbuilder\Wix\Models;

class Picture extends Model
{

    /** @var string */
    public $picture;

    /**
     * @param string $picture
     */
    public function __construct($picture)
    {
        $this->picture= $picture;

    }

}