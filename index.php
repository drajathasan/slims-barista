<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2021-06-15 10:39:44
 * @modify date 2021-09-11 18:25:45
 * @license GPLv3
 */

// key to authenticate
if (!defined('INDEX_AUTH')) {
  define('INDEX_AUTH', '1');
}

// key to get full database access
define('DB_ACCESS', 'fa');

if (!defined('SB')) {
    // main system configuration
    require '../../../sysconfig.inc.php';
    // start the session
    require SB.'admin/default/session.inc.php';
}

// Barista Version
define('BARISTA_VERSION', '2.0.0-alpha-1');

// load settings
utility::loadSettings($dbs);

// IP based access limitation
require LIB . 'ip_based_access.inc.php';
// set dependency
require SB.'admin/default/session_check.inc.php';
require SIMBIO . 'simbio_GUI/table/simbio_table.inc.php';
require SIMBIO . 'simbio_GUI/form_maker/simbio_form_table_AJAX.inc.php';
require SIMBIO . 'simbio_GUI/paging/simbio_paging.inc.php';
require SIMBIO . 'simbio_DB/datagrid/simbio_dbgrid.inc.php';
require SIMBIO.'simbio_DB/simbio_dbop.inc.php';
// end dependency

