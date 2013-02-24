<?php
/*
 * Copyright 2011 Daniel Sloof
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
*/

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();

// Create table that stores which product entities require new index.
$table = $this->getConnection()->newTable($this->getTable('api_import/index_entity'));
$table
    ->addColumn(
        'index_id',
        Varien_Db_Ddl_Table::TYPE_INTEGER,
        null,
        array('unsigned' => true, 'nullable' => false, 'primary' => true)
    )
    ->addColumn(
        'entity_id',
        Varien_Db_Ddl_Table::TYPE_INTEGER,
        null,
        array('unsigned' => true, 'nullable' => false) // TODO: FK on entity_id
    )
    ->addColumn(
        'index_type',
        Varien_Db_Ddl_Table::TYPE_SMALLINT,
        null,
        array('unsigned' => true, 'nullable' => false)
    );
$this->getConnection()->createTable($table);

$installer->endSetup();