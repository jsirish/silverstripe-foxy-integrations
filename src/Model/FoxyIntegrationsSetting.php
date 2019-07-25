<?php

namespace Dynamic\Foxy\Integrations\Extension;

use Dynamic\Foxy\Integrations\Model\FoxyIntegrationObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\ORM\DataExtension;

class FoxyIntegrationsSetting extends DataExtension
{
    /**
     * @var array
     */
    private static $has_many = array(
        'Integrations' => FoxyIntegrationObject::class
    );

    /**
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
    {
        $integrations = $fields->dataFieldByName('Integrations');
        $fields->removeByName('Integrations');

        $config = $integrations->getConfig();
        $config
            ->removeComponentsByType([
                GridFieldAddExistingAutocompleter::class
            ]);


        $fields->addFieldsToTab('Root.Integrations', array(
            HeaderField::create('IntegrationsHeader', 'Foxy Integrations', 3),
            LiteralField::create(
                'IntegrationsDescip',
                '<p>Push your Foxy.io datafeed to additional URLs for processing. This allows your  
                    datafeed to be used by additional applications, such as 
                    <a href="http://foxytools.com/orderdesk/" target="_blank">OrderDesk</a>.</p>'
            ),
            $integrations
        ));
    }
}
