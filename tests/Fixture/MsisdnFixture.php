<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MsisdnFixture
 */
class MsisdnFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'msisdn';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'msisdn_id' => 1,
                'msisdn' => 'Lorem ipsum dolor ',
                'status' => 1,
                'created' => '2022-01-11',
                'modified' => '2022-01-11',
                'deleted' => '2022-01-11',
                'user_id' => 1,
            ],
        ];
        parent::init();
    }
}
