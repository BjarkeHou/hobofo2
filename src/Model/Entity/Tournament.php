<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tournament Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $started
 * @property \Cake\I18n\FrozenTime $ended
 *
 * @property \App\Model\Entity\Group[] $groups
 * @property \App\Model\Entity\Match[] $matches
 * @property \App\Model\Entity\Team[] $teams
 * @property \App\Model\Entity\EloChange[] $elo_changes
 * @property \App\Model\Entity\RatingChange[] $rating_changes
 */
class Tournament extends Entity
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
        'created' => true,
        'started' => true,
        'ended' => true,
        'groups' => true,
        'matches' => true,
        'teams' => true,
        'elo_changes' => true,
        'rating_changes' => true
    ];
}
