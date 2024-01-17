CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = root@localhost 
    SQL SECURITY DEFINER
VIEW zte1.combined_attendance_view AS
    SELECT 
        u.id AS user_id,
        u.promoter_name AS promoter_name,
        u.shop AS shop,
        d.date AS date,
        a.id AS check_in_id,
        co.id AS check_out_id,
        COALESCE(a.check_in, 'No') AS check_in,
        IFNULL(a.latitude, '') AS latitude,
        IFNULL(a.longitude, '') AS longitude,
        IFNULL(a.attendance_time, '') AS attendance_time,
        IFNULL(a.remark, '') AS remark_check_in,
        COALESCE(co.check_out, 'No') AS check_out,
        IFNULL(co.latitude_check_out, '') AS latitude_check_out,
        IFNULL(co.longitude_check_out, '') AS longitude_check_out,
        IFNULL(co.check_out_time, '') AS check_out_time,
        IFNULL(co.remark, '') AS remark_check_out
    FROM
        ((((SELECT DISTINCT
            users.user_id AS user_id, dates.date AS date
        FROM
            ((SELECT 
            zte1.users.id AS user_id
        FROM
            zte1.users
        WHERE
            (zte1.users.role = 2)) users
        JOIN (SELECT DISTINCT
            combined_dates.date AS date
        FROM
            (SELECT 
            zte1.check_in.date AS date
        FROM
            zte1.check_in UNION SELECT 
            zte1.check_out.date AS date
        FROM
            zte1.check_out) combined_dates) dates)) d
        LEFT JOIN zte1.users u ON ((d.user_id = u.id)))
        LEFT JOIN zte1.check_in a ON (((d.user_id = a.user_id)
            AND (d.date = a.date))))
        LEFT JOIN zte1.check_out co ON (((d.user_id = co.user_id)
            AND (d.date = co.date))))