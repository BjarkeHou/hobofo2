<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RatingChangesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RatingChangesTable Test Case
 */
class RatingChangesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RatingChangesTable
     */
    public $RatingChanges;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rating_changes',
        'app.tournaments',
        'app.groups',
        'app.matches',
        'app.team1s',
        'app.team2s',
        'app.winners',
        'app.matchtypes',
        'app.elo_changes',
        'app.teams',
        'app.player1s',
        'app.player2s',
        'app.players',
        'app.memberships'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RatingChanges') ? [] : ['className' => RatingChangesTable::class];
        $this->RatingChanges = TableRegistry::get('RatingChanges', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RatingChanges);

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
}
