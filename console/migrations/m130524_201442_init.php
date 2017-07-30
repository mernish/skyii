<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";

        /* MYSQL */
        if (!in_array('auth_assignment', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%auth_assignment}}', [
                    'item_name' => 'VARCHAR(64) NOT NULL',
                    'user_id' => 'VARCHAR(64) NOT NULL',
                    'created_at' => 'INT(11) NULL',
                ], $tableOptions_mysql);

                $this->addPrimaryKey('auth_assignment_pk', 'auth_assignment', ['item_name','user_id']);
            }
        }

        /* MYSQL */
        if (!in_array('auth_item', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%auth_item}}', [
                    'name' => 'VARCHAR(64) NOT NULL',
                    0 => 'PRIMARY KEY (`name`)',
                    'type' => 'SMALLINT(6) NOT NULL',
                    'description' => 'TEXT NULL',
                    'rule_name' => 'VARCHAR(64) NULL',
                    'data' => 'BLOB NULL',
                    'created_at' => 'INT(11) NULL',
                    'updated_at' => 'INT(11) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('auth_item_child', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%auth_item_child}}', [
                    'parent' => 'VARCHAR(64) NOT NULL',
                    'child' => 'VARCHAR(64) NOT NULL',
                ], $tableOptions_mysql);

                $this->addPrimaryKey('auth_item_child_pk', 'auth_item_child', ['parent','child']);
            }
        }

        /* MYSQL */
        if (!in_array('auth_rule', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%auth_rule}}', [
                    'name' => 'VARCHAR(64) NOT NULL',
                    0 => 'PRIMARY KEY (`name`)',
                    'data' => 'BLOB NULL',
                    'created_at' => 'INT(11) NULL',
                    'updated_at' => 'INT(11) NULL',
                ], $tableOptions_mysql);
            }
        }

   
        /* MYSQL */
        if (!in_array('user', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%user}}', [
                    'id' => $this->primaryKey(),
                    'username' => $this->string()->notNull()->unique(),
                    'auth_key' => $this->string(32)->notNull(),
                    'password_hash' => $this->string()->notNull(),
                    'password_reset_token' => $this->string()->unique(),
                    'email' => $this->string()->notNull()->unique(),
                    'name' => $this->string()->null(),
                    'dob' => $this->date()->null(),
                    'mobile' => $this->string(15)->null(),
                    'phone' => $this->string(15)->null(),
                    'address' => $this->text()->null(),
                    'status' => $this->smallInteger()->notNull()->defaultValue(10),
                    'created_at' => $this->integer()->notNull(),
                    'updated_at' => $this->integer()->notNull(),
                ], $tableOptions_mysql);
            }
        }

        $this->createIndex('idx_rule_name_1172_00','auth_item','rule_name',0);
        $this->createIndex('idx_type_1172_01','auth_item','type',0);
        $this->createIndex('idx_child_2432_02','auth_item_child','child',0);
        $this->createIndex('idx_UNIQUE_username_1376_18','user','username',1);
        $this->createIndex('idx_UNIQUE_email_1386_19','user','email',1);
        $this->createIndex('idx_UNIQUE_password_reset_token_1386_20','user','password_reset_token',1);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_auth_item_0401_00','{{%auth_assignment}}', 'item_name', '{{%auth_item}}', 'name', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_auth_rule_1172_01','{{%auth_item}}', 'rule_name', '{{%auth_rule}}', 'name', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_auth_item_2432_02','{{%auth_item_child}}', 'parent', '{{%auth_item}}', 'name', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_auth_item_2432_03','{{%auth_item_child}}', 'child', '{{%auth_item}}', 'name', 'CASCADE', 'NO ACTION' );
        $this->execute('SET foreign_key_checks = 1;');

        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%auth_assignment}}',['item_name'=>'Super Admin','user_id'=>'1','created_at'=>'1486189776']);
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `auth_assignment`');
        $this->execute('DROP TABLE IF EXISTS `auth_item`');
        $this->execute('DROP TABLE IF EXISTS `auth_item_child`');
        $this->execute('DROP TABLE IF EXISTS `auth_rule`');
        $this->execute('DROP TABLE IF EXISTS `user`');
        $this->execute('SET foreign_key_checks = 1;');
    }
}
