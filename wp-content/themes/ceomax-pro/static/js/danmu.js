$.fn.barrage=function(opt){
    var _self=$(this);
    var opts={
        data:[], //数据
        row:3,//显示行数
        time:2500,//时间
        gap:15,//间隙
        ismoseoverclose:true,//悬浮是否停止
    }
    var settings = $.extend({},opts,opt);//合并参数
    var M = {},Obj = {};
    Obj.data = settings.data;
    M.bgColors = ['#00000059']; //随机背景色数组
    Obj.arrEle = []; //预计存储dom集合数组
    M.barrageBox = $('<div id="ceo-danmu"></div>'); //存所有弹幕的盒子
    M.timer = null;
    var createView = function(){
        var randomIndex = Math.floor(Math.random() * M.bgColors.length);
        var ele = $('<li class="'+Obj.data[0].type+'" style="opacity:0;background-color:'+M.bgColors[randomIndex]+'"><a href="'+Obj.data[0].now_user_link+'" class="img" target="_blank">'+Obj.data[0].avatar+'</a>'+Obj.data[0].content+'</li>');
        var ele = $('<li class="'+Obj.data[0].type+'" style="opacity:0;background-color:'+M.bgColors[randomIndex]+'"><a href="'+Obj.data[0].now_user_link+'" class="img" target="_blank">'+Obj.data[0].avatar+'</a>'+Obj.data[0].content+'</li>');
        var str = Obj.data.shift();
        ele.animate({
            'opacity' : 1,
            'margin-bottom' : settings.gap
        },1000)
        M.barrageBox.append(ele);
        Obj.data.push(str);
        
        if(M.barrageBox.children().length > settings.row){
            
            M.barrageBox.children().eq(0).animate({
                'opacity' : 0,
            },300,function(){
                $(this).css({
                'margin' : 0,
            }).remove();
            })
        }
    }
    M.mouseClose = function(){
    settings.ismoseoverclose && (function(){
        M.barrageBox.mouseover(function(){
            clearInterval(M.timer);
            M.timer = null;
        }).mouseout(function(){
            M.timer = setInterval(function(){ //循环
                createView();
            },settings.time)
        })
    
    })()
    }
    Obj.close = function(){
        M.barrageBox.remove();
        clearInterval(M.timer);
        M.timer = null;
    }
    Obj.start = function(){
        if(M.timer) return;
        _self.append(M.barrageBox); //把弹幕盒子放到页面中
        createView(); //创建试图并开始动画
        M.timer = setInterval(function(){ //循环
            createView();
        },settings.time)
        M.mouseClose();
    }
    return Obj;
}


$.ajax({
    type: "POST",
    url: '/wp-admin/admin-ajax.php',
    data: {action:'getdanmu'},
    success: function (msg) {
        var Obj = $('body').barrage({
            data: msg,//数据
            row: 3,//显示行数
            time: 2500,//时间
            gap: 15,//间隙
            ismoseoverclose: true, //悬浮是否停止
        })

        if ($('#ceo-danmu').length == 0) {
            Obj.start();
        }

    }
});