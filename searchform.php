<?php
/**
 * The Search Form
 */
?>

<form id="searchform" name="searchform" method="get" action="<?php echo home_url(); ?>">
    <input type="text" id="s" name="s" value="Search..." onfocus="if(this.value == 'Search...'){this.value = '';}" />
    <input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'shaken'); ?>" />
    <div class="clearfix"></div>
</form>