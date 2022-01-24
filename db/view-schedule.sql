CREATE VIEW showSchedule AS
SELECT sch.id,
       sch.time_start,
       sch.time_end,
       IF(sch.capacity > hg.capacity, hg.capacity, sch.capacity) as capacity,
       hg.image,
       hg.name                                                   as hobbygroup_name,
       hg.description,
       hg.price,
       zu.id                                                     as schedule_id,
       zu.name                                                   as user_name,
       zu.surname,
       sr.name                                                   as schoolroom_name
FROM zakphb_schedule AS sch
         LEFT JOIN zakphb_schoolroom AS sr
                   ON sch.schoolroom_id = sr.id
         LEFT JOIN zakphb_hobby_group AS hg
                   on sch.hobby_group_id = hg.id
         LEFT JOIN zakphb_user_to_schedule zuts
                   on sch.id = zuts.schedule_id
         JOIN zakphb_user zu on zuts.user_id = zu.id
WHERE is_logged_in = 0;
