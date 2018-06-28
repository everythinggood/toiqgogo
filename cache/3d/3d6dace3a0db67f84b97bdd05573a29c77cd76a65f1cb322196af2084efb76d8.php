<?php

/* /font/index.phtml */
class __TwigTemplate_2ece62929d8a5cb029d016938540fa52ae91573a8d2b6887fea0677617cf9fdb extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>

<head>

    <title>纸色免费纸巾</title>

    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />

    <meta name=\"keywords\" content=\"纸色,免费纸巾,纸色免费纸巾,共享纸巾,免费纸巾机器,免费纸巾加盟,免费纸巾招商,免费纸巾合作,免费纸巾代理,免费纸巾投资,共享纸巾机\">

    <meta name=\"description\" content=\"纸色免费纸巾是广州智谷科技有限公司旗下的创新互联网科技项目之一。其整合媒体、广告等资源，为广大民众提供便利的生活环境，为广告合作商提供更为便捷有效的宣传渠道。\">

    <link rel=\"shortcut icon\" href=\"/assets/header_logo.png\" >

    <link rel=\"stylesheet\" href=\"http://cdn.amazeui.org/amazeui/2.7.2/css/amazeui.min.css\">

    <!-- <link rel=\"stylesheet\" href=\"css/style.css\"> -->

    <link rel=\"stylesheet\" href=\"/css/index.css?v=20180611\">

    <link rel=\"stylesheet\" href=\"/css/animate.css\">  


</head>


<body>

<script type='text/javascript'>

    function active(event){

        \$('.active').removeClass('active');

        var rel = \$(event).attr('rel');
        console.log(rel);
        \$('.'+rel).addClass('active');


        if(document.getElementsByClassName('active').length < 1){

            \$('.first').addClass('active');
        }
    }
</script>

<div class='main'>

    <div class=\"header wow bounceInUp\">
        <a href=\"#\" name='first'></a>
        <img src=\"/assets/first.png\" alt=\"\" class=\"first\" width=\"100%\">

        <img src=\"/assets/header_logo.png\" alt=\"\" class='header_logo'>

        <nav class=\"nav_header wow bounceInDown\">
            <a href=\"#first\" class=\"first active\" rel=\"first\" onclick=\"active(this)\">首页</a>
            <a href=\"#second\" onclick=\"active(this)\" rel=\"second\" class=\"second\">价值观</a>
            <a href=\"#third\" class=\"third\" rel=\"third\" onclick=\"active(this)\">商户合作</a>
            <a href=\"#fourth\" class=\"fourth\" rel=\"fourth\" onclick=\"active(this)\">广告投放</a>
            <a href=\"#five\" class=\"five\" rel=five\"\" onclick=\"active(this)\">关于我们</a>
            <a href=\"#six\" class=\"six\" rel=\"six\" onclick=\"active(this)\">联系我们</a>
        </nav>

        <div class=\"header_tip\"><p>纸色免费纸巾机,是集合手帕纸巾派送，</p>
                <p>广告展示为一体的互联网科技设备</p></div>
    </div>

    <a href=\"#\" name=\"second\"></a>
    <img src=\"/assets/second.png\" alt=\"\" class=\"second wow bounceInDown\" width=\"100%\">
    <a href=\"#\" name=\"third\"></a>
    <img src=\"/assets/third.png\" alt=\"\" class=\"third wow bounceInDown\" width=\"100%\">
    <a href=\"#\" name=\"fourth\"></a>
    <img src=\"/assets/fourth.png\" alt=\"\" class=\"fourth wow bounceInUp\" width=\"100%\">
    <a href=\"#\" name=\"five\"></a>
    <img src=\"/assets/five.png\" alt=\"\" class=\"five wow bounceInUp\" width=\"100%\">
    <a href=\"#\" name=\"six\"></a>
    <img src=\"/assets/six.png\" alt=\"\" class=\"six wow bounceInUp\" width=\"100%\">

    <div class=\"footer wow bounceInDown\">

        <a href=\"#\" name=\"footer\"></a>
        <!-- <img src=\"/assets/footer.png\" alt=\"\" class=\"footer\" width=\"100%\"> -->
        <img src=\"/assets/footer_logo.png\" alt=\"footer_logo\" class=\"footer_logo\" width=\"5%\">

        <nav class=\"nav_footer wow bounceInUp\">
            <a href=\"#first\" class=\"first active\" rel=\"first\" onclick=\"active(this)\">首页</a>
            <a href=\"#second\" onclick=\"active(this)\" rel=\"second\" class=\"second\">价值观</a>
            <a href=\"#third\" class=\"third\" rel=\"third\" onclick=\"active(this)\">商户合作</a>
            <a href=\"#fourth\" class=\"fourth\" rel=\"fourth\" onclick=\"active(this)\">广告投放</a>
            <a href=\"#five\" class=\"five\" rel=\"five\" onclick=\"active(this)\">关于我们</a>
            <a href=\"#six\" class=\"six\" rel=\"six\" onclick=\"active(this)\">联系我们</a>
        </nav>

        <ul class=\"left_text_view wow slideInLeft\">
            <li>电话：<span>400 1399 330</span></li>
            <li>地址：<span>广州市海珠区黄埔古港历史文化景观区石基路528号首层</span></li>
            <li>商业咨询邮件：<span>E-mail.IQGOGO@yeah.net</span></li>
        </ul>

        <ul class=\"right_text_view wow slideInRight\">
            <li>客服热线：<span>18027133575</span></li>
            <li>公司名称：<span>广州智谷科技有限责任公司</span></li>
            <li>工商登记号码：<span>563-81-00723</span></li>
        </ul>

        <div class=\"IP_text\">Copyright 广州智谷科技有限公司All rights reserved. 粤ICP备18042175号-1</div> -->

    </div>



</div>

<a href=\"#first\" id=\"gototop\" title=\"回到顶部\" class=\"am-icon-arrow-up am-active\" rel='first ' style=\"position: fixed;bottom: 5%;right: 1%;\"></a>

<script src=\"https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js\"></script>
<script src=\"/js/wow.min.js\"></script>
<script src=\"/js/elevator.min.js\"></script>

<script type='text/javascript'>

    \$(function(){


        var locationHref = window.location.href;

        var hrefArr = ['first','second','third','fourth','five','six'];

        \$('.active').removeClass('active');

        for (var i = 0; i < hrefArr.length; i++) {
            if(locationHref.indexOf(hrefArr[i]) !== -1){
                \$('.'+hrefArr[i]).addClass('active');
            }
        }


        if(document.getElementsByClassName('active').length < 1){

            \$('.first').addClass('active');
        }
    })

    new WOW().init();

    \$('#gototop').hide();

    \$(window).scroll(function() {
        if (\$(window).scrollTop() >= 300) {
            \$('#gototop').fadeIn(600);
        } else {
            \$('.gototop').fadeOut(600);
        }
    });

    \$('#gototop').click(function(){
        \$(\"html,body\").animate({
            scrollTop: 0
        }, 500);

        active(this);
    });


</script>


</body>

</html>
";
    }

    public function getTemplateName()
    {
        return "/font/index.phtml";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<html>

<head>

    <title>纸色免费纸巾</title>

    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />

    <meta name=\"keywords\" content=\"纸色,免费纸巾,纸色免费纸巾,共享纸巾,免费纸巾机器,免费纸巾加盟,免费纸巾招商,免费纸巾合作,免费纸巾代理,免费纸巾投资,共享纸巾机\">

    <meta name=\"description\" content=\"纸色免费纸巾是广州智谷科技有限公司旗下的创新互联网科技项目之一。其整合媒体、广告等资源，为广大民众提供便利的生活环境，为广告合作商提供更为便捷有效的宣传渠道。\">

    <link rel=\"shortcut icon\" href=\"/assets/header_logo.png\" >

    <link rel=\"stylesheet\" href=\"http://cdn.amazeui.org/amazeui/2.7.2/css/amazeui.min.css\">

    <!-- <link rel=\"stylesheet\" href=\"css/style.css\"> -->

    <link rel=\"stylesheet\" href=\"/css/index.css?v=20180611\">

    <link rel=\"stylesheet\" href=\"/css/animate.css\">  


</head>


<body>

<script type='text/javascript'>

    function active(event){

        \$('.active').removeClass('active');

        var rel = \$(event).attr('rel');
        console.log(rel);
        \$('.'+rel).addClass('active');


        if(document.getElementsByClassName('active').length < 1){

            \$('.first').addClass('active');
        }
    }
</script>

<div class='main'>

    <div class=\"header wow bounceInUp\">
        <a href=\"#\" name='first'></a>
        <img src=\"/assets/first.png\" alt=\"\" class=\"first\" width=\"100%\">

        <img src=\"/assets/header_logo.png\" alt=\"\" class='header_logo'>

        <nav class=\"nav_header wow bounceInDown\">
            <a href=\"#first\" class=\"first active\" rel=\"first\" onclick=\"active(this)\">首页</a>
            <a href=\"#second\" onclick=\"active(this)\" rel=\"second\" class=\"second\">价值观</a>
            <a href=\"#third\" class=\"third\" rel=\"third\" onclick=\"active(this)\">商户合作</a>
            <a href=\"#fourth\" class=\"fourth\" rel=\"fourth\" onclick=\"active(this)\">广告投放</a>
            <a href=\"#five\" class=\"five\" rel=five\"\" onclick=\"active(this)\">关于我们</a>
            <a href=\"#six\" class=\"six\" rel=\"six\" onclick=\"active(this)\">联系我们</a>
        </nav>

        <div class=\"header_tip\"><p>纸色免费纸巾机,是集合手帕纸巾派送，</p>
                <p>广告展示为一体的互联网科技设备</p></div>
    </div>

    <a href=\"#\" name=\"second\"></a>
    <img src=\"/assets/second.png\" alt=\"\" class=\"second wow bounceInDown\" width=\"100%\">
    <a href=\"#\" name=\"third\"></a>
    <img src=\"/assets/third.png\" alt=\"\" class=\"third wow bounceInDown\" width=\"100%\">
    <a href=\"#\" name=\"fourth\"></a>
    <img src=\"/assets/fourth.png\" alt=\"\" class=\"fourth wow bounceInUp\" width=\"100%\">
    <a href=\"#\" name=\"five\"></a>
    <img src=\"/assets/five.png\" alt=\"\" class=\"five wow bounceInUp\" width=\"100%\">
    <a href=\"#\" name=\"six\"></a>
    <img src=\"/assets/six.png\" alt=\"\" class=\"six wow bounceInUp\" width=\"100%\">

    <div class=\"footer wow bounceInDown\">

        <a href=\"#\" name=\"footer\"></a>
        <!-- <img src=\"/assets/footer.png\" alt=\"\" class=\"footer\" width=\"100%\"> -->
        <img src=\"/assets/footer_logo.png\" alt=\"footer_logo\" class=\"footer_logo\" width=\"5%\">

        <nav class=\"nav_footer wow bounceInUp\">
            <a href=\"#first\" class=\"first active\" rel=\"first\" onclick=\"active(this)\">首页</a>
            <a href=\"#second\" onclick=\"active(this)\" rel=\"second\" class=\"second\">价值观</a>
            <a href=\"#third\" class=\"third\" rel=\"third\" onclick=\"active(this)\">商户合作</a>
            <a href=\"#fourth\" class=\"fourth\" rel=\"fourth\" onclick=\"active(this)\">广告投放</a>
            <a href=\"#five\" class=\"five\" rel=\"five\" onclick=\"active(this)\">关于我们</a>
            <a href=\"#six\" class=\"six\" rel=\"six\" onclick=\"active(this)\">联系我们</a>
        </nav>

        <ul class=\"left_text_view wow slideInLeft\">
            <li>电话：<span>400 1399 330</span></li>
            <li>地址：<span>广州市海珠区黄埔古港历史文化景观区石基路528号首层</span></li>
            <li>商业咨询邮件：<span>E-mail.IQGOGO@yeah.net</span></li>
        </ul>

        <ul class=\"right_text_view wow slideInRight\">
            <li>客服热线：<span>18027133575</span></li>
            <li>公司名称：<span>广州智谷科技有限责任公司</span></li>
            <li>工商登记号码：<span>563-81-00723</span></li>
        </ul>

        <div class=\"IP_text\">Copyright 广州智谷科技有限公司All rights reserved. 粤ICP备18042175号-1</div> -->

    </div>



</div>

<a href=\"#first\" id=\"gototop\" title=\"回到顶部\" class=\"am-icon-arrow-up am-active\" rel='first ' style=\"position: fixed;bottom: 5%;right: 1%;\"></a>

<script src=\"https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js\"></script>
<script src=\"/js/wow.min.js\"></script>
<script src=\"/js/elevator.min.js\"></script>

<script type='text/javascript'>

    \$(function(){


        var locationHref = window.location.href;

        var hrefArr = ['first','second','third','fourth','five','six'];

        \$('.active').removeClass('active');

        for (var i = 0; i < hrefArr.length; i++) {
            if(locationHref.indexOf(hrefArr[i]) !== -1){
                \$('.'+hrefArr[i]).addClass('active');
            }
        }


        if(document.getElementsByClassName('active').length < 1){

            \$('.first').addClass('active');
        }
    })

    new WOW().init();

    \$('#gototop').hide();

    \$(window).scroll(function() {
        if (\$(window).scrollTop() >= 300) {
            \$('#gototop').fadeIn(600);
        } else {
            \$('.gototop').fadeOut(600);
        }
    });

    \$('#gototop').click(function(){
        \$(\"html,body\").animate({
            scrollTop: 0
        }, 500);

        active(this);
    });


</script>


</body>

</html>
", "/font/index.phtml", "/var/www/slim/templates/font/index.phtml");
    }
}
