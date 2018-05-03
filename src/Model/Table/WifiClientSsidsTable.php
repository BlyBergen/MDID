<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WifiClientSsids Model
 *
 * @property \App\Model\Table\RunsTable|\Cake\ORM\Association\BelongsTo $Runs
 *
 * @method \App\Model\Entity\WifiClientSsid get($primaryKey, $options = [])
 * @method \App\Model\Entity\WifiClientSsid newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WifiClientSsid[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WifiClientSsid|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WifiClientSsid patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WifiClientSsid[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WifiClientSsid findOrCreate($search, callable $callback = null, $options = [])
 */
class WifiClientSsidsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('wifi_client_ssids');
        $this->setDisplayField('mac');
        $this->setPrimaryKey(['mac', 'ssid']);

        $this->belongsTo('Runs', [
            'foreignKey' => 'run_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->scalar('mac')
            ->maxLength('mac', 64)
            ->allowEmpty('mac', 'create');

        $validator
            ->scalar('ssid')
            ->maxLength('ssid', 100)
            ->allowEmpty('ssid', 'create');

        $validator
            ->integer('sunc')
            ->allowEmpty('sunc');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['run_id'], 'Runs'));

        return $rules;
    }

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName()
    {
        return 'snoopy';
    }
}
