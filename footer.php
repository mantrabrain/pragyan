<?php

do_action('pragyan_before_content_end');

echo '</div><!--#content -->';

do_action('pragyan_footer');

do_action('pragyan_before_page_end');

echo '</div><!-- #page -->';

do_action('pragyan_before_body_close');

wp_footer();
?>
</body>
</html>
