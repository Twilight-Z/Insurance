// 获取变量；
var olbt = $('.lbt');
var obtn = $('.bottom div');
var oed = $('.ed li');
var otp = $('.tp li');
var oplayer = $(".btn_player");
var oside = $(".btn_top");
var osd = $(".sidebar>div");
var time, y= 0;

// 初始化
$(obtn[0]).addClass('lx');
$(otp[0]).fadeIn(500);
time = setInterval(lx, 2333);
Top();

$(window).scroll(function(){
    Top();
});

// 换图函数
function bhtp(x){
    $(otp).fadeOut(500);
    $(obtn).removeClass('lx');
    $(obtn[x]).addClass('lx');
    $(otp[x]).fadeIn(500);
};

// 点击事件
obtn.click(function(){
    y = $(this).index()
    bhtp(y);
});
oed.click(function(){
    if($(this).index()){
        y++;
        y %= 4;
    }
    else{
        y--;
        if(y<0) y=3;
    }
    bhtp(y);
});

// 轮询图片
function lx(){
    y++;
    y %= 4;
    bhtp(y);
};
olbt.hover(function(){
            clearInterval(time);
        },function(){
            time = setInterval(lx, 2333);
        });


// sidebar
// top
function Top(){
    if($(window).scrollTop()>180){
        oside.fadeIn(666);
    }else{
        oside.fadeOut(666);
    };
}
oside.click(function(){
    $('body,html').animate({scrollTop:0},300);
    return false;
});

// player
oplayer.click(function() {
    $(osd).removeClass('d-none');
})
// if($(osd).)
osd.click(function() {
    $(osd).addClass('d-none');
})
