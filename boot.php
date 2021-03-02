<?php
define('ROOT_DIR', __DIR__ . '/');
require ROOT_DIR . 'vendor/autoload.php';
require_once ROOT_DIR . 'lib/functions.php';




require_once ROOT_DIR . 'lib/entity.class.php';
require_once ROOT_DIR . 'lib/theme.class.php';
require_once ROOT_DIR . 'lib/config.class.php';
require_once ROOT_DIR . 'lib/user.class.php';
require_once ROOT_DIR . 'lib/category.class.php';
require_once ROOT_DIR . 'lib/post.class.php';
require_once ROOT_DIR . 'lib/comment.class.php';
require_once ROOT_DIR . 'lib/file.class.php';
require_once ROOT_DIR . 'lib/error.class.php';
require_once ROOT_DIR . 'config.php';
require_once ROOT_DIR . 'lib/defines.php'; // depending on config.php


require_once ROOT_DIR . 'etc/boot/boot.code.php';
