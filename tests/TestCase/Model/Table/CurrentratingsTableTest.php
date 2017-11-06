<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CurrentRatingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CurrentRatingsTable Test Case
 */
class CurrentRatingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CurrentRatingsTable
     */
    public $CurrentRatings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.current_ratings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CurrentRatings') ? [] : ['className' => CurrentRatingsTable::class];
        $this->CurrentRatings = TableRegistry::get('CurrentRatings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CurrentRatings);

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
