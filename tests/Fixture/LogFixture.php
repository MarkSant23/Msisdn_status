<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LogFixture
 */
class LogFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'log';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'history_id' => 1,
                'user_id' => 1,
                'msisdn_id' => 1,
                'status' => 1,
                'created' => '2022-01-11',
            ],
        ];
        parent::init();
    }
}
