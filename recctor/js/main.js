jQuery(document).ready(function($){
	
	//タッチホバー
	var linkTouchStart = function(){
	    thisAnchor = $(this);
	    touchPos = thisAnchor.offset().top;
	    moveCheck = function(){
	        nowPos = thisAnchor.offset().top;
	        if(touchPos == nowPos){
	            thisAnchor.addClass("hover");
	        }
	    }
	    setTimeout(moveCheck,100);
	}
	var linkTouchEnd = function(){
	    thisAnchor = $(this);
	    hoverRemove = function(){
	        thisAnchor.removeClass("hover");
	    }
	    setTimeout(hoverRemove,500);
	}
	 
	$(document).on('touchstart mousedown','a',linkTouchStart);
	$(document).on('touchend mouseup','a',linkTouchEnd);

	//スムーススクロール
	var offsetY = 0;
    var time = 500;
    $('a[href^=#]').click(function() {
        var target = $(this.hash);
        if (!target.length) return ;
        var targetY = target.offset().top+offsetY;
        $('html,body').animate({scrollTop: targetY}, time, 'swing');
        window.history.pushState(null, null, this.hash);
        return false;
    });

    //ハンバーガーメニュー
    $('.menu-trigger').on('click', function(){
        $(this).toggleClass('active');
        $('.nav').toggleClass('opend');
    });
    $('header ul a').on('click', function(){
        $('.menu-trigger').toggleClass('active');
        $('.nav').toggleClass('opend');
    });

    //スクロール関連
    $(window).scroll(function () {
    	//フィックスドヘッダー
        if ($(this).scrollTop() > 30) {
            $('header').addClass('fixed');
        } else {
            $('header').removeClass('fixed');
        }
        //トップに戻るボタン
        if ($(this).scrollTop() > 100) {
            $('#page-top').addClass('appear');
        } else {
            $('#page-top').removeClass('appear');
        }
    });

    //レスポンシブ制御
    if( window.matchMedia("(min-width: 769px)").matches ){
        $('.sp').remove();
    }
    if( window.matchMedia("(max-width: 768px)").matches ){
        $('.pc').remove();
    }

    //FAQ
    $('.open-btn').on('click', function(){
        $(this).toggleClass('opend');
    });

});













