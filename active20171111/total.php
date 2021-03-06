<?php

$this->title = '11月理财节';
?>
<link rel="stylesheet" href="<?= FE_BASE_URI ?>wap/common/css/wenjfbase.css">
<link rel="stylesheet" href="<?= FE_BASE_URI ?>wap/campaigns/active20171111/css/index.css?v=20171109">
<script src="<?= FE_BASE_URI ?>libs/lib.flexible3.js"></script>
<script src="<?= FE_BASE_URI ?>libs/vue.min.js"></script>
<style type="text/css">
    [v-cloak] {
        display: none!important;
    }
</style>
<div class="flex-content" id="app">
    <div class="banner">
        <img src="<?= FE_BASE_URI ?>wap/campaigns/active20171111/images/banner.png" alt="banner" >
        <p>我的喜卡:<i v-cloak><?= $activeTicketCount ?></i>张<span class="xi-card-btn" @click="link">喜卡是什么？</span></p>
    </div>
    <div class="module active-first">
        <a data-num="0" class="first a-link" :class="[promoStatus[0]] == 0 ? '': 'no-active-link'"></a>
        <img class="hander hander-move" :class="[promoStatus[0]] == 0 ? 'show': ''" src="<?= FE_BASE_URI ?>wap/campaigns/active20171111/images/hander-icon.png" alt="手指">
        <span v-cloak class="no-active-status" :class="[promoStatus[0]] == 0 ? 'active-ing': ''">{{indexActive[0]}}<i class="icon" :class="[promoStatus[0]] == 0 ? 'active-icon': '' "></i></span>
    </div>
    <div class="module active-second">
        <a data-num="1" class="second a-link" :class="[promoStatus[1]] == 0 ? '': 'no-active-link'"></a>
        <img class="second-hand second-hand-moves" :class="[promoStatus[1]] == 0 ? 'show': ''" src="<?= FE_BASE_URI ?>wap/campaigns/active20171111/images/left-hander-icon.png" alt="手指">
        <span v-cloak class="no-active-status" :class="[promoStatus[1]] == 0 ? 'active-ing': ''"><i class="icon" :class="[promoStatus[1]] == 0 ? 'active-icon': '' "></i>{{indexActive[1]}}</span>
    </div>
    <div class="module active-third">
        <a data-num="2" class="third a-link" :class="[promoStatus[2]] == 0 ? '': 'no-active-link'"></a>
        <img class="hander hander-move" :class="[promoStatus[2]] == 0 ? 'show': ''" src="<?= FE_BASE_URI ?>wap/campaigns/active20171111/images/hander-icon.png" alt="手指">
        <span v-cloak class="no-active-status" :class="[promoStatus[2]] == 0 ? 'active-ing': ''">{{indexActive[2]}}<i class="icon" :class="[promoStatus[2]] == 0 ? 'active-icon': '' "></i></span>
        <p class="bottom-txt">本活动最终解释权归温都金服所有</p>
    </div>

    <!--  喜卡是什么 -->
    <div class="mask" style="display: none"></div>
    <div class="xi-card" style="display: none;">
        <img class="close-btn" @click="link" src="<?= FE_BASE_URI ?>wap/campaigns/active20171111/images/close.png" alt="">
        <h5>喜卡是什么?</h5>
        <p>双十一理财节期间，完成指定任务即可获得喜卡。<br>喜卡可用于主会场(11.9-11.11)期间兑换现金红包，最高1111元哦！</p>
    </div>
</div>
<input type="hidden" name="promoStatus1" value="<?= $promoStatus1 ?>">
<input type="hidden" name="promoStatus2" value="<?= $promoStatus2 ?>">
<input type="hidden" name="promoStatus3" value="<?= $promoStatus3 ?>">
<script>
    var promoStatus1 = $('input[name=promoStatus1]').val();
    var promoStatus2 = $('input[name=promoStatus2]').val();
    var promoStatus3 = $('input[name=promoStatus3]').val();
    var app = new Vue({
        el: '#app',
        data : {
            promoStatus: [promoStatus1,promoStatus2,promoStatus3],
            status: ['进行中','未开始','已结束'],
            indexActive:['未开始','未开始','未开始'],
            xiCardBox: true,
            obj:''
        },
        created: function(){
            for (var i=0; i < this.promoStatus.length; i++) {
                if (this.promoStatus[i] == '0') { // 进行中
                    this.indexActive[i] = this.status[0];
                    if (0 === i) {
                        $('.a-link').eq(i).attr('href',"/promotion/p171111/first");
                    } else if (1 === i) {
                        $('.a-link').eq(i).attr('href',"/promotion/p171111/second");
                    } else if (2 === i) {
                        $('.a-link').eq(i).attr('href',"/promotion/p171111/third");
                    }
                } else if (this.promoStatus[i] == '1') { // 未开始
                    this.indexActive[i] = this.status[1];
                } else if (this.promoStatus[i] == '2') { // 已结束
                    this.indexActive[i]  = this.status[2];
                }
            }
        },
        methods: {
            eventTarget: function(event) {
                var e = event || window.event;
                e.preventDefault();
            },
            link: function(event) {
                if (this.xiCardBox) {
                    $(".mask ,.xi-card").show();
                    $('body').on('touchmove',this.eventTarget(event), false);
                    this.xiCardBox = !this.xiCardBox;
                } else {
                    $(".mask ,.xi-card").hide();
                    $('body').off('touchmove');
                    this.xiCardBox = !this.xiCardBox;
                }
            }
        }
    });
    Vue.config.devtools = false;
</script>
