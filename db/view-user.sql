CREATE VIEW baseUser AS
SELECT u.id, u.name, u.surname, u.email, r.name as role_name, group_concat(p.id) as permission_id, group_concat(p.name) as permission_name
FROM zakphb_user AS u
         LEFT JOIN zakphb_user_to_role AS UtR
                   ON u.id = UtR.user_id
         LEFT JOIN zakphb_role AS r
                   ON UtR.role_id = r.id
         LEFT JOIN zakphb_role_to_permission zrtp
                   on r.id = zrtp.role_id
         JOIN zakphb_permission AS p
              on zrtp.permission_id = p.id
GROUP BY u.id