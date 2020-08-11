<?php
/**
 * Template for displaying search forms in Pragyan
 *
 * @package Pragyan
 * Version: 1.0.0
 */

?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="assistive-text">
        <span class="screen-reader-text"><?php echo _x('Search for:', 'label', 'pragyan'); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'pragyan'); ?>" value="<?php the_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit">
        <span class="screen-reader-text">
            <?php echo _x('Search', 'submit button', 'pragyan'); ?>
        </span>
        <i class="fa fa-search" aria-hidden="true"></i>
    </button>
</form>
