<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WifiClientSsidsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WifiClientSsidsTable Test Case
 */
class WifiClientSsidsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WifiClientSsidsTable
     */
    public $WifiClientSsids;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.wifi_client_ssids',
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
        $config = TableRegistry::exists('WifiClientSsids') ? [] : ['className' => WifiClientSsidsTable::class];
        $this->WifiClientSsids = TableRegistry::get('WifiClientSsids', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WifiClientSsids);

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
