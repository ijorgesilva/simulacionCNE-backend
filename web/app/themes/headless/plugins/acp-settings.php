<?php
/*
 * Admin Columns Pro 
 * Generate JSON settings
 * URL: https://docs.admincolumns.com/article/58-how-to-setup-local-storage
 */
add_filter( 'acp/storage/file/directory', function() {
    return get_stylesheet_directory() . '/acp-settings';
} );

/*
 When you decide to work with local storage and still have some column settings in the database that you want to move to local storage, 
 you have the following options to migrate your data from data to file.

    1. The first option is to open the column settings that are in the database and create a copy by clicking the + Add Column Set button. 
    Once you have a copy, you can remove the old one from the database.
    2. Use our migration script that migrates all database settings to your file system once.

The following hook migrates all the column settings that are in the database to your file system, 
removing all migrated settings from the database afterward. Once the migration is successful, you can remove the snippet from your installation 
to prevent it from keep trying to migrate the settings. 
 */
// add_filter( 'acp/storage/file/directory/migrate', '__return_true' );

/*
 Every time you save your column settings, a new PHP file will be created in the provided folder. 
 Once this hook is loaded, all column settings will be loaded from your directory. 
 Any settings in your database will be loaded as read-only but can be made editable by creating a new copy, or by using our migration script.
 When moving to a live-environment, you probably want your local file settings to be loaded as read-only and make the database the default storage engine again. 
 The following hook allows you to easily switch between read-only storage or writable storage. 
*/
add_filter( 'acp/storage/file/directory/writable', '__return_false' );


?>