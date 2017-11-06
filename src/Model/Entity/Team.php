<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Team Entity
 *
 * @property int $id
 * @property int $tournament_id
 * @property int $group_id
 * @property int $player1_id
 * @property int $player2_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Tournament $tournament
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\Player1 $player1
 * @property \App\Model\Entity\Player2 $player2
 */
class Team extends Entity
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
        'player1_id' => true,
        'player2_id' => true,
        'created' => true,
        'tournament' => true,
        'group' => true,
        'player1' => true,
        'player2' => true
    ];
}
