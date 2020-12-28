<?php
// 列表展示
\think\Route::get('select','Movie/index');
// 详情展示
\think\Route::get('read','Movie/read');
// 评论列表展示
\think\Route::get('comment','Movie/comment');
// 写评论
\think\Route::post('save','Movie/save');
