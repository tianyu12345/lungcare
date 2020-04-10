ALTER TABLE `eb_system_config` ADD `input_type` VARCHAR(20) NULL DEFAULT 'input' COMMENT '表单类型' AFTER `type`;
INSERT INTO `eb_system_config` ( `menu_name`, `type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES ('system_delivery_time', 'text', 5, '', 0, 'required:true,digits:true,min:0', 100, 0, '"7"', '自动收货时间(天)', '系统自动收货时间(0为不设置自动收货)', 0, 1);
INSERT INTO `eb_system_group` (`name`, `info`, `config_name`, `fields`) VALUES ('首页文字配置', '首页文字配置', 'routine_index_page', '[{"name":"\\u5feb\\u901f\\u9009\\u62e9\\u7b80\\u4ecb","title":"fast_info","type":"input","param":"\\u4e0a\\u767e\\u79cd\\u5546\\u54c1\\u5206\\u7c7b\\u4efb\\u60a8\\u9009\\u62e9"},{"name":"\\u7cbe\\u54c1\\u63a8\\u8350\\u7b80\\u4ecb","title":"bast_info","type":"input","param":"\\u8bda\\u610f\\u63a8\\u8350\\u54c1\\u8d28\\u5546\\u54c1"},{"name":"\\u9996\\u53d1\\u65b0\\u54c1\\u7b80\\u4ecb","title":"first_info","type":"input","param":"\\u591a\\u4e2a\\u4f18\\u8d28\\u5546\\u54c1\\u6700\\u65b0\\u4e0a\\u67b6"},{"name":"\\u4fc3\\u9500\\u5355\\u54c1\\u7b80\\u4ecb","title":"sales_info","type":"input","param":"\\u5e93\\u5b58\\u5546\\u54c1\\u4f18\\u60e0\\u4fc3\\u9500\\u6d3b\\u52a8"},{"name":"\\u5feb\\u901f\\u9009\\u62e9\\u5206\\u7c7b\\u4e2a\\u6570","title":"fast_number","type":"input","param":"10"},{"name":"\\u7cbe\\u54c1\\u63a8\\u8350\\u4e2a\\u6570","title":"bast_number","type":"input","param":"10"},{"name":"\\u9996\\u53d1\\u65b0\\u54c1\\u4e2a\\u6570","title":"first_number","type":"input","param":"10"}]');
SELECT id as gid FROM eb_system_group WHERE config_name = 'routine_index_page' LIMIT 1 into @gid;
INSERT INTO `eb_system_group_data` (`gid`, `value`, `add_time`, `sort`, `status`) VALUES (@gid, '{"fast_info":{"type":"input","value":"\\u4e0a\\u767e\\u79cd\\u5546\\u54c1\\u5206\\u7c7b\\u4efb\\u60a8\\u9009\\u62e9"},"bast_info":{"type":"input","value":"\\u8bda\\u610f\\u63a8\\u8350\\u54c1\\u8d28\\u5546\\u54c1"},"first_info":{"type":"input","value":"\\u591a\\u4e2a\\u4f18\\u8d28\\u5546\\u54c1\\u6700\\u65b0\\u4e0a\\u67b6"},"sales_info":{"type":"input","value":"\\u5e93\\u5b58\\u5546\\u54c1\\u4f18\\u60e0\\u4fc3\\u9500\\u6d3b\\u52a8"},"fast_number":{"type":"input","value":"10"},"bast_number":{"type":"input","value":"10"},"first_number":{"type":"input","value":"10"}}', 1565146071, 1, 1);
DELETE FROM `eb_system_config` WHERE `eb_system_config`.`menu_name` = 'fast_info';
DELETE FROM `eb_system_config` WHERE `eb_system_config`.`menu_name` = 'bast_info';
DELETE FROM `eb_system_config` WHERE `eb_system_config`.`menu_name` = 'first_info';
DELETE FROM `eb_system_config` WHERE `eb_system_config`.`menu_name` = 'sales_info';
DELETE FROM `eb_system_config` WHERE `eb_system_config`.`menu_name` = 'fast_number';
DELETE FROM `eb_system_config` WHERE `eb_system_config`.`menu_name` = 'bast_number';
DELETE FROM `eb_system_config` WHERE `eb_system_config`.`menu_name` = 'first_number';
CREATE TABLE `eb_user_token` (
  `uid` int(10) unsigned NOT NULL COMMENT '用户 id',
  `token` varchar(512) NOT NULL COMMENT 'token',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `expires_time` datetime NOT NULL COMMENT '到期时间',
  `login_ip` varchar(32) DEFAULT NULL COMMENT '登录ip',
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE  `eb_store_service_log` ADD  `msn_type` tinyint(1) NOT NULL DEFAULT  '1' COMMENT  '消息类型 1=文字 2=表情 3=图片 4=语音';
INSERT INTO `eb_system_config` ( `menu_name`, `type`, `input_type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES ('system_delivery_time', 'text', 'input',  5, '', 0, 'required:true,digits:true,min:0', 100, 0, '"7"', '自动收货时间(天)', '系统自动收货时间(0为不设置自动收货)', 0, 1);
INSERT INTO `eb_system_config` ( `menu_name`, `type`, `input_type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES ('sms_account', 'text', 'input', 18, '', '', '', '', '', '""', '账号', '短信后台的登录账号', 0, 1);
INSERT INTO `eb_system_config` ( `menu_name`, `type`, `input_type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES ('sms_token', 'text', 'input', 18, '', '', '', '', '', '""', 'token', '短信token', 0, 1);
INSERT INTO `eb_system_config` ( `menu_name`, `type`, `input_type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES ('h5_avatar', 'upload', '', 1, '', 1, '', '', '', '"http:\/\/www.crmeb3.net\/uploads\/attach\/2019\/08\/20190802\\b4b7963527d884a82a950027d5cba023.png"', '用户H5默认头像', '用户H5默认头像', 0, 1);
SELECT id as pid FROM eb_system_menus WHERE controller = 'setting' LIMIT 1 into @pid;
INSERT INTO `eb_system_menus` ( `pid`, `icon`, `menu_name`, `module`, `controller`, `action`, `params`, `sort`, `is_show`, `access`) VALUES (@pid, '', '短信设置', 'admin', 'sms', 'index', '[]', '0', '1', '1');
SELECT id as pid FROM eb_system_menus WHERE controller = 'sms' LIMIT 1 into @pk;
INSERT INTO `eb_system_menus` (`pid`, `icon`, `menu_name`, `module`, `controller`, `action`, `params`, `sort`, `is_show`, `access`) VALUES (@pk, '', '短信模板', 'admin', 'sms.smsTemplateApply', 'index', '[]', '0', '1', '1');
INSERT INTO `eb_system_menus` (`pid`, `icon`, `menu_name`, `module`, `controller`, `action`, `params`, `sort`, `is_show`, `access`) VALUES (@pk, '', '短信配置', 'admin', 'sms.smsConfig', 'index', '{\"type\":\"4\",\"tab_id\":\"18\"}', '1', '1', '1');
INSERT INTO `eb_system_menus` (`pid`, `icon`, `menu_name`, `module`, `controller`, `action`, `params`, `sort`, `is_show`, `access`) VALUES (@pk, '', '短信购买', 'admin', 'sms.smsPay', 'index', '[]', '0', '1', '1');
INSERT INTO `eb_system_menus` (`pid`, `icon`, `menu_name`, `module`, `controller`, `action`, `params`, `sort`, `is_show`, `access`) VALUES (@pk, '', '公共短信模板', 'admin', 'sms.smsPublicTemp', 'index', '[]', '0', '1', '1');
SELECT id as bid FROM eb_system_config_tab WHERE eng_title = 'basics' LIMIT 1 into @bid;
INSERT INTO `eb_system_config` (`menu_name`, `type`, `input_type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES ('news_slides_limit', 'text', 'number', @bid, NULL, NULL, 'required:true,digits:true,min:1', '100', NULL, '3', '新闻幻灯片限制数量', '新闻幻灯片限制数量', '0', '1');
SELECT id as cid FROM eb_system_config_tab WHERE eng_title = 'store' LIMIT 1 into @cid;
INSERT INTO `eb_system_config` (`menu_name`, `type`, `input_type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES ('offline_pay_status', 'radio', NULL, @cid, '1=>开启\n2=>关闭', NULL, NULL, NULL, NULL, '\"2\"', '线下支付状态', '线下支付状态', '0', '1');
ALTER TABLE `eb_store_service` ADD `customer` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否展示统计管理 1展示 0不展示';
SELECT id as apiid FROM eb_system_config WHERE menu_name = 'api' LIMIT 1 into @apiid;
UPDATE `eb_system_config` SET `value`='\"\\/api\\/wechat\\/serve\"', `info`='接口地址', `desc`='微信接口例如：http://www.abc.com/api/wechat/serve' WHERE (`id`=@apiid);
ALTER TABLE  `eb_user` ADD  `login_type` VARCHAR( 36 ) NOT NULL DEFAULT  '' COMMENT  '用户登陆类型，h5,wechat,routine';
SET @fieldrmm = '\\r\\n\/pages\/admin\/index=>后台订单管理\\r\\n\/pages\/service\/index=>联系客服"}]';
SELECT id as rmmid,LEFT(fields, length(fields) - 3) FROM eb_system_group WHERE config_name = 'routine_my_menus' LIMIT 1 into @rmmid,@fieldsrmm;
UPDATE `eb_system_group` SET `fields`= CONCAT(@fieldsrmm, @fieldrmm) WHERE (`id`= @rmmid);
SET @field = ',{"name":"\\u516c\\u4f17\\u53f7\\u8df3\\u8f6c\\u8def\\u5f84","title":"wap_url","type":"select","param":"\\/user\\/add_manage=>\\u5730\\u5740\\u7ba1\\u7406\\n\\/user\\/vip=>\\u4f1a\\u5458\\u4e2d\\u5fc3\\n\\/activity\\/bargain\\/record=>\\u780d\\u4ef7\\u8bb0\\u5f55\\n\\/user\\/user_promotion=>\\u63a8\\u5e7f\\u4e2d\\u5fc3\\n\\/user\\/account=>\\u6211\\u7684\\u4f59\\u989d\\n\\/collection=>\\u6211\\u7684\\u6536\\u85cf\\n\\/user\\/user_coupon=>\\u4f18\\u60e0\\u5238\\n\\/customer\\/list=>\\u5ba2\\u670d\\u5217\\u8868\\n\\/customer\\/index=>\\u540e\\u53f0\\u8ba2\\u5355\\u7ba1\\u7406"}]';
SELECT id as rhmid,LEFT(fields, length(fields) - 1) FROM eb_system_group WHERE config_name = 'routine_home_menus' LIMIT 1 into @rhmid,@fields;
UPDATE `eb_system_group` SET `fields`= CONCAT(@fields, @field) WHERE (`id`= @rhmid);
SELECT id as rhrnid,LEFT(fields, length(fields) - 1) FROM eb_system_group WHERE config_name = 'routine_home_roll_news' LIMIT 1 into @rhrnid,@fields;
UPDATE `eb_system_group` SET `fields`= CONCAT(@fields, @field) WHERE (`id`= @rhrnid);
SELECT id as rmmid,LEFT(fields, length(fields) - 1) FROM eb_system_group WHERE config_name = 'routine_my_menus' LIMIT 1 into @rmmid,@fields;
UPDATE `eb_system_group` SET `fields`= ' [{"name":"\\u83dc\\u5355\\u540d","title":"name","type":"input","param":""},{"name":"\\u56fe\\u6807(52*52)","title":"pic","type":"upload","param":""},{"name":"\\u5c0f\\u7a0b\\u5e8f\\u8df3\\u8f6c\\u8def\\u5f84","title":"url","type":"select","param":"\\/pages\\/user_address_list\\/index=>\\u5730\\u5740\\u7ba1\\u7406\\n\\/pages\\/user_vip\\/index=>\\u4f1a\\u5458\\u4e2d\\u5fc3\\n\\/pages\\/activity\\/user_goods_bargain_list\\/index=>\\u780d\\u4ef7\\u8bb0\\u5f55\\n\\/pages\\/user_spread_user\\/index=>\\u63a8\\u5e7f\\u4e2d\\u5fc3\\n\\/pages\\/user_money\\/index=>\\u6211\\u7684\\u4f59\\u989d\\n\\/pages\\/user_goods_collection\\/index=>\\u6211\\u7684\\u6536\\u85cf\\n\\/pages\\/user_coupon\\/index=>\\u4f18\\u60e0\\u5238\\n\\/pages\\/admin\\/index=>\\u540e\\u53f0\\u8ba2\\u5355\\u7ba1\\u7406\\n\\/pages\\/service\\/index=>\\u8054\\u7cfb\\u5ba2\\u670d"},{"name":"\\u516c\\u4f17\\u53f7\\u8df3\\u8f6c\\u8def\\u5f84","title":"wap_url","type":"select","param":"\\/user\\/add_manage=>\\u5730\\u5740\\u7ba1\\u7406\\n\\/user\\/vip=>\\u4f1a\\u5458\\u4e2d\\u5fc3\\n\\/activity\\/bargain\\/record=>\\u780d\\u4ef7\\u8bb0\\u5f55\\n\\/user\\/user_promotion=>\\u63a8\\u5e7f\\u4e2d\\u5fc3\\n\\/user\\/account=>\\u6211\\u7684\\u4f59\\u989d\\n\\/collection=>\\u6211\\u7684\\u6536\\u85cf\\n\\/user\\/user_coupon=>\\u4f18\\u60e0\\u5238\\n\\/customer\\/list=>\\u5ba2\\u670d\\u5217\\u8868\\n\\/customer\\/index=>\\u540e\\u53f0\\u8ba2\\u5355\\u7ba1\\u7406"}]' WHERE (`id`= @rmmid);
SET @field = ',{"name":"公众号跳转路径","title":"wap_link","type":"select","param":"\/activity\/goods_seckill=>秒杀列表\\r\\n\/activity\/bargain=>砍价列表\\r\\n\/activity\/group=>拼团列表"}]';
SELECT id as rhaid,LEFT(fields, length(fields) - 1) FROM eb_system_group WHERE config_name = 'routine_home_activity' LIMIT 1 into @rhaid,@fields;
UPDATE `eb_system_group` SET `fields`= CONCAT(@fields, @field) WHERE (`id`= @rhaid);
ALTER TABLE `eb_wechat_user` DROP INDEX `openid`, ADD INDEX `openid`(`openid`) USING BTREE;
UPDATE `eb_system_menus` SET `is_show` = 0 WHERE (controller = 'user.user_notice');

SELECT id as wypid FROM eb_system_menus WHERE menu_name = '页面设置' LIMIT 1 into @wypid;
UPDATE `eb_system_menus` SET `is_show` = 0 WHERE (pid = @wypid);
UPDATE `eb_system_menus` SET `is_show` = 0 WHERE (id = @wypid);
SELECT id as rilid FROM eb_system_config WHERE menu_name = 'routine_index_logo' LIMIT 1 into @rilid;
UPDATE `eb_system_config` SET `config_tab_id` = 5, `info` = '首页logo图标', `desc` = '首页logo图标尺寸(127*45)' WHERE (id = @rilid);
DROP TABLE eb_token;
INSERT INTO `eb_system_menus` ( `pid`, `icon`, `menu_name`, `module`, `controller`, `action`, `params`, `sort`, `is_show`, `access`) VALUES
( 289, '', '应用配置', 'admin', 'setting.systemConfig', 'index', '{"type":"1","tab_id":"2"}', 127, 1, 1),
( 289, '', '支付配置', 'admin', 'setting.systemConfig', 'index', '{"type":"2","tab_id":"4"}', 120, 1, 1);
UPDATE `eb_system_menus` SET `menu_name`='数据配置' WHERE `menu_name`='模块数据配置';
UPDATE `eb_system_menus` SET `menu_name`='数据配置' WHERE `menu_name`='模块数据配置';
SELECT id as systempid2 FROM eb_system_menus WHERE menu_name = '数据配置' LIMIT 1 into @systempid2;
UPDATE `eb_system_menus` SET `pid`=@pid WHERE `id`=@systempid2;
SELECT id as configid FROM `eb_system_config_tab` WHERE `eng_title` = 'wechat_share' into @configid;
DELETE FROM `eb_system_config_tab` WHERE `eng_title` = 'wechat_share';
UPDATE `eb_system_config` SET `config_tab_id`=2 WHERE `config_tab_id`=@configid;
UPDATE  `eb_system_config_tab` SET  `type` =  '2' WHERE  `eb_system_config_tab`.`id` =4;
UPDATE  `eb_system_config_tab` SET  `type` =  '1' WHERE  `eb_system_config_tab`.`id` =7;
UPDATE  `eb_system_config` SET  `input_type` =  'color' WHERE  `eb_system_config`.`id` =76;
UPDATE  `eb_system_menus` SET  `pid` =  @pid WHERE  `menu_name` ='客服管理';
DELETE FROM `eb_system_menus` WHERE `menu_name` = '小程序配置';
ALTER TABLE `eb_user` ADD `brokerage_price` DECIMAL(8,2) NOT NULL DEFAULT '0' COMMENT '佣金金额' AFTER `now_money`;
UPDATE `eb_system_attachment` SET `att_dir` = replace(att_dir ,'/public',''),`satt_dir` = replace(satt_dir ,'/public','');
UPDATE `eb_store_product` SET `image` = replace(image ,'/public',''),`slider_image` = replace(slider_image ,'\/public',''),`description`= replace(description,'/public','');
UPDATE `eb_store_product_attr_value` SET `image` = replace(image ,'/public','');
UPDATE `eb_store_seckill` SET `image` = replace(image ,'/public',''),`images` = replace(images,'\/public',''),`description` = replace(description,'/public','');
UPDATE `eb_store_combination` SET `image` = replace(image ,'/public',''),`images` = replace(images,'\/public',''),`description` = replace(description,'/public','');
UPDATE `eb_store_bargain` SET `image` = replace(image ,'/public',''),`images` = replace(images,'\/public',''),`description` = replace(description,'/public','');
UPDATE `eb_system_config` SET `value` = replace(`value` ,'\/public','');
UPDATE `eb_article_category` SET `image` = replace(`image` ,'/public','');
UPDATE `eb_article` SET `image_input` = replace(`image_input` ,'/public','');
UPDATE `eb_article_content` SET `content` = replace(`content` ,'/public','');
UPDATE `eb_store_category` SET `pic` = replace(`pic` ,'/public','');
UPDATE `eb_system_group_data` SET `value` = replace(`value` ,'\/public','');
INSERT INTO `eb_system_config`(`id`, `menu_name`, `type`, `input_type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES (143, 'tengxun_map_key', 'text', 'input', 10, NULL, NULL, '', 100, NULL, '', '腾讯地图KEY', '腾讯地图KEY', 0, 1);
INSERT INTO `eb_system_config`(`id`, `menu_name`, `type`, `input_type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES (142, 'store_self_mention', 'radio', NULL, 10, '0=>关闭\n1=>开启', NULL, NULL, NULL, NULL, '\"1\"', '是否开启门店自提', '是否开启门店自提', 0, 1);
ALTER TABLE `eb_store_product` ADD `bar_code` varchar(15) NOT NULL COMMENT '产品条码（一维码）' AFTER `keyword`;
ALTER TABLE `eb_store_combination` ADD `effective_time` int(11) NOT NULL COMMENT '拼团订单有效时间' AFTER `stop_time`;
INSERT INTO `eb_system_config` ( `config_tab_id`, `status`, `high`, `upload_type`, `width`, `type`, `menu_name`, `value`, `parameter`, `desc`, `info`, `input_type`, `required`, `sort`) VALUES ('19','1', null, null, '100', 'text', 'cache_config', '\"86400\"', null, '配置全局缓存时间（秒），默认留空为永久缓存', '网站缓存时间', 'input', '', '0');
INSERT INTO `eb_system_config_tab` ( `status`, `eng_title`, `title`, `type`, `icon`, `info`) VALUES ( '1', 'cache_config', '缓存配置', '0', 'cube', '0');
-- 订单新增核销码 和 门店id
ALTER TABLE `eb_store_order` ADD `verify_code` VARCHAR(12) NOT NULL DEFAULT '' COMMENT '核销码' AFTER `bargain_id`;
ALTER TABLE `eb_store_order` ADD `store_id` INT NOT NULL DEFAULT '0' COMMENT '门店id' AFTER `verify_code`;
ALTER TABLE `eb_store_order` ADD `shipping_type` TINYINT(1) NOT NULL DEFAULT '1' COMMENT '配送方式 1=快递 ，2=门店自提' AFTER `store_id`;

--
-- 表的结构 `eb_system_store`
--

CREATE TABLE `eb_system_store` (
  `id`int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '门店名称',
  `introduction` varchar(1000) NOT NULL DEFAULT '' COMMENT '简介',
  `phone` char(25) NOT NULL DEFAULT '' COMMENT '手机号码',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '省市区',
  `detailed_address` varchar(255) NOT NULL DEFAULT '' COMMENT '详细地址',
  `image` varchar(255) NOT NULL DEFAULT '' COMMENT '门店logo',
  `latitude` char(25) NOT NULL DEFAULT '' COMMENT '纬度',
  `longitude` char(25) NOT NULL DEFAULT '' COMMENT '经度',
  `valid_time` varchar(100) NOT NULL DEFAULT '' COMMENT '核销有效日期',
  `day_time` varchar(100) NOT NULL DEFAULT '' COMMENT '每日营业开关时间',
  `add_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `is_show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否显示',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `phone` (`phone`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='门店自提';

-- 优品推荐
ALTER TABLE `eb_store_product` ADD `is_good` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '是否优品推荐' AFTER `is_bargain`;

-- 文章管理表新增产品关联id
ALTER TABLE `eb_article`  ADD `product_id` INT NOT NULL DEFAULT '0' COMMENT '产品关联id'  AFTER `mer_id`;

-- 短信开关和小票打印配置
INSERT INTO `eb_system_menus` (`pid`, `icon`, `menu_name`, `module`, `controller`, `action`, `params`, `sort`, `is_show`, `access`) VALUES ('289', '', '门店设置', 'admin', 'system.system_store', 'index', '[]', '0', '1', '1');
INSERT INTO `eb_system_config_tab` (`title`, `eng_title`, `status`, `info`, `icon`, `type`) VALUES ( '短信提醒开关', 'short_letter_switch', '1', '0', 'rss', '0');
INSERT INTO `eb_system_config_tab` (`title`, `eng_title`, `status`, `info`, `icon`, `type`) VALUES ('小票打印配置', 'printing_deploy', '1', '0', 'plug', '0');
SELECT `id` AS `pid1` FROM `eb_system_config_tab` WHERE `eng_title`='short_letter_switch' LIMIT 1 into @pid1;
SELECT `id` AS `pid2` FROM `eb_system_config_tab` WHERE `eng_title`='printing_deploy' LIMIT 1 into @pid2;
INSERT INTO `eb_system_config` ( `menu_name`, `type`, `input_type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES ( 'pay_success_printing_switch', 'radio', NULL, @pid2, '0=>关\n1=>开', NULL, NULL, NULL, NULL, '\"1\"', '支付成功订单打印开关', '支付成功订单打印开关', '0', '1');
INSERT INTO `eb_system_config` ( `menu_name`, `type`, `input_type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES ( 'develop_id', 'text', 'input', @pid2, NULL, NULL, '', '100', NULL, '\"\"', '开发者ID', '易联云开发者ID', '0', '1');
INSERT INTO `eb_system_config` ( `menu_name`, `type`, `input_type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES ( 'printing_api_key', 'text', 'input', @pid2, NULL, NULL, '', '100', NULL, '\"\"', '应用密钥', '易联应用密钥', '0', '1');
INSERT INTO `eb_system_config` ( `menu_name`, `type`, `input_type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES ( 'printing_client_id', 'text', 'input', @pid2, NULL, NULL, '', '100', NULL, '\"\"', '应用ID', '易联应用ID', '0', '1');
INSERT INTO `eb_system_config` ( `menu_name`, `type`, `input_type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES ( 'terminal_number', 'text', 'input', @pid2, NULL, NULL, '', '100', NULL, '\"\"', '终端号', '易联云打印机终端号', '0', '1');
INSERT INTO `eb_system_config` ( `menu_name`, `type`, `input_type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES ( 'admin_confirm_take_over_switch', 'radio', NULL, @pid1, '0=>关闭\n1=>开启', NULL, NULL, NULL, NULL, '\"1\"', '用户确认收货管理员短信提醒', '用户确认收货管理员短信提醒', '0', '1');
INSERT INTO `eb_system_config` ( `menu_name`, `type`, `input_type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES ( 'admin_refund_switch', 'radio', NULL, @pid1, '0=>关闭\n1=>开启', NULL, NULL, NULL, NULL, '\"1\"', '用户退款管理员提醒开关', '用户退款管理员提醒开关', '0', '1');
INSERT INTO `eb_system_config` ( `menu_name`, `type`, `input_type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES ( 'admin_pay_success_switch ', 'radio', NULL, @pid1, '0=>关闭\n1=>开启', NULL, NULL, NULL, NULL, '\"0\"', '用户支付成功管理员提醒开关', '用户支付成功管理员提醒开关', '0', '1');
INSERT INTO `eb_system_config` ( `menu_name`, `type`, `input_type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES ( 'admin_lower_order_switch', 'radio', NULL, @pid1, '0=>关闭\n1=>开启', NULL, NULL, NULL, NULL, '\"1\"', '用户下单管理员提醒开关', '用户下单管理员提醒开关', '0', '1');
INSERT INTO `eb_system_config` ( `menu_name`, `type`, `input_type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES ( 'confirm_take_over_switch', 'radio', NULL, @pid1, '0=>关闭\n1=>开启', NULL, NULL, NULL, NULL, '\"1\"', '确认收货提醒开关', '确认收货提醒开关', '0', '1');
INSERT INTO `eb_system_config` ( `menu_name`, `type`, `input_type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES ( 'deliver_goods_switch', 'radio', NULL, @pid1, '0=>关闭\n1=>开启', NULL, NULL, NULL, NULL, '\"1\"', '发货提醒开关', '发货提醒开关', '0', '1');
INSERT INTO `eb_system_config` ( `menu_name`, `type`, `input_type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES ( 'lower_order_switch', 'radio', NULL, @pid1, '0=>关闭\n1=>开启', NULL, NULL, NULL, NULL, '\"1\"', '支付成功提醒开关', '支付成功提醒开关', '0', '1');
INSERT INTO `eb_system_group_data` (`id`, `gid`, `value`, `add_time`, `sort`, `status`) VALUES ('176', '54', '{\"name\":{\"type\":\"input\",\"value\":\"\\u8ba2\\u5355\\u6838\\u9500\"},\"pic\":{\"type\":\"upload\",\"value\":\"http:\\/\\/crmeb30.net\\/uploads\\/attach\\/2019\\/09\\/19\\/0e79136c024cf1623acc42453beae1a8.jpg\"},\"url\":{\"type\":\"select\",\"value\":\"\\/pages\\/service\\/index\"},\"wap_url\":{\"type\":\"select\",\"value\":\"\\/order\\/order_cancellation\"}}', '1569382895', '1', '1');
UPDATE `eb_system_group` SET `fields`='[{\"name\":\"\\u83dc\\u5355\\u540d\",\"title\":\"name\",\"type\":\"input\",\"param\":\"\"},{\"name\":\"\\u56fe\\u6807(52*52)\",\"title\":\"pic\",\"type\":\"upload\",\"param\":\"\"},{\"name\":\"\\u5c0f\\u7a0b\\u5e8f\\u8df3\\u8f6c\\u8def\\u5f84\",\"title\":\"url\",\"type\":\"select\",\"param\":\"\\/pages\\/user_address_list\\/index=>\\u5730\\u5740\\u7ba1\\u7406\\n\\/pages\\/user_vip\\/index=>\\u4f1a\\u5458\\u4e2d\\u5fc3\\n\\/pages\\/activity\\/user_goods_bargain_list\\/index=>\\u780d\\u4ef7\\u8bb0\\u5f55\\n\\/pages\\/user_spread_user\\/index=>\\u63a8\\u5e7f\\u4e2d\\u5fc3\\n\\/pages\\/user_money\\/index=>\\u6211\\u7684\\u4f59\\u989d\\n\\/pages\\/user_goods_collection\\/index=>\\u6211\\u7684\\u6536\\u85cf\\n\\/pages\\/user_coupon\\/index=>\\u4f18\\u60e0\\u5238\\n\\/pages\\/admin\\/index=>\\u540e\\u53f0\\u8ba2\\u5355\\u7ba1\\u7406\\n\\/pages\\/service\\/index=>\\u8054\\u7cfb\\u5ba2\\u670d\"},{\"name\":\"\\u516c\\u4f17\\u53f7\\u8df3\\u8f6c\\u8def\\u5f84\",\"title\":\"wap_url\",\"type\":\"select\",\"param\":\"\\/user\\/add_manage=>\\u5730\\u5740\\u7ba1\\u7406\\n\\/user\\/vip=>\\u4f1a\\u5458\\u4e2d\\u5fc3\\n\\/activity\\/bargain\\/record=>\\u780d\\u4ef7\\u8bb0\\u5f55\\n\\/user\\/user_promotion=>\\u63a8\\u5e7f\\u4e2d\\u5fc3\\n\\/user\\/account=>\\u6211\\u7684\\u4f59\\u989d\\n\\/collection=>\\u6211\\u7684\\u6536\\u85cf\\n\\/user\\/user_coupon=>\\u4f18\\u60e0\\u5238\\n\\/customer\\/list=>\\u5ba2\\u670d\\u5217\\u8868\\n\\/customer\\/index=>\\u540e\\u53f0\\u8ba2\\u5355\\u7ba1\\u7406\\n\\/order\\/order_cancellation=>\\u8ba2\\u5355\\u6838\\u9500\"}]' WHERE (`id`='54');

-- 属性产品条码
ALTER TABLE `eb_store_product_attr_value` ADD `bar_code` VARCHAR(50) NOT NULL DEFAULT '' COMMENT '产品条码' AFTER `image`;

-- 小程序新增模板消息 19 11-12
UPDATE `eb_system_menus` SET `controller` = 'setting.system_droup_data' WHERE `controller` = 'setting.systemGroupData';

-- 清除小程序模板消息
TRUNCATE `eb_routine_template`;

-- 导入小程序订阅消息
INSERT INTO `eb_routine_template` (`id`, `tempkey`, `name`, `content`, `tempid`, `add_time`, `status`) VALUES
(1, '1128', '订单配送通知', '商品信息{{thing8.DATA}}\n订单编号{{character_string1.DATA}}\n配送人{{name4.DATA}}\n配送员电话{{phone_number10.DATA}}', '4wN7p3nF1IPiPNIPZnoOY3nZlrVP3dzM-Km0OLcpW48', '1575364233', 1),
(2, '1470', '提现结果通知', '提现状态{{thing1.DATA}}\n提现金额{{amount2.DATA}}\n提现账号{{thing3.DATA}}\n提现时间{{date4.DATA}}', 'xtBEkHdxyFSIQfiNe_CRga2mrmQizfArgSk7zC3hnbs', '1575364292', 1),
(3, '1481', '收货结果通知', '订单类型{{thing1.DATA}}\n订单商品{{thing2.DATA}}\n收货时间{{date5.DATA}}', 'AVmUHvKandN9a9ms_-5QsP9_PAzDoJ_VBB0vqQI1Eo0', '1575364327', 1),
(4, '1134', '订单取消通知', '取消原因{{thing1.DATA}}\n订单号{{number7.DATA}}\n取消时间{{date2.DATA}}\n订单类型{{thing5.DATA}}', 'xBilsNHAH527HBqrMgNoIA_biTfQ7A_bCbMxMx1uMM0', '1575364399', 1),
(5, '1458', '发货通知', '快递单号{{character_string2.DATA}}\n快递公司{{thing1.DATA}}\n发货时间{{time3.DATA}}\n订单商品{{thing5.DATA}}', 'vBrJgvoj4CgBOUIVQcRfsUkYun4orcllCfQ11SSs4wk', '1575364437', 1),
(6, '3098', '拼团成功通知', '活动名称{{thing1.DATA}}\n团长{{name3.DATA}}\n开团时间{{date5.DATA}}\n成团人数{{number2.DATA}}', 'V9fd7ssFZr5_twdgf--RfAExR4N08zU9Hk9auWDAI8g', '1575364508', 1),
(7, '2727', '砍价成功通知', '商品名称{{thing1.DATA}}\n底价{{amount2.DATA}}\n备注{{thing3.DATA}}', 'ehNGy-NRBJIENTdlwT8nBddGW2B4dPo6eKv3x1H6fOg', '1575364579', 1),
(8, '3116', ' 核销成功通知', '商品名称{{thing2.DATA}}\n订单号{{character_string3.DATA}}\n核销时间{{time4.DATA}}', '5wiR0TK43wguWdGzexocKvn9-nhELiJtoBKeqptsf84', '1575364738', 1),
(9, '1476', ' 新订单提醒', '订单商品{{thing2.DATA}}\n订单金额{{amount3.DATA}}\n订单编号{{character_string4.DATA}}\n订单时间{{date6.DATA}}\n订单类型{{thing1.DATA}}', 'F7ju2FdKqFQ8rXXzkB34HSYKa5_kOzJrpF9EZQc1pJ8', '1575364792', 1),
(10, '1451', ' 退款通知', '退款状态{{thing1.DATA}}\n退款商品{{thing2.DATA}}\n退款金额{{amount3.DATA}}\n退款单号{{character_string6.DATA}}', 'aqp6PzdU9vCUOUCHsuGFWvkZgp_cGQ_RKW7XCe9118I', '1575364895', 1),
(11, '755', ' 充值成功通知', '交易单号{{character_string1.DATA}}\n充值金额{{amount3.DATA}}\n账户余额{{amount4.DATA}}\n充值时间{{date5.DATA}}', '_0KAysps9Yj0SM3nacaF_9xw77w1NQYjOpnl4TQAp7k', '1575365017', 1),
(12, '1927', '付款成功通知', '付款单号{{character_string1.DATA}}\n付款金额{{amount2.DATA}}\n付款时间{{date3.DATA}}', 'jY2vT0Fge2srW9Izc-3wEE6WII-FQBvEi2J_duiAAck', '1575365111', 1),
(13, '1468', '申请退款通知', '订单编号{{character_string4.DATA}}\n申请时间{{date5.DATA}}\n订单金额{{amount2.DATA}}\n退款状态{{phrase7.DATA}}\n备注{{thing8.DATA}}', 'NOfT3qoOS3hkSzwt2LJg_LnU0NBzwSHXkSwKdx6QDwc', '1575440940', 1),
(14, '335', '积分到账提醒', '订单编号{{character_string2.DATA}}\n商品名称{{thing3.DATA}}\n支付金额{{amount4.DATA}}\n获得积分{{number5.DATA}}\n累计积分{{number6.DATA}}', 'TtdbifwMN-6D3hNld8jTc97A8Ohlqg4FtgmIgB28JPc', '1575516565', 1),
(15, '3353', '拼团状态通知', '商品名称{{thing2.DATA}}\n拼团人数{{thing1.DATA}}\n备注{{thing3.DATA}}', 'LkYDDYO-HQKT7NydGjrN7AJ1OUCf3mgZf3otVruhxOo', '1575516605', 1);


-- 增加索引，增加失效时间
ALTER TABLE `eb_cache` ADD `expire_time` INT NOT NULL DEFAULT '0' COMMENT '失效时间0=永久' AFTER `result`;
ALTER TABLE `eb_cache` ADD INDEX(`key`);

-- 修改文字错误
UPDATE `eb_system_config` SET `desc` = '人人分销默认每个人都可以分销，指定人分销后台指定人开启分销' WHERE `menu_name` = 'store_brokerage_statu';

-- 首发新品广告位
INSERT INTO `eb_system_config`(`menu_name`, `type`, `input_type`, `config_tab_id`, `parameter`, `upload_type`, `required`, `width`, `high`, `value`, `info`, `desc`, `sort`, `status`) VALUES ('new_goods_bananr', 'upload', NULL, 5, NULL, 1, NULL, NULL, NULL, '', '首发新品广告图（414*99）', '首发新品广告图', 0, 1);
-- 调整token字段位500
ALTER TABLE `eb_user_token` CHANGE `token` `token` VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'token';
-- 配置分类添加pid
ALTER TABLE `eb_system_config_tab` ADD `pid` INT(10) NULL DEFAULT '0' COMMENT '父级ID' AFTER `id`;