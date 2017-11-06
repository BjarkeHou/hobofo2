<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Matchtypes Model
 *
 * @property \App\Model\Table\MatchesTable|\Cake\ORM\Association\HasMany $Matches
 *
 * @method \App\Model\Entity\Matchtype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Matchtype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Matchtype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Matchtype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Matchtype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Matchtype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Matchtype findOrCreate($search, callable $callback = null, $options = [])
 */
class MatchtypesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('matchtypes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Matches', [
            'foreignKey' => 'matchtype_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
