<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Tournaments Controller
 *
 * @property \App\Model\Table\TournamentsTable $Tournaments
 *
 * @method \App\Model\Entity\Tournament[] paginate($object = null, array $settings = [])
 */
class TournamentsController extends AppController
{



    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->viewBuilder()->layout('frontend');
        $tournaments = $this->paginate($this->Tournaments);

        $this->set(compact('tournaments'));
        $this->set('_serialize', ['tournaments']);
    }

    /**
     * View method
     *
     * @param string|null $id Tournament id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tournament = $this->Tournaments->get($id, [
            'contain' => ['Groups', 'Matches', 'Matches.Team1', 'Matches.Team2', 'Matches.Team1.Player1', 'Matches.Team1.Player2', 'Matches.Team2.Player1', 'Matches.Team2.Player2', 'Matches.Tables', 'Teams', 'EloChanges', 'RatingChanges']
        ]);

        // $this->Matches = TableRegistry::get('Matches');
        // $matches = $this->Matches->find('all', ['contain' => ['Team1', 'Team2', 'Team1.Player1', 'Team1.Player2', 'Team2.Player1', 'Team2.Player2']])->where(['Matches.tournament_id =' => $id]);
        // $matches = $this->Matches->find('all')->where(['Matches.tournament_id =' => $id]);

        $this->set('tournament', $tournament);
        // $this->set('matches', $matches);
        $this->set('_serialize', ['tournament']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tournament = $this->Tournaments->newEntity();
        if ($this->request->is('post')) {
            $tournament = $this->Tournaments->patchEntity($tournament, $this->request->getData());
            if ($this->Tournaments->save($tournament)) {
                $this->Flash->success(__('The tournament has been saved.'));

                return $this->redirect(['action' => 'edit', $tournament->id]);
            }
            $this->Flash->error(__('The tournament could not be saved. Please, try again.'));
        }
        $this->set(compact('tournament'));
        $this->set('_serialize', ['tournament']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tournament id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tournament = $this->Tournaments->get($id, [
            'contain' => ['Teams', 'Teams.Player1', 'Teams.Player2']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tournament = $this->Tournaments->patchEntity($tournament, $this->request->getData());
            if ($this->Tournaments->save($tournament)) {
                $this->Flash->success(__('The tournament has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tournament could not be saved. Please, try again.'));
        }

        $this->Players = TableRegistry::get('Players');
        $players = $this->Players->find('all');
        $this->set(compact('tournament', 'players'));
        $this->set('_serialize', ['tournament']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tournament id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tournament = $this->Tournaments->get($id);
        if ($this->Tournaments->delete($tournament)) {
            $this->Flash->success(__('The tournament has been deleted.'));
        } else {
            $this->Flash->error(__('The tournament could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
