<?php

use Phinx\Migration\AbstractMigration;

class MisersTable extends AbstractMigration
{
    /**
     * Migrate up.
     */
    public function up()
    {
        $table = $this->table('misers', ['id' => 'miser_id']);
        $table->addColumn('status', 'integer')
            ->addColumn('date_id', 'integer')
            ->addColumn('page_id', 'integer')
            ->addColumn('created', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addIndex(['page_name'], ['unique' => true])
            ->addForeignKey('date_id', 'dates', 'date_id')
            ->addForeignKey('page_id', 'pages', 'page_id', ['delete' => 'CASCADE'])
            ->save();
    }

    /**
     * Migrate down.
     */
    public function down()
    {
        $this->dropTable('misers');
    }
}
