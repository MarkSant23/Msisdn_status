<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MsisdnTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MsisdnTable Test Case
 */
class MsisdnTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MsisdnTable
     */
    protected $Msisdn;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Msisdn',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Msisdn') ? [] : ['className' => MsisdnTable::class];
        $this->Msisdn = $this->getTableLocator()->get('Msisdn', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Msisdn);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MsisdnTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MsisdnTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
