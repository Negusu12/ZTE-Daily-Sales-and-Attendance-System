 CREATE OR REPLACE VIEW zte_abh.monthly_attendance_view AS
SELECT 
    u.promoter_name AS promoter,
    u.status AS status,
    YEAR(ci.date) AS year,
    MONTHNAME(ci.date) AS month,
    ci.user_id AS user_id,
    SUM(ci.check_in = 'Yes') AS total_yes,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 1) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_1,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 2) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_2,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 3) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_3,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 4) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_4,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 5) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_5,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 6) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_6,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 7) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_7,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 8) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_8,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 9) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_9,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 10) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_10,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 11) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_11,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 12) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_12,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 13) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_13,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 14) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_14,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 15) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_15,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 16) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_16,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 17) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_17,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 18) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_18,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 19) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_19,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 20) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_20,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 21) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_21,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 22) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_22,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 23) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_23,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 24) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_24,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 25) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_25,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 26) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_26,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 27) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_27,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 28) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_28,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 29) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_29,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 30) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_30,
    MAX((CASE WHEN (DAYOFMONTH(ci.date) = 31) THEN CONCAT(ci.check_in, ' ', ci.attendance_time) ELSE NULL END)) AS day_31
FROM
    (zte_abh.check_in ci
    LEFT JOIN zte_abh.users u ON ((ci.user_id = u.id)))
GROUP BY
    YEAR(ci.date),
    MONTH(ci.date),
    ci.user_id;



ALTER TABLE ztetest.daily_sales
ADD COLUMN V50_Design_available INT,
ADD COLUMN A54_available INT,
ADD COLUMN V40_available INT,
ADD COLUMN V50_Design_sold INT,
ADD COLUMN A54_sold INT,
ADD COLUMN V40_sold INT,
ADD COLUMN V50_Design_left INT,
ADD COLUMN A54_left INT,
ADD COLUMN V40_left INT,
ADD COLUMN V50_Design_remark TEXT,
ADD COLUMN A54_remark TEXT,
ADD COLUMN V40_remark TEXT;




 CREATE or Replace VIEW zte_abh.daily_sales_view AS
    SELECT 
        zte_abh.daily_sales.promoter_name AS promoter_name,
        zte_abh.daily_sales.promoter_phone AS promoter_phone,
        zte_abh.daily_sales.shop AS shop,
        zte_abh.daily_sales.remark AS remark_w,
        'A33 CORE' AS model,
        zte_abh.daily_sales.a33_core_available AS available_stock,
        zte_abh.daily_sales.a33_core_sold AS apparatus_sold,
        zte_abh.daily_sales.a33_core_left AS net_stock,
        zte_abh.daily_sales.doc_date AS document_date,
        zte_abh.daily_sales.a33_core_remark AS remark
    FROM
        zte_abh.daily_sales 
    UNION ALL SELECT 
        zte_abh.daily_sales.promoter_name AS promoter_name,
        zte_abh.daily_sales.promoter_phone AS promoter_phone,
        zte_abh.daily_sales.shop AS shop,
        zte_abh.daily_sales.remark AS remark_w,
        'A31 Lite' AS model,
        zte_abh.daily_sales.a31_lite_available AS available_stock,
        zte_abh.daily_sales.a31_lite_sold AS apparatus_sold,
        zte_abh.daily_sales.a31_lite_left AS net_stock,
        zte_abh.daily_sales.doc_date AS document_date,
        zte_abh.daily_sales.a31_lite_remark AS remark
    FROM
        zte_abh.daily_sales 
    UNION ALL SELECT 
        zte_abh.daily_sales.promoter_name AS promoter_name,
        zte_abh.daily_sales.promoter_phone AS promoter_phone,
        zte_abh.daily_sales.shop AS shop,
        zte_abh.daily_sales.remark AS remark_w,
        'Blade A31' AS model,
        zte_abh.daily_sales.blade_a31_available AS available_stock,
        zte_abh.daily_sales.blade_a31_sold AS apparatus_sold,
        zte_abh.daily_sales.blade_a31_left AS net_stock,
        zte_abh.daily_sales.doc_date AS document_date,
        zte_abh.daily_sales.blade_a31_remark AS remark
    FROM
        zte_abh.daily_sales 
    UNION ALL SELECT 
        zte_abh.daily_sales.promoter_name AS promoter_name,
        zte_abh.daily_sales.promoter_phone AS promoter_phone,
        zte_abh.daily_sales.shop AS shop,
        zte_abh.daily_sales.remark AS remark_w,
        'Blade A51' AS model,
        zte_abh.daily_sales.blade_a51_available AS available_stock,
        zte_abh.daily_sales.blade_a51_sold AS apparatus_sold,
        zte_abh.daily_sales.blade_a51_left AS net_stock,
        zte_abh.daily_sales.doc_date AS document_date,
        zte_abh.daily_sales.blade_a51_remark AS remark
    FROM
        zte_abh.daily_sales 
    UNION ALL SELECT 
        zte_abh.daily_sales.promoter_name AS promoter_name,
        zte_abh.daily_sales.promoter_phone AS promoter_phone,
        zte_abh.daily_sales.shop AS shop,
        zte_abh.daily_sales.remark AS remark_w,
        'Blade A71' AS model,
        zte_abh.daily_sales.blade_a71_available AS available_stock,
        zte_abh.daily_sales.blade_a71_sold AS apparatus_sold,
        zte_abh.daily_sales.blade_a71_left AS net_stock,
        zte_abh.daily_sales.doc_date AS document_date,
        zte_abh.daily_sales.blade_a71_remark AS remark
    FROM
        zte_abh.daily_sales 
    UNION ALL SELECT 
        zte_abh.daily_sales.promoter_name AS promoter_name,
        zte_abh.daily_sales.promoter_phone AS promoter_phone,
        zte_abh.daily_sales.shop AS shop,
        zte_abh.daily_sales.remark AS remark_w,
        'Blade V30' AS model,
        zte_abh.daily_sales.blade_v30_available AS available_stock,
        zte_abh.daily_sales.blade_v30_sold AS apparatus_sold,
        zte_abh.daily_sales.blade_v30_left AS net_stock,
        zte_abh.daily_sales.doc_date AS document_date,
        zte_abh.daily_sales.blade_v30_remark AS remark
    FROM
        zte_abh.daily_sales 
    UNION ALL SELECT 
        zte_abh.daily_sales.promoter_name AS promoter_name,
        zte_abh.daily_sales.promoter_phone AS promoter_phone,
        zte_abh.daily_sales.shop AS shop,
        zte_abh.daily_sales.remark AS remark_w,
        'MF971L' AS model,
        zte_abh.daily_sales.mf971L_available AS available_stock,
        zte_abh.daily_sales.mf971L_sold AS apparatus_sold,
        zte_abh.daily_sales.mf971L_left AS net_stock,
        zte_abh.daily_sales.doc_date AS document_date,
        zte_abh.daily_sales.mf971L_remark AS remark
    FROM
        zte_abh.daily_sales 
    UNION ALL SELECT 
        zte_abh.daily_sales.promoter_name AS promoter_name,
        zte_abh.daily_sales.promoter_phone AS promoter_phone,
        zte_abh.daily_sales.shop AS shop,
        zte_abh.daily_sales.remark AS remark_w,
        'MF286C' AS model,
        zte_abh.daily_sales.mf286c_available AS available_stock,
        zte_abh.daily_sales.mf286c_sold AS apparatus_sold,
        zte_abh.daily_sales.mf286c_left AS net_stock,
        zte_abh.daily_sales.doc_date AS document_date,
        zte_abh.daily_sales.mf286c_remark AS remark
    FROM
        zte_abh.daily_sales
        UNION ALL SELECT 
        zte_abh.daily_sales.promoter_name AS promoter_name,
        zte_abh.daily_sales.promoter_phone AS promoter_phone,
        zte_abh.daily_sales.shop AS shop,
        zte_abh.daily_sales.remark AS remark_w,
        'V50_Design' AS model,
        zte_abh.daily_sales.V50_Design_available AS available_stock,
        zte_abh.daily_sales.V50_Design_sold AS apparatus_sold,
        zte_abh.daily_sales.V50_Design_left AS net_stock,
        zte_abh.daily_sales.doc_date AS document_date,
        zte_abh.daily_sales.V50_Design_remark AS remark
    FROM
        zte_abh.daily_sales
         UNION ALL SELECT 
        zte_abh.daily_sales.promoter_name AS promoter_name,
        zte_abh.daily_sales.promoter_phone AS promoter_phone,
        zte_abh.daily_sales.shop AS shop,
        zte_abh.daily_sales.remark AS remark_w,
        'A54' AS model,
        zte_abh.daily_sales.A54_available AS available_stock,
        zte_abh.daily_sales.A54_sold AS apparatus_sold,
        zte_abh.daily_sales.A54_left AS net_stock,
        zte_abh.daily_sales.doc_date AS document_date,
        zte_abh.daily_sales.A54_remark AS remark
    FROM
        zte_abh.daily_sales
         UNION ALL SELECT 
        zte_abh.daily_sales.promoter_name AS promoter_name,
        zte_abh.daily_sales.promoter_phone AS promoter_phone,
        zte_abh.daily_sales.shop AS shop,
        zte_abh.daily_sales.remark AS remark_w,
        'V40' AS model,
        zte_abh.daily_sales.V40_available AS available_stock,
        zte_abh.daily_sales.V40_sold AS apparatus_sold,
        zte_abh.daily_sales.V40_left AS net_stock,
        zte_abh.daily_sales.doc_date AS document_date,
        zte_abh.daily_sales.V40_remark AS remark
    FROM
        zte_abh.daily_sales;





         CREATE or replace VIEW zte_abh.weekly_sales_report AS
SELECT 
    zte_abh.daily_sales.promoter_name AS promoter_name,
    zte_abh.daily_sales.shop AS shop,
    YEARWEEK(zte_abh.daily_sales.doc_date, 1) AS week_number,
    MIN(zte_abh.daily_sales.doc_date) AS week_start_date,
    MAX(zte_abh.daily_sales.doc_date) AS week_end_date,
    COALESCE(SUM(CAST(zte_abh.daily_sales.a33_core_sold AS SIGNED)), 0) AS total_a33_core_sold,
    COALESCE(SUM(CAST(zte_abh.daily_sales.a31_lite_sold AS SIGNED)), 0) AS total_a31_lite_sold,
    COALESCE(SUM(CAST(zte_abh.daily_sales.blade_a31_sold AS SIGNED)), 0) AS total_blade_a31_sold,
    COALESCE(SUM(CAST(zte_abh.daily_sales.blade_a51_sold AS SIGNED)), 0) AS total_blade_a51_sold,
    COALESCE(SUM(CAST(zte_abh.daily_sales.blade_a71_sold AS SIGNED)), 0) AS total_blade_a71_sold,
    COALESCE(SUM(CAST(zte_abh.daily_sales.blade_v30_sold AS SIGNED)), 0) AS total_blade_v30_sold,
    COALESCE(SUM(CAST(zte_abh.daily_sales.mf971L_sold AS SIGNED)), 0) AS total_mf971L_sold,
    COALESCE(SUM(CAST(zte_abh.daily_sales.mf286c_sold AS SIGNED)), 0) AS total_mf286c_sold,
    COALESCE(SUM(CAST(zte_abh.daily_sales.V50_Design_sold AS SIGNED)), 0) AS total_V50_Design_sold,
    COALESCE(SUM(CAST(zte_abh.daily_sales.A54_sold AS SIGNED)), 0) AS total_A54_sold,
    COALESCE(SUM(CAST(zte_abh.daily_sales.V40_sold AS SIGNED)), 0) AS total_V40_sold,
    COALESCE(
        SUM(
            CAST(zte_abh.daily_sales.a33_core_sold AS SIGNED) +
            CAST(zte_abh.daily_sales.a31_lite_sold AS SIGNED) +
            CAST(zte_abh.daily_sales.blade_a31_sold AS SIGNED) +
            CAST(zte_abh.daily_sales.blade_a51_sold AS SIGNED) +
            CAST(zte_abh.daily_sales.blade_a71_sold AS SIGNED) +
            CAST(zte_abh.daily_sales.blade_v30_sold AS SIGNED) +
            CAST(zte_abh.daily_sales.mf971L_sold AS SIGNED) +
            CAST(zte_abh.daily_sales.mf286c_sold AS SIGNED) +
            CAST(zte_abh.daily_sales.V50_Design_sold AS SIGNED) +
            CAST(zte_abh.daily_sales.A54_sold AS SIGNED) +
            CAST(zte_abh.daily_sales.V40_sold AS SIGNED)
        ), 0
    ) AS total_sold
FROM
    zte_abh.daily_sales
WHERE
    YEARWEEK(zte_abh.daily_sales.doc_date, 1) <= YEARWEEK(NOW(), 1)
    AND zte_abh.daily_sales.doc_date <= NOW()
GROUP BY
    zte_abh.daily_sales.promoter_name, week_number;



 CREATE or replace VIEW zte_abh.monthly_sales_report AS
    SELECT 
        zte_abh.daily_sales.promoter_name AS promoter_name,
        zte_abh.daily_sales.shop AS shop,
        YEAR(zte_abh.daily_sales.doc_date) AS year_number,
        MONTHNAME(zte_abh.daily_sales.doc_date) AS month_name,
        MIN(zte_abh.daily_sales.doc_date) AS month_start_date,
        MAX(zte_abh.daily_sales.doc_date) AS month_end_date,
        COALESCE(SUM(CAST(zte_abh.daily_sales.a33_core_sold AS SIGNED)),
                0) AS total_a33_core_sold,
        COALESCE(SUM(CAST(zte_abh.daily_sales.a31_lite_sold AS SIGNED)),
                0) AS total_a31_lite_sold,
        COALESCE(SUM(CAST(zte_abh.daily_sales.blade_a31_sold AS SIGNED)),
                0) AS total_blade_a31_sold,
        COALESCE(SUM(CAST(zte_abh.daily_sales.blade_a51_sold AS SIGNED)),
                0) AS total_blade_a51_sold,
        COALESCE(SUM(CAST(zte_abh.daily_sales.blade_a71_sold AS SIGNED)),
                0) AS total_blade_a71_sold,
        COALESCE(SUM(CAST(zte_abh.daily_sales.blade_v30_sold AS SIGNED)),
                0) AS total_blade_v30_sold,
        COALESCE(SUM(CAST(zte_abh.daily_sales.mf971L_sold AS SIGNED)),
                0) AS total_mf971L_sold,
        COALESCE(SUM(CAST(zte_abh.daily_sales.mf286c_sold AS SIGNED)),
                0) AS total_mf286c_sold,
                COALESCE(SUM(CAST(zte_abh.daily_sales.V50_Design_sold AS SIGNED))
                , 0) AS total_V50_Design_sold,
    COALESCE(SUM(CAST(zte_abh.daily_sales.A54_sold AS SIGNED)),
    0) AS total_A54_sold,
    COALESCE(SUM(CAST(zte_abh.daily_sales.V40_sold AS SIGNED)), 
    0) AS total_V40_sold,
        (((((((COALESCE(SUM(CAST(zte_abh.daily_sales.a33_core_sold AS SIGNED)),
                0) + COALESCE(SUM(CAST(zte_abh.daily_sales.a31_lite_sold AS SIGNED)),
                0)) + COALESCE(SUM(CAST(zte_abh.daily_sales.blade_a31_sold AS SIGNED)),
                0)) + COALESCE(SUM(CAST(zte_abh.daily_sales.blade_a51_sold AS SIGNED)),
                0)) + COALESCE(SUM(CAST(zte_abh.daily_sales.blade_a71_sold AS SIGNED)),
                0)) + COALESCE(SUM(CAST(zte_abh.daily_sales.blade_v30_sold AS SIGNED)),
                0)) + COALESCE(SUM(CAST(zte_abh.daily_sales.mf971L_sold AS SIGNED)),
                0)) + COALESCE(SUM(CAST(zte_abh.daily_sales.mf286c_sold AS SIGNED)),
                0)) + COALESCE(SUM(CAST(zte_abh.daily_sales.V50_Design_sold AS SIGNED)),
                0) + COALESCE(SUM(CAST(zte_abh.daily_sales.A54_sold AS SIGNED)),
                0) + COALESCE(SUM(CAST(zte_abh.daily_sales.V40_sold AS SIGNED)),
                0) AS total_sold
    FROM
        zte_abh.daily_sales
    WHERE
        ((YEAR(zte_abh.daily_sales.doc_date) = YEAR(NOW()))
            AND (zte_abh.daily_sales.doc_date <= NOW()))
    GROUP BY zte_abh.daily_sales.promoter_name , year_number , month_name;