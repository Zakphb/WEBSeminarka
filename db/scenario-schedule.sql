SELECT u.id, u.name, u.surname, u.email
FROM zakphb_user AS u
         LEFT JOIN zakphb_user_to_role AS UtR
                   ON u.id = UtR.user_id
         LEFT JOIN zakphb_role AS r
                   ON UtR.role_id = r.id
WHERE r.name = 'teacher';
SELECT *
FROM zakphb_hobby_group;
SELECT *
FROM zakphb_schoolroom;
INSERT INTO zakphb_schedule (id, schoolroom_id, hobby_group_id, time_start, time_end, capacity)
VALUES (30, 32, 46, '2022-01-09 08:00:00', '2022-01-09 09:00:00', 25);