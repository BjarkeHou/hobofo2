<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Matches Controller
 *
 * @property \App\Model\Table\MatchesTable $Matches
 *
 * @method \App\Model\Entity\Match[] paginate($object = null, array $settings = [])
 */
class MatchesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tournaments', 'Groups', 'Team1s', 'Team2s', 'Winners', 'Matchtypes']
        ];
        $matches = $this->paginate($this->Matches);

        $this->set(compact('matches'));
        $this->set('_serialize', ['matches']);
    }

    /**
     * View method
     *
     * @param string|null $id Match id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $match = $this->Matches->get($id, [
            'contain' => ['Tournaments', 'Groups', 'Team1s', 'Team2s', 'Winners', 'Matchtypes', 'EloChanges']
        ]);

        $this->set('match', $match);
        $this->set('_serialize', ['match']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $match = $this->Matches->newEntity();
        if ($this->request->is('post')) {
            $match = $this->Matches->patchEntity($match, $this->request->getData());
            if ($this->Matches->save($match)) {
                $this->Flash->success(__('The match has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The match could not be saved. Please, try again.'));
        }
        $tournaments = $this->Matches->Tournaments->find('list', ['limit' => 200]);
        $groups = $this->Matches->Groups->find('list', ['limit' => 200]);
        $team1s = $this->Matches->Team1s->find('list', ['limit' => 200]);
        $team2s = $this->Matches->Team2s->find('list', ['limit' => 200]);
        $winners = $this->Matches->Winners->find('list', ['limit' => 200]);
        $matchtypes = $this->Matches->Matchtypes->find('list', ['limit' => 200]);
        $this->set(compact('match', 'tournaments', 'groups', 'team1s', 'team2s', 'winners', 'matchtypes'));
        $this->set('_serialize', ['match']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Match id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $match = $this->Matches->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $match = $this->Matches->patchEntity($match, $this->request->getData());
            if ($this->Matches->save($match)) {
                $this->Flash->success(__('The match has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The match could not be saved. Please, try again.'));
        }
        $tournaments = $this->Matches->Tournaments->find('list', ['limit' => 200]);
        $groups = $this->Matches->Groups->find('list', ['limit' => 200]);
        $team1s = $this->Matches->Team1s->find('list', ['limit' => 200]);
        $team2s = $this->Matches->Team2s->find('list', ['limit' => 200]);
        $winners = $this->Matches->Winners->find('list', ['limit' => 200]);
        $matchtypes = $this->Matches->Matchtypes->find('list', ['limit' => 200]);
        $this->set(compact('match', 'tournaments', 'groups', 'team1s', 'team2s', 'winners', 'matchtypes'));
        $this->set('_serialize', ['match']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Match id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $match = $this->Matches->get($id);
        if ($this->Matches->delete($match)) {
            $this->Flash->success(__('The match has been deleted.'));
        } else {
            $this->Flash->error(__('The match could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
