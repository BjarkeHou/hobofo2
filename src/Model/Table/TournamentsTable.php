<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tournaments Model
 *
 * @property \App\Model\Table\GroupsTable|\Cake\ORM\Association\HasMany $Groups
 * @property \App\Model\Table\MatchesTable|\Cake\ORM\Association\HasMany $Matches
 * @property \App\Model\Table\TeamsTable|\Cake\ORM\Association\HasMany $Teams
 * @property \App\Model\Table\EloChangesTable|\Cake\ORM\Association\HasMany $EloChanges
 * @property \App\Model\Table\RatingChangesTable|\Cake\ORM\Association\HasMany $RatingChanges
 *
 * @method \App\Model\Entity\Tournament get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tournament newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tournament[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tournament|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tournament patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tournament[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tournament findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TournamentsTable extends Table
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

        $this->setTable('tournaments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Groups', [
            'foreignKey' => 'tournament_id'
        ]);
        $this->hasMany('Matches', [
            'foreignKey' => 'tournament_id'
        ]);
        $this->hasMany('Teams', [
            'foreignKey' => 'tournament_id'
        ]);
        $this->hasMany('EloChanges', [
            'foreignKey' => 'tournament_id'
        ]);
        $this->hasMany('RatingChanges', [
            'foreignKey' => 'tournament_id'
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
            ->dateTime('started')
            ->allowEmpty('started');

        $validator
            ->dateTime('ended')
            ->allowEmpty('ended');

        return $validator;
    }
}
