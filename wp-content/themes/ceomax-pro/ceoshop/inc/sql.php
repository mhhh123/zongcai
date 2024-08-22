<?php

return [
    "ceo_shop_coupon_code" => "CREATE TABLE `ceo_shop_coupon_code`  (
        `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
        `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '卡密内容',
        `money` decimal(10, 2) NOT NULL COMMENT '卡密面值',
        `status` tinyint NOT NULL COMMENT '卡密状态',
        `use_time` datetime NULL DEFAULT NULL COMMENT '使用时间',
        `use_user_id` int NULL DEFAULT NULL COMMENT '使用用户',
        `created_time` datetime NOT NULL COMMENT '生成时间',
        PRIMARY KEY (`id`) USING BTREE
    ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;",

    "ceo_shop_coupon_discount" => "CREATE TABLE `ceo_shop_coupon_discount`  (
        `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
        `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '代金券名称',
        `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '代金券卡密',
        `money` decimal(10, 2) NOT NULL COMMENT '代金券面值',
        `validity` int NOT NULL COMMENT '代金券有效期',
        `allow_types` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '代金券使用范围',
        `condition_money` decimal(10, 2) NOT NULL COMMENT '代金券使用门槛',
        `status` tinyint NOT NULL COMMENT '卡密状态',
        `created_time` datetime NOT NULL COMMENT '生成时间',
        PRIMARY KEY (`id`) USING BTREE
    ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;",

    "ceo_shop_coupon_discount_user" => "CREATE TABLE `ceo_shop_coupon_discount_user`  (
        `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
        `coupon_discount_id` int NOT NULL COMMENT '代金券ID',
        `user_id` int NOT NULL COMMENT '用户ID',
        `from_type` tinyint NOT NULL COMMENT '来源类型',
        `status` tinyint NOT NULL COMMENT '卡密状态',
        `use_product_id` int NULL DEFAULT NULL COMMENT '使用商品',
        `use_time` datetime NULL DEFAULT NULL COMMENT '使用时间',
        `created_time` datetime NOT NULL COMMENT '生成时间',
        `expiration_time` datetime NOT NULL COMMENT '到期时间',
        PRIMARY KEY (`id`) USING BTREE
    ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;",

    "ceo_shop_coupon_vip" => "CREATE TABLE `ceo_shop_coupon_vip`  (
        `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
        `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '会员优惠券名称',
        `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '会员优惠券卡密',
        `money` decimal(10, 2) NOT NULL COMMENT '会员优惠券面值',
        `validity` int NOT NULL COMMENT '会员优惠券有效期',
        `allow_vips` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '会员优惠券使用范围',
        `status` tinyint NOT NULL COMMENT '卡密状态',
        `created_time` datetime NOT NULL COMMENT '生成时间',
        PRIMARY KEY (`id`) USING BTREE
    ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;",

    "ceo_shop_coupon_vip_user" => "CREATE TABLE `ceo_shop_coupon_vip_user`  (
        `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
        `coupon_vip_id` int NOT NULL COMMENT 'VIP优惠券iD',
        `user_id` int NOT NULL COMMENT '用户ID',
        `from_type` tinyint NOT NULL COMMENT '来源类型',
        `status` tinyint NOT NULL COMMENT '卡密状态',
        `use_vip_id` int NULL DEFAULT NULL COMMENT '使用等级',
        `use_time` datetime NULL DEFAULT NULL COMMENT '使用时间',
        `created_time` datetime NOT NULL COMMENT '生成时间',
        `expiration_time` datetime NOT NULL COMMENT '到期时间',
        PRIMARY KEY (`id`) USING BTREE
    ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;",

    "ceo_shop_data_balance" => "CREATE TABLE `ceo_shop_data_balance`  (
        `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
        `user_id` int NOT NULL COMMENT '用户ID',
        `op` tinyint NOT NULL COMMENT '操作类型',
        `num` decimal(10, 2) NOT NULL COMMENT '变更数量',
        `before` decimal(10, 2) NOT NULL COMMENT '变更前',
        `after` decimal(10, 2) NOT NULL COMMENT '变更后',
        `type` tinyint NOT NULL COMMENT '变更类型',
        `created_time` datetime NOT NULL COMMENT '创建时间',
        PRIMARY KEY (`id`) USING BTREE
    ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;",

    "ceo_shop_data_clean" => "CREATE TABLE `ceo_shop_data_clean`  (
        `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
        `user_id` int NOT NULL COMMENT '用户ID',
        `type` tinyint NOT NULL COMMENT '分类类型',
        `op` tinyint NOT NULL COMMENT '操作类型',
        `created_time` datetime NOT NULL COMMENT '创建时间',
        PRIMARY KEY (`id`) USING BTREE
    ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;",

    "ceo_shop_data_download" => "CREATE TABLE `ceo_shop_data_download`  (
        `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
        `user_id` int NOT NULL COMMENT '用户ID',
        `product_id` int NOT NULL COMMENT '商品ID',
        `product_type` tinyint NOT NULL COMMENT '商品类型',
        `sku` tinyint NOT NULL COMMENT '商品套餐',
        `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '下载时IP地址',
        `created_time` datetime NOT NULL COMMENT '创建时间',
        `free_download` tinyint NOT NULL COMMENT '免费下载',
        `today_max_count` int NOT NULL COMMENT '今日免费次数',
        `today_use_count` int NOT NULL COMMENT '今日使用次数',
        `today_available_count` int NOT NULL COMMENT '剩余可用次数',
        PRIMARY KEY (`id`) USING BTREE
    ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;",

    "ceo_shop_data_integral" => "CREATE TABLE `ceo_shop_data_integral`  (
        `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
        `user_id` int NOT NULL COMMENT '用户ID',
        `op` tinyint NOT NULL COMMENT '操作类型',
        `num` decimal(10, 2) NOT NULL COMMENT '变更数量',
        `before` decimal(10, 2) NOT NULL COMMENT '变更前',
        `after` decimal(10, 2) NOT NULL COMMENT '变更后',
        `type` tinyint NOT NULL COMMENT '变更类型',
        `created_time` datetime NOT NULL COMMENT '创建时间',
        PRIMARY KEY (`id`) USING BTREE
    ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;",

    "ceo_shop_data_order" => "CREATE TABLE `ceo_shop_data_order`  (
        `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
        `user_id` int NOT NULL COMMENT '用户ID',
        `order_sn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '订单号',
        `money` decimal(10, 2) NOT NULL COMMENT '充值金额',
        `actual_money` decimal(10, 2) NOT NULL COMMENT '实付金额',
        `balance` decimal(10, 2) NOT NULL COMMENT '到账货币',
        `before` decimal(10, 2) NOT NULL COMMENT '充值前',
        `after` decimal(10, 2) NOT NULL COMMENT '充值后',
        `pay_type` tinyint NOT NULL COMMENT '充值方式',
        `status` tinyint NOT NULL DEFAULT 0 COMMENT '充值状态',
        `pay_time` datetime NULL DEFAULT NULL COMMENT '支付时间',
        `created_time` datetime NOT NULL COMMENT '创建时间',
        PRIMARY KEY (`id`) USING BTREE
    ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;",

    "ceo_shop_data_purchase" => "CREATE TABLE `ceo_shop_data_purchase`  (
        `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
        `user_id` int NOT NULL COMMENT '用户ID',
        `visitor_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '游客标识',
        `order_sn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '订单号',
        `product_id` int NOT NULL COMMENT '商品ID',
        `product_type` tinyint NOT NULL COMMENT '商品类型',
        `sku` tinyint NOT NULL COMMENT '商品套餐',
        `coupon_discount_user_id` int NULL DEFAULT NULL COMMENT '代金券ID',
        `money` decimal(10, 2) NOT NULL COMMENT '商品总额',
        `freight_money` decimal(10, 2) NOT NULL COMMENT '运费价格',
        `actual_money` decimal(10, 2) NOT NULL COMMENT '实付金额',
        `vip_discount` tinyint NULL DEFAULT NULL COMMENT 'VIP折扣',
        `quantity` int NOT NULL COMMENT '购买数量',
        `pay_type` tinyint NOT NULL COMMENT '支付方式',
        `status` tinyint NOT NULL DEFAULT 0 COMMENT '支付状态',
        `pay_time` datetime NULL DEFAULT NULL COMMENT '支付时间',
        `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '购买时IP地址',
        `created_time` datetime NOT NULL COMMENT '创建时间',
        `expiration_time` datetime NULL DEFAULT NULL COMMENT '过期时间',
        `express_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '快递公司',
        `express_sn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '快递单号',
        `shipping_status` tinyint NOT NULL DEFAULT -1 COMMENT '发货状态',
        `buyer_mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '买家邮箱',
        `buyer_adder` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '买家地址',
        `buyer_remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '买家留言',
        `card_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '购买卡密内容',
        PRIMARY KEY (`id`) USING BTREE
    ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;",

    "ceo_shop_data_sign_in" => "CREATE TABLE `ceo_shop_data_sign_in`  (
        `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
        `user_id` int NOT NULL COMMENT '用户ID',
        `continuous` tinyint NOT NULL COMMENT '连续签到天数',
        `balance_num` decimal(10, 2) NOT NULL COMMENT '余额变更数量',
        `balance_before` decimal(10, 2) NOT NULL COMMENT '余额变更前',
        `balance_after` decimal(10, 2) NOT NULL COMMENT '余额变更后',
        `integral_num` decimal(10, 2) NOT NULL COMMENT '积分变更数量',
        `integral_before` decimal(10, 2) NOT NULL COMMENT '积分变更前',
        `integral_after` decimal(10, 2) NOT NULL COMMENT '积分变更后',
        `created_time` datetime NOT NULL COMMENT '签到时间',
        PRIMARY KEY (`id`) USING BTREE
    ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;",

    "ceo_shop_data_trading" => "CREATE TABLE `ceo_shop_data_trading`  (
        `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
        `buyer_user_id` int NOT NULL COMMENT '买家用户ID',
        `seller_user_id` int NOT NULL COMMENT '卖家用户ID',
        `purchase_id` int NOT NULL COMMENT '购买订单ID',
        `commission` decimal(10, 2) NOT NULL COMMENT '卖家收益',
        `before` decimal(10, 2) NOT NULL COMMENT '变更前',
        `after` decimal(10, 2) NOT NULL COMMENT '变更后',
        `created_time` datetime NOT NULL COMMENT '创建时间',
        PRIMARY KEY (`id`) USING BTREE
    ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;",

    "ceo_shop_data_vip" => "CREATE TABLE `ceo_shop_data_vip`  (
        `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
        `user_id` int NOT NULL COMMENT '用户ID',
        `order_sn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '订单号',
        `vip_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '等级ID',
        `coupon_vip_user_id` int NULL DEFAULT NULL COMMENT '会员优惠券',
        `money` decimal(10, 2) NOT NULL COMMENT '会员价格',
        `actual_money` decimal(10, 2) NOT NULL COMMENT '实付金额',
        `pay_type` tinyint NOT NULL COMMENT '支付方式',
        `status` tinyint NOT NULL COMMENT '支付状态',
        `pay_time` datetime NULL DEFAULT NULL COMMENT '支付时间',
        `start_time` datetime NOT NULL COMMENT '开通时间',
        `end_time` datetime NOT NULL COMMENT '到期时间',
        `grant_scene` tinyint NOT NULL COMMENT '开通场景',
        `created_time` datetime NOT NULL COMMENT '创建时间',
        PRIMARY KEY (`id`) USING BTREE
    ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;",

    "ceo_shop_data_withdraw" => "CREATE TABLE `ceo_shop_data_withdraw`  (
        `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
        `user_id` int NOT NULL COMMENT '用户ID',
        `apply_money` decimal(10, 2) NOT NULL COMMENT '申请金额',
        `service_money` decimal(10, 2) NOT NULL COMMENT '手续费',
        `actual_money` decimal(10, 2) NOT NULL COMMENT '实际金额',
        `before` decimal(10, 2) NOT NULL COMMENT '提现前佣金',
        `after` decimal(10, 2) NOT NULL COMMENT '提现后佣金',
        `withdraw_type` tinyint NOT NULL COMMENT '提现方式',
        `status` tinyint NOT NULL COMMENT '提现状态',
        `info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '收款信息',
        `created_time` datetime NOT NULL COMMENT '申请时间',
        `deal_time` datetime NULL DEFAULT NULL COMMENT '处理时间',
        PRIMARY KEY (`id`) USING BTREE
    ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;",

    "ceo_shop_promotion_order" => "CREATE TABLE `ceo_shop_promotion_order`  (
        `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
        `buyer_user_id` int NOT NULL COMMENT '买家用户ID',
        `p_user_id` int NOT NULL COMMENT '收益人',
        `purchase_id` int NOT NULL COMMENT '购买订单ID',
        `commission_type` tinyint NOT NULL COMMENT '结算类型',
        `proportion` decimal(10, 2) NOT NULL COMMENT '佣金比例',
        `before` decimal(10, 2) NOT NULL COMMENT '变更前',
        `commission` decimal(10, 2) NOT NULL COMMENT '佣金收益',
        `after` decimal(10, 2) NOT NULL COMMENT '变更后',
        `created_time` datetime NOT NULL COMMENT '结算时间',
        PRIMARY KEY (`id`) USING BTREE
    ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;",

    "ceo_shop_promotion_relation" => "CREATE TABLE `ceo_shop_promotion_relation`  (
        `user_id` int NOT NULL COMMENT '用户ID',
        `pid_1` int NOT NULL COMMENT '上一级推广',
        `pid_2` int NOT NULL COMMENT '上二级推广',
        `pid_3` int NOT NULL COMMENT '上三级推广',
        `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '注册IP',
        `created_time` datetime NOT NULL COMMENT '注册时间',
        PRIMARY KEY (`user_id`) USING BTREE
    ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;",

    "ceo_shop_promotion_vip_give" => "CREATE TABLE `ceo_shop_promotion_vip_give`  (
        `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
        `user_id` int NOT NULL COMMENT '用户ID',
        `invite_user_id` int NOT NULL COMMENT '下级ID',
        `status` tinyint NOT NULL DEFAULT 0 COMMENT '兑换使用状态',
        `created_time` datetime NOT NULL COMMENT '创建时间',
        PRIMARY KEY (`id`) USING BTREE
    ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;",

    "ceo_shop_vip" => "CREATE TABLE `ceo_shop_vip`  (
        `id` int NOT NULL AUTO_INCREMENT COMMENT '等级ID',
        `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '等级名称',
        `tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '等级标签',
        `price` decimal(10, 2) NULL DEFAULT NULL COMMENT '开通价格',
        `validity` int NULL DEFAULT NULL COMMENT '有效期/天',
        `number` int NULL DEFAULT NULL COMMENT '免费次数/日',
        `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '套餐介绍',
        `weight` int NULL DEFAULT NULL COMMENT '等级排序',
        `created_time` datetime NULL DEFAULT NULL COMMENT '创建时间',
        `updated_time` datetime NULL DEFAULT NULL COMMENT '更新时间',
        PRIMARY KEY (`id`) USING BTREE
    ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;",

];
