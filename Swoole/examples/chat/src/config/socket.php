<?php
/*
 * @Description: 聊天室配置
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-06 08:53:46
 * @LastEditTime: 2021-07-06 09:31:03
 */

 return [
     'host' => "0.0.0.0",
     'port' => 9501,

     'database' => 'redis',

     'redis' => [
         'scheme' => 'tcp',
         'host' => '0.0.0.0',
         'port' => 6379,
     ],

     'avatar' => [
        './images/avatar/1.jpg',
        './images/avatar/2.jpg',
        './images/avatar/3.jpg',
        './images/avatar/4.jpg',
        './images/avatar/5.jpg',
        './images/avatar/6.jpg',
     ],

     'name' => [
        '科比',
        '库里',
        'KD',
        'KG',
        '乔丹',
        '邓肯',
        '格林',
        '汤普森',
        '伊戈达拉',
        '麦迪',
        '艾弗森',
        '卡哇伊',
        '保罗',
     ]
 ];
