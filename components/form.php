<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2021-06-11 15:02:48
 * @modify date 2021-06-11 15:02:48
 * @desc [description]
 */
?>
<div class="sub_section">
    <form name="search" action="<?= $_SERVER['PHP_SELF'] ?>" id="search" method="get" class="form-inline"><?php echo __('Search'); ?>
        <input type="text" name="keywords" class="form-control col-md-3"/>
        <input type="submit" id="doSearch" value="<?php echo __('Search'); ?>"
                class="s-btn btn btn-default"/>
    </form>
    <!-- Navbvar -->
    <?php include_once __DIR__ . '/navbar.php' ?>
</div>