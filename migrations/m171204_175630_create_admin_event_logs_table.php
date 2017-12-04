<?php

use yii\db\Migration;

/**
 * Handles the creation of table `Admin_Event_Log`.
 * ./yii migrate/create create_admin_event_logs_table --fields="event:string(100):notNull,sender:string(255):notNull,params:string(255),description:text,authorId:integer(11),authorObject:string(255),authorName:string(255),timestamp:timestamp"
 */
class m171204_175630_create_admin_event_logs_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('Admin_Event_Log', [
            'id' => $this->primaryKey(),
            'event' => $this->string(100)->notNull(),
            'sender' => $this->string(255)->notNull(),
            'params' => $this->string(255),
            'description' => $this->text(),
            'authorId' => $this->integer(11),
            'authorObject' => $this->string(255),
            'authorName' => $this->string(255),
            'timestamp' => $this->timestamp(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('Admin_Event_Log');
    }
}
