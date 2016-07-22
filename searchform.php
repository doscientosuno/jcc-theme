<form class="text-xs-center" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
  <label for="searchform" class="sr-only"><?php echo _e( 'Search' ) ?></label>
  <div class="col-xs-12 col-sm-4 col-sm-offset-4">
    <input type="search"
      id="searchform"
      placeholder="<?php echo _e( 'Search' ) ?>"
      value="<?php echo get_search_query() ?>" name="s"
      title="<?php echo _e( 'Search' ) ?>" />
  </div>
  <div class="col-xs-12 col-sm-4">
    <input type="submit"
      title="Search"
      value="<?php echo _e( 'Search' )?>">
  </div>
</form>
