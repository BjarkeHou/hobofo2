<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;
use App\Model\Rule\TeamInTournamentRule;


/**
 * Teams Model
 *
 * @property \App\Model\Table\TournamentsTable|\Cake\ORM\Association\BelongsTo $Tournaments
 * @property \App\Model\Table\GroupsTable|\Cake\ORM\Association\BelongsTo $Groups
 * @property \App\Model\Table\Player1sTable|\Cake\ORM\Association\BelongsTo $Player1s
 * @property \App\Model\Table\Player2sTable|\Cake\ORM\Association\BelongsTo $Player2s
 *
 * @method \App\Model\Entity\Team get($primaryKey, $options = [])
 * @method \App\Model\Entity\Team newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Team[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Team|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Team patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Team[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Team findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TeamsTable extends Table
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

        $this->setTable('teams');
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
        $this->belongsTo('Player1', [
            'className' => 'Players',
            'foreignKey' => 'player1_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Player2', [
            'className' => 'Players',
            'foreignKey' => 'player2_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['player1_id'], 'Player1'));
        $rules->add($rules->existsIn(['player2_id'], 'Player2'));

        $rules->add(new TeamInTournamentRule(), "TeamInTournament", ['message' => 'En eller flere spillere er allerede tilmeldt turneringen.']);

        // $rules->add($rules->isUnique(['tournament_id', 'player1_id', 'player2_id'], "Holdet er allerede tilmeldt denne turnering"));
        // $rules->add($rules->isUnique(['tournament_id', 'player2_id', 'player1_id'], "Holdet er allerede tilmeldt denne turnering"));

        return $rules;
    }
}
