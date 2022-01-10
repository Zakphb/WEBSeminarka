-- webseminarka.zakphb_hobby_group definition

CREATE TABLE `zakphb_hobby_group` (
                                      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                      `image` varchar(255) DEFAULT NULL,
                                      `name` varchar(255) NOT NULL,
                                      `description` text NOT NULL,
                                      `price` int(5) unsigned NOT NULL,
                                      `capacity` int(5) unsigned NOT NULL,
                                      PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;


-- webseminarka.zakphb_permission definition

CREATE TABLE `zakphb_permission` (
                                     `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                     `name` varchar(100) NOT NULL,
                                     PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;


-- webseminarka.zakphb_role definition

CREATE TABLE `zakphb_role` (
                               `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                               `name` varchar(100) NOT NULL,
                               PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;


-- webseminarka.zakphb_schoolroom_type definition

CREATE TABLE `zakphb_schoolroom_type` (
                                          `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                          `name` varchar(255) NOT NULL,
                                          PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


-- webseminarka.zakphb_user definition

CREATE TABLE `zakphb_user` (
                               `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                               `name` varchar(35) NOT NULL,
                               `surname` varchar(35) NOT NULL,
                               `email` varchar(255) NOT NULL,
                               `password` varchar(255) NOT NULL,
                               PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;


-- webseminarka.zakphb_role_to_permission definition

CREATE TABLE `zakphb_role_to_permission` (
                                             `role_id` int(11) unsigned NOT NULL,
                                             `permission_id` int(11) unsigned NOT NULL,
                                             PRIMARY KEY (`role_id`,`permission_id`),
                                             KEY `zakphb_role_to_permission_FK_1` (`permission_id`),
                                             CONSTRAINT `zakphb_role_to_permission_FK` FOREIGN KEY (`role_id`) REFERENCES `zakphb_role` (`id`),
                                             CONSTRAINT `zakphb_role_to_permission_FK_1` FOREIGN KEY (`permission_id`) REFERENCES `zakphb_permission` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- webseminarka.zakphb_schoolroom definition

CREATE TABLE `zakphb_schoolroom` (
                                     `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                     `name` varchar(10) NOT NULL,
                                     `type_id` int(11) unsigned NOT NULL,
                                     PRIMARY KEY (`id`),
                                     KEY `zakphb_schoolroom_FK` (`type_id`),
                                     CONSTRAINT `zakphb_schoolroom_FK` FOREIGN KEY (`type_id`) REFERENCES `zakphb_schoolroom_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;


-- webseminarka.zakphb_user_to_hobby_group definition

CREATE TABLE `zakphb_user_to_hobby_group` (
                                              `user_id` int(11) unsigned NOT NULL,
                                              `hobby_group_id` int(11) unsigned NOT NULL,
                                              KEY `zakphb_user_to_hobby_group_FK` (`user_id`),
                                              KEY `zakphb_user_to_hobby_group_FK_1` (`hobby_group_id`),
                                              CONSTRAINT `zakphb_user_to_hobby_group_FK` FOREIGN KEY (`user_id`) REFERENCES `zakphb_user` (`id`),
                                              CONSTRAINT `zakphb_user_to_hobby_group_FK_1` FOREIGN KEY (`hobby_group_id`) REFERENCES `zakphb_hobby_group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- webseminarka.zakphb_user_to_role definition

CREATE TABLE `zakphb_user_to_role` (
                                       `user_id` int(11) unsigned NOT NULL,
                                       `role_id` int(11) unsigned NOT NULL,
                                       PRIMARY KEY (`user_id`,`role_id`),
                                       KEY `zakphb_user_to_role_FK` (`role_id`),
                                       CONSTRAINT `zakphb_user_to_role_FK` FOREIGN KEY (`role_id`) REFERENCES `zakphb_role` (`id`),
                                       CONSTRAINT `zakphb_user_to_role_FK_1` FOREIGN KEY (`user_id`) REFERENCES `zakphb_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- webseminarka.zakphb_schedule definition

CREATE TABLE `zakphb_schedule` (
                                   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                   `schoolroom_id` int(11) unsigned NOT NULL,
                                   `hobby_group_id` int(11) unsigned NOT NULL,
                                   `time_start` datetime NOT NULL,
                                   `time_end` datetime NOT NULL,
                                   `capacity` int(5) unsigned NOT NULL,
                                   PRIMARY KEY (`id`),
                                   KEY `zakphb_schedule_FK` (`schoolroom_id`),
                                   KEY `zakphb_schedule_FK_1` (`hobby_group_id`),
                                   CONSTRAINT `zakphb_schedule_FK` FOREIGN KEY (`schoolroom_id`) REFERENCES `zakphb_schoolroom` (`id`),
                                   CONSTRAINT `zakphb_schedule_FK_1` FOREIGN KEY (`hobby_group_id`) REFERENCES `zakphb_hobby_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;


-- webseminarka.zakphb_user_to_schedule definition

CREATE TABLE `zakphb_user_to_schedule` (
                                           `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                           `schedule_id` int(11) unsigned NOT NULL,
                                           `user_id` int(11) unsigned NOT NULL,
                                           `is_allowed` tinyint(4) DEFAULT NULL,
                                           `note` text DEFAULT NULL,
                                           `is_logged_in` tinyint(4) NOT NULL DEFAULT 0,
                                           `not_allowed_note` text DEFAULT NULL,
                                           PRIMARY KEY (`id`),
                                           KEY `zakphb_user_to_schedule_FK` (`schedule_id`),
                                           KEY `zakphb_user_to_schedule_FK_1` (`user_id`),
                                           CONSTRAINT `zakphb_user_to_schedule_FK` FOREIGN KEY (`schedule_id`) REFERENCES `zakphb_schedule` (`id`),
                                           CONSTRAINT `zakphb_user_to_schedule_FK_1` FOREIGN KEY (`user_id`) REFERENCES `zakphb_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;