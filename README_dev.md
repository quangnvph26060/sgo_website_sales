ALTER TABLE `users` ADD `email_verification_sent_at` TIMESTAMP NULL AFTER `email_verified_at`;
ALTER TABLE `users` ADD `email_verification_expires_at` TIMESTAMP NULL AFTER `email_verification_sent_at`;
ALTER TABLE `sgo_product` ADD `quantity` BIGINT NOT NULL DEFAULT '0' AFTER `price_new`;


ALTER TABLE `sgo_orders` ADD `province_id` INT NOT NULL AFTER `email`, ADD `district_id` INT NOT NULL AFTER `province_id`;
ALTER TABLE `sgo_orders` CHANGE `payment_method` `payment_method` VARCHAR(20) NOT NULL;
ALTER TABLE `sgo_orders` ADD `is_active` INT NOT NULL COMMENT '1: Chấp nhận đơn hàng\r\n2: Hủy đơn hàng' AFTER `amount`, ADD `status` INT NOT NULL DEFAULT '1' COMMENT '1: Pending (Chờ xử lý)\r\n2: Confirmed (Đã xác nhận)\r\n3: Processing (Đang xử lý)\r\n4: Shipped (Đã giao hàng)\r\n5: Delivered (Hoàn thành đơn hàng)\r\n6: Cancelled (Đã hủy)' AFTER `is_active`;
ALTER TABLE `sgo_orders` CHANGE `is_active` `is_active` INT NOT NULL COMMENT '1: Chấp nhận đơn hàng\r\n2: Hủy đơn hàng\r\n3: Chờ duyệt';
ALTER TABLE `sgo_order_items` ADD `name` VARCHAR(255) NOT NULL AFTER `product_id`, ADD `price` DECIMAL(10.2) NOT NULL AFTER `name`;
ALTER TABLE `sgo_orders` CHANGE `is_active` `is_active` INT NOT NULL DEFAULT '3' COMMENT '1: Chấp nhận đơn hàng\r\n2: Hủy đơn hàng\r\n3: Chờ duyệt';
ALTER TABLE `sgo_orders` CHANGE `amount` `amount` DECIMAL(16,0) NOT NULL DEFAULT '0';
ALTER TABLE `sgo_orders` ADD `code` VARCHAR(8) NOT NULL AFTER `id`;

ALTER TABLE `sgo_product` CHANGE `type_id` `type_id` INT NULL;