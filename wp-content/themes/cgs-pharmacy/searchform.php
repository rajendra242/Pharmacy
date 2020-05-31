<?php //$s = get_search_query(); ?>
<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="text" value="" placeholder="<?php esc_html_e("Search", 'cgs-pharmacy'); ?>" name="s" class="search-field" />
    <input type="submit" class="btn btn-primary search_submit" value="&raquo;" />
</form>
