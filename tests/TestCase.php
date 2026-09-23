<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    private string $testDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->testDatabase = 'crud_nombres_test_'.bin2hex(random_bytes(8));
        config(['database.connections.mongodb.database' => $this->testDatabase]);
        DB::purge('mongodb');
    }

    protected function tearDown(): void
    {
        try {
            $connection = DB::connection('mongodb');
            if ($connection->getDatabaseName() === $this->testDatabase) {
                $connection->getMongoDB()->drop();
            }
        } finally {
            parent::tearDown();
        }
    }
}
