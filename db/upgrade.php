<?php

function xmldb_block_filescan_upgrade($oldversion) {

    global $DB;
    $dbman = $DB->get_manager();

    /// Add a new column newcol to the mdl_myqtype_options
    if ($oldversion < 2017062810) {
    
        // Define field id to be added to block_filescan_files.
        $table = new xmldb_table('block_filescan_files');
        $field = new xmldb_field('timechecked', XMLDB_TYPE_DATETIME, null, null, XMLDB_NOTNULL, null, 0, null);

        // Conditionally launch add field timechecked.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Filescan savepoint reached.
        upgrade_block_savepoint(true, 2017062810, 'filescan');
    }


    /// Add a new column newcol to the mdl_myqtype_options
    if ($oldversion < 2017071414) {
    
        // Define field id to be added to block_filescan_files.
        $table = new xmldb_table('block_filescan_files');
   
   
   		$field = new xmldb_field('status', XMLDB_TYPE_CHAR, '20', null, null, null, null, 'pagecount');

        // Conditionally launch add field id.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        } else {
        	$dbman->change_field_type($table, $field);	
        }
   
   		// Remove ocr status field
  	 	$field = new xmldb_field('ocrstatus');
       // Conditionally launch add field id.
        if ($dbman->field_exists($table, $field)) {
            $dbman->drop_field($table, $field);
        } 
   
   
		$field = new xmldb_field('checked', XMLDB_TYPE_INTEGER, '1', null, null, null, null, 'status');

        // Conditionally launch add field id.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        } else {
        	$dbman->change_field_type($table, $field);	
        }
   
        
 		$field = new xmldb_field('hastext', XMLDB_TYPE_INTEGER, '1', null, null, null, null, 'checked');

        // Conditionally launch add field id.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        } else {
        	$dbman->change_field_type($table, $field);	
        }

  		$field = new xmldb_field('hastitle', XMLDB_TYPE_INTEGER, '1', null, null, null, null, 'hastext');

        // Conditionally launch add field hastitle.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        } else {
        	$dbman->change_field_type($table, $field);	
        }

        $field = new xmldb_field('hasoutline', XMLDB_TYPE_INTEGER, '1', null, null, null, null, 'hastitle');

        // Conditionally launch add field hasoutline.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        } else {
        	$dbman->change_field_type($table, $field);	
        }

        $field = new xmldb_field('haslanguage', XMLDB_TYPE_INTEGER, '1', null, null, null, null, 'hasoutline');

        // Conditionally launch add field haslanguage.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        } else {
        	$dbman->change_field_type($table, $field);	
        }


        // Filescan savepoint reached.
        upgrade_block_savepoint(true, 2017071414, 'filescan');
    }

    /// Add a new column newcol to the mdl_myqtype_options
    if ($oldversion < 2017082410) {

        // Define field id to be added to block_filescan_files.
        $table = new xmldb_table('block_filescan_files');
        $field = new xmldb_field('statuscode', XMLDB_TYPE_INTEGER, '10', null, null, null, null, 'status');

        // Conditionally launch add field statuscode.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Filescan savepoint reached.
        upgrade_block_savepoint(true, 2017082410, 'filescan');
    }


    if ($oldversion < 2017101308) {

        // Define field courseinfo to be added to block_filescan_files.
        $table = new xmldb_table('block_filescan_files');
        $field = new xmldb_field('courseinfo', XMLDB_TYPE_TEXT, null, null, null, null, null, 'timechecked');

        // Conditionally launch add field courseinfo.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Filescan savepoint reached.
        upgrade_plugin_savepoint(true, 2017101308, 'error', 'filescan');
    }

    if ($oldversion < 2017101310) {

        // Define field timechecked to be added to block_filescan_files.
        $table = new xmldb_table('block_filescan_files');
        $field = new xmldb_field('timecourseinfo', XMLDB_TYPE_DATETIME, null, null, null, null, '0', 'courseinfo');

        // Conditionally launch add field timechecked.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Filescan savepoint reached.
        upgrade_plugin_savepoint(true, 2017101310, 'error', 'filescan');
    }

   if ($oldversion < 2017101318) {

        // Define field timecourseinfo to be dropped from block_filescan_files.
        $table = new xmldb_table('block_filescan_files');
        $field = new xmldb_field('timecourseinfo');

        // Conditionally launch drop field timecourseinfo.
        if ($dbman->field_exists($table, $field)) {
            $dbman->drop_field($table, $field);
        }

        // Filescan savepoint reached.
        upgrade_plugin_savepoint(true, 2017101318, 'error', 'filescan');
    }

    return true;
} 
 
