1343114110DEXCACHE---><div style="width:98%; white-space:normal; table-layout:fixed; word-break: break-all; overflow:auto; padding:10px; background-color:#EEE; border:1px solid #999; font-size:14px; font-family:Verdana">Error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' LIMIT 0, 8' at line 7<br />Error No: 1064<br />SELECT B.art_id, B.art_cate_id, B.art_title, B.art_intro, B.art_url, B.art_createdate, B.art_publishdate, B.art_thumbnails, B.art_hasattach, B.art_views, B.art_top, B.art_status, 
        U.user_id, U.user_name,
        C.art_cate_abbr, C.art_cate_name 
        FROM dex_article_cate C, dex_article_base B 
        LEFT JOIN dex_user U 
        ON U.user_id = B.art_user_id 
        WHERE C.art_cate_id = B.art_cate_id AND art_status=1 AND C.art_cate_abbr=market' LIMIT 0, 8</div>