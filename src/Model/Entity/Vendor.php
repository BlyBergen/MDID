<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vendor Entity
 *
 * @property string $mac
 * @property string $vendor
 * @property string $vendorLong
 * @property int $sunc
 * @property int $run_id
 *
 * @property \App\Model\Entity\Run $run
 */
class Vendor extends Entity
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
        'vendor' => true,
        'vendorLong' => true,
        'sunc' => true,
        'run_id' => true,
        'run' => true
    ];
}
