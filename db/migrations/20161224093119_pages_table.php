<?php

use Phinx\Migration\AbstractMigration;

class PagesTable extends AbstractMigration
{
    /**
     * Migrate up.
     */
    public function change()
    {
        $table = $this->table('pages', ['id' => 'page_id']);
        $table->addColumn('page_name', 'string', ['limit' => 20])
            ->addColumn('created', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addIndex(['page_name'], ['unique' => true])
            ->save();
    }

    /**
     * Migrate down.
     */
    public function down()
    {
        $this->dropTable('pages');
    }
}
