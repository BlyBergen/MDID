<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WifiClientObsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WifiClientObsTable Test Case
 */
class WifiClientObsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WifiClientObsTable
     */
    public $WifiClientObs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.wifi_client_obs',
        'app.runs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('WifiClientObs') ? [] : ['className' => WifiClientObsTable::class];
        $this->WifiClientObs = TableRegistry::get('WifiClientObs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WifiClientObs);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test defaultConnectionName method
     *
     * @return void
     */
    public function testDefaultConnectionName()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
