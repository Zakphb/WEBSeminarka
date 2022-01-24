INSERT INTO zakphb_user_to_schedule (id, schedule_id, user_id, is_logged_in) VALUES (20,4,20,1);
UPDATE zakphb_user_to_schedule SET is_allowed = 1 WHERE id = 20;
SELECT schedule_id FROM zakphb_user_to_schedule where id = 20;
SELECT hobby_group_id FROM zakphb_schedule where id = 4;
INSERT INTO zakphb_user_to_hobby_group (user_id, hobby_group_id) VALUES (20, 47);