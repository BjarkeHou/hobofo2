<?php
namespace App\Test\TestCase\Controller;

use App\Controller\RatingChangesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\RatingChangesController Test Case
 */
class RatingChangesControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
