<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CurrentRatings Controller
 *
 * @property \App\Model\Table\CurrentRatingsTable $CurrentRatings
 *
 * @method \App\Model\Entity\CurrentRating[] paginate($object = null, array $settings = [])
 */
class CurrentRatingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $currentRatings = $this->paginate($this->CurrentRatings);

        $this->set(compact('currentRatings'));
        $this->set('_serialize', ['currentRatings']);
    }

    /**
     * View method
     *
     * @param string|null $id Current Rating id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $currentRating = $this->CurrentRatings->get($id, [
            'contain' => []
        ]);

        $this->set('currentRating', $currentRating);
        $this->set('_serialize', ['currentRating']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $currentRating = $this->CurrentRatings->newEntity();
        if ($this->request->is('post')) {
            $currentRating = $this->CurrentRatings->patchEntity($currentRating, $this->request->getData());
            if ($this->CurrentRatings->save($currentRating)) {
                $this->Flash->success(__('The current rating has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The current rating could not be saved. Please, try again.'));
        }
        $this->set(compact('currentRating'));
        $this->set('_serialize', ['currentRating']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Current Rating id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $currentRating = $this->CurrentRatings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $currentRating = $this->CurrentRatings->patchEntity($currentRating, $this->request->getData());
            if ($this->CurrentRatings->save($currentRating)) {
                $this->Flash->success(__('The current rating has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The current rating could not be saved. Please, try again.'));
        }
        $this->set(compact('currentRating'));
        $this->set('_serialize', ['currentRating']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Current Rating id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $currentRating = $this->CurrentRatings->get($id);
        if ($this->CurrentRatings->delete($currentRating)) {
            $this->Flash->success(__('The current rating has been deleted.'));
        } else {
            $this->Flash->error(__('The current rating could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
