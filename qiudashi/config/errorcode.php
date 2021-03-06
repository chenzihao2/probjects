<?php

/*
 * errorcode
 * x                          xxx                              xx
 * app/admin|1/2    controller@function 0001 - 9999          error 01 - 99 
 */
return [
    /*登录接口*/
    1000101 => '验证码错误',
    1000102 => '未绑定手机号',
    1000103 => '微信授权失败',
    1000104 => '手机号已存在',
    1000105 => '绑定成功',
    1000106 => '绑定失败',
    1000107 => '缺少必要参数',
    1000108 => '该账号数据有误',
    1000109 => '账号已存在',
    1000110 => '该微信已绑定其他账号',
    1000111 => '登陆失败',
    1000112 => '未获取到授权',
    1000113 => '授权失败',
    1000114 => '该苹果账号已绑定',
    /*登录接口*/

    /*短信验证码*/
    1000201 => '手机号不合规',
    1000202 => '已超过今日发送数量上限',
    1000203 => '发送失败',
    /*短信验证码*/

    /*评论*/
    1000301 => '缺少必要参数',
    1000302 => '发布失败',
    1000303 => '包含敏感词，发送失败',
    10003034 => '暂时不可以评论',

    /*评论*/

    /*前台专家*/
    1000401 => '缺少nid',
    1000402 => '缺少user_id',
    /*前台专家*/

    /*后台资讯*/
    2000101 => '缺少nid',
    /*后台资讯*/

    /*后台配置*/
    2000201 => '缺少id',
    2000202 => '缺少base64资源',
    2000203 => 'base64资源错误',
    2000204 => 'base64资源转换失败',
    /*后台配置*/

    /*后台专家*/
    2000301 => '缺少expert_id',
    2000302 => '该专家已下线',
    2000303 => '足篮球专家推荐参数格式不正确',
    2000304 => '置顶红人榜参数格式不正确',
    2000305 => '修改红人榜展示参数格式不正确',
    2000306 => '缺少干货id',
    2000307 => '置顶干货参数格式不正确',
    2000308 => '非篮球专家',
    2000309 => '非足球专家',
    /*后台专家*/

    /*后台用户管理*/
    2000401 => '缺少user_id',
    /*后台用户管理*/
    /*后台情报*/
    2000501 => '缺少参数',
    2000502 => '操作失败',
    //special
    102 => 'token失效请重新登录',
];

