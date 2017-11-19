<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Matches Model
 *
 * @property \App\Model\Table\TournamentsTable|\Cake\ORM\Association\BelongsTo $Tournaments
 * @property \App\Model\Table\GroupsTable|\Cake\ORM\Association\BelongsTo $Groups
 * @property \App\Model\Table\Team1sTable|\Cake\ORM\Association\BelongsTo $Team1s
 * @property \App\Model\Table\Team2sTable|\Cake\ORM\Association\BelongsTo $Team2s
 * @property \App\Model\Table\WinnersTable|\Cake\ORM\Association\BelongsTo $Winners
 * @property \App\Model\Table\MatchtypesTable|\Cake\ORM\Association\BelongsTo $Matchtypes
 * @property \App\Model\Table\EloChangesTable|\Cake\ORM\Association\HasMany $EloChanges
 *
 * @method \App\Model\Entity\Match get($primaryKey, $options = [])
 * @method \App\Model\Entity\Match newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Match[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Match|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Match patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Match[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Match findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MatchesTable extends Table
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

        $this->setTable('matches');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Tournaments', [
            'foreignKey' => 'tournament_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Team1', [
            'className' => 'Teams',
            'foreignKey' => 'team1_id',
            'joinType' => 'INNER',
            //'propertyName' => 'Team1'
        ]);
        $this->belongsTo('Team2', [
            'className' => 'Teams',
            'foreignKey' => 'team2_id',
            'joinType' => 'INNER',
            // 'propertyName' => 'Team2'
        ]);
        $this->belongsTo('Winner', [
            'className' => 'Teams',
            'foreignKey' => 'winner_id'
        ]);
        $this->belongsTo('Matchtypes', [
            'foreignKey' => 'matchtype_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Tables', [
            'foreignKey' => 'table_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('EloChanges', [
            'foreignKey' => 'match_id'
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
            ->integer('team1_score')
            ->allowEmpty('team1_score');

        $validator
            ->integer('team2_score')
            ->allowEmpty('team2_score');

        $validator
            ->dateTime('started')
            ->allowEmpty('started');

        $validator
            ->dateTime('ended')
            ->allowEmpty('ended');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['tournament_id'], 'Tournaments'));
        $rules->add($rules->existsIn(['group_id'], 'Groups'));
        $rules->add($rules->existsIn(['team1_id'], 'Team1s'));
        $rules->add($rules->existsIn(['team2_id'], 'Team2s'));
        $rules->add($rules->existsIn(['winner_id'], 'Winners'));
        $rules->add($rules->existsIn(['matchtype_id'], 'Matchtypes'));

        return $rules;
    }
}
