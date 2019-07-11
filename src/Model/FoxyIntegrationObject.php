<?php

namespace Dynamic\Foxy\Integrations\Model;

use Dynamic\Foxy\Model\Setting;
use SilverStripe\ORM\DataObject;

class FoxyIntegrationObject extends DataObject
{
    /**
     * @var array
     */
    private static $db = array(
        'Title' => 'Varchar(150)',
        'URL' => 'Varchar(255)'
    );

    /**
     * @var array
     */
    private static $has_one = array(
        'FoxySetting' => Setting::class,
    );

    /**
     * @var string
     */
    private static $singular_name = 'Foxy Integration';

    /**
     * @var string
     */
    private static $plural_name = 'Foxy Integrations';

    /**
     * @var string
     */
    private static $table_name = 'FoxyIntegrationObject';

    /**
     * @var array
     */
    private static $summary_fields = array(
        'Title',
        'URL'
    );

    /**
     * @return \SilverStripe\Forms\FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'FoxySettingID',
        ]);

        return $fields;
    }
}
