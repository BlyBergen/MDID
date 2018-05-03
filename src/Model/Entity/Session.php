<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Session Entity
 *
 * @property int $runn_id
 * @property string $location
 * @property string $drone
 * @property \Cake\I18n\FrozenTime $start
 * @property \Cake\I18n\FrozenTime $end
 * @property string $plugins
 * @property int $sunc
 * @property int $run_id
 *
 * @property \App\Model\Entity\Run $run
 */
class Session extends Entity
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
        'location' => true,
        'drone' => true,
        'start' => true,
        'end' => true,
        'plugins' => true,
        'sunc' => true,
        'run_id' => true,
        'run' => true
    ];
}
