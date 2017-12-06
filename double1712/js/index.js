/**
 * Created by mayling on 17/12/6.
 */
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