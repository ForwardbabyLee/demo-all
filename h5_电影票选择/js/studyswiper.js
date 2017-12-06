/**
 * Created Swiper by Limeilin on 16/7/18.
 */
var Swiper=new Swiper('.gallery-top',{
        pagination:'.swiper-pagination',
        paginationClickable: true

});
var galleryTop=new Swiper('.gallery-top',{
        pagination:'.swiper-pagination',
        paginationClickable:true,//当单击指示器时,会执行过渡动画到目标slide
//            direction:'vertical',//改变slide方向
        spaceBetween: 5,//slide之间的距离（单位px）
//            slidesPerView: 'auto',//旋转模式下，自适应大小,各个slide大小自由化
        slidesPerView: 3,//旋转模式下，设置容器能够同时显示的slides数量
        slidesPerGroup:2,//在carousel mode下定义slides的数量多少为一组
        centeredSlides: true,//若为真，活动块默认状态居中
//            paginationAsRange:true,
//            slidesPerColumn:2,//多行布局里面每列的slide数量

});