<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Msisdn Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Msisdn newEmptyEntity()
 * @method \App\Model\Entity\Msisdn newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Msisdn[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Msisdn get($primaryKey, $options = [])
 * @method \App\Model\Entity\Msisdn findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Msisdn patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Msisdn[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Msisdn|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Msisdn saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Msisdn[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Msisdn[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Msisdn[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Msisdn[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MsisdnTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('msisdn');
        $this->setDisplayField('msisdn_id');
        $this->setPrimaryKey('msisdn_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('User', [
            'foreignKey' => 'user_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('msisdn_id')
            ->allowEmptyString('msisdn_id', null, 'create');

        $validator
            ->scalar('msisdn')
            ->maxLength('msisdn', 20)
            ->requirePresence('msisdn', 'create')
            ->notEmptyString('msisdn', 'Msisdn is required')
            ->add('msisdn', 'custom',['rule'=> function($value, $context){
                return (bool) preg_match('/^(((00|\+)?385)|0)?(9[125789][1-9][0-9]{5,6})$/', $value);
            }, 'message'=>'Please enter a valid phone number.']);
            
            //->add('msisdn', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);
            
            //->add('msisdn', 'custom',['rule' => '(((00|\+)?385)|0)?(9[125789]?[1-9]?[0-9]?{5,6})','provider' => 'custom','message' => 'Please enter a valid phone number.']);
            //->add('msisdn','unique', ['rule' => '/(0)[0-9]{1,2}\s[0-9]{3,4}\s[0-9]{3,4}/^', 'provider' => 'table']);
            // '  ^/(0)[0-9]{1,2}\s[0-9]{3,4}\s[0-9]{3,4}/^'
            //, 'message'=>'Please enter a valid phone number.' validateUnique /^\$?((+385)|0)?9[0-9]{2}?[0-9]{3}?[0-9]{4}?$/^
            //  ['rule' => array('custom', '^(((00|\+)?385)|0)?(9[125789][1-9][0-9]{5,6}/)^')]


        $validator
            ->requirePresence('status', 'create')
            ->notEmptyString('status');


        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['msisdn']), ['errorField' => 'msisdn']);
        $rules->add($rules->existsIn('user_id', 'User'), ['errorField' => 'user_id']);

        return $rules;
    }
}
