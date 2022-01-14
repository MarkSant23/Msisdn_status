<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Log Entity
 *
 * @property int $history_id
 * @property int|null $user_id
 * @property int|null $msisdn_id
 * @property int|null $status
 * @property \Cake\I18n\FrozenDate $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Msisdn $msisdn
 */
class Log extends Entity
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
        'user_id' => true,
        'msisdn_id' => true,
        'status' => true,
        'created' => true,
        'user' => true,
        'msisdn' => true,
    ];
}
