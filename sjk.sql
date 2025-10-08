-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 2025-02-05 17:13:23
-- 服务器版本： 5.7.38-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



CREATE TABLE IF NOT EXISTS `dd_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qq` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `password` varchar(288) NOT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dd_admin`
--

INSERT INTO `dd_admin` (`id`, `name`, `qq`, `user`, `password`, `mail`) VALUES
(1, '思博主机sib.cc', '34455788', 'admin', '$2y$10$H.Myu9u15Xmhmtkfe7uSY.1ZNoBFSu5tz6F4wf/rTfpIDoXm3OybG', '34455788@qq.com');

-- --------------------------------------------------------

--
-- 表的结构 `dd_affsymoney`
--

CREATE TABLE IF NOT EXISTS `dd_affsymoney` (
  `id` int(11) NOT NULL,
  `information` text NOT NULL,
  `money` varchar(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `time` varchar(50) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `dd_afftxjl`
--

CREATE TABLE IF NOT EXISTS `dd_afftxjl` (
  `id` int(11) NOT NULL,
  `information` text NOT NULL,
  `money` varchar(100) NOT NULL,
  `state` varchar(10) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `time` varchar(50) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `dd_announcement`
--

CREATE TABLE IF NOT EXISTS `dd_announcement` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `information` text NOT NULL,
  `time` varchar(288) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dd_announcement`
--

INSERT INTO `dd_announcement` (`id`, `name`, `information`, `time`) VALUES
(1, '思博主机sib.cc服务条例', '<h3>禁止条例</h3>\n<p>禁止搭建违反中国网络法律的内容,比如:外挂,诈骗,钓鱼,赌博,色情,VPN等,查到直接删机,冻结账户,不退款!</p>\n<h3>退款条例</h3>\n<p>不支持退款!</p>\n', '1729342986');

-- --------------------------------------------------------

--
-- 表的结构 `dd_cart`
--

CREATE TABLE IF NOT EXISTS `dd_cart` (
  `id` int(11) NOT NULL,
  `product` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `money` varchar(200) NOT NULL DEFAULT '0',
  `cycle` varchar(100) NOT NULL,
  `firstmo` varchar(288) NOT NULL DEFAULT '0',
  `serverid` varchar(200) NOT NULL,
  `upgrade` varchar(10) NOT NULL DEFAULT '0',
  `upgrades` text,
  `buy` varchar(10) NOT NULL DEFAULT '0',
  `hide` varchar(10) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `renew` varchar(100) NOT NULL DEFAULT '0',
  `limits` varchar(288) NOT NULL DEFAULT '0',
  `inventory` varchar(100) NOT NULL DEFAULT '0',
  `data1` text,
  `data2` text,
  `data3` text,
  `data4` text,
  `data5` text,
  `data6` text,
  `data7` text,
  `data8` text,
  `data9` text,
  `data10` text,
  `data11` text,
  `data12` text,
  `data13` text,
  `data14` text,
  `data15` text,
  `data16` text,
  `data17` text,
  `data18` text,
  `data19` text,
  `data20` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `dd_order`
--

CREATE TABLE IF NOT EXISTS `dd_order` (
  `id` int(11) NOT NULL,
  `user` varchar(300) DEFAULT NULL,
  `password` varchar(320) DEFAULT NULL,
  `userid` varchar(100) NOT NULL,
  `cartid` varchar(100) NOT NULL,
  `atime` varchar(300) NOT NULL,
  `ztime` varchar(300) NOT NULL,
  `state` varchar(200) NOT NULL,
  `data1` text,
  `data2` text,
  `data3` text,
  `data4` text,
  `data5` text,
  `data6` text,
  `data7` text,
  `data8` text,
  `data9` text,
  `data10` text,
  `data11` text,
  `data12` text,
  `data13` text,
  `data14` text,
  `data15` text,
  `data16` text,
  `data17` text,
  `data18` text,
  `data19` text,
  `data20` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `dd_pay`
--

CREATE TABLE IF NOT EXISTS `dd_pay` (
  `id` int(11) NOT NULL,
  `name` varchar(288) NOT NULL,
  `ordernumber` varchar(288) NOT NULL,
  `pay` varchar(288) NOT NULL,
  `money` varchar(288) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `time` varchar(288) NOT NULL,
  `state` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `dd_pays`
--

CREATE TABLE IF NOT EXISTS `dd_pays` (
  `id` int(11) NOT NULL,
  `name` varchar(288) NOT NULL,
  `plugins` varchar(288) NOT NULL,
  `state` varchar(10) NOT NULL DEFAULT '0',
  `data` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dd_pays`
--

INSERT INTO `dd_pays` (`id`, `name`, `plugins`, `state`, `data`) VALUES
(7, '支付宝', 'f2fpay', '1', '[{"name":"appId","title":"APPID","type":"input","prompt":"APPID","value":"2021003196616285"},{"name":"rsaPrivateKey","title":"\\u5e94\\u7528\\u79c1\\u94a5","type":"textarea","prompt":"\\u5e94\\u7528\\u79c1\\u94a5","value":"MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDci++ngVV7vJyqjZdyUXNjQKk4eN0U9QnTuFjgeb5\\/Xq9R30Bo8fUfSxYlpj1s10gyaaULApLau6i\\/yZ1\\/sPxEogk4EIRNELUsJDYVL61R6Rmd+Yy7liAA9uMphihjswtjmZ\\/ylIOlHAC7504RCLvMKobL6aVb43QPV8SIR7TmAbObR5cXC5\\/6awxLXvcrgNmtOGpMlB2uEDc8EDhjP05\\/FWkpDrTm1z20xmqNgEFtMarCqqiWdZMuJgQdP+aUgD9ptx0RmDv2Lom9jS0irVAW6nIzLlfx33Q+NECU6Q\\/kVfp\\/SGwiKn+WwcB2Bw4YwW6QeETq7+uWr0YraYC4iAgzAgMBAAECggEBAKS0QMq4dM2OovVf\\/p0aJPEXhgitgnW3NZqOzpj9cn2OiaG7908oeyXennCJgM\\/6ymkTqnTZfDCr+q8X8248D3l2BSqAcz1WX+bSOC2ESIymZ0Ip7qbcy5PMzQLitOEYAkZkoSW5McMpcYbii9N+0Tj8\\/WPlXl+MMs2OfzBDVN57PcSbzhQfzCrSajvH+dcnQPI5UQqVZdAaChq0A1X36ExtnpYKAGWgyqsv66q+NNCMAIW+U403sIBwPvRS\\/McamlcATQe6eJUQHM2N9U2rtJ9EYzX5NTjdlGU+w1eMRoT7mY6c4vlpXIaSdesA6w7os9L9MSY\\/aDynsTNSv3dVWakCgYEA9Ojw\\/2JvPuneRkY2rr2dKqxosvWAy+vO\\/VhJtdEnQ1SXwoJgKw14+lwQ3m6KAH50f0FQWlvNo0zEUyDG4ER3BwXwXNG7Ty0fCRE3ZXCFRd8jaoRL\\/VaT+VIJYL0ttMr0lQ7iPg7CsFtRuMoJw2Za+TYXMqt11g8aVnZONP7VTpcCgYEA5oiRscpu9z3dUvZRLsnOR5JAWZfT4tjbXA\\/7zzQ0LsYjMCjSFUr8WwqHqQg2\\/qmY0SyyWwPZSfnzcHLLO6n9TCcmkdf51oLEuh9Ql5JD+uh7XgRhh3Ks3JQJZUiSssBzGVKXz1ExSUxmg1NOTs3EkXwUZpq3U4xXi72Z8d5xosUCgYBQsjhGTc7N8g01Jol6Biw1FV3iKZZomqg3PdH7wJCpVMQ0aPT6+pN0GsXMJKwAAaqtC35IZ5tYRUEjCte8qZJ2k\\/RhARIwwnNJb4zLNcoT\\/bQTsse\\/D7nuGqPQZkUbHwx72M2fGQn5Rf2lX5zb72vmVXZLUcef4pYRCyY1vAnYvQKBgFcYkbLSAEp4nP2TAejjZYO0xYsTyYGS3I1TnJcT6gMh6Hlxcq2Ivv7GY6qA6AYenRWqBVhNg\\/Jm9IovVIkeGAyFXhULu+BHV3vaCOC66eQJoVJL5Wz+7kAHzeTuHj5aZyHSCnjQ\\/AXtT22eM5+iLfmpHywEl+6AvzKUV20B1XzhAoGAUB46wCVtFFeNIIJ0hRoX1EsxeA4G7ue0nOHrMb+7s7ssR0\\/ykVrjjFkMM8DR6uLo0i9zMYw2kdzgMPWsvEW6AnFpTpVse5bvlpuhAMJyG4oXY+6qBBGdgVrtz7LhKgTAf3NZgRh06wQBNciuD6ZYaVsPEZVfe94jKv2d\\/s7I2TI="},{"name":"alipayrsaPublicKey","title":"\\u652f\\u4ed8\\u5b9d\\u516c\\u94a5","type":"textarea","prompt":"\\u652f\\u4ed8\\u5b9d\\u516c\\u94a5","value":"MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAnraZEwjsTNeQ\\/7IdpGC4zs985r453181+sL9jX4DpHtD+F+LMQsWodBvsdUmXnafALOs6W7dUzZ9N26Hn8X1EQq215XlpdZfBk7yT9Zg+Ze3vCiKKCVl9XtGgwlrPQMwGcNJD4zKNg0WfPjdqTvb+unnyMLGFzJPFHUGW7zVYO+9rWG71LlGkfq0TMgKELYq0bJ39xHcMCG6+2Mf0Ul8t5ukMq7LcS1xHLunlI1V8tZr6GWqnd3KxM05zolzJwNfjaXgoNkoMCvK2ghM94Mw4gmf0sP15jVXUBd2EnfKDO4+SCn4vsn7bR8YN7rd\\/vLIgWVJoiBr09lNXaO5s9c5owIDAQAB"}]');

-- --------------------------------------------------------

--
-- 表的结构 `dd_product`
--

CREATE TABLE IF NOT EXISTS `dd_product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `introduce` text NOT NULL,
  `hide` varchar(10) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `dd_server`
--

CREATE TABLE IF NOT EXISTS `dd_server` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `host` varchar(100) NOT NULL,
  `ip` varchar(200) NOT NULL,
  `security` text NOT NULL,
  `port` varchar(200) NOT NULL,
  `ssl` varchar(200) NOT NULL DEFAULT '0',
  `user` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `serverplugins` varchar(288) NOT NULL,
  `data1` text,
  `data2` text,
  `data3` text,
  `data4` text,
  `data5` text,
  `data6` text,
  `data7` text,
  `data8` text,
  `data9` text,
  `data10` text,
  `data11` text,
  `data12` text,
  `data13` text,
  `data14` text,
  `data15` text,
  `data16` text,
  `data17` text,
  `data18` text,
  `data19` text,
  `data20` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `dd_sq`
--

CREATE TABLE IF NOT EXISTS `dd_sq` (
  `id` int(11) NOT NULL,
  `domain` text NOT NULL,
  `qq` varchar(288) NOT NULL,
  `ip` varchar(288) NOT NULL,
  `time` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `dd_ticket`
--

CREATE TABLE IF NOT EXISTS `dd_ticket` (
  `id` int(11) NOT NULL,
  `title` varchar(288) NOT NULL,
  `content` mediumtext NOT NULL,
  `userid` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `state` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `dd_transaction`
--

CREATE TABLE IF NOT EXISTS `dd_transaction` (
  `id` int(11) NOT NULL,
  `userid` varchar(288) NOT NULL,
  `content` text NOT NULL,
  `time` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `dd_transferrecord`
--

CREATE TABLE IF NOT EXISTS `dd_transferrecord` (
  `id` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `record` mediumtext NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `dd_user`
--

CREATE TABLE IF NOT EXISTS `dd_user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `money` varchar(200) NOT NULL DEFAULT '0',
  `mail` varchar(300) NOT NULL,
  `qq` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `aff` varchar(100) NOT NULL,
  `affmoney` varchar(100) NOT NULL DEFAULT '0',
  `upperid` varchar(100) NOT NULL,
  `time` varchar(200) NOT NULL,
  `state` varchar(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `dd_web`
--

CREATE TABLE IF NOT EXISTS `dd_web` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `favicon` text NOT NULL,
  `template` varchar(288) NOT NULL,
  `admintemplate` varchar(288) NOT NULL,
  `wh` varchar(10) NOT NULL DEFAULT '0',
  `whxx` text NOT NULL,
  `email` varchar(100) DEFAULT '0',
  `emailchar` varchar(500) NOT NULL,
  `emailsecure` varchar(100) NOT NULL,
  `emailport` varchar(500) NOT NULL,
  `emailhost` varchar(500) NOT NULL,
  `emailname` varchar(500) NOT NULL,
  `emailpass` varchar(500) NOT NULL,
  `emailauth` varchar(500) NOT NULL,
  `affdiscount` varchar(100) NOT NULL,
  `affwithdrawal` varchar(100) NOT NULL,
  `cronzz` varchar(100) NOT NULL,
  `cronsc` varchar(100) NOT NULL,
  `paycron` varchar(100) NOT NULL,
  `tickcron` varchar(100) NOT NULL,
  `zcyxyz` varchar(100) NOT NULL DEFAULT '0',
  `yxdl` varchar(288) NOT NULL DEFAULT '0',
  `templateset` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dd_web`
--

INSERT INTO `dd_web` (`id`, `name`, `description`, `keywords`, `favicon`, `template`, `admintemplate`, `wh`, `whxx`, `email`, `emailchar`, `emailsecure`, `emailport`, `emailhost`, `emailname`, `emailpass`, `emailauth`, `affdiscount`, `affwithdrawal`, `cronzz`, `cronsc`, `paycron`, `tickcron`, `zcyxyz`, `yxdl`, `templateset`) VALUES
(1, '思博主机sib.cc', '思博主机sib.cc,提供快速、稳定、优质的虚拟主机服务！', '思博主机sib.cc,免费主机,公益主机,虚拟主机,香港虚拟主机,美国虚拟主机,免备案虚拟主机', '/favicon.ico', 'default', 'default', '0', '<title>维护中...</title>\r\n网站维护中...', '1', 'UTF-8', 'ssl', '465', 'smtp.qq.com', '34455788@qq.com', '123123', 'true', '0.25', '10', '3', '3', '5', '3', '1', '1', '[{"name":"\\u7f51\\u7ad9\\u80cc\\u666f","title":"\\u7f51\\u7ad9\\u80cc\\u666f","type":"input","prompt":"\\u7f51\\u7ad9\\u80cc\\u666f\\u56fe\\u5730\\u5740 ","value":"\\/static\\/assets\\/images\\/66.png"},{"name":"\\u7f51\\u7ad9\\u6807\\u9898","title":"\\u7f51\\u7ad9\\u6807\\u9898","type":"input","prompt":"\\u7f51\\u7ad9\\u9996\\u9875\\u6807\\u9898","value":"\\u53ea\\u63d0\\u4f9b\\u5feb\\u901f\\u3001\\u7a33\\u5b9a\\u3001\\u4f18\\u8d28\\u7684\\u865a\\u62df\\u4e3b\\u673a\\u670d\\u52a1!"},{"name":"\\u516c\\u544a\\u5f00\\u5173","title":"\\u662f\\u5426\\u5f00\\u542f\\u516c\\u544a","type":"select","prompt":"\\u516c\\u544a\\u5f00\\u5173","value":"\\u5f00","option":["\\u5f00","\\u5173"]},{"name":"\\u7f51\\u7ad9\\u516c\\u544a","title":"\\u7f51\\u7ad9\\u516c\\u544a","type":"textarea","prompt":"\\u516c\\u544a\\u5185\\u5bb9,\\u652f\\u6301HTML","value":"\\u611f\\u8c22\\u4f60\\u4f7f\\u7528<font color=\\"red\\" style=\\"font-size:20px\\">\\u601d\\u535a\\u4e3b\\u673asib.cc<\\/font>~<br\\/>\\u5df2\\u7ecf\\u7ed9\\u65e0\\u6570\\u7684\\u7528\\u6237\\u63d0\\u4f9b\\u8fc7\\u865a\\u62df\\u4e3b\\u673a,\\u6211\\u76f8\\u4fe1\\u6709\\u4f60\\u4eec\\u7684\\u5b58\\u5728,\\u6211\\u4eec\\u4f1a\\u8d70\\u7684\\u66f4\\u8fdc!<br\\/><br\\/>\\u5168\\u81ea\\u52a8\\u5316\\u5f00\\u901a,\\u6682\\u505c,\\u7ec8\\u6b62\\u4ea7\\u54c1<br\\/>\\u652f\\u6301\\u670d\\u52a1\\u5668\\u9762\\u677f:bthost,easypanel,mnbt<br\\/>\\u652f\\u4ed8\\u652f\\u6301\\u6613\\u652f\\u4ed8,\\u7801\\u652f\\u4ed8,\\u652f\\u4ed8\\u5b9d\\u5f53\\u9762\\u4ed8<br\\/>\\u53ef\\u81ea\\u4e3b\\u5f00\\u53d1\\u670d\\u52a1\\u5668\\u63d2\\u4ef6\\u548c\\u652f\\u4ed8\\u63d2\\u4ef6!<br\\/>\\u652f\\u6301\\u529f\\u80fd:\\u63a8\\u5e7f\\u8fd4\\u5229,\\u4ea7\\u54c1\\u8fc7\\u6237,\\u81ea\\u52a9\\u5347\\u7ea7\\u4ea7\\u54c1\\u7b49<br\\/><br\\/><h3>\\u670d\\u52a1\\u5668\\u8d5e\\u52a9:<a href=\\"http:\\/\\/sib.cc\\">\\u601d\\u535a\\u4e91<\\/a><\\/h3><br\\/>\\u5b98\\u65b9QQ\\u7fa4\\uff1a<a href=\\"https:\\/\\/qm.qq.com\\/q\\/iDbT18Wwlq\\" style=\\"font-size:20px\\">850294229<\\/a><br\\/><br\\/><h4>\\u7981\\u6b62\\u642d\\u5efa\\u8fdd\\u53cd\\u4e2d\\u56fd\\u7f51\\u7edc\\u6cd5\\u5f8b\\u7684\\u5185\\u5bb9,\\u6bd4\\u5982:\\u5916\\u6302,\\u8bc8\\u9a97,\\u9493\\u9c7c,\\u8d4c\\u535a,\\u8272\\u60c5,VPN\\u7b49,\\u67e5\\u5230\\u76f4\\u63a5\\u5220\\u673a,\\u51bb\\u7ed3\\u8d26\\u6237,\\u4e0d\\u9000\\u6b3e!<\\/h4>"},{"name":"\\u4fa7\\u8fb9\\u680f","title":"\\u4fa7\\u8fb9\\u680f","type":"textarea","prompt":"\\u4fa7\\u8fb9\\u680f","value":"<li class=\\"nav-main-item\\">\\r\\n<a class=\\"nav-main-link\\" href=\\"https:\\/\\/qm.qq.com\\/q\\/iDbT18Wwlq\\">\\r\\n<i class=\\"nav-main-link-icon fab fa-qq\\"><\\/i>\\r\\n<span class=\\"nav-main-link-name\\">\\r\\nQQ\\u4ea4\\u6d41\\u7fa4\\r\\n<\\/span>\\r\\n<\\/a>\\r\\n<\\/li>"},{"name":"\\u7f51\\u7ad9\\u5907\\u6848\\u53f7","title":"\\u7f51\\u7ad9\\u5907\\u6848\\u53f7","type":"input","prompt":"\\u7f51\\u7ad9\\u5907\\u6848\\u53f7 ","value":""}]');

-- --------------------------------------------------------

--
-- 表的结构 `rsthemes_displays`
--

CREATE TABLE IF NOT EXISTS `rsthemes_displays` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `rsthemes_displays`
--

INSERT INTO `rsthemes_displays` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Default', 1, '2024-11-02 13:00:18', '2024-11-02 13:00:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dd_admin`
--
ALTER TABLE `dd_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dd_affsymoney`
--
ALTER TABLE `dd_affsymoney`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dd_afftxjl`
--
ALTER TABLE `dd_afftxjl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dd_announcement`
--
ALTER TABLE `dd_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dd_cart`
--
ALTER TABLE `dd_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dd_order`
--
ALTER TABLE `dd_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dd_pay`
--
ALTER TABLE `dd_pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dd_pays`
--
ALTER TABLE `dd_pays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dd_product`
--
ALTER TABLE `dd_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dd_server`
--
ALTER TABLE `dd_server`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dd_sq`
--
ALTER TABLE `dd_sq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dd_ticket`
--
ALTER TABLE `dd_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dd_transaction`
--
ALTER TABLE `dd_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dd_transferrecord`
--
ALTER TABLE `dd_transferrecord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dd_user`
--
ALTER TABLE `dd_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dd_web`
--
ALTER TABLE `dd_web`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rsthemes_displays`
--
ALTER TABLE `rsthemes_displays`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dd_admin`
--
ALTER TABLE `dd_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dd_affsymoney`
--
ALTER TABLE `dd_affsymoney`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dd_afftxjl`
--
ALTER TABLE `dd_afftxjl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dd_announcement`
--
ALTER TABLE `dd_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dd_cart`
--
ALTER TABLE `dd_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dd_order`
--
ALTER TABLE `dd_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dd_pay`
--
ALTER TABLE `dd_pay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dd_pays`
--
ALTER TABLE `dd_pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dd_product`
--
ALTER TABLE `dd_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dd_server`
--
ALTER TABLE `dd_server`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dd_sq`
--
ALTER TABLE `dd_sq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dd_ticket`
--
ALTER TABLE `dd_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dd_transaction`
--
ALTER TABLE `dd_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dd_transferrecord`
--
ALTER TABLE `dd_transferrecord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dd_user`
--
ALTER TABLE `dd_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dd_web`
--
ALTER TABLE `dd_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rsthemes_displays`
--
ALTER TABLE `rsthemes_displays`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
