<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Match Entity
 *
 * @property int $id
 * @property int $tournament_id
 * @property int $group_id
 * @property int $team1_id
 * @property int $team2_id
 * @property int $team1_score
 * @property int $team2_score
 * @property int $winner_id
 * @property int $matchtype_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $started
 * @property \Cake\I18n\FrozenTime $ended
 *
 * @property \App\Model\Entity\Tournament $tournament
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\Team1 $team1
 * @property \App\Model\Entity\Team2 $team2
 * @property \App\Model\Entity\Winner $winner
 * @property \App\Model\Entity\Matchtype $matchtype
 * @property \App\Model\Entity\EloChange[] $elo_changes
 */
class Match extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'tournament_id' => true,
        'group_id' => true,
        'team1_id' => true,
        'team2_id' => true,
        'team1_score' => true,
        'team2_score' => true,
        'winner_id' => true,
        'matchtype_id' => true,
        'created' => true,
        'started' => true,
        'ended' => true,
        'tournament' => true,
        'group' => true,
        'team1' => true,
        'team2' => true,
        'winner' => true,
        'matchtype' => true,
        'elo_changes' => true
    ];
}
