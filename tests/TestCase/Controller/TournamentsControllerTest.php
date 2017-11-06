<?php
namespace App\Test\TestCase\Controller;

use App\Controller\TournamentsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\TournamentsController Test Case
 */
class TournamentsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.rating_changes'
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
