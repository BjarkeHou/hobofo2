<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Matchtypes Controller
 *
 * @property \App\Model\Table\MatchtypesTable $Matchtypes
 *
 * @method \App\Model\Entity\Matchtype[] paginate($object = null, array $settings = [])
 */
class MatchtypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $matchtypes = $this->paginate($this->Matchtypes);

        $this->set(compact('matchtypes'));
        $this->set('_serialize', ['matchtypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Matchtype id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $matchtype = $this->Matchtypes->get($id, [
            'contain' => ['Matches']
        ]);

        $this->set('matchtype', $matchtype);
        $this->set('_serialize', ['matchtype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $matchtype = $this->Matchtypes->newEntity();
        if ($this->request->is('post')) {
            $matchtype = $this->Matchtypes->patchEntity($matchtype, $this->request->getData());
            if ($this->Matchtypes->save($matchtype)) {
                $this->Flash->success(__('The matchtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The matchtype could not be saved. Please, try again.'));
        }
        $this->set(compact('matchtype'));
        $this->set('_serialize', ['matchtype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Matchtype id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $matchtype = $this->Matchtypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $matchtype = $this->Matchtypes->patchEntity($matchtype, $this->request->getData());
            if ($this->Matchtypes->save($matchtype)) {
                $this->Flash->success(__('The matchtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The matchtype could not be saved. Please, try again.'));
        }
        $this->set(compact('matchtype'));
        $this->set('_serialize', ['matchtype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Matchtype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $matchtype = $this->Matchtypes->get($id);
        if ($this->Matchtypes->delete($matchtype)) {
            $this->Flash->success(__('The matchtype has been deleted.'));
        } else {
            $this->Flash->error(__('The matchtype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
