<?php

use Phinx\Migration\AbstractMigration;

class DatesTable extends AbstractMigration
{
    /**
     * Migrate up.
     */
    public function up()
    {
        $table = $this->table('dates', ['id' => 'date_id']);
        $table->addColumn('year', 'integer')
            ->addColumn('month', 'integer')
            ->addColumn('day', 'integer')
            ->save();
    }

    /**
     * Migrate down.
     */
    public function down()
    {
        $this->dropTable('dates');
    }
}
