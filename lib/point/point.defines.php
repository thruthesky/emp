<?php

define('REASON', 'reason');
define('FROM_USER_IDX', 'fromUserIdx');
define('TO_USER_IDX', 'toUserIdx');

define('POINT_UPDATE', 'POINT_UPDATE');

define('POINT_LIKE', 'POINT_LIKE');
define('POINT_DISLIKE', 'POINT_DISLIKE');

define('POINT_LIKE_DEDUCTION', 'POINT_LIKE_DEDUCTION');
define('POINT_DISLIKE_DEDUCTION', 'POINT_DISLIKE_DEDUCTION');

define('POINT_ITEM_ORDER', 'POINT_ITEM_ORDER');
define('POINT_ORDER_CONFIRM', 'POINT_ORDER_CONFIRM');
define('POINT_ITEM_RESTORE', 'POINT_ITEM_RESTORE');

define('POINT_LIKE_HOUR_LIMIT', 'POINT_LIKE_HOUR_LIMIT');
define('POINT_LIKE_HOUR_LIMIT_COUNT', 'POINT_LIKE_HOUR_LIMIT_COUNT');
define('POINT_LIKE_DAILY_LIMIT_COUNT', 'POINT_LIKE_DAILY_LIMIT_COUNT');
define('POINT_HOUR_LIMIT', 'POINT_HOUR_LIMIT');
define('POINT_HOUR_LIMIT_COUNT', 'POINT_HOUR_LIMIT_COUNT');
define('POINT_DAILY_LIMIT_COUNT', 'POINT_DAILY_LIMIT_COUNT');
define('BAN_ON_LIMIT', 'BAN_ON_LIMIT');

define('ERROR_HOURLY_LIMIT', 'ERROR_HOURLY_LIMIT');
define('ERROR_DAILY_LIMIT', 'ERROR_DAILY_LIMIT');

define('POINT_POST_CREATE', 'POINT_POST_CREATE');
define('POINT_POST_DELETE', 'POINT_POST_DELETE');
define('POINT_COMMENT_CREATE', 'POINT_COMMENT_CREATE');
define('POINT_COMMENT_DELETE', 'POINT_COMMENT_DELETE');
define('POINT_REGISTER', 'POINT_REGISTER');
define('POINT_LOGIN', 'POINT_LOGIN'); // 로그인만 해도 포인트
define('POINT_TEST', 'POINT_TEST');

define('POINT_POST_COMMENT_ACTIONS', [POINT_POST_CREATE, POINT_POST_DELETE, POINT_COMMENT_CREATE, POINT_COMMENT_DELETE]);
define('POINT_LIKE_ACTIONS', [POINT_LIKE, POINT_DISLIKE]);
define('REASONS', [
    POINT_UPDATE,
    POINT_TEST,

    POINT_LIKE,
    POINT_DISLIKE,

    POINT_POST_CREATE,
    POINT_POST_DELETE,
    POINT_COMMENT_CREATE,
    POINT_COMMENT_DELETE,

    POINT_REGISTER,
    POINT_LOGIN,
]);