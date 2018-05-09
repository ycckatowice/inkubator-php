<?php

// Request
require_once __DIR__ . '/utils/authentication/authentication.php';

require_once __DIR__ . '/utils/request/get_request_get_variable.php';
require_once __DIR__ . '/utils/request/get_request_post_variable.php';

// DB Connection
require_once __DIR__ . '/utils/db/connection.php';
// DB User
require_once __DIR__ . '/utils/db/repository/user/user_find_all.php';
require_once __DIR__ . '/utils/db/repository/user/user_insert_one.php';
require_once __DIR__ . '/utils/db/repository/user/user_find_one_by_id.php';
require_once __DIR__ . '/utils/db/repository/user/user_find_one_by_email.php';
require_once __DIR__ . '/utils/db/repository/user/user_update_one_by_id.php';
require_once __DIR__ . '/utils/db/repository/user/user_delete_one_by_id.php';
// DB Category


require_once __DIR__ . '/utils/db/repository/category/category_delete_one_by_id.php';
require_once __DIR__ . '/utils/db/repository/category/category_find_all.php';
require_once __DIR__ . '/utils/db/repository/category/category_find_one_by_id.php';
require_once __DIR__ . '/utils/db/repository/category/category_insert_one_by_id.php';
require_once __DIR__ . '/utils/db/repository/category/category_update_one_by_id.php';


//DB Models
require_once __DIR__ . '/utils/db/model/ProductInterface.php';
require_once __DIR__ . '/utils/db/model/UserInterface.php';
require_once __DIR__ . '/utils/db/model/CategoryInterface.php';
require_once __DIR__ . '/utils/db/model/OrderInterface.php';


require_once __DIR__ . '/utils/db/model/Product.php';
require_once __DIR__ . '/utils/db/model/Category.php';
require_once __DIR__ . '/utils/db/model/User.php';
require_once __DIR__ . '/utils/db/model/MikolajUser.php';
require_once __DIR__ . '/utils/db/model/Order.php';
require_once __DIR__ . '/utils/db/model/MikolajOrder.php';



// DB Repositories
require_once __DIR__ . '/utils/db/repository/category/CategoryRepositoryInterface.php';
require_once __DIR__ . '/utils/db/repository/user/UserRepositoryInterface.php';
require_once __DIR__ . '/utils/db/repository/product/ProductRepositoryInterface.php';

require_once __DIR__ . '/utils/db/repository/category/CategoryRepository.php';
require_once __DIR__ . '/utils/db/repository/user/UserRepository.php';
require_once __DIR__ . '/utils/db/repository/product/ProductRepository.php';

// Auth

require_once __DIR__ . '/utils/authentication/Authorization.php';


require_once __DIR__ . '/utils/basket/BasketInterface.php';
require_once __DIR__ . '/utils/basket/BasketManager.php';
require_once __DIR__ . '/utils/basket/MikolajBasket.php';