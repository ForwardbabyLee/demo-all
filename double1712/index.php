<?php
/**
 * Created by PhpStorm.
 * User: mayling
 * Date: 17/12/6
 * Time: 下午4:26
 */
//$this->title = "12.12年终盛典 钜惠全网";
//$this->registerMetaTag(['charset' => 'UTF-8']);
//$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no']);
//$this->registerMetaTag(['description' => '四重好礼惊喜不停，全场项目最高三倍积分，积分商城爆款八折兑换，更有抢标、压标王12.12现金红包及全民大抽奖，等你来']);
//$this->registerMetaTag(['keywords' => '最高三倍积分、爆款八折、现金红包、全民大抽奖']);
//$this->registerMetaTag(['name' => 'format-detection', 'content' => 'telephone=no']);
//$this->registerJsFile('/static/jquery/jquery-1.11.1.min.js', ['position' => 1]);
//$this->registerCssFile('/static/default/common/css/base.css?v=1.2', ['position' => 1]);
//$this->registerCssFile('/static/default/common/css/comfont.css', ['position' => 1]);
//$this->registerCssFile('/static/default/double1712/css/index.css?v=0.0003', ['position' => 1]);
//$this->registerJsFile('/static/default/common/js/common.js', ['position' => 1]);
//$this->registerJsFile('/static/default/common/js/appparams-base64.min.js?v=2', ['position' => 3]);
//$this->registerJsFile('https://res.wx.qq.com/open/js/jweixin-1.0.0.js', ['position' => 3]);
//$this->registerJsFile('/static/default/common/js/weixinShare.min.js?v=1.5', ['position' => 3]);
//$this->registerJsFile('/static/jquery/fastclick.js', ['position' => 1]);
//$this->registerJs('var data =  ' . json_encode($signPackage) . ';', 3);
//$this->registerJs('data.title = "12.12年终盛典 钜惠全网";data.desc = "全场项目最高三倍积分，积分商城爆款八折兑换，更有现金红包及全民大抽奖等你来";data.pathname="/active/double1712";data.imgurl = "/static/default/double1712/images/share-icon.png";', 3);
//$this->registerJs('winxinSahre(data);', 3);
?>
<!--double -->
<div class="flex-content ">
    <div class="banner">
        <a class="fadeInDown icon-rule">
            <img src="/static/default/double1712/images/rule-icon.png" alt="">
        </a>
    </div>
    <ul class="main-box">
        <li class="go-to-prize">
            <div class="yellow-bg"></div>
            <img src="/static/default/double1712/images/draw-title.png" alt="" class="draw-title">
            <div class="draw clearfix">
                <div class="lf-select select">
                    <span class="content"></span>
                    <span class="content-mask"></span>
                    <i class="text">零食大礼包</i>
                </div>
                <div class="rg-select select">
                    <span class="content"></span>
                    <span class="content-mask"></span>
                    <i class="text">谢谢参与</i>
                </div>
            </div>
            <p class="chance">抽奖次数：<span class="nums">0</span></p>
            <a class="draw-btn" href='/user/login?from=/active/double1712' app-viewtype="login" success-url="/active/double1712">立即抽奖</a>
        </li>
        <li class="go-to-invest">
            <a class="btn" href="/site/getlists" app-viewtype="list" select-index="0" inner-index="0" >立即投资</a>
        </li>
        <li class="go-to-exchange">
            <a class="btn">立即兑换</a>
        </li>
    </ul>
    <img class="point-title" src="/static/default/double1712/images/title-3-points.png">
    <div class="my-tips">
        <a class="my-prize" href='/user/login?from=/active/double1712' app-viewtype="login" success-url="/active/double1712">
            <i class="my-prize-icon"></i>我的奖品
        </a>
        <a class="my-rate">
            <span class="money-txt">已累计年化：</span>
            <span class="money">0万</span>
            <i class="money-icon">
                <p class="formula">年化投资金额 ＝投资金额＊项目期限／360</p>
                <span class="trans" ></span>
            </i>
        </a>
    </div>
    <ul class="invest-box clearfix">
        <li><a href="/site/getlists" app-viewtype="list" select-index="0" inner-index="0" ><img src="/static/default/double1712/images/first-gifts.png" alt=""><span class="title-gifts">年化投资额500万元</span></a></li>
        <li><a href="/site/getlists" app-viewtype="list" select-index="0" inner-index="0" ><img src="/static/default/double1712/images/second-gifts.png" alt=""><span class="title-gifts">年化投资额100万元</span></a></li>
        <li><a href="/site/getlists" app-viewtype="list" select-index="0" inner-index="0" ><img src="/static/default/double1712/images/third-gifts.png" alt=""><span class="title-gifts">年化投资额50万元</span></a></li>
        <li><a href="/site/getlists" app-viewtype="list" select-index="0" inner-index="0" ><img src="/static/default/double1712/images/fourth-gifts.png" alt=""><span class="title-gifts">年化投资额20万元</span></a></li>
        <li><a href="/site/getlists" app-viewtype="list" select-index="0" inner-index="0" ><img src="/static/default/double1712/images/five-gifts.png" alt=""><span class="title-gifts">年化投资额5万元</span></a></li>
    </ul>
    <div class="prize-list">
        <p class="prize-list-title">获奖名单</p>
        <ul class="list"></ul>
    </div>
    <p class="bottom-tip">本活动最终解释权归旺财谷所有</p>
    <p class="register-bg"></p>
    <a href="/user/signup?src=double1712" class="register clearfix" app-viewtype="register" register-channel="double1712">
        <img src="/static/default/double1712/images/register-banner.png" alt="">
    </a>
</div>
<!--弹窗-->
<div class="prizes-box">
    <!--机会不足弹窗-->
    <div class="outer-box no-have-chance">
        <img src="/static/default/double1712/images/no-active-status.png" class="img-icon" alt="活动非进行中">
        <p class="txt">您的抽奖次数不足<br/>投资可获得抽奖次数</p>
        <a class="pop-btn" app-viewtype="list" select-index="0" inner-index="0" href="/site/getlists">去投资</a>
    </div>
    <!--未开始弹窗-->
    <div class="outer-box no-active-status">
        <img src="/static/default/double1712/images/no-active-status.png" class="img-icon" alt="活动非进行中">
        <p class="txt">活动即将开始，继续关注哦~</p>
        <a class="pop-btn close-pop-btn">知道了</a>
    </div>
    <!--抽到谢谢-->
    <div class="outer-box thanks">
        <p class="txt">没有抽到哦~别灰心继续努力！</p>
        <a class="pop-btn close-pop-btn">确定</a>
    </div>
    <!--抽到实物-->
    <div class="outer-box snack">
        <div class="congrats-title">
            <img src="/static/default/double1712/images/congratulation-title-1.png" alt="">
        </div>
        <img src="/static/default/double1712/images/snack.png" alt="零食大礼包" class="img-snack">
        <div class="snack-txt">获得<span>零食大礼包!</span></div>
        <div class="snack-smart-txt">（奖品将在7个工作日内发出）</div>
        <a class="pop-btn">收下实物</a>
    </div>
    <!--填写收货地址-->
    <div class="outer-box congrats">
        <div class="congrats-title">
            <img src="/static/default/double1712/images/congratulation-title-1.png" alt="">
        </div>
        <div class="congrats-txt">请填写您的收货地址</div>
        <div class="congrats-smart-txt">（奖品将在7个工作日内发出）</div>
        <a class="pop-btn" href="/active/double1712" app-viewtype="safe">填写收货地址</a>
        <p class="bottom-txt close-pop-btn">已有地址</p>
    </div>
    <!--我的奖品 -无 -->
    <div class="outer-box pop-my-prize">
        <div class="congrats-title">
            <img src="/static/default/double1712/images/congratulation-title-1.png" alt="">
        </div>
        <div class="congrats-txt">您还没有抽到奖品</div>
        <p class="pop-btn close-pop-btn">确认</p>
    </div>
    <!--我的奖品 － 有-->
    <div class="outer-box have-prize">
        <div class="congrats-title">
            <img src="/static/default/double1712/images/congratulation-title-1.png" alt="">
        </div>
        <div class="have-prize-list">
            <ul>
                <!--                <li><img src="/static/default/double1712/images/icon-snacks.png" alt="" class="gift-list"><span class="name">获得零食大礼包</span><i class="numbers">X1</i></li>-->
                <!--                <li><img src="/static/default/double1712/images/icon-cash.png" alt="" class="gift-list"><span class="name">获得12.12现金红包</span><i class="numbers">X2</i></li>-->
            </ul>
        </div>
        <p class="pop-btn close-pop-btn">确认</p>
    </div>
</div>
<div class="rules-box">
    <p class="rules-title">活动规则</p>
    <ul class="rules-list">
        <li>1.活动时间:2017年12月12日-13日;</li>
        <li>2.活动期间</li>
        <li><span class="lf-num">1）</span><p class="detail-rule">全场每个项目首位投资一万元及以上（抢标王和最后一位满标（压标王）的用户，可获得12.12元现金红包，奖励将发放至您的账户，可提现；</p></li>
        <li><span class="lf-num">2）</span><p class="detail-rule">全民大抽奖：每投资一笔将获得1次抽奖机会，每位用户最多获得2次；</p></li>
        <li><span class="lf-num">3）</span><p class="detail-rule">全场项目最高三倍积分；</p></li>
        <li><span class="lf-num">4）</span><p class="detail-rule">积分商城爆款商品可8折兑换；</p></li>
        <li><span class="lf-num">5）</span><p class="detail-rule">新手宝、变现通不参与本活动；</p></li>
        <li><span class="lf-num">6）</span><p class="detail-rule">兑奖须知：请务必在2017年12月15日23:59前进行奖品兑换，如此前未填写收货地址或信息有误，将视为自动放弃领奖（地址填写方法：登录旺财谷进入“账户-个人头像-奖品邮寄地址”），奖品将于活动结束后的七个工作日内统一发放，请保持电话畅通。如有疑问，请联系在线客服或拨打官方热线400-888-6268（周一至周五9:00-18:00）</p></li>
        <p>*在法律允许范围内本活动最终解释权归旺财谷所有<span class="apple" style="display: none">本活动与苹果公司无关</span></p>
    </ul>
    <div class="rules-btn">确认</div>
</div>
<script>
    $(function () {
        FastClick.attach(document.body);
        var click = false;
        var isLogin = ''; // 登录
        var activeStatus = ''; //活动状态
        var pointMallUrl = ''; // 积分商城url
        var annualMoney = ''; //单位万元
        var allDrawChance = ''; //活动抽奖次数
        var hadDrawNum = '';// 已经抽奖次数
        init();
        prizeResult();
        // 我的奖品
        $('.my-tips .my-prize').on('click', function() {
            var elments = 'prize';
            funActiveStatus(activeStatus,isLogin,elments);
            return;
        });
        // 立即抽奖
        $('.go-to-prize .draw-btn').on('click', function() {
            var elments = 'draw';
            funActiveStatus(activeStatus,isLogin,elments);
            return;
        });
        // 一、初始化
        function init() {
            var xhr = $.get('/active/double1712/get-init-data');
            xhr.done(function(data){
                isLogin =  data.isLogin;
                activeStatus =  data.activeStatus;
                pointMallUrl =  data.pointMallUrl;
                annualMoney =  data.annualMoney;
                $('.my-rate .money').html(annualMoney+ '万');
                $('.go-to-exchange .btn').attr({'href': '/user/login?from='+pointMallUrl});
                var awardList = data.awardList; // 名单
                var listHtml = '';
                if (awardList.length === 0) {
                    $('.prize-list').hide();
                } else {
                    for(var i=0; i< awardList.length; i++){
                        var txtName = '';
                        if (awardList[i].awardName === 'snacks') {
                            txtName = '获得零食大礼包';
                        } else if (awardList[i].awardName === 'cash') {
                            txtName = '获得12.12现金红包';
                        }
                        listHtml = '<li><span class="phone">'+awardList[i].phone+'</span><span class="name">'+txtName+'</span></li>';
                        $('.prize-list .list').append(listHtml);
                    }
                    $('.prize-list').show();
                }
            });
        }
        // 二、奖品接口
        function prizeResult(elments) {
            var xhr = $.get('/active/double1712/get-user-award-info');
            xhr.done(function(data){
                allDrawChance = parseInt(data.allDrawChance);//活动抽奖次数
                hadDrawNum = parseInt(data.hadDrawNum);// 已经抽奖次数
                if (isLogin == 1) {
                    $('.go-to-exchange .btn').attr({'href': pointMallUrl});
                    $('.go-to-prize .draw-btn,.my-tips .my-prize').removeAttr('href');
                    $('.go-to-prize .chance .nums').html(allDrawChance - hadDrawNum); // 抽奖次数
                    if (hadDrawNum == 2) {
                        $('.go-to-prize .chance .nums').html(0);
                        $('.go-to-prize .draw-btn').addClass('draw-over').html('抽奖次数已用完').unbind();
                    }
                    var userAwardList = data.userAwardList;
                    var userAwardHtml = '';
                    if (elments == 'prize') {
                        if (userAwardList.length == 0) {
                            $('.pop-my-prize').show();
                        } else {
                            $('.have-prize .have-prize-list ul').empty();
                            for (var i = 0; i < userAwardList.length; i++) {
                                var txtName = '';
                                if (userAwardList[i].awardType === 'snacks') {
                                    txtName = '获得零食大礼包';
                                } else if (userAwardList[i].awardType === 'cash') {
                                    txtName = '获得12.12现金红包';
                                }
                                if (userAwardList[i].awardNum !== 0) {
                                    userAwardHtml = '<li><img src="/static/default/double1712/images/icon-' + userAwardList[i].awardType + '.png" alt="" class="gift-list"><span class="name">' + txtName + '</span><i class="numbers">X' + userAwardList[i].awardNum + '</i></li>';
                                    $('.have-prize .have-prize-list ul').append(userAwardHtml);
                                }
                            }
                            $('.have-prize').show();
                            $('body').on('touchmove', eventTarget, false);
                        }
                    }
                }
            });
        }
        // 三、抽奖接口
        function drawMove() {
            if (click) {
                return false;
            }
            $('.go-to-prize .draw .lf-select .content-mask').addClass('fadeShowLeft');
            $('.go-to-prize .draw .rg-select .content-mask').addClass('fadeShowRight');
            if (allDrawChance == 0 ) {
                setTimeout(function(){
                    $('.prizes-box,.no-have-chance').show(); // 提示去投资
                    $('body').on('touchmove', eventTarget, false);
                },1200);
                return;
            } else
            if (allDrawChance > hadDrawNum && allDrawChance > 0) {
                var xhr = $.get('/active/double1712/do-draw');
                xhr.done(function(data){
                    if (data.code == 0) {
                        var awardType = data.awardType;
                        if (awardType === 'snacks') {
                            setTimeout(function(){
                                $('.go-to-prize .draw .lf-select .content-mask').css({'opacity': 0});
                                $('.go-to-prize .draw .rg-select .content-mask').css({'opacity': 1});
                                $('.prizes-box,.snack').show();
                                $('body').on('touchmove', eventTarget, false);
                            },1200);
                        } else {
                            setTimeout(function(){
                                $('.go-to-prize .draw .lf-select .content-mask').css({'opacity': 1});
                                $('.go-to-prize .draw .rg-select .content-mask').css({'opacity': 0});
                                $('.prizes-box,.thanks').show();
                                $('body').on('touchmove', eventTarget, false);
                            },1200);
                        }
                    } else if (data.code == 1) {
                        setTimeout(function(){
                            $('.prizes-box,.no-have-chance').show(); // 提示去投资
                            $('body').on('touchmove', eventTarget, false);
                        },1200);
                    }
                    click = true;
                });
            }
        }
        function draw(isLogin) {
            if (isLogin === 1) {
                drawMove();
            } else {
                var astrHref = "/user/login";
                if(browserName ==='wcgapple' || browserName ==='wcgandroid') {
                    $('.go-to-prize .draw-btn').attr({'app-viewtype': 'login','success-url':'/active/double1712'});
                    $('.go-to-prize .draw-btn').attr("href", astrHref);
                    fun_app();
                } else {
                    astrHref = "/user/login?from=/active/double1712";
                    $('.go-to-prize .draw-btn').attr("href", astrHref);
                }
                astrHref = $('.go-to-prize .draw-btn').attr("href");
                location.href = astrHref;
            }
        }
        function prize(isLogin,elments) {
            if (isLogin === 1) {
                $('.my-tips .my-prize').removeAttr('href');
                prizeResult(elments);
                $('.prizes-box').show();
                $('body').on('touchmove', eventTarget, false);
            } else {
                var astrHref = "/user/login";
                if(browserName ==='wcgapple' || browserName ==='wcgandroid') {
                    $('.my-tips .my-prize').attr({'app-viewtype': 'login','success-url':'/active/double1712'});
                    $('.my-tips .my-prize').attr("href", astrHref);
                    fun_app();
                } else {
                    astrHref = "/user/login?from=/active/double1712";
                    $('.my-tips .my-prize').attr("href", astrHref);
                }
                astrHref = $('.my-tips .my-prize').attr("href");
                location.href = astrHref;
            }
        }
        function funElments(isLogin,elments) {
            switch (elments) {
                case 'draw':
                    draw(isLogin);
                    break;
                case 'prize':
                    prize(isLogin,elments);
                    break;
                default:
                    break;
            }
        }
        function funActiveStatus(status,isLogin,elments) {
            if (status === 1) {
                $('.go-to-prize .draw-btn,.my-tips .my-prize').removeAttr('href');
                $('.prizes-box,.no-active-status').show();
                $('body').on('touchmove', eventTarget, false);
            } else if (status === 2){
                funElments(isLogin,elments);
            } else if (status === 3){
                $('.go-to-prize .draw-btn,.my-tips .my-prize').removeAttr('href');
                $('.prizes-box,.no-active-status').show();
                $('body').on('touchmove', eventTarget, false);
                $('.no-active-status .txt').html('活动已结束');
            }
        }

        //   填写地址
        $('.snack .pop-btn').on('click', function(){
            $('.go-to-prize .draw .lf-select .content-mask').css({'opacity': 0});
            $('.go-to-prize .draw .rg-select .content-mask').css({'opacity': 0});
            $('.go-to-prize .draw .lf-select .content-mask').removeClass('fadeShowLeft');
            $('.go-to-prize .draw .rg-select .content-mask').removeClass('fadeShowRight');
            $('.prizes-box,.snack').hide();
            if (moduleFn.parseUA().wcgiphone || moduleFn.parseUA().wcgandroid) {
                $('.prizes-box,.congrats').show();
                $('body').on('touchmove', eventTarget, false);
            }
        });
        $('.icon-rule').on('click', function () {
            $('.rules-box').show();
            $(".flex-content").hide();
            $('body').unbind('touchmove');
        });
        $('.rules-btn').on('click', function () {
            $('.rules-box').hide();
            $(".flex-content").show();
            $('body').unbind('touchmove');
        });
        $('.money-icon').on('click', function (e) {
            e.stopPropagation();
            $('.formula,.trans').show();
        });
        $('body').on('click', function () {
            $('.formula,.trans').hide();
        });
        $('.close-pop-btn').on('click', function () {
            $('.prizes-box').hide();
            $(this).parent().hide();
            $('body').unbind('touchmove');
        });

        // 名单滚动
        setTimeout(function () {
            var lunboLength = $('.prize-list .list li').length;
            if (lunboLength > 5) {
                lunBo();
            }
        }, 1000);
        function lunBo() {
            var liH = 1.1;
            var ts = setInterval(function () {
                $('.prize-list .list li').eq(0).animate({"margin-top": "-" + liH + "rem"}, 1000, function () {
                    $('.prize-list .list li').eq(0).css({"margin-top": 0});
                    $('.prize-list .list li').eq(0).appendTo($('.prize-list .list'));
                });
            }, 2000);
        }
        if (moduleFn.parseUA().wcgiphone) {
            $('.apple').show();
            var oMeta = document.createElement('meta');
            oMeta.name = 'viewport';
            oMeta.content = 'width=device-width,viewport-fit=cover,initial-scale=1.0,maximum-scale=1.0,user-scalable=no';
            document.getElementsByTagName('head')[0].appendChild(oMeta);
        } else {
            $('.apple').hide();
        }
        function eventTarget(event) {
            event.preventDefault();
        }

    })
</script>
