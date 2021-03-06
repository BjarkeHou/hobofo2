<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RatingChange Entity
 *
 * @property int $id
 * @property int $tournament_id
 * @property int $player_id
 * @property int $rating_change
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Tournament $tournament
 * @property \App\Model\Entity\Player $player
 */
class RatingChange extends Entity
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
        'player_id' => true,
        'rating_change' => true,
        'created' => true,
        'tournament' => true,
        'player' => true
    ];
}
