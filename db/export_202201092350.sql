INSERT INTO webseminarka.zakphb_hobby_group (image,name,description,price,capacity) VALUES
	 ('img/45/kresleni-1641763342','Kreslení','Tady se budeme učit kreslit',200,15),
	 ('img/46/judo-1641766028','Judo','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Suspendisse nisl. Phasellus faucibus molestie nisl. Sed ac dolor sit amet purus malesuada congue. In convallis. Fusce suscipit libero eget elit. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Nullam faucibus mi quis velit. Nulla quis diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. In enim a arcu imperdiet malesuada. Fusce wisi. In convallis. Ut tempus purus at lorem. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Duis condimentum augue id magna semper rutrum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos.',0,10),
	 ('img/47/prace_se_drevem-1641766057','Práce se dřevem','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Suspendisse nisl. Phasellus faucibus molestie nisl. Sed ac dolor sit amet purus malesuada congue. In convallis. Fusce suscipit libero eget elit. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Nullam faucibus mi quis velit. Nulla quis diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. In enim a arcu imperdiet malesuada. Fusce wisi. In convallis. Ut tempus purus at lorem. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Duis condimentum augue id magna semper rutrum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos.',250,10);INSERT INTO webseminarka.zakphb_permission (name) VALUES
	 ('hobbygroup'),
	 ('schoolroom'),
	 ('role'),
	 ('login'),
	 ('permission'),
	 ('user'),
	 ('schedule'),
	 ('profile');INSERT INTO webseminarka.zakphb_role (name) VALUES
	 ('student'),
	 ('teacher'),
	 ('super');INSERT INTO webseminarka.zakphb_role_to_permission (role_id,permission_id) VALUES
	 (1,9),
	 (3,2),
	 (3,5),
	 (3,8),
	 (3,9),
	 (42,2),
	 (42,3),
	 (42,4),
	 (42,5),
	 (42,6);
INSERT INTO webseminarka.zakphb_role_to_permission (role_id,permission_id) VALUES
	 (42,7),
	 (42,8),
	 (42,9);INSERT INTO webseminarka.zakphb_schedule (schoolroom_id,hobby_group_id,time_start,time_end,capacity) VALUES
	 (32,45,'2022-01-09 08:00:00.0','2022-01-09 09:00:00.0',15),
	 (34,46,'2022-01-11 18:00:00.0','2022-01-11 20:00:00.0',100),
	 (33,47,'2022-01-15 15:00:00.0','2022-01-15 18:00:00.0',235);INSERT INTO webseminarka.zakphb_schoolroom (name,type_id) VALUES
	 ('UN232',1),
	 ('UD001',3),
	 ('UT222',2);INSERT INTO webseminarka.zakphb_schoolroom_type (name) VALUES
	 ('Třída'),
	 ('Tělocvična'),
	 ('Dílny');INSERT INTO webseminarka.zakphb_user (name,surname,email,password) VALUES
	 ('Student','1','student1@zcu.cz','$2y$10$gHyjI5ZNcmwHHgeIAsgmkuT7el09NB2xnJxH2IgLfAFOHg1XU3N6q'),
	 ('Sadmin','Sadmin','sadmin@zcu.cz','$2y$10$NjQGeAWA4ew1x60Xs.8PRuWMDDcJMx3MRv4D.qpci6AyIMdhXMFMO'),
	 ('Učitel','1','ucitel1@zcu.cz','$2y$10$rMXc0W7TeuMWylKXuKRNSuPg4M6tdJ1T1pPHQILWSNZSr08uMUhxa'),
	 ('Student','2','student2@zcu.cz','$2y$10$8NhbeFaopFF2aHuL58yAdeqaIUdEbqDO5gzGm2qTPae6jE9E/iyq2'),
	 ('Učitel','2','ucitel2@zcu.cz','$2y$10$eoUWimqZn1i/j64YZpDVYe9J.WQ85yx3WPRXOUF2I3hp2lN3ZYXkK'),
	 ('Student','3','student3@zcu.cz','$2y$10$7qdOSXU9o/46D9XTevPUwuPYNCO25A3zFnw4UIjKWNKrhaV46nsaO');INSERT INTO webseminarka.zakphb_user_to_role (user_id,role_id) VALUES
	 (20,1),
	 (21,42),
	 (22,3),
	 (23,1),
	 (24,3),
	 (25,1);INSERT INTO webseminarka.zakphb_user_to_schedule (schedule_id,user_id,is_allowed,note,is_logged_in,not_allowed_note) VALUES
	 (3,22,NULL,NULL,0,NULL),
	 (4,24,NULL,NULL,0,NULL),
	 (5,22,NULL,NULL,0,NULL),
	 (3,20,NULL,NULL,1,NULL);