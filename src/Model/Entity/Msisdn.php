<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Msisdn Entity
 *
 * @property int $msisdn_id
 * @property string $msisdn
 * @property int $status
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 * @property \Cake\I18n\FrozenDate|null $deleted
 * @property int|null $user_id
 *
 * @property \App\Model\Entity\User $user
 */
class Msisdn extends Entity
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
        'msisdn' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'msisdn_id' => true,
    ];

}
