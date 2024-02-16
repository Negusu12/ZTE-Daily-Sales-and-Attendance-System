  CREATE or REPLACE VIEW zte1.monthly_attendance_view AS
SELECT 
    u.promoter_name AS promoter,
    u.status AS status,
    YEAR(ci.date) AS year,
    MONTHNAME(ci.date) AS month,
    ci.user_id AS user_id,
    SUM((ci.check_in = 'Yes')) AS total_yes,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 1)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_1,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 2)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_2,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 3)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_3,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 4)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_4,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 5)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_5,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 6)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_6,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 7)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_7,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 8)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_8,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 9)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_9,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 10)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_10,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 11)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_11,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 12)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_12,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 13)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_13,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 14)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_14,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 15)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_15,
    MAX((CASE
    WHEN (DAYOFMONTH(ci.date) = 16)
    THEN 
        CASE
            WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
        END
    ELSE NULL
END)) AS day_16,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 17)
        THEN 
            CASE
                 WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_17,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 18)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_18,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 19)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_19,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 20)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_20,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 21)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_21,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 22)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_22,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 23)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_23,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 24)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_24,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 25)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_25,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 26)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_26,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 27)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_27,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 28)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_28,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 29)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_29,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 30)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_30,
    MAX((CASE
        WHEN (DAYOFMONTH(ci.date) = 31)
        THEN 
            CASE
                WHEN co.check_out IS NULL THEN CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'))
            ELSE CONCAT('Check In ', TIME_FORMAT(ci.attendance_time, '%h:%i:%s %p'), ' Check Out ', TIME_FORMAT(co.check_out_time, '%h:%i:%s %p'))
            END
        ELSE NULL
    END)) AS day_31
FROM
    (zte1.check_in ci
    LEFT JOIN zte1.users u ON ci.user_id = u.id)
LEFT JOIN
    zte1.check_out co ON ci.user_id = co.user_id AND ci.date = co.date
GROUP BY 
    YEAR(ci.date), MONTH(ci.date), ci.user_id;
