<?php
$this->title = '积分限时秒杀';
?>
<link rel="stylesheet" href="<?= FE_BASE_URI ?>wap/common/css/wenjfbase.css">
<link rel="stylesheet" href="<?= FE_BASE_URI ?>wap/common/css/popover.css">
<link rel="stylesheet" href="<?= FE_BASE_URI ?>libs/swiper/swiper-3.4.2.min.css">
<link rel="stylesheet" href="<?= FE_BASE_URI ?>wap/campaigns/active20171220/css/index.css">
<script src="<?= FE_BASE_URI ?>libs/lib.flexible3.js"></script>
<script src="<?= FE_BASE_URI ?>wap/common/js/popover.js?v=2.0"></script>
<script src="<?= FE_BASE_URI ?>libs/vue.min.js"></script>
<script src="<?= FE_BASE_URI ?>libs/iscroll.js"></script>
<script src="<?= FE_BASE_URI ?>libs/swiper/swiper-3.4.2.min.js"></script>
<div class="flex-content" id="app">
    <div class="banner">
        <img src="<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/banner.png" alt="banner">
    </div>
    <div class="down-time">距离下一场秒杀还有<span v-cloak v-for="l in list">{{l.time}}</span></div>
    <div class="active-title"><span v-cloak >{{timer}}</span>点场</div>
    <div class="content">
        <a class="swiper-button-prev arrow"></a>
        <a class="swiper-button-next arrow"></a>
        <div class="swiper-container gifts-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide" v-for="(item, index) in slideContent" ><img :point=item.currentPoints :src=item.path :alt="item.sn"></div>
            </div>
        </div>
    </div>
    <div class="content-bottom">
        <a class="seckill-record"  data-num="0"  @click="computNum">秒杀记录>></a>
        <a href="/deal/deal/index" class="btn invest"></a>
        <a class="btn" :class="btnClass" :current=btnCurrentPoints :giftName=giftName data-num="1" @click="computNum"></a>
    </div>
    <div class="rule-title"></div>
    <div class="rule-content">
        <ul>
            <li>1. 活动时间: 2017.12.20-12.22；</li>
            <li>2. 活动期间每日10点、16点开启秒杀，参与活动的商品全部限时折扣；</li>
            <li>3. 秒杀成功后，积分将会立即扣除，商品将在3个工作日内联系发放；</li>
            <li>4. 活动结束后，所有折扣商品全部恢复原积分。</li>
        </ul>
    </div>
    <p class="copy-right">本次活动最终解释权归温都金服所有</p>
    <!--秒杀列表-->
    <div class="prizes-box" :class="[ !!isActive ? 'showed' : '' ]">
        <div class="outer-box">
            <img class="pop_close" @click="closePrizeList" src="<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/pop-close.png" alt="">
            <div class="prizes-pomp">
                <p class="prizes-title">秒杀列表</p>
                <div id="wrapper">
                    <ul>
                        <li class="clearfix" v-cloak v-for="item in ticket">
                            <div class="lf"><img :src="item.path" alt="礼品"></div>
                            <div class="lf">
                                <p>{{item.name}}</p>
                                <p>{{item.point}}</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var myScroll='';
    var flag = true;
    var app = new Vue({
        el: '#app',
        data: {
            isLoggedIn: datas.isLoggedIn,
            promoStatus: datas.promoStatus,
            restTime: datas.restTime,
            myPoint: datas.myPoint,
            list: [{}],
            obj:'',
            timer: '10',
            btnClass: '',
            giftName: '',
            btnCurrentPoints: 0,
            slideContent: [{
                sn: "",
                path: "",
                currentPoints: '',
                timePoint: '',
                restTime: '',
                allNum: '',
                alreadyNum: ''
            }],
            ticket: [{
                sn: "",
                path: "",
                name: "",
                point: ""
            }],
            isActive: false
        },
        created: function(){
            this.isActive = !!this.isActive;
            this.init();
        },
        methods: {
            init: function () {
                var that = this;
                for (var i=0; i < datas.data.length; i++) {
                    that.slideContent[i]= datas.data[i];
                    that.slideContent[i].sn = datas.data[i].sn;
                    that.slideContent[i].path = '<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/' + datas.data[i].sn+ '.png';
                    that.slideContent[i].currentPoints = datas.data[i].currentPoints;
                    that.slideContent[i].timePoint = datas.data[i].timePoint;
                    that.slideContent[i].restTime = datas.data[i].restTime;
                    that.slideContent[i].alreadyNum = datas.data[i].alreadyNum;
                    that.slideContent[i].allNum = datas.data[i].allNum;
                }
                if (parseInt(that.restTime) < 0) {
                    that.list = [{'time': '99:99:99'}];
                    return false;
                } else if (parseInt(that.restTime) == 0 && that.slideContent[0].restTime == 0 && that.slideContent[1].restTime == 0) {
                    that.list = [{'time': '00:00:00'}];
                    return false;
                } else {
                    that.downTime();
                }
            },
            downTime: function() {//倒计时
                var that = this;
                var count = that.restTime;
                var giftsTime1 = that.slideContent[0].restTime;
                var giftsTime2 = that.slideContent[1].restTime;
                var t = setInterval(function () {
                    var a = app.theTimeGap(count);
                    for (var i = 0; i < that.list.length; i++) {
                        Vue.set(that.list[i],'time',a);
                    }
                    if (count <= 0 ) {
                        clearInterval(t);
                        Vue.set(that.list[0],'time',"00:00:00");
                        setTimeout(function(){ location.reload(); },100);
                        return false;
                    }
                    count--;
                }, 1000);

                var t1 = setInterval(function () {
                    if (giftsTime1 <= 0 ) {
                        clearInterval(t1);
                        if ( that.restTime == 0) {
                            setTimeout(function(){ location.reload(); },100);
                        }
                    }
                    giftsTime1--;
                }, 1000);

                var t2 = setInterval(function () {
                    if (giftsTime2 <= 0  ) {
                        clearInterval(t2);
                        if ( that.restTime == 0) {
                            setTimeout(function(){ location.reload(); },100);
                        }
                    }
                    giftsTime2--;
                }, 1000);
            },
            theTimeGap: function(s){
                var hour = Math.floor(s/3600);
                var minute = Math.floor( (s- hour*3600) /60 );
                var second = s - (hour*3600)- (minute*60);
                if (hour < 10) {
                    hour = "0"+hour;
                }
                if (minute < 10) {
                    minute = "0"+minute;
                }
                if (second < 10) {
                    second = "0"+second;
                }
                return  hour +" : " + minute + " : " + second;
            },
            computNum: function (event){
                var e = event || window.event;
                var that = this;
//                var gift = e.currentTarget.getAttribute('giftName');
                var n = e.currentTarget.getAttribute('data-num');
                switch(n) {
                    case '0':
                        that.obj = 'my-prize';
                        that.showPromoStatus('my-prize');
                        break;
                    case '1':
                        that.obj = 'seckill';
                        that.showPromoStatus('seckill');
                        break;
                }
            },
            showLoginPop: function(event) {
                var e = event || window.event;
                var that = this;
                if (that.isLoggedIn) { //已登录
                    if (that.promoStatus === 0) { // 活动进行中
                        if (that.obj === 'my-prize') {
                            that.prizeRecord(e);
                        } else if (that.obj === 'seckill') {
                            that.playGame();
                        }
                    } else {
                        if (that.obj === 'my-prize') {
                            that.prizeRecord(e);
                        }
                    }
                } else {
                    if (that.promoStatus === 0) { // 活动进行中
                        location.href = '/site/login';
                        return false;
                    } else if (that.promoStatus === 1){
                        that.toastCenter('活动未开始');
                        return false;
                    } else if (that.promoStatus === 2){
                        if (that.obj === 'my-prize') {
                            location.href = '/site/login';
                            return false;
                        }
                        that.toastCenter('活动已结束');
                    }
                }
            },
            showPromoStatus: function(event) { //活动状态
                var e = event || window.event;
                var that = this;
                if (that.promoStatus == 0){ //进行中
                    that.showLoginPop(that.obj);
                } else if (that.promoStatus == 1) {
                    that.toastCenter('活动未开始');
                } else if (that.promoStatus == 2) {
                    if (that.obj == 'my-prize') {
                        that.showLoginPop(that.obj);
                        return false;
                    }
                    that.toastCenter('活动已结束');
                }
            },
            closePop: function() {
                $('.pop').eq(0).remove();
                $('.mask').eq(0).remove();
                $('body').off('touchmove');
            },
            closePrizeList: function() {
                var that = this;
                $('body').off('touchmove');
                that.isActive = !that.isActive;
            },
            playGame: function() {
                var that = this;
                if (!!$('.btn').hasClass('seckill-btn') ) {
                    if ($('.seckill-btn').attr('current') > that.myPoint) {
                        that.noEnoughPoints();
                    } else {
                        that.tipSHow();
                    }
                } else if (!!$('.btn').hasClass('seckill-btn-before') ) {
                    return false;
                } else if (!!$('.btn').hasClass('seckill-btn-after') ) {
                    return false;
                }
            },
            seckill: function() {
                var that = this;
                if (!flag) {
                    return false;
                }
                that.closePop();
                var xhr = $.get('/promotion/p171220/kill?sn='+that.giftName);
                flag = false;
                xhr.done(function(res) {
                    that.success();
                });
                xhr.fail(function(jqXHR) {
                    if (400 === jqXHR.status && jqXHR.responseText) {//系统错误
                        var resp = $.parseJSON(jqXHR.responseText);
                        if (5 === resp.code) {//积分不足
                            that.noEnoughPoints();
                        } else if (6 === resp.code) {//系统错误
                            that.systemError();
                        } else if (7 === resp.code) {//商品已售罄
                            that.failOver();
                        } else if (8 === resp.code) {
                            that.toastCenter('秒杀未开始');
                        } else if (4 === resp.code) {
                            that.toastCenter('已售罄');
                        } else if (3 === resp.code) {
                            that.toastCenter('您还未登录');
                        } else if (2 === resp.code) {
                            that.toastCenter('活动已结束');
                        } else if (1 === resp.code) {
                            that.toastCenter('活动未开始');
                        } else {
                            that.systemError();
                        }
                        flag = true;
                    }
                });
            },
            prizeRecord: function(event) { // 秒杀记录
                var e = event || window.event;
                var that = this;
                var xhr = $.get('/promotion/p171220/award-list?key=promo_171220');
                xhr.done(function(res) {
                    if (res.length == 0) { //无奖品
                        that.noPrize(e);
                    } else {
                        that.ticket = res;
                        for (var i = 0;i < res.length; i++) {
                            that.ticket[i].sn = res[i].sn;
                            that.ticket[i].path = '<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/prize-'+res[i].sn+'.png';
                            that.ticket[i].name = res[i].name;
                            that.ticket[i].point = '消耗积分: '+parseInt(res[i].ref_amount);
                        }
                        that.isActive = !that.isActive;
                        setTimeout(function(e){ that.loaded(e); },50);
                        $('body').on('touchmove',function(e){that.eventTarget(e)}, false);
                    }
                });
                xhr.fail(function(jqXHR) {
                    if (400 === jqXHR.status && jqXHR.responseText) {//系统错误
                        that.systemError();
                    }
                });
            },
            tipSHow: function() {
                var that = this;
                poptpl.popComponent({
                    popTopHasDiv : true,
                    title: '<p style="font-weight: bold;line-height: 0.66666667rem;color: #97280a; font-size: 0.66666667rem;">温馨提示</p>',
                    popBackground: 'url(<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/pop-bg.png) no-repeat',
                    popBorder: 0,
                    closeTop:"-1.2rem",
                    closeLeft:"-0.57333333rem",
                    closeUrl: "<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/pop-close.png",
                    popMiddleHasDiv: true,
                    contentMsg: '<p style="margin: -.15rem auto 0;width: 80%;font-weight: bold;text-align:left;line-height: 0.66666667rem;color: #97280a;">秒杀成功将立即扣除相应积分，秒杀失败不会扣除积分。<br>是否立即参与秒杀？</p>',
                    popBtmBackground: 'url(<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/pop-btn-bg.png) no-repeat',
                    popBtmBorderRadius: 0,
                    popBtmColor: '#efde9e',
                    popBtmFontSize: ".45333333rem",
                    btnMsg: "确定秒杀"
                }, that.seckill);
                $('.pop').append('<a class="popBtm2" style="margin-left: 7.49%;background:url(<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/pop-btn-bg.png) no-repeat;background-size:100% 100%;border-radius:0 ;color:#efde9e;font-size:.45333333rem ;">我再想想</a>')
                $('.pop .popBtm2').on('click', function(){
                    that.closePop();
                });
            },
            noPrize: function (event) { // 无奖品
                var e = event || window.event;
                var that = this;
                poptpl.popComponent({
                    popBackground: 'url(<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/pop-bg.png) no-repeat',
                    popBorder: 0,
                    closeTop:"-1.2rem",
                    closeLeft:"-0.57333333rem",
                    closeUrl: "<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/pop-close.png",
                    btnMsg: "去看看",
                    title: '<p style="font-size:0.48rem; color: #97280a;font-weight: bold;padding-top: .38rem;margin-bottom: 1rem;line-height: 0.66666667rem;color: #97280a;">sorry，您还没有秒杀到任何商品哦！<br>快去参与秒杀吧！</p>',
                    popBtmBackground: 'url(<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/pop-btn-bg.png) no-repeat',
                    popBtmBorderRadius: 0,
                    popBtmColor: '#efde9e',
                    popBtmFontSize: ".45333333rem"
                }, 'close');
                $('body').on('touchmove',function(e){that.eventTarget(e)}, false);
            },
            failOver: function(event) {
                var e = event || window.event;
                var that = this;
                poptpl.popComponent({
                    popBackground: 'url(<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/pop-bg.png) no-repeat',
                    popBorder: 0,
                    closeTop:"-1.2rem",
                    closeLeft:"-0.57333333rem",
                    closeUrl: "<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/pop-close.png",
                    btnMsg: "我知道了",
                    popTopColor: "#f03350",
                    bgSize: "100% 100%",
                    title: '<p style="font-size:0.48rem;color: #97280a;font-weight: bold">Sorry，商品被抢光了！<br>快去看看别的场次吧！</p>',
                    popBtmBackground: 'url(<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/pop-btn-bg.png) no-repeat',
                    popMiddleHasDiv: true,
                    contentMsg: "<img style='margin: -.4rem auto 0;display: block;height: 2.24rem;' src='<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/fail.png' alt='图片地址'/>",
                    popBtmBorderRadius: 0,
                    popBtmFontSize: ".45333333rem",
                    popBtmColor: '#efde9e'
                }, 'close');
                $('body').on('touchmove',function(e){that.eventTarget(e)}, false);
            },
            systemError: function() {
                var that = this;
                that.toastCenter('系统异常');
            },
            success: function(event) {
                var e = event || window.event;
                var that = this;
                poptpl.popComponent({
                    popBackground: 'url(<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/pop-bg.png) no-repeat',
                    popBorder: 0,
                    closeTop:"-1.2rem",
                    closeLeft:"-0.57333333rem",
                    closeUrl: "<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/pop-close.png",
                    btnMsg: "收下商品",
                    popTopColor: "#f03350",
                    bgSize: "100% 100%",
                    title: '<p style="font-size:0.48rem;color: #97280a;font-weight: bold">恭喜您抢到了本件商品！<br>再去看看别的场次吧！</p>',
                    popBtmBackground: 'url(<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/pop-btn-bg.png) no-repeat',
                    popMiddleHasDiv: true,
                    contentMsg: "<img style='margin: -.4rem auto 0;display: block;height: 2.52rem;' src='<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/success.png' alt='图片地址'/>",
                    popBtmBorderRadius: 0,
                    popBtmFontSize: ".45333333rem",
                    popBtmColor: '#efde9e'
                }, function() {
                    setTimeout(function(){  location.reload(); },200);
                });
                flag = true;
                $('body').on('touchmove',function(e){that.eventTarget(e)}, false);
            },
            noEnoughPoints: function(event) {
                var e = event || window.event;
                var that = this;
                poptpl.popComponent({
                    popBackground: 'url(<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/pop-bg.png) no-repeat',
                    popBorder: 0,
                    closeTop:"-1.2rem",
                    closeLeft:"-0.57333333rem",
                    closeUrl: "<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/pop-close.png",
                    btnMsg: "赚积分",
                    popTopColor: "#f03350",
                    bgSize: "100% 100%",
                    title: '<p style="font-size:0.48rem;color: #97280a;font-weight: bold">Sorry，您的积分不足！<br>快去投资赚取积分吧！</p>',
                    popBtmBackground: 'url(<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/pop-btn-bg.png) no-repeat',
                    popMiddleHasDiv: true,
                    contentMsg: "<img style='margin: -.4rem auto 0;display: block;height: 2.24rem;' src='<?= FE_BASE_URI ?>wap/campaigns/active20171220/images/fail.png' alt='图片地址'/>",
                    popBtmBorderRadius: 0,
                    popBtmFontSize: ".45333333rem",
                    popBtmColor: '#efde9e',
                    btnHref: '/deal/deal/index'
                });
                $('body').on('touchmove',function(e){that.eventTarget(e)}, false);
            },
            loaded: function(event) {
                var e = event || window.event;
                myScroll = new iScroll('wrapper',{
                    vScrollbar:false,
                    hScrollbar:false
                });
            },
            eventTarget: function(event) {
                var e = event || window.event;
                e.preventDefault();
            },
            toastCenter: function (val, active) {
                var $alert = $('<div class="error-info" style="display: block; position: fixed;font-size: .4rem;"><div>' + val + '</div></div>');
                $('body').append($alert);
                $alert.find('div').width($alert.width());
                setTimeout(function () {
                    $alert.fadeOut();
                    setTimeout(function () {
                        $alert.remove();
                    }, 200);
                    if (active) {
                        active();
                    }
                }, 2000);
            },
            adChange: function(activeIndex,index1,index2) {
                var that = this;
                for (var i =0; i < 4; i++ ) {
                    if (activeIndex%2 == index2) {
                        that.timer = that.slideContent[index1].timePoint;
                        that.btnCurrentPoints = that.slideContent[index1].currentPoints;
                        that.giftName = that.slideContent[index1].sn;
                        var firstTimer = that.slideContent[index1].restTime;
                        if ( firstTimer > 0 ) {
                            that.btnClass = 'seckill-btn-before';
                        } else {
                            if (datas.data[index1].alreadyNum > 0 || datas.data[index1].allNum == 0) {
                                that.btnClass = 'seckill-btn-after';
                            } else {
                                that.btnClass = 'seckill-btn';
                            }
                        }
                        return false;
                    } else if (activeIndex%2 == index1) {
                        that.timer = that.slideContent[index2].timePoint;
                        that.btnCurrentPoints = that.slideContent[index2].currentPoints;
                        that.giftName = that.slideContent[index2].sn;
                        var secondTimer = that.slideContent[index2].restTime;
                        if ( secondTimer > 0 ) {
                            that.btnClass = 'seckill-btn-before';
                        } else {
                            if (datas.data[index2].alreadyNum > 0 || datas.data[index2].allNum == 0) {
                                that.btnClass = 'seckill-btn-after';
                            } else {
                                that.btnClass = 'seckill-btn';
                            }
                        }
                        return false;
                    }
                }
            }
        }
    });
    Vue.config.devtools = false;

    $(function(){
        mySwiper = new Swiper('.swiper-container', {
            loop: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            onInit: function (swiper) {
                var that = app;
                if (that.restTime < 0) {
                    that.btnClass = 'seckill-btn';
                    return false;
                }
                that.adChange(swiper.activeIndex, 0, 1);
            },
            onSlideChangeEnd: function (swiper) {
                var that = app;
                if (that.restTime < 0) {
                    that.btnClass = 'seckill-btn';
                    return false;
                }
                that.adChange(swiper.activeIndex, 0, 1);
            }
        });
    });
</script>