<?php

namespace CourseBundle\Migrations\Schema;

use Doctrine\DBAL\Schema\Schema;
use Oro\Bundle\MigrationBundle\Migration\Installation;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

class CourseBundleInstaller implements Installation
{

    const COURSE_TABLE_NAME = 'ororo_course';

    /**
     * {@inheritdoc}
     */
    public function getMigrationVersion()
    {
        return 'v1_0';
    }

    /**
     * {@inheritdoc}
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        $this->createCourseTable($schema);
        $this->addCourseForeignKeys($schema);

    }

    // CREATE TABLES

    /**
     * Create Course table
     *
     * @param Schema $schema
     */
    public function createCourseTable(Schema $schema)
    {
        $table = $schema->createTable(self::COURSE_TABLE_NAME);
        $table->addColumn('id',                                     'integer',['autoincrement' => true]);
        $table->addColumn('course_number',                          'string', ['length' => 100, 'notnull' => false]);
        $table->addColumn('name',                                   'string', ['length' => 100, 'notnull' => false]);
        $table->addColumn('created_at',                             'datetime', []);
        $table->addColumn('updated_at',                             'datetime', []);
        $table->addIndex(['user_owner_id'],                         'IDX_BA066CE19EB185F9', []);
        $table->addIndex(['updated_by_user_id'],                    'IDX_BA066CE12793CC5E', []);

        // Course PRIMARY KEY
        $table->setPrimaryKey(['id']);
    }

    /**
     * Add Course foreing key table
     *
     * @param Schema $schema
     */
    public function addCourseForeignKeys(Schema $schema)
    {
        $table = $schema->getTable(self::COURSE_TABLE_NAME);
        $table->addForeignKeyConstraint(
            $schema->getTable('oro_user'),
            ['user_owner_id'],
            ['id'],
            ['onDelete' => 'SET NULL', 'onUpdate' => null]
        );

        $table->addForeignKeyConstraint(
            $schema->getTable('oro_user'),
            ['updated_by_user_id'],
            ['id'],
            ['onDelete' => 'SET NULL', 'onUpdate' => null]
        );
    }

}