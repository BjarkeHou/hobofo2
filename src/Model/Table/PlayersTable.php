<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Players Model
 *
 * @property \App\Model\Table\MembershipsTable|\Cake\ORM\Association\HasMany $Memberships
 * @property \App\Model\Table\EloChangesTable|\Cake\ORM\Association\HasMany $EloChanges
 * @property \App\Model\Table\RatingChangesTable|\Cake\ORM\Association\HasMany $RatingChanges
 *
 * @method \App\Model\Entity\Player get($primaryKey, $options = [])
 * @method \App\Model\Entity\Player newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Player[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Player|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Player patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Player[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Player findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PlayersTable extends Table
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

        $this->setTable('players');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Memberships', [
            'foreignKey' => 'player_id'
        ]);
        $this->hasMany('EloChanges', [
            'foreignKey' => 'player_id'
        ]);
        $this->hasMany('RatingChanges', [
            'foreignKey' => 'player_id'
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

        $validator
            ->scalar('phone')
            ->requirePresence('phone', 'create')
            ->notEmpty('phone');

        $validator
            ->boolean('active_membership')
            ->requirePresence('active_membership', 'create')
            ->notEmpty('active_membership');

        $validator
            ->dateTime('last_paid_membership')
            ->allowEmpty('last_paid_membership');

        $validator
            ->integer('rating')
            ->requirePresence('rating', 'create')
            ->notEmpty('rating');

        $validator
            ->integer('elo')
            ->requirePresence('elo', 'create')
            ->notEmpty('elo');

        $validator
            ->boolean('receive_sms')
            ->requirePresence('receive_sms', 'create')
            ->notEmpty('receive_sms');

        return $validator;
    }
}
