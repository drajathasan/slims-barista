<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2021-06-15 10:39:44
 * @modify date 2021-09-11 18:25:45
 * @license GPLv3
 */

use Zein\Http;

// key to authenticate
if (!defined('INDEX_AUTH')) {
  define('INDEX_AUTH', '1');
}

// key to get full database access
define('DB_ACCESS', 'fa');

if (!defined('SB')) {
    // main system configuration
    include '../../../sysconfig.inc.php';
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
require __DIR__ . '/library/autoload.php';
require __DIR__ .'/library/helper.php';
// end dependency

// Http Path
// Render content based pathinfo
$Http = Http::getInstance();

$Http->getPath(function($Path) use($sysconf) {
    // View render
    if (count($Path) < 2)
    {
        Zein\View::render($Path[0]);
        exit;
    }

    // For Crud process
    $Class = $Path[0];
    unset($Path[0]);
    $Param = [$sysconf, $Path];

    // Execute action
    callClass('Zein\Action\\' . $Class, function($Class) use($Param) {
        $Class::execute($Param[0], $Param[1]);
    });
});
// 
?>
<div class="w-100 d-block text-white" style="height: 38vh;background-image: url(/s94/admin/modules/barista/assets/images/banner.png);background-size: cover;background-repeat: no-repeat;" data-origsrc="https://unsplash.com/photos/yERPnTFUXiU">
  <div class="p-5">
    <h1 class="font-weight-bold">Barista</h1>
    <span style="font-size: 1.3rem">"Menyajikan mu <strong>kopi-an</strong> aplikasi pendukung SLiMS"</span>
    <div class="search-menu p-2 mt-2 w-50 rounded-pill bg-white">
      <input onkeypress="search(event)" class="pl-3 search-input" placeholder="Search">
    </div>
  </div>
</div>
<script>
  function search(event)
  {
    if (event.key !== 'Enter') return;
    localStorage.setItem('keyword', event.target.value);
    document.querySelector('#vueIframe').contentWindow.location.reload();
    scroll({
        top: 275,
        behavior: "smooth"
    });
  }
</script>
<iframe id="vueIframe" class="w-100 h-100 d-block" src="<?= baseUrl('index.php/barista/pluginlist') ?>"></iframe>
<style>
  .search-menu {
    background-image: url(data:image/png;base64,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);
    background-repeat: no-repeat;
    background-position: 97% center;
    background-size: 22px;
    width: 35%;
  }

  .search-input {
    border: none;
    outline: none;
    background: transparent;
    width: 88%;
  }
</style>