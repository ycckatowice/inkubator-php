<?php

// Request
require_once __DIR__ . '/utils/request/get_request_get_variable.php';
require_once __DIR__ . '/utils/request/get_request_post_variable.php';

// DB Connection
require_once __DIR__ . '/utils/db/connection.php';
// DB User
require_once __DIR__ . '/utils/db/repository/user/user_find_all.php';
require_once __DIR__ . '/utils/db/repository/user/user_insert_one.php';
require_once __DIR__ . '/utils/db/repository/user/user_find_one_by_id.php';
require_once __DIR__ . '/utils/db/repository/user/user_update_one_by_id.php';
require_once __DIR__ . '/utils/db/repository/user/user_delete_one_by_id.php';
// DB Category
require_once __DIR__ . '/utils/db/repository/category/category_insert_one_by_id.php';

// DB Product


