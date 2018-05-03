<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Device Entity
 *
 * @property int $id
 * @property string $name
 * @property string $booking_no
 * @property string $charges
 * @property int $user_id
 * @property string $mac
 * @property string $type
 * @property string $details
 * @property \Cake\I18n\FrozenTime $date_added
 * @property \Cake\I18n\FrozenTime $date_modified
 */
class Device extends Entity
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
        'booking_no' => true,
        'charges' => true,
        'user_id' => true,
        'mac' => true,
        'type' => true,
        'details' => true,
        'date_added' => true,
        'date_modified' => true
    ];
}
