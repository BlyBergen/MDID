<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WifiClientOb Entity
 *
 * @property string $mac
 * @property \Cake\I18n\FrozenTime $first_obs
 * @property \Cake\I18n\FrozenTime $last_obs
 * @property int $num_probes
 * @property int $sunc
 * @property int $run_id
 *
 * @property \App\Model\Entity\Run $run
 */
class WifiClientOb extends Entity
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
        'last_obs' => true,
        'num_probes' => true,
        'sunc' => true,
        'run_id' => true,
        'run' => true
    ];
}
