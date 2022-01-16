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
            
        $validator
            ->requirePresence('status', 'create')
            ->notEmptyString('status');


        return $validator;
    }

    
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['msisdn']), ['errorField' => 'msisdn']);
        $rules->add($rules->existsIn('user_id', 'User'), ['errorField' => 'user_id']);

        return $rules;
    }
}
