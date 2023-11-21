 select u.id AS user_id,
 u.user_name AS user_name,
 u.promoter_name AS promoter_name,
 u.promoter_phone AS promoter_phone,
 u.shop AS shop,
 u.role AS role,
 max(a.id) AS attendance_id,max(a.present) AS presentt,(case when (max(a.present) = 'Yes') then 'Yes' else 'No' end) AS present,max(a.absent) AS absent,max(a.location) AS location,max(a.latitude) AS latitude,max(a.longitude) AS longitude,max(a.remark) AS remark,max(a.attendance_time) AS attendance_time,coalesce(cast(max(a.attendance_time) as date),dates.date) AS attendance_date from ((report_attendance.users u join (select distinct cast(att.attendance_time as date) AS date from report_attendance.attendance_sheet att) dates) left join report_attendance.attendance_sheet a on(((u.id = a.user_id) and (cast(a.attendance_time as date) = dates.date)))) where (u.role = 2) group by u.id,dates.date