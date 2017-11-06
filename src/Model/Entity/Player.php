<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Player Entity
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property \Cake\I18n\FrozenTime $created
 * @property bool $active_membership
 * @property \Cake\I18n\FrozenTime $last_paid_membership
 * @property int $rating
 * @property int $elo
 * @property bool $receive_sms
 *
 * @property \App\Model\Entity\Membership[] $memberships
 * @property \App\Model\Entity\EloChange[] $elo_changes
 * @property \App\Model\Entity\RatingChange[] $rating_changes
 */
class Player extends Entity
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
        'name' => true,
        'phone' => true,
        'created' => true,
        'active_membership' => true,
        'last_paid_membership' => true,
        'rating' => true,
        'elo' => true,
        'receive_sms' => true,
        'memberships' => true,
        'elo_changes' => true,
        'rating_changes' => true
    ];
}
