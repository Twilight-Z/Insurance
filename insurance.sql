-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2019 年 05 月 08 日 10:39
-- 服务器版本: 5.1.46-community
-- PHP 版本: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `insurance`
--

-- --------------------------------------------------------

--
-- 表的结构 `i_admin`
--

CREATE TABLE IF NOT EXISTS `i_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_real` varchar(10) DEFAULT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(32) NOT NULL,
  `admin_verify` varchar(32) NOT NULL,
  `admin_img` varchar(100) DEFAULT NULL,
  `create` int(11) NOT NULL,
  `lastip` varchar(20) DEFAULT NULL,
  `lasttime` int(11) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `i_admin`
--

INSERT INTO `i_admin` (`admin_id`, `admin_real`, `admin_username`, `admin_password`, `admin_verify`, `admin_img`, `create`, `lastip`, `lasttime`) VALUES
(1, NULL, 'admin', '39fc44fdc76b063e785922364bcf888f', '37654b793d96ed06d8c2bfa60658a502', NULL, 1111, '127.0.0.1', 1557278309),
(2, '呵呵', '123456', '39fc44fdc76b063e785922364bcf888f', '37654b793d96ed06d8c2bfa60658a502', '2019/05/155720156023648.jpg', 1111, '127.0.0.1', 1557278309),
(3, '小牛', '654321', '12ca6b82feb17680962e84aee3ffbc45', 'f36f8d0f30f7d16beae9b32f1617398c', '2019/05/155720065229263.jpg', 1557199592, '127.0.0.1', 1557278309);

-- --------------------------------------------------------

--
-- 表的结构 `i_article`
--

CREATE TABLE IF NOT EXISTS `i_article` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_content` text NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `i_article`
--

INSERT INTO `i_article` (`a_id`, `a_content`) VALUES
(1, '<div class="col-sm-12 col-md-4"><h6 class="mb-5">魔艺(UEmo)极速建站系统</h6><p class=""><a class="ml-3 mt-n1"href=""></a><a class="ml-3 mt-n1"href=""></a><a class="ml-3 mt-n1"href=""></a></p></div><div class="col-sm-12 col-md-4"><p class="mb-2">邮编：100000</p><p class="mb-2">手机：13521043455/13811334772</p><p class="mb-2">邮箱：touch@uelike.com</p></div><div class="col-sm-12 col-md-4"><p class="mb-2">地址：北京市建外SOHO东区2号楼</p><p class="mb-2">电话：010-69557550</p><p class="mb-2">传真：000-66668888</p></div>'),
(2, '<h6 class="font-weight-bold">中日医院2017年护理应届毕业生招聘通知</h6><hr><p class="m-0">一、资格要求</p><p class="m-0">1.道德品质良好；</p><p class="m-0">2.身体健康；</p><p class="m-0">3.符合《优爱医院毕业生接收工作管理办法》的基本条件，接收毕业生要求全日制本科起点，部分优秀全日制大专毕业生也可适当考虑；</p><p class="m-0">4.成绩优良，研究生须通过国家英语六级考试，本科生通过国家英语四级考试。</p><br><p class="m-0">二、招聘安排</p><p class="m-0">1.即日起接收简历投递，截止日期2016年12月31日；</p><p class="m-0">2.面试时间另行通知（具体时间以短信形式通知）。</p><br><p class="m-0">三、应聘方式</p><p class="mb-2">1.登陆优爱医院网站（www.xxx.com.cn），在首页“医院新闻”最新动态和工作动态栏目下“招聘专栏”下载《中日医院2017年护理毕业生应聘报名表》（附件1）和《中日医院2017年护理毕业生信息登记表》（附件2），并按要求填写。按要求成功投递电子报名表及登记表视为应聘有效，不接收纸质简历应聘；</p><p class="mb-2">2.应聘报名表和信息登记表请以同一邮件中两个附件的形式发送至邮箱：ui@163.com。</p><p class="mb-2">3.投递的邮件及其附件请按以下要求命名：</p><p class="m-0">（1）邮件名称：2017护理+姓名+毕业院校；</p><p class="m-0">（2）应聘报名表：2017护理+姓名+毕业院校+报名表；</p><p class="mb-2">（3）信息登记表：2017护理+姓名+毕业院校+登记表。</p><p class="mb-4">4.优爱医院人事处联系电话：<span class="">86888888</span></p><br>'),
(3, '<hr/><p class="w-25 my-auto">公司名称</p><p>INSURVANCE投资有限公司</p><hr/><p class="w-25 my-auto">代表董事</p><p>鲍比・布尔茹瓦</p><hr/><p class="w-25 my-auto">公司目标</p><p>作为一家独立的综合财富管理公司，我们的目标是成为综合全面财务规划，实施和持续监控的领先标准。</p><hr/><p class="w-25 my-auto h-auto">我们故事</p><p>我们是一家总部位于温哥华的金融咨询公司，成立于1973年。<br/>自公司成立以来，RGF已发展到60多人，并已成为温哥华最受尊敬的独立金融咨询公司之一。<br/>我们的公司建立在客户对我们的信任和信任的基础上。</p><hr/><p><img src="/ueditor/php/upload/image/20190503/1556852008574689.jpg" title="1556852008574689.jpg" alt="pic1.jpg"/></p><hr/><h5 class="mb-4">我们认为该贷款给中型的企业是一个引人注目的方式来投资</h5><p><span class="text-secondary">我们将中间市场信用视为均衡投资组合的核心部分。我们创建了Insurance，以优质的贷款和投资组合管理直接接触优质贷款。</span><span class="text-secondary">我们的业务建立在这样的信念上，那就是领导和结构交易的贷款人能够发起最具吸引力的投资。</span></p><hr/><h5 class="mb-4">Insurvance是创建于成为一个长期供应商的资金，专注中间市场</h5><p class="text-secondary">满足借款人对灵活可靠的贷款人的需求，可以在经济周期内实现。我们提供完整的&#39;一站式&#39;融资解决方案，并且是领先的私募股权公司的首选贷款人。我们的贷款由长期机构投资者的资本承诺提供资金。</p><p class="text-secondary">专注于中间市场，自成立以来已经贷出超过55亿美元。</p>'),
(4, '<div class=""><h6 class="font-weight-bold">网站建设文化传播有限公司</h6><span class="text-black-50 pb-4">Beijing WEBSITE Culture Communication Co.Ltd.</span><p class="text-secondary mb-1">总部地址：北京市朝阳区世贸商务楼2688室</p><p class="text-secondary mb-1">总部电话：+86 10 69887650</p><p class="text-secondary mb-1">电子邮箱：website@webs.com</p><p class="text-secondary mb-1">邮政编码：100024</p><p class="text-secondary mb-1">https:</div><div class=""><h6 class="font-weight-bold">深圳网站文化传播有限公司</h6><span class="text-black-50 pb-4">Shenzhen WEBSITE Culture Communication Co.Ltd.</span><p class="text-secondary mb-1">总部地址：深圳市福田区世贸商务楼A栋-606室</p><p class="text-secondary mb-1">总部电话：+86 10 88667920</p><p class="text-secondary mb-1">电子邮箱：futian@webs.com</p><p class="text-secondary mb-1">邮政编码：100024</p></div><div class=""><h6 class="font-weight-bold">香港网站文化传播有限公司</h6><span class="text-black-50 pb-4">Xianggang WEBSITE Culture Communication Co.Ltd.</span><p class="text-secondary mb-1">总部地址：香港九龙区中心商务楼8888室</p><p class="text-secondary mb-1">总部电话：+86 10 69667880</p><p class="text-secondary mb-1">电子邮箱：joseph@webs.com</p><p class="text-secondary mb-1">邮政编码：100024</p></div>');

-- --------------------------------------------------------

--
-- 表的结构 `i_banner`
--

CREATE TABLE IF NOT EXISTS `i_banner` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_img` varchar(100) NOT NULL,
  `b_thumb` varchar(100) DEFAULT NULL,
  `b_isshow` tinyint(4) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `i_banner`
--

INSERT INTO `i_banner` (`b_id`, `b_img`, `b_thumb`, `b_isshow`) VALUES
(1, '2019/05/155693631950701.png', '2019-05/04/155693631950701.png', 1),
(2, '2019/05/155693651136999.png', '2019-05/04/155693651136999.png', 1),
(3, '2019/05/155693652276870.png', '2019-05/04/155693652276870.png', 1),
(4, '2019/05/155693653671270.png', '2019-05/04/155693653671270.png', 1),
(5, '2019/05/155693620248709.png', '2019-05/04/155693620248709.png', 0);

-- --------------------------------------------------------

--
-- 表的结构 `i_cases`
--

CREATE TABLE IF NOT EXISTS `i_cases` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_img` varchar(100) NOT NULL,
  `c_thumb` varchar(100) DEFAULT NULL,
  `c_time` int(11) DEFAULT NULL,
  `c_title` varchar(50) NOT NULL,
  `c_subtitle` varchar(100) NOT NULL,
  `c_content` text NOT NULL,
  `cc_id` int(11) NOT NULL,
  `c_isshow` tinyint(4) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `i_cases`
--

INSERT INTO `i_cases` (`c_id`, `c_img`, `c_thumb`, `c_time`, `c_title`, `c_subtitle`, `c_content`, `cc_id`, `c_isshow`) VALUES
(1, 'icon_it4.jpg', NULL, 33123, '独立管理公司 - 商业仓库开发 - 融资', 'Insurvance向Mata Capital提供了一项投资额为6700万欧元的零售投资组合家族办公室“离场”收购融资咨询', '<p class="text-black-50 mb-4">马塔资本完成了一个投资额为6,700万欧元的零售投资组合的场外收购，产生6.45％的净收益。该组合由位于法国的46个资产（37,000平方米）组成，主要位于主要城市主要商业区的中心。<br><br>80％的投资组合被租赁给法国的儿童保育专家Aubert，新的10年租约已重新谈判。投资组合的其他租户也是民族品牌，如Camaïeu，Jennyfer或Tom＆Co.<br><br>“通过实现本次交易，马塔资本确认其实现的业务都是超过市场自2015年11月推出公司完成收购几乎160米€表现能力，”行业基金经理劳伦特Delautre说MCHIPF＃1和Mata Capital的创始人。</p><img class="mw-100 my-4"src="../images/c4.jpg"alt=""><p class="text-black-50 mb-2"><br><br>作为这一交易的一部分，马塔资本由Allez＆ASSOCIES（威廉Chemithe）建议LPA-CGR律师（弗朗索瓦 - 雷吉斯法布尔-Falret，Chloe和ThiéblemontAlexae福尼尔-FAY）Sefal地产（洛朗Devriendt）进行技术尽职调查和Insurvance融资。<br><br>操作的银行融资由地产信贷银行经公证处Thibierge与合作伙伴和律师事务所K＆L盖茨（乔安娜KLAT爱德华·维特里，西尔维Chandesris）建议进行的。<br><br>在此次交易中，White Stone通过独家销售授权向卖家提供咨询，这再一次证明了其对私人和机构投资市场的强大控制。</p>', 1, 1),
(2, 'icon_it5.jpg', NULL, NULL, '为Mata Capital提供3000万欧元的收购融资', 'Insurvance建议Mata Capital资助位于雷恩郊区的一座7,900平方米的建筑', '<p class="text-black-50 mb-4">Insurvance在营销和展示阶段以及与潜在贷款人的讨论中为Mata Capital提供了建议，并在整个交易期间协调并协助所有利益相关方的谈判。特别是，Insurvance帮助Mata Capital选择了可用于优化结构，融资量和财务状况的选项。</p><div class="d-flex justify-content-between my-4"><img class="w-50 mr-2"src="../images/c1.jpg"alt=""><img class="w-50"src="../images/c5.jpg"alt=""></div><p class="text-black-50 mb-2">80％的投资组合被租赁给法国的儿童保育专家Aubert，新的10年租约已重新谈判。投资组合的其他租户也是民族品牌，如Camaïeu，Jennyfer或Tom＆Co.<br><br>“通过实现本次交易，马塔资本确认其实现的业务都是超过市场自2015年11月推出公司完成收购几乎160米€表现能力，”行业基金经理劳伦特Delautre说MCHIPF＃1和Mata Capital的创始人。<br><br>作为这一交易的一部分，马塔资本由Allez＆ASSOCIES（威廉Chemithe）建议LPA-CGR律师（弗朗索瓦 - 雷吉斯法布尔-Falret，Chloe和ThiéblemontAlexae福尼尔-FAY）Sefal地产（洛朗Devriendt）进行技术尽职调查和Insurvance融资。<br><br>操作的银行融资由地产信贷银行经公证处Thibierge与合作伙伴和律师事务所K＆L盖茨（乔安娜KLAT爱德华·维特里，西尔维Chandesris）建议进行的。<br><br>在此次交易中，White Stone通过独家销售授权向卖家提供咨询，这再一次证明了其对私人和机构投资市场的强大控制。</p>', 1, 1),
(14, '2019/05/155685037320941.jpg', '2019-05/03/155685037320941.jpg', 1548086400, '555', '8786', '<p>4444<br/></p>', 1, 1),
(15, '2019/05/155685042343798.jpg', '2019-05/03/155685042343798.jpg', 1558540800, '3123', '1231', '<p>412312<br/></p>', 1, 1),
(16, '2019/05/155685045041073.jpg', '2019-05/03/155685045041073.jpg', 1558454400, '111', '222', '<p>333<br/></p>', 3, 1),
(3, 'icon_it6.jpg', NULL, 31231, '在“重塑巴黎”框架内的一个财团理事会', 'Insurvance在营销和展示阶段以及与潜在贷款人的讨论中为Mata Capital提供了建议，并在整个交易期间协调并协助所有利益相关方的谈判。特别是，SHIFT CAPITAL帮助Mata Cap', '<p class="text-black-50 mb-4">Insurvance在营销和展示阶段以及与潜在贷款人的讨论中为Mata Capital提供了建议，并在整个交易期间协调并协助所有利益相关方的谈判。特别是，Insurvance帮助Mata Capital选择了可用于优化结构，融资量和财务状况的选项。<br>马塔资本完成了一个投资额为6,700万欧元的零售投资组合的场外收购，产生6.45％的净收益。该组合由位于法国的46个资产（37,000平方米）组成，主要位于主要城市主要商业区的中心。<br><br>80％的投资组合被租赁给法国的儿童保育专家Aubert，新的10年租约已重新谈判。投资组合的其他租户也是民族品牌，如Camaïeu，Jennyfer或Tom＆Co</p><img class="mw-100 my-4"src="../images/c4.jpg"alt=""><p class="text-black-50 mb-2">“通过实现本次交易，马塔资本确认其实现的业务都是超过市场自2015年11月推出公司完成收购几乎160米€表现能力，”行业基金经理劳伦特Delautre说MCHIPF＃1和Mata<br><br>作为这一交易的一部分，马塔资本由Allez＆ASSOCIES（威廉Chemithe）建议LPA-CGR律师（弗朗索瓦-雷吉斯法布尔-Falret，Chloe和ThiéblemontAlexae福尼尔-FAY）Sefal地产（洛朗Devriendt）进行技术尽职调查和Insurvance融资。<br><br>操作的银行融资由地产信贷银行经公证处Thibierge与合作伙伴和律师事务所K＆L盖茨（乔安娜KLAT爱德华·维特里，西尔维Chandesris）建议进行的。<br><br>在此次交易中，White Stone通过独家销售授权向卖家提供咨询，这再一次证明了其对私人和机构投资市场的强大控制。</p>', 2, 1),
(4, 'icon_it7.jpg', NULL, NULL, '酒店业投资工具的金融结构', 'SHIFT CAPITAL协助商业和酒店资产投资者在法国和西班牙建立投资和酒店营运结构。', '<p class="text-black-50 mb-4">Insurvance已经对债务和股票市场上的可用资本进行了审查，验证了所设想的战略的经济组成部分，向客户提供了有关该车辆财务结构的建议并制定了业务计划。<br><br>Insurvance在营销和展示阶段以及与潜在贷款人的讨论中为Mata Capital提供了建议，并在整个交易期间协调并协助所有利益相关方的谈判。特别是，Insurvance帮助Mata Capital选择了可用于优化结构，融资量和财务状况的选项。<br><br>Insurvance在营销和展示阶段以及与潜在贷款人的讨论中为Mata Capital提供了建议，并在整个交易期间协调并协助所有利益相关方的谈判。特别是，Insurvance帮助Mata Capital选择了可用于优化结构，融资量和财务状况的选项。</p><div class="d-flex justify-content-between my-4"><img class="w-50 mr-2"src="../images/c3.jpg"alt=""><img class="w-50"src="../images/c4.jpg"alt=""></div><p class="text-black-50 mb-4">马塔资本完成了一个投资额为6,700万欧元的零售投资组合的场外收购，产生6.45％的净收益。该组合由位于法国的46个资产（37,000平方米）组成，主要位于主要城市主要商业区的中心。<br><br>80％的投资组合被租赁给法国的儿童保育专家Aubert，新的10年租约已重新谈判。投资组合的其他租户也是民族品牌，如Camaïeu，Jennyfer或Tom＆Co</p>', 2, 1),
(12, 'icon_it9.jpg', NULL, NULL, '索菲特在布鲁塞尔为一家酒店集团进行的收购融资', 'INSURANCE建议一家酒店集团为收购布鲁塞尔索菲特酒店提供资金。', '<p class="text-black-50 mb-4">这家5*酒店拥有169间客房，包括10间套房，一间餐厅，一间豪华酒吧，一个露台，4个研讨会和宴会厅以及一间健身房。计划在2014年底开展扩建工作，为该机构提供一个水疗中心和两个额外的研讨会和宴会厅。<br><br>对于其在法国以外的第一笔购置款融资，SHIFT CAPITAL在交易的市场推广和展示阶段以及在获取指示性优惠阶段与潜在贷款人进行讨论时向酒店集团提供了建议。在谈判期间提供协助，并在整个交易过程中协调交易中的所有相关方。<br><br>SHIFT CAPITAL在营销和展示阶段以及与潜在贷款人的讨论中为Mata Capital提供了建议，并在整个交易期间协调并协助所有利益相关方的谈判。特别是，SHIFT CAPITAL帮助Mata Capital选择了可用于优化结构，融资量和财务状况的选项。</p><div class="d-flex justify-content-between my-4"><img class="w-50 mr-2"src="../images/c1.jpg"alt=""><img class="w-50"src="../images/c5.jpg"alt=""></div><p class="text-black-50 mb-4">马塔资本完成了一个投资额为6,700万欧元的零售投资组合的场外收购，产生6.45％的净收益。该组合由位于法国的46个资产（37,000平方米）组成，主要位于主要城市主要商业区的中心。<br><br>80％的投资组合被租赁给法国的儿童保育专家Aubert，新的10年租约已重新谈判。投资组合的其他租户也是民族品牌，如Camaïeu，Jennyfer或Tom＆Co</p>', 3, 1),
(11, 'icon_it8.png', NULL, 432553, '为美国养老基金重组1.14亿欧元', 'INSURANCE为其位于巴黎地区的三栋办公楼的投资组合融资策略提供建议，总面积达4万平方米。', '<p class="text-black-50 mb-4">Insurvance在营销和展示阶段以及与潜在贷款人的讨论中为Mata Capital提供了建议，并在整个交易期间协调并协助所有利益相关方的谈判。特别是，Insurvance帮助Mata Capital选择了可用于优化结构，融资量和财务状况的选项。</p><div class="d-flex justify-content-between my-4"><img class="w-50 mr-2"src="../images/c2.jpg"alt=""><img class="w-50"src="../images/c3.jpg"alt=""></div><p class="text-black-50 mb-4">马塔资本完成了一个投资额为6,700万欧元的零售投资组合的场外收购，产生6.45％的净收益。该组合由位于法国的46个资产（37,000平方米）组成，主要位于主要城市主要商业区的中心。<br><br>80％的投资组合被租赁给法国的儿童保育专家Aubert，新的10年租约已重新谈判。投资组合的其他租户也是民族品牌，如Camaïeu，Jennyfer或Tom＆Co<br>“通过实现本次交易，马塔资本确认其实现的业务都是超过市场自2015年11月推出公司完成收购几乎160米€表现能力，”行业基金经理劳伦特Delautre说MCHIPF＃1和Mata<br><br>作为这一交易的一部分，马塔资本由Allez＆ASSOCIES（威廉Chemithe）建议LPA-CGR律师（弗朗索瓦-雷吉斯法布尔-Falret，Chloe和ThiéblemontAlexae福尼尔-FAY）Sefal地产（洛朗Devriendt）进行技术尽职调查和Insurvance融资。<br><br>操作的银行融资由地产信贷银行经公证处Thibierge与合作伙伴和律师事务所K＆L盖茨（乔安娜KLAT爱德华·维特里，西尔维Chandesris）建议进行的。<br><br>在此次交易中，White Stone通过独家销售授权向卖家提供咨询，这再一次证明了其对私人和机构投资市场的强大控制。</p>\n', 3, 1),
(13, '2019/05/155680395929251.jpg', '2019-05/02/155680395929251.jpg', 1551283200, '12366', '123', '<p>666</p><p>44488</p><p>8</p><p><br/></p><p>55<br/></p>', 2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `i_cases_category`
--

CREATE TABLE IF NOT EXISTS `i_cases_category` (
  `cc_id` int(11) NOT NULL AUTO_INCREMENT,
  `cc_name` varchar(50) NOT NULL,
  PRIMARY KEY (`cc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `i_cases_category`
--

INSERT INTO `i_cases_category` (`cc_id`, `cc_name`) VALUES
(1, '战略咨询'),
(2, '结构资本'),
(3, '资产重组');

-- --------------------------------------------------------

--
-- 表的结构 `i_message`
--

CREATE TABLE IF NOT EXISTS `i_message` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(30) NOT NULL,
  `m_email` varchar(50) NOT NULL,
  `m_phone` varchar(30) NOT NULL,
  `m_content` text NOT NULL,
  `m_time` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='留言表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `i_message`
--

INSERT INTO `i_message` (`m_id`, `m_name`, `m_email`, `m_phone`, `m_content`, `m_time`, `u_id`) VALUES
(1, '123456', '132456@qq.com', '123456', 'O(∩_∩)O哈哈哈~', 1556079000, 4),
(2, '123456', '132456@qq.com', '123456', '~\\(≧▽≦)/~啦啦啦', 1556079000, 4),
(3, '123456', '132456@qq.com', '123456', '我想咨询电子商务网站建设。', 1556079000, 4),
(4, '123456', '132456@qq.com', '123456', '6666~', 1556079000, 4),
(5, '123456', '132456@qq.com', '123456', '哈哈哈~', 1556079000, 4),
(6, '123456', '132456@qq.com', '123456', 'O(∩_∩)O哈哈~', 1556079000, 4);

-- --------------------------------------------------------

--
-- 表的结构 `i_news`
--

CREATE TABLE IF NOT EXISTS `i_news` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `n_title` varchar(50) NOT NULL,
  `n_subtitle` varchar(100) NOT NULL,
  `n_time` int(11) DEFAULT NULL,
  `n_content` text NOT NULL,
  `n_isshow` tinyint(4) NOT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `i_news`
--

INSERT INTO `i_news` (`n_id`, `n_title`, `n_subtitle`, `n_time`, `n_content`, `n_isshow`) VALUES
(1, 'INSURANCE向Mata Capital提供收购融资建议', 'INSURANCE向Mata Capital提供了一项投资额为6700万欧元的零售投资组合家族办公室“离场”收购融资咨询', 1111, '<p class="text-black-50 mb-4">马塔资本完成了一个投资额为6,700万欧元的零售投资组合的场外收购，产生6.45％的净收益。该组合由位于法国的46个资产（37,000平方米）组成，主要位于主要城市主要商业区的中心。<br><br>80％的投资组合被租赁给法国的儿童保育专家Aubert，新的10年租约已重新谈判。投资组合的其他租户也是民族品牌，如Camaïeu，Jennyfer或Tom＆Co<br><br>作为这一交易的一部分，马塔资本由Allez＆ASSOCIES（威廉Chemithe）建议LPA-CGR律师（弗朗索瓦-雷吉斯法布尔-Falret，Chloe和ThiéblemontAlexae福尼尔-FAY）Sefal地产（洛朗Devriendt）进行技术尽职调查和Insurvance融资。<br><br>操作的银行融资由地产信贷银行经公证处Thibierge与合作伙伴和律师事务所K＆L盖茨（乔安娜KLAT爱德华·维特里，西尔维Chandesris）建议进行的。<br><br>在此次交易中，White Stone通过独家销售授权向卖家提供咨询，这再一次证明了其对私人和机构投资市场的强大控制。</p><div class="d-flex justify-content-between my-5"><img class="w-50 mr-2"src="../images/c5.jpg"alt=""><img class="w-50"src="../images/c1.jpg"alt=""></div><p class="text-black-50 mb-4">操作的银行融资由地产信贷银行经公证处Thibierge与合作伙伴和律师事务所K＆L盖茨（乔安娜KLAT爱德华·维特里，西尔维Chandesris）建议进行的。在此次交易中，White Stone通过独家销售授权向卖家提供咨询，这再一次证明了其对私人和机构投资市场的强大控制。</p>', 1),
(2, '债务咨询：周期性反应还是长期趋势？', 'Damien Giguet介绍了这项活动，该活动在法国尚未普及，但随着筹款流程的复杂性需要外包，该活动将发展。', 1111, '<p class="text-black-50 mb-4">达米安·盖格是独立房地产金融和金融工程咨询公司Insurvance的创始人。他向我们介绍了这项在法国尚未普及的活动，但随着筹款过程的复杂性需要外包，这种活动将会发展。</p><p class="text-black-50 font-weight-bold mb-4">债务咨询意味着什么，并且从什么时候开始这项活动是结构化的？<br><br>债务咨询是指债务市场中的咨询和中介活动。除了简单的经纪活动之外，还包括构建咨询服务，实施竞争性招标类流程和协助融资文件谈判，无论是融资业务。收购，再融资或债务重组。债务顾问在金融交易中扮演银行家的角色，在某些情况下可能需要完全支持融资职能，才能让投资者获得其团队。<br><br>操作的银行融资由地产信贷银行经公证处Thibierge与合作伙伴和律师事务所K＆L盖茨（乔安娜KLAT爱德华·维特里，西尔维Chandesris）建议进行的。</p><p class="text-black-50 mb-5">在法国，债务咨询是由银行业务和支付服务中的经纪人许可（COBSP）批准的受ACPR控制的受监管活动。虽然这项活动在盎格鲁撒克逊人和主要北美洲的世界已经存在了很多年，但它最近在欧洲大陆已经结构化，特别是在2008年危机和随后出现的信贷危机之后。随着银行业监管的加强和银行业务流程的加重，结构的复杂性以及运营商数量的增加，有必要创建平台来简化投资者的工作并优化在日益复杂的世界中融资的条件。</p><div class="d-flex justify-content-between my-5"><img class="mr-2"src="../images/bs3.jpg"alt=""><img class=""src="../images/bs4.jpg"alt=""><img class=""src="../images/bs2.jpg"alt=""></div><p class="text-black-50 font-weight-bold mb-4">投资者使用债务顾问的兴趣是什么？<br><br>除了向投资者客户提供的额外资源外，债务顾问通过每天与贷方进行的联系，了解市场上融资报价的全面性，价格以及目前贷款人对这种或那种产品的兴趣以及这些产品的内部运作。它的团队由前银行家或首席财务官/财务经理组成（理想情况下拥有两者）以建立业绩记录。因此，它可以通过优化其条件和执行时间来管理寻求资金的过程，同时带来安全性。此外，其作为受监管中介机构的地位使得透明化程序和消除潜在的利益冲突成为可能。<br><br>这些球员今天的市场份额是多少，前景如何？<br><br>据估计，目前在欧洲大陆，只有5％至10％的融资交易由债务顾问中介。如果北美的大牌现在几乎系统地在欧洲使用它们，即使态度发生变化，欧洲投资者也会以更简洁的方式来使用它们。今天，他们意识到筹款过程的内部管理需要越来越多的时间和资源，因此可以考虑更系统地外包这一功能，就像销售过程一样以前内部管理的资产现在系统地委托给投资经纪人。</p>', 1),
(3, '建议BMO房地产合伙公司资助首个收购其新的泛欧基金', 'INSURANCE代表BMO REP - Best Value Europe 1为BMO房地产合伙人（BMO REP）提供法律意见，为其在欧洲的首次收购提供资金。', 1111, '<p class="text-black-50 mb-4">代表BMO REP-Best Value Europe 1为BMO房地产合伙人（BMO REP）提供法律意见，为其在欧洲的首次收购提供资金。资产是零售和1750平方米的办公的大楼“旗舰”，位于15的Rue de la Paix酒店，由10个租户包括住房奢侈品牌登喜路，莫布森和范亭完全占据。该融资由欧洲信贷银行（BECM）实现。SHIFT CAPITAL建议BMO REP与BECM讨论，在谈判过程中协助并在整个交易过程中协调所有参与交易的各方。<br><br>Bouwfonds投资管理公司宣布其Bouwfonds欧洲房地产停车基金（BEREPF）成功再融资5000万欧元。<br><br>Rabo房地产集团的荷兰投资公司Bouwfonds Investment Management（Bouwfonds IM）宣布以5,000万欧元成功再融资泛欧基金BEREPF。SHIFT CAPITAL向Bouwfonds IM提供法律，英格兰，德国和西班牙12个停车场组合的再融资服务，代表6,000多个停车位。<br><br>该投资组合通过英格兰，法国和德国的三条抵押贷款线路进行再融资，总金额达5000万欧元：英格兰苏格兰皇家银行，法国雷姆（法国LFPCréancesImmobilières，以及德国的Sparkasse和BayernLB。<br><br>在此次交易中，White Parking Bouwfonds IM董事总经理Bart Pierik表示：“Bouwfonds IM很高兴在不同国家的贷款人的支持下进行再融资。他们可能会赞赏基金产生的回报的稳定性和稳定性。<br><br>Parking Bouwfonds IM董事总经理Bart Pierik表示：“Bouwfonds IM很高兴在不同国家的贷款人的支持下进行再融资。他们可能会赞赏基金产生的回报的稳定性和稳定性。<br><br>Bouwfonds IM董事总经理Jaap Gillis表示：“我们看到我们的客户对我们的停车基金非常感兴趣。贷款人对我们的停车场资金充满信心的事实加强了我们在整个欧洲投资和实施新项目的愿望。<br><br>我们建议BEREPF与潜在贷款人进行讨论，并在谈判期间协助他们，并在整个交易过程中协调交易的各方。<br><br>第一个专门投资停车场的房地产基金，BEREPF成立于2005年。BEREPF是一个非边际房地产基金，由Bouwfonds IM管理，拥有价值约2.6亿欧元的资产组合，代表机构投资者投资。该投资组合目前在德国，法国，西班牙，英国和荷兰设有19个停车场。</p><div class="d-flex justify-content-between my-5"><img class="w-50 mr-4"src="../images/c2.jpg"alt=""><img class="w-50"src="../images/c4.jpg"alt=""></div>', 1),
(4, 'insurance建议CeGeREAL再融资400万欧元', 'Insurance向CeGeReal提供了4亿欧元的再融资，用于2013年3月到期的所有银行债务。', 1111, '<p class="text-black-50 mb-4">CeGeREAL宣布2013年3月到期的所有银行债务为4亿欧元的再融资;Aareal Bank，Bayern LB，Deutsche Pfandbriefbank和Landesbank Berlin AG/Berlin Hyp在欧洲招标之后被选中。<br><br>该项业务的成功体现了CeGeREAL拥有的建筑质量，简单的控股结构以及金融合作伙伴对资产稳健性的信心。<br><br>这笔贷款支持的资产由三个办公楼组成，其面积为12万平方米，租金为81％。它包括Arcs de Seine，这是该地区首批获得HQE开发标签的网站之一。</p><div class="d-flex justify-content-center my-5"><img class="w-50"src="../images/c4.jpg"alt=""></div><p class="text-black-50 mb-4">CeGeREAL首席执行官RaphaëlTréguier评论说：“我们很高兴能够在困难的信贷环境中为CeGeREAL提前完成4亿欧元的再融资操作。随着Arcs de Seine搬迁的继续进行，这一行动的成功使得CeGeREAL在2012年剩下的时间里能够平静地接近。<br><br>CeGeREAL伴随Insurance（达Giguet），以便与银行由De Pardieu布洛卡马菲（Fatôme灵光，灵光CHAUVE）的法律和税务方面的谈判。律师事务所Godet Gaillard Solle Maraux＆Associates（Jean-Maurice Gaillard，ChloéThiéblemont）和Allez＆Associés的研究提供了贷款人的建议。</p>', 1),
(5, 'INSURVANCE建议Maranatha为获得一家新酒店提供融资', '向Maranatha酒店集团建议在布鲁塞尔为Sofitel Le Louise进行收购融资', 1111, '<p class="text-black-50 font-weight-bold mb-4">是否有特别适合此项活动的操作类型？</p><p class="text-black-50 mb-4">债务顾问在机会主义或增值业务和大型运营中带来最大价值，这需要银行业务池的介入，而这对于确保流程至关重要。董事会的报酬成为交易经济中的附属品。同样，它最大限度地提高了重组业务的价值，在这种情况下，通常需要第三方的干预来组织和确保交易，并在各方之间“缓冲”。也就是说，债务顾问可以被要求介入所有类型的项目，因为他们的干预几乎总是对融资的一般条件产生最优化的影响。</p><p class="text-black-50 font-weight-bold mb-4">今天的债务市场状况如何？中期预期是什么？</p><p class="text-black-50 mb-4">尽管去年年底长期利率有所上升，但市场仍在全球范围内开放，贷款人的胃口在今年年初得到确认。其他投资者的情况得到确认，保险公司越来越多，在未来12到24个月内开展收集工作的债务基金和可能出现的新基金。关于期望，每个委员会都有自己的房子观点。<br><br>在Insurvance，我们对代表全球经济预期和政治风险的长期利率的演变保持警惕，特别是由于欧洲和美国的新政策。如果他们增加得太快，这将不可避免地对资产产生重新定价效应，并可能对银行流动性产生影响。但是，在目前的配置下，很难对市场发展有良好的可预测性。</p>', 1);

-- --------------------------------------------------------

--
-- 表的结构 `i_partner`
--

CREATE TABLE IF NOT EXISTS `i_partner` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_title` varchar(50) NOT NULL,
  `p_img` varchar(100) NOT NULL,
  `p_link` varchar(100) NOT NULL,
  `p_isshow` tinyint(4) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `i_partner`
--

INSERT INTO `i_partner` (`p_id`, `p_title`, `p_img`, `p_link`, `p_isshow`) VALUES
(1, '1', 'brand1.jpg', '1', 1),
(3, '1', 'brand2.jpg', '1', 1),
(4, '1', 'brand3.jpg', '1', 1),
(5, '1', 'brand4.jpg', '1', 1),
(6, '1', 'brand5.jpg', '1', 1),
(7, '1', 'brand1.jpg', '3123', 1);

-- --------------------------------------------------------

--
-- 表的结构 `i_recruit`
--

CREATE TABLE IF NOT EXISTS `i_recruit` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_title` varchar(50) NOT NULL,
  `r_content` text NOT NULL,
  `r_time` int(11) NOT NULL,
  `r_img` varchar(50) NOT NULL DEFAULT 'icon.jpg',
  `r_isshow` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `i_recruit`
--

INSERT INTO `i_recruit` (`r_id`, `r_title`, `r_content`, `r_time`, `r_img`, `r_isshow`) VALUES
(1, '2016年应届毕业生（第三批）招聘通知', '学习经历：1980年至1986年，就读于北京医科大学，1986年获医学学士学位；1986年至1991年，在中国协和医科大学以及北京协和医院攻读博士学位，1991年获临床医学博士学位。<br><br>职务经历：在1995年至1999年期间在美国进修做博士后研究。曾任北京协和医院心内科副主任及兼任北京协和医院临床药理研究中心主任。现任北京协和医院副院长兼临床药理研究中心主任。', 11, 'icon.jpg', 1),
(2, '“千人计划”招聘启事（2016年7月4日）', '学习经历：1980年至1986年，就读于北京医科大学，1986年获医学学士学位；1986年至1991年，在中国协和医科大学以及北京协和医院攻读博士学位，1991年获临床医学博士学位。<br><br>职务经历：在1995年至1999年期间在美国进修做博士后研究。曾任北京协和医院心内科副主任及兼任北京协和医院临床药理研究中心主任。现任北京协和医院副院长兼临床药理研究中心主任。', 1, 'icon.jpg', 1),
(3, '医院护士招聘启事', '<p>学习经历：1980年至1986年，就读于北京医科大学，1986年获医学学士学位；1986年至1991年，在中国协和医科大学以及北京协和医院攻读博士学位，1991年获临床医学博士学位。<br/><br/>职务经历：在1995年至1999年期间在美国进修做博士后研究。曾任北京协和医院心内科副主任及兼任北京协和医院临床药理研究中心主任。现任北京协和医院副院长兼临床药理研究中心主任。</p>', -28800, 'icon.jpg', 1);

-- --------------------------------------------------------

--
-- 表的结构 `i_servies`
--

CREATE TABLE IF NOT EXISTS `i_servies` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_img` varchar(100) DEFAULT NULL,
  `s_thumb` varchar(100) DEFAULT NULL,
  `s_title` varchar(50) NOT NULL,
  `s_subtitle` varchar(200) NOT NULL,
  `s_content` text NOT NULL,
  `s_isshow` tinyint(4) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `i_servies`
--

INSERT INTO `i_servies` (`s_id`, `s_img`, `s_thumb`, `s_title`, `s_subtitle`, `s_content`, `s_isshow`) VALUES
(1, 'icon_it1.png', NULL, '融资咨询', '我们帮助借款人通过收购，发展和外部增长，再融资和财务重组来为其资产和项目筹集债务。', '<p class="text-black-50 mb-1">我们帮助借款人通过收购，发展和外部增长，再融资和财务重组来为其资产和项目筹集债务。</p><p class="text-black-50 mb-1">我们可以构建和协调银行融资，汇集银行和替代贷方，构建涉及负债结构不同要素（高级/夹层/股权）的交易，并就这些不同利益相关者之间的协议进行谈判。</p><p class="text-black-50 mb-1">我们可以采取各种行业，策略和产品：销售或切割，住宅，办公室，商店，物流，商业场所，酒店或房地产的健康或休闲。</p><hr class="my-5"><h5 class="mb-4">行业聚焦</h5><p class="text-black-50 pb-4">提供借款人在一个不同范围的行业。医疗保健公司的服务由一个专门的团队的专家</p><hr class="my-5"><div class="row"><h6 class="col-4">选定的重点领域：</h6><div class="col-4"><p class="text-black-50">-消费产品</p><p class="text-black-50">-特种化学品</p><p class="text-black-50">-分配</p><p class="text-black-50">-专业零售</p><p class="text-black-50">-食品与饮料</p><p class="text-black-50">-技术，媒体和电信（选定地区)</p></div><div class="col-4"><p class="text-black-50">-航空航天与国防</p><p class="text-black-50">-一般制造业</p><p class="text-black-50">-售后汽车</p><p class="text-black-50">-工业和基础设施</p><p class="text-black-50">-商业服务</p><p class="text-black-50">-打包</p></div></div><hr class="my-5"><p class="text-black-50"><img class="w-100"src="../images/bs1.jpg"alt=""></p><h6 class="my-4">一般工业</h6><p class="text-black-50">我们的通用工业团队拥有专业构造，理解和管理更广泛经济领域的投资。</p>', 1),
(2, 'icon_it2.png', NULL, '资本结构', '我们构建的结构可以采取合资企业，优先资本交易和结构化合作关系的形式。', '<h5 class="mb-4">投资组合和流程</h5><p class="text-black-50 mb-4">我们帮助运营商和投资者识别和构建各类项目的合作关系。我们构建的结构可以采取合资企业，优先资本交易和结构化合作关系的形式。<br><br>我们经营的情况可能包括发展或重建项目，资本重组业务，重组或收购资产或债务组合。<br><br>由于拥有庞大的夹层资金网络，机会性和特殊情况，我们将我们的经验和行动者的知识结合起来，为客户服务，从而创造价值，从而使财务资源及其结构适应项目提交给我们。</p><div class="mt-5 mr-2 d-flex flex-wrap"><img class="mw-100"src="../images/bs2.jpg"alt=""><img class="mw-100"src="../images/bs3.jpg"alt=""></div>', 1),
(3, 'icon_it3.png', NULL, '资金重组', '我们在房地产投资和金融方面的经验使我们能够就大量问题承担战略咨询的任务。', '<h5 class="mb-4">资金重组</h5><p class="text-black-50 mb-4">我们帮助借款人和贷款人重新调整财务资源以适应业务计划的发展</p><hr class="my-5"><p class="text-black-50 mb-0">作为值得信赖的第三方参与危机退出的战略方面和业务计划，我们帮助借款人确定重新安排，调整规模和为难度较大或其进展已经消失的新的出资解决方案。原来的商业计划。</p><p class="text-black-50 mb-4">我们与我们客户的专业法律团队合作。</p><p class="text-black-50 mb-4">我们对金融结构问题以及我们的基金和专业投资者网络以及我们的完全独立性的了解使我们能够提供务实和有效的解决方案，从而使金融资源最适合我们客户的问题。</p><hr class="my-5"><div class="mr-2 d-flex flex-wrap"><img class="mw-100"src="../images/bs3.jpg"alt=""><img class="mw-100"src="../images/bs4.jpg"alt=""></div>', 1),
(4, 'icon_it11.png', NULL, '战略咨询', '我们在房地产投资和金融方面的经验使我们能够就大量问题承担战略咨询的任务。我们协助客户确定其投资策略和/或融资。', '<h5 class="mb-4">战略咨询</h5><p class="text-black-50 mb-4">从我们的投资和房地产融资经验中受益</p><hr class="my-5"><p class="text-black-50 mb-4">我们在房地产投资和金融方面的经验使我们能够就大量问题承担战略咨询的任务。</p><p class="text-black-50 mb-4">我们协助客户确定其投资策略和/或融资。我们还致力于合作伙伴和当地运营商的组织，定价和选择，以进行创意，资产管理或服务。最后，我们介入复杂的销售交易，从搜索收单机构到谈判文件和交易管理，直至完成交易。</p><p class="text-black-50 mb-4">我们庞大的泛欧投资者和金融家网络，我们团队成员的个人经验，从各种交易对手的众多交易中受益，以及他们对不同组织和文化的经验，使我们能够提供帮助充其量我们的客户巩固和发展他们的业务。</p><hr class="my-5"><div class="mr-2 d-flex flex-wrap"><img class="mw-100"src="../images/bs2.jpg"alt=""><img class="mw-100"src="../images/bs3.jpg"alt=""></div>', 1);

-- --------------------------------------------------------

--
-- 表的结构 `i_teams`
--

CREATE TABLE IF NOT EXISTS `i_teams` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_img` varchar(100) NOT NULL,
  `t_thumb` varchar(100) NOT NULL,
  `t_name` varchar(50) NOT NULL,
  `t_job` varchar(50) NOT NULL,
  `t_content` text NOT NULL,
  `t_isshow` tinyint(4) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `i_teams`
--

INSERT INTO `i_teams` (`t_id`, `t_img`, `t_thumb`, `t_name`, `t_job`, `t_content`, `t_isshow`) VALUES
(1, 'character1.jpg', '', '鲍比・布尔茹瓦', '首席执行官', '<p class="text-black-50 mb-4">鲍比・布尔茹瓦是Insurance的首席执行官和董事会成员。他也是该公司投资委员会的成员</p><p class="text-black-50 mb-4">is the Chief Executive Officer of Insurance and a member of its Board of Directors.He is also a member of the firm’s Investment Committee.</p><p class="text-black-50 mb-4">沃尔特在中间市场杠杆融资的各个方面拥有丰富的经验，并在他35年的职业生涯中领导了多个成功的贷款和资产管理业务。在加入Insurance之前，他曾在通用电气资本，CIT和道明银行集团担任高级领导职务。</p><p class="text-black-50 mb-4">Walter has deep experience in all aspects of middle market leveraged finance and has led multiple successful lending and asset management businesses over his 35-year career.Prior to Varagon,he held senior leadership roles at GE Capital,CIT,and TD Bank Group.</p><p class="text-black-50 mb-4">他拥有一个B.S.来自维拉诺瓦大学和纽约大学斯特恩商学院的M.B.A.</p><p class="text-black-50 mb-4">He holds a B.S.from Villanova University and an M.B.A.from New York University’s Stern School of Business.</p>', 1),
(2, 'character2.jpg', '', '沃尔特・欧文斯', '首席财务官&合伙人', '<p class="text-black-50 mb-4">Brett Shapiro是Insurvance的合伙人，领导其产品战略和企业发展团队。他也是该公司投资委员会的成员。</p><p class="text-black-50 mb-4">Brett Shapiro is a Partner of Varagon and leads its Product Strategy&Corporate Development team.He is also a member of the firm’s Investment Committee.</p><p class="text-black-50 mb-4">他在瑞银投资银行金融机构集团开始其职业生涯，在那里他为银行，专业金融，资产管理和金融技术客户提供战略咨询服务。</p><p class="text-black-50 mb-4">He began his career in the Financial Institutions Group at UBS Investment Bank,where he provided strategic advisory services to bank,specialty finance,asset management,and financial technology clients.</p><p class="text-black-50 mb-4">他获得了A.B.普林斯顿大学学士学位，获得本德海姆金融中心颁发的证书。</p><p class="text-black-50 mb-4">He earned an A.B.degree from Princeton University with a certificate from the Bendheim Center for Finance.</p>', 1),
(3, 'character3.jpg', '', '凯文・马凯蒂', '承销和组合管理负责人', '<p class="text-black-50 mb-4">在中型市场杠杆融资和资本市场方面拥有超过25年的经验，并且他的职业生涯始于创业，结构化，承保和联合交易，以支持私募股权客户。在加入Insurvance之前，Jeff曾任美国资本（ACAS）资本市场董事总经理兼集团主管。</p><p class="text-black-50 mb-4">Jeff has over 25 years of experience in middle market leveraged finance and capital markets,and has spent his career originating,structuring,underwriting and syndicating transactions in support of private equity clients.</p><p class="text-black-50 mb-4">他还曾在苏格兰皇家银行，加拿大皇家银行和海勒金融的杠杆贷款和资本市场部门担任过职位。</p><p class="text-black-50 mb-4">He has also held positions in the Leveraged Lending and Capital Markets groups of The Royal Bank of Scotland,The Royal Bank of Canada,and Heller Financial.</p><p class="text-black-50 mb-4">他获得了B.A.来自霍夫斯特拉大学和福特汉姆大学的M.B.A.</p><p class="text-black-50 mb-4">He earned a B.A.degree from Hofstra University and an M.B.A.from Fordham University.</p>', 1),
(4, 'character4.jpg', '', '路易斯・纳塔莱', '医疗组合主管', '<p class="text-black-50 mb-4">Steve Warden是Varagon的合伙人，领导其在医疗行业的活动。</p><p class="text-black-50 mb-4">Steve Warden is a Partner of Varagon and leads its activities in the Healthcare industry.</p><p class="text-black-50 mb-4">史蒂夫在医疗保健方面拥有深厚的专业知识，并在Varagon拥有超过30年的杠杆融资经验.在加入Insurvance之前，他曾担任CIT Healthcare的总裁兼联合创始人，并将他发展成为市场领先的杠杆融资特许经营业务，并拥有前三名主管职位。</p><p class="text-black-50 mb-4">Steve brings deep expertise in Healthcare and over 30 years of leveraged finance experience to Varagon.Prior to joining Insurvance,he was President and Co-Founder of CIT Healthcare,which he developed into a market-leading leveraged finance franchise with a top 3 lead arranger position.</p>', 1),
(5, 'character5.jpg', '', '玛丽娜・格林', '营销和投资者关系主管', '<p class="text-black-50 mb-4">在加入Varagon之前，Marina曾担任贝莱德替代战略集团的董事总经理，在那里她为对冲基金和私人信贷募集资金。</p><p class="text-black-50 mb-4">Prior to joining Varagon,Marina was a Managing Director of BlackRock’s Alternative Strategies group,where she raised capital for hedge fund and private credit offerings.</p><p class="text-black-50 mb-4">此前，她曾在安克雷奇资本集团工作，负责管理公司与一系列国内外机构投资者的关系，包括养老金计划，捐赠基金和基金以及主权财富基金。</p><p class="text-black-50 mb-4">Previously,she was with Anchorage Capital Group,where she managed the firm’s relationships with a range of domestic and foreign institutional investors,including pension plans,endowments,foundations and sovereign wealth funds.</p><p class="text-black-50 mb-4">她拥有麦吉尔大学商学士学位和哥伦比亚商学院硕士学位。</p><p class="text-black-50 mb-4">Steve Warden is a Partner of Varagon and leads its activities in the Healthcare industry.<br>She earned a Bachelors of Commerce degree from McGill University and an M.B.A.from Columbia Business School.</p>', 1);

-- --------------------------------------------------------

--
-- 表的结构 `i_user`
--

CREATE TABLE IF NOT EXISTS `i_user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` int(11) NOT NULL,
  `u_real` int(11) DEFAULT NULL,
  `u_password` varchar(32) NOT NULL,
  `u_sex` tinyint(2) DEFAULT NULL,
  `u_phone` varchar(18) DEFAULT NULL,
  `u_email` int(11) DEFAULT NULL,
  `u_birthday` int(11) DEFAULT NULL,
  `u_photo` int(11) DEFAULT NULL,
  `u_thumb` int(11) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `i_user`
--

INSERT INTO `i_user` (`u_id`, `u_name`, `u_real`, `u_password`, `u_sex`, `u_phone`, `u_email`, `u_birthday`, `u_photo`, `u_thumb`) VALUES
(1, 123456, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 654321, NULL, 'c33367701511b4f6020ec61ded352059', NULL, '1371555645', NULL, NULL, NULL, NULL),
(5, 111111, NULL, '96e79218965eb72c92a549dd5a330112', NULL, '13711111', NULL, NULL, NULL, NULL),
(7, 1231231, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, '13711111111', NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
