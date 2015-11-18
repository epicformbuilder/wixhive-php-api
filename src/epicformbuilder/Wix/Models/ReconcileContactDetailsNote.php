<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 11/18/15
 * Time: 10:15 PM
 */
namespace epicformbuilder\Wix\Models;

class ReconcileContactDetailsNote
{
    /** @var  string */
    public $returnedData;

    /** @var array  */
    public $requiredPermissionsForAllData;

    public function __construct($returnedData, array $requiredPermissionsForAllData)
    {
        $this->returnedData = $returnedData;
        $this->requiredPermissionsForAllData = $requiredPermissionsForAllData;
    }
}