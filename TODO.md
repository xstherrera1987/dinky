### Top Priority:
+ Implement all basic functionality needed to use this theme for my blog
+ + Then *(low priority)*
+ paginate index.php 
+ + or look into why all the posts are not shown

### High Priority:
+ configure footer cutoff height by theme option
+ + output CSS Media Query for it in &lt;head&gt;
+ Fix all Theme Check Errors:
+ + REQUIRED:.wp-caption css class is needed in your theme css.
+ + REQUIRED:.wp-caption-text css class is needed in your theme css.
+ + REQUIRED:.gallery-caption css class is needed in your theme css.
+ + REQUIRED:.bypostauthor css class is needed in your theme css.
+ + REQUIRED:.alignright css class is needed in your theme css.
+ + REQUIRED:.alignleft css class is needed in your theme css.
+ + REQUIRED:.aligncenter css class is needed in your theme css.
+ + REQUIRED: This theme doesn't seem to display tags. Modify it to display tags in appropriate locations.
+ + REQUIRED: The theme doesn't have post pagination code in it. Use posts_nav_link() or paginate_links() or next_posts_link() and previous_posts_link() to add post pagination.
+ + REQUIRED: No content width has been defined. 
+ + + <code><?php if ( ! isset( $content_width ) ) $content_width = NNN; ?></code>
+ + WARNING: Found wrong tag, remove TODO from your style.css header.
+ + WARNING: .buildpath .git .gitignore .project .settings Hidden Files or Folders found.
+ + REQUIRED: Please remove any extraneous directories like .git or .svn from the ZIP file before uploading it.
+ + REQUIRED: Could not find wp_link_pages. See: wp_link_pages
+ + + <code><?php wp_link_pages( $args ); ?></code>
+ + REQUIRED: Could not find add_theme_support( 'automatic-feed-links' ). See: add_theme_support.
+ + + <code><?php add_theme_support( $feature ); ?> </code>

### Medium Priority:
+ convert all font sizes to **rem**
+ + NOTE: consider the default font size of major browsers beforehand
+ convert all border-radius sizes to **rem** also
+ internationalize all text content
+ investigate configuring fonts through Wordpress
+ set Meta Description on a per-page, or per-post basis
+ investigate twentyeleven's method of setting CSS colors by theme options
+ investigate "Featured Images"
+ investigate adding .ico files in Theme Options

### Low Priority:
+ make IE upgrade banner dismissable (add an X to close)
+ + and set and check for a cookie so we don't further irritate by that message
+ remove 'website' input from comment form

### Future:
+ cut a branch for version 2 to implement:
+ + easily configurable color scheme (WP inputs for the 2 or 3 colors actually used)
+ refactor CSS for mobile-first CSS
+ + media queries for larger screens
