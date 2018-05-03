<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RegistrantsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RegistrantsTable Test Case
 */
class RegistrantsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RegistrantsTable
     */
    public $Registrants;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.registrants'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Registrants') ? [] : ['className' => RegistrantsTable::class];
        $this->Registrants = TableRegistry::get('Registrants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Registrants);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
