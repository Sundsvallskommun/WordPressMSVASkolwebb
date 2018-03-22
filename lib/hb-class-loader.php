<?php

include_once __DIR__ . '/class-hb-init.php';
new HB_Init();

include_once __DIR__ . '/class-hb-shortcodes.php';
new HB_Shortcodes();

include_once __DIR__ . '/hb-post-types/class-hb-post-types.php';
new HB_Post_Types();

include_once __DIR__ . '/himlabadet-opening-hours/wp-plugin-openinghours.php';