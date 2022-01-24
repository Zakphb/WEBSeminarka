INSERT INTO db1_vyuka.zakphb_hobby_group (id, image, name, description, price, capacity)
VALUES (45, 'img/45/kresleni-1641763342', 'Kreslení', 'Tady se budeme učit kreslit', 200, 15),
       (46, 'img/46/judo-1641766028', 'Judo', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 0, 10),
       (47, 'img/47/prace_se_drevem-1641766057', 'Práce se dřevem',
        'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. ',
        250, 10);
INSERT INTO db1_vyuka.zakphb_permission (id, name)
VALUES (2, 'hobbygroup'),
       (3, 'schoolroom'),
       (4, 'role'),
       (5, 'login'),
       (6, 'permission'),
       (7, 'user'),
       (8, 'schedule'),
       (9, 'profile');
INSERT INTO db1_vyuka.zakphb_role (id, name)
VALUES (1, 'student'),
       (3, 'teacher'),
       (42, 'super');
INSERT INTO db1_vyuka.zakphb_role_to_permission (role_id, permission_id)
VALUES (1, 9),
       (3, 2),
       (3, 5),
       (3, 8),
       (3, 9),
       (42, 2),
       (42, 3),
       (42, 4),
       (42, 5),
       (42, 6);
INSERT INTO db1_vyuka.zakphb_role_to_permission (role_id, permission_id)
VALUES (42, 7),
       (42, 8),
       (42, 9);
INSERT INTO db1_vyuka.zakphb_schoolroom_type (id, name)
VALUES (1, 'Třída'),
       (2, 'Tělocvična'),
       (3, 'Dílny');
INSERT INTO db1_vyuka.zakphb_schoolroom (id, name, type_id)
VALUES (32, 'UN232', 1),
       (33, 'UD001', 3),
       (34, 'UT222', 2);
INSERT INTO db1_vyuka.zakphb_schedule (id, schoolroom_id, hobby_group_id, time_start, time_end, capacity)
VALUES (3, 32, 45, '2022-01-09 08:00:00.0', '2022-01-09 09:00:00.0', 15),
       (4, 34, 46, '2022-01-11 18:00:00.0', '2022-01-11 20:00:00.0', 100),
       (5, 33, 47, '2022-01-15 15:00:00.0', '2022-01-15 18:00:00.0', 235);
INSERT INTO db1_vyuka.zakphb_user (id, name, surname, email, password)
VALUES (20, 'Student', '1', 'student1@zcu.cz', '$2y$10$gHyjI5ZNcmwHHgeIAsgmkuT7el09NB2xnJxH2IgLfAFOHg1XU3N6q'),
       (21, 'Sadmin', 'Sadmin', 'sadmin@zcu.cz', '$2y$10$NjQGeAWA4ew1x60Xs.8PRuWMDDcJMx3MRv4D.qpci6AyIMdhXMFMO'),
       (22, 'Učitel', '1', 'ucitel1@zcu.cz', '$2y$10$rMXc0W7TeuMWylKXuKRNSuPg4M6tdJ1T1pPHQILWSNZSr08uMUhxa'),
       (23, 'Student', '2', 'student2@zcu.cz', '$2y$10$8NhbeFaopFF2aHuL58yAdeqaIUdEbqDO5gzGm2qTPae6jE9E/iyq2'),
       (24, 'Učitel', '2', 'ucitel2@zcu.cz', '$2y$10$eoUWimqZn1i/j64YZpDVYe9J.WQ85yx3WPRXOUF2I3hp2lN3ZYXkK'),
       (25, 'Student', '3', 'student3@zcu.cz', '$2y$10$7qdOSXU9o/46D9XTevPUwuPYNCO25A3zFnw4UIjKWNKrhaV46nsaO');
INSERT INTO db1_vyuka.zakphb_user_to_hobby_group (user_id, hobby_group_id)
VALUES (20, 46),
       (20, 45),
       (23, 45),
       (25, 45);
INSERT INTO db1_vyuka.zakphb_user_to_role (user_id, role_id)
VALUES (20, 1),
       (21, 42),
       (22, 3),
       (23, 1),
       (24, 3),
       (25, 1);
INSERT INTO db1_vyuka.zakphb_user_to_schedule (id, schedule_id, user_id, is_allowed, note, is_logged_in,
                                               not_allowed_note)
VALUES (5, 3, 22, NULL, NULL, 0, NULL),
       (6, 4, 24, NULL, NULL, 0, NULL),
       (7, 5, 22, NULL, NULL, 0, NULL),
       (8, 3, 20, 1, NULL, 1, NULL),
       (9, 3, 23, 1, NULL, 1, NULL),
       (10, 3, 25, 1, NULL, 1, NULL);