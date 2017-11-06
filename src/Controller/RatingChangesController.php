<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RatingChanges Controller
 *
 * @property \App\Model\Table\RatingChangesTable $RatingChanges
 *
 * @method \App\Model\Entity\RatingChange[] paginate($object = null, array $settings = [])
 */
class RatingChangesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tournaments', 'Players']
        ];
        $ratingChanges = $this->paginate($this->RatingChanges);

        $this->set(compact('ratingChanges'));
        $this->set('_serialize', ['ratingChanges']);
    }

    /**
     * View method
     *
     * @param string|null $id Rating Change id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ratingChange = $this->RatingChanges->get($id, [
            'contain' => ['Tournaments', 'Players']
        ]);

        $this->set('ratingChange', $ratingChange);
        $this->set('_serialize', ['ratingChange']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ratingChange = $this->RatingChanges->newEntity();
        if ($this->request->is('post')) {
            $ratingChange = $this->RatingChanges->patchEntity($ratingChange, $this->request->getData());
            if ($this->RatingChanges->save($ratingChange)) {
                $this->Flash->success(__('The rating change has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rating change could not be saved. Please, try again.'));
        }
        $tournaments = $this->RatingChanges->Tournaments->find('list', ['limit' => 200]);
        $players = $this->RatingChanges->Players->find('list', ['limit' => 200]);
        $this->set(compact('ratingChange', 'tournaments', 'players'));
        $this->set('_serialize', ['ratingChange']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rating Change id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ratingChange = $this->RatingChanges->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ratingChange = $this->RatingChanges->patchEntity($ratingChange, $this->request->getData());
            if ($this->RatingChanges->save($ratingChange)) {
                $this->Flash->success(__('The rating change has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rating change could not be saved. Please, try again.'));
        }
        $tournaments = $this->RatingChanges->Tournaments->find('list', ['limit' => 200]);
        $players = $this->RatingChanges->Players->find('list', ['limit' => 200]);
        $this->set(compact('ratingChange', 'tournaments', 'players'));
        $this->set('_serialize', ['ratingChange']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rating Change id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ratingChange = $this->RatingChanges->get($id);
        if ($this->RatingChanges->delete($ratingChange)) {
            $this->Flash->success(__('The rating change has been deleted.'));
        } else {
            $this->Flash->error(__('The rating change could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
