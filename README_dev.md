ALTER TABLE `users` ADD `email_verification_sent_at` TIMESTAMP NULL AFTER `email_verified_at`;
ALTER TABLE `users` ADD `email_verification_expires_at` TIMESTAMP NULL AFTER `email_verification_sent_at`;
ALTER TABLE `sgo_product` ADD `quantity` BIGINT NOT NULL DEFAULT '0' AFTER `price_new`;