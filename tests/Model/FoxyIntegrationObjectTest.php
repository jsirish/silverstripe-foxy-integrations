<?php

namespace Dynamic\Foxy\Integrations\Test\Model;

use Dynamic\Foxy\Integrations\Model\FoxyIntegrationObject;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class FoxyIntegrationObjectTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = '../fixtures.yml';

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture(FoxyIntegrationObject::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
    }
}
