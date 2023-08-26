-- salon.contact_form definition

CREATE TABLE `contact_form` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `message` text,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO salon.contact_form (name,mobile_number,email,subject,message,ip_address,created_at,updated_at) VALUES
	 ('Kanishk Dixit','9837739092','kanishkdixitkd9@gmail.com','Hair Treatment','I have problem regarding hairfall','::1','2023-08-26 17:29:12','2023-08-26 17:29:12');
