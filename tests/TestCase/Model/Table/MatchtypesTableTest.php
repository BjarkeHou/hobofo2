<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MatchtypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MatchtypesTable Test Case
 */
class MatchtypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MatchtypesTable
     */
    public $Matchtypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.matchtypes',
        'app.matches',
        'app.tournaments',
        'app.groups',
        'app.teams',
        'app.team1s',
        'app.team2s',
        'app.winners',
        'app.elo_changes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Matchtypes') ? [] : ['className' => MatchtypesTable::class];
        $this->Matchtypes = TableRegistry::get('Matchtypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Matchtypes);

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
