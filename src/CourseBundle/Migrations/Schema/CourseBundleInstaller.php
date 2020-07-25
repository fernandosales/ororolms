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

        // Course PRIMARY KEY
        $table->setPrimaryKey(['id']);
    }

}