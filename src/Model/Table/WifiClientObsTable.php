<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WifiClientObs Model
 *
 * @property \App\Model\Table\RunsTable|\Cake\ORM\Association\BelongsTo $Sessions
 *
 * @method \App\Model\Entity\WifiClientOb get($primaryKey, $options = [])
 * @method \App\Model\Entity\WifiClientOb newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WifiClientOb[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WifiClientOb|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WifiClientOb patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WifiClientOb[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WifiClientOb findOrCreate($search, callable $callback = null, $options = [])
 */
class WifiClientObsTable extends Table
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

        $this->setTable('wifi_client_obs');
        $this->setDisplayField('mac');
        $this->setPrimaryKey(['mac', 'first_obs']);

        $this->belongsTo('Sessions', [
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
            ->dateTime('first_obs')
            ->allowEmpty('first_obs', 'create');

        $validator
            ->dateTime('last_obs')
            ->allowEmpty('last_obs');

        $validator
            ->integer('num_probes')
            ->allowEmpty('num_probes');

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
        $rules->add($rules->existsIn(['run_id'], 'Sessions'));

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
