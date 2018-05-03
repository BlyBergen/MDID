<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WifiClientSsid Entity
 *
 * @property string $mac
 * @property string $ssid
 * @property int $sunc
 * @property int $run_id
 *
 * @property \App\Model\Entity\Run $run
 */
class WifiClientSsid extends Entity
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
        'sunc' => true,
        'run_id' => true,
        'run' => true
    ];
}
