CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = root@localhost 
    SQL SECURITY DEFINER
VIEW zte1.daily_sales_view AS
    SELECT 
        zte1.daily_sales.promoter_name AS promoter_name,
        zte1.daily_sales.promoter_phone AS promoter_phone,
        zte1.daily_sales.shop AS shop,
        'A33 CORE' AS model,
        zte1.daily_sales.a33_core_available AS available_stock,
        zte1.daily_sales.a33_core_sold AS apparatus_sold,
        zte1.daily_sales.a33_core_left AS net_stock,
        zte1.daily_sales.doc_date AS document_date,
        zte1.daily_sales.a33_core_remark AS remark
    FROM
        zte1.daily_sales 
    UNION ALL SELECT 
        zte1.daily_sales.promoter_name AS promoter_name,
        zte1.daily_sales.promoter_phone AS promoter_phone,
        zte1.daily_sales.shop AS shop,
        'A31 Lite' AS model,
        zte1.daily_sales.a31_lite_available AS available_stock,
        zte1.daily_sales.a31_lite_sold AS apparatus_sold,
        zte1.daily_sales.a31_lite_left AS net_stock,
        zte1.daily_sales.doc_date AS document_date,
        zte1.daily_sales.a31_lite_remark AS remark
    FROM
        zte1.daily_sales 
    UNION ALL SELECT 
        zte1.daily_sales.promoter_name AS promoter_name,
        zte1.daily_sales.promoter_phone AS promoter_phone,
        zte1.daily_sales.shop AS shop,
        'Blade A31' AS model,
        zte1.daily_sales.blade_a31_available AS available_stock,
        zte1.daily_sales.blade_a31_sold AS apparatus_sold,
        zte1.daily_sales.blade_a31_left AS net_stock,
        zte1.daily_sales.doc_date AS document_date,
        zte1.daily_sales.blade_a31_remark AS remark
    FROM
        zte1.daily_sales 
    UNION ALL SELECT 
        zte1.daily_sales.promoter_name AS promoter_name,
        zte1.daily_sales.promoter_phone AS promoter_phone,
        zte1.daily_sales.shop AS shop,
        'Blade A51' AS model,
        zte1.daily_sales.blade_a51_available AS available_stock,
        zte1.daily_sales.blade_a51_sold AS apparatus_sold,
        zte1.daily_sales.blade_a51_left AS net_stock,
        zte1.daily_sales.doc_date AS document_date,
        zte1.daily_sales.blade_a51_remark AS remark
    FROM
        zte1.daily_sales 
    UNION ALL SELECT 
        zte1.daily_sales.promoter_name AS promoter_name,
        zte1.daily_sales.promoter_phone AS promoter_phone,
        zte1.daily_sales.shop AS shop,
        'Blade A71' AS model,
        zte1.daily_sales.blade_a71_available AS available_stock,
        zte1.daily_sales.blade_a71_sold AS apparatus_sold,
        zte1.daily_sales.blade_a71_left AS net_stock,
        zte1.daily_sales.doc_date AS document_date,
        zte1.daily_sales.blade_a71_remark AS remark
    FROM
        zte1.daily_sales 
    UNION ALL SELECT 
        zte1.daily_sales.promoter_name AS promoter_name,
        zte1.daily_sales.promoter_phone AS promoter_phone,
        zte1.daily_sales.shop AS shop,
        'Blade V30' AS model,
        zte1.daily_sales.blade_v30_available AS available_stock,
        zte1.daily_sales.blade_v30_sold AS apparatus_sold,
        zte1.daily_sales.blade_v30_left AS net_stock,
        zte1.daily_sales.doc_date AS document_date,
        zte1.daily_sales.blade_v30_remark AS remark
    FROM
        zte1.daily_sales 
    UNION ALL SELECT 
        zte1.daily_sales.promoter_name AS promoter_name,
        zte1.daily_sales.promoter_phone AS promoter_phone,
        zte1.daily_sales.shop AS shop,
        'MF971L' AS model,
        zte1.daily_sales.mf971L_available AS available_stock,
        zte1.daily_sales.mf971L_sold AS apparatus_sold,
        zte1.daily_sales.mf971L_left AS net_stock,
        zte1.daily_sales.doc_date AS document_date,
        zte1.daily_sales.mf971L_remark AS remark
    FROM
        zte1.daily_sales 
    UNION ALL SELECT 
        zte1.daily_sales.promoter_name AS promoter_name,
        zte1.daily_sales.promoter_phone AS promoter_phone,
        zte1.daily_sales.shop AS shop,
        'MF286C' AS model,
        zte1.daily_sales.mf286c_available AS available_stock,
        zte1.daily_sales.mf286c_sold AS apparatus_sold,
        zte1.daily_sales.mf286c_left AS net_stock,
        zte1.daily_sales.doc_date AS document_date,
        zte1.daily_sales.mf286c_remark AS remark
    FROM
        zte1.daily_sales