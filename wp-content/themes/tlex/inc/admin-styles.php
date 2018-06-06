<?php
add_action('admin_head', 'edit_tag_max_width');

function edit_tag_max_width() {
  echo '<style>
    #edittag {
        max-width: 1600px;
    }
  </style>';
}