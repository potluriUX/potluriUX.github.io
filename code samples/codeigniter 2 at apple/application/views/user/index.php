<head>
    <title>Grid Test</title>

    <!-- Include Ext and app-specific scripts: -->
    <script type="text/javascript" src="assets/js/ext/adapter/ext/ext-base.js"></script>
    <script type="text/javascript" src="assets/js/ext/ext-all.js"></script>
 <script type ="'text/javascript">
window.undefined=window.undefined;Ext={version:"3.2.1",versionDetail:{major:3,minor:2,patch:1}};Ext.apply=function(d,e,b){if(b){Ext.apply(d,b)}if(d&&e&&typeof e=="object"){for(var a in e){d[a]=e[a]}}return d};(function(){var g=0,s=Object.prototype.toString,t=navigator.userAgent.toLowerCase(),y=function(e){return e.test(t)},i=document,l=i.compatMode=="CSS1Compat",A=y(/opera/),h=y(/\bchrome\b/),u=y(/webkit/),x=!h&&y(/safari/),f=x&&y(/applewebkit\/4/),b=x&&y(/version\/3/),B=x&&y(/version\/4/),r=!A&&y(/msie/),p=r&&y(/msie 7/),o=r&&y(/msie 8/),q=r&&!p&&!o,n=!u&&y(/gecko/),d=n&&y(/rv:1\.8/),a=n&&y(/rv:1\.9/),v=r&&!l,z=y(/windows|win32/),k=y(/macintosh|mac os x/),j=y(/adobeair/),m=y(/linux/),c=/^https/i.test(window.location.protocol);if(q){try{i.execCommand("BackgroundImageCache",false,true)}catch(w){}}Ext.apply(Ext,{SSL_SECURE_URL:c&&r?'javascript:""':"about:blank",isStrict:l,isSecure:c,isReady:false,enableGarbageCollector:true,enableListenerCollection:false,enableNestedListenerRemoval:false,USE_NATIVE_JSON:false,applyIf:function(C,D){if(C){for(var e in D){if(!Ext.isDefined(C[e])){C[e]=D[e]}}}return C},id:function(e,C){e=Ext.getDom(e,true)||{};if(!e.id){e.id=(C||"ext-gen")+(++g)}return e.id},extend:function(){var C=function(E){for(var D in E){this[D]=E[D]}};var e=Object.prototype.constructor;return function(J,G,I){if(typeof G=="object"){I=G;G=J;J=I.constructor!=e?I.constructor:function(){G.apply(this,arguments)}}var E=function(){},H,D=G.prototype;E.prototype=D;H=J.prototype=new E();H.constructor=J;J.superclass=D;if(D.constructor==e){D.constructor=G}J.override=function(F){Ext.override(J,F)};H.superclass=H.supr=(function(){return D});H.override=C;Ext.override(J,I);J.extend=function(F){return Ext.extend(J,F)};return J}}(),override:function(e,D){if(D){var C=e.prototype;Ext.apply(C,D);if(Ext.isIE&&D.hasOwnProperty("toString")){C.toString=D.toString}}},namespace:function(){var C,e;Ext.each(arguments,function(D){e=D.split(".");C=window[e[0]]=window[e[0]]||{};Ext.each(e.slice(1),function(E){C=C[E]=C[E]||{}})});return C},urlEncode:function(G,F){var D,C=[],E=encodeURIComponent;Ext.iterate(G,function(e,H){D=Ext.isEmpty(H);Ext.each(D?e:H,function(I){C.push("&",E(e),"=",(!Ext.isEmpty(I)&&(I!=e||!D))?(Ext.isDate(I)?Ext.encode(I).replace(/"/g,""):E(I)):"")})});if(!F){C.shift();F=""}return F+C.join("")},urlDecode:function(D,C){if(Ext.isEmpty(D)){return{}}var G={},F=D.split("&"),H=decodeURIComponent,e,E;Ext.each(F,function(I){I=I.split("=");e=H(I[0]);E=H(I[1]);G[e]=C||!G[e]?E:[].concat(G[e]).concat(E)});return G},urlAppend:function(e,C){if(!Ext.isEmpty(C)){return e+(e.indexOf("?")===-1?"?":"&")+C}return e},toArray:function(){return r?function(D,G,E,F){F=[];for(var C=0,e=D.length;C<e;C++){F.push(D[C])}return F.slice(G||0,E||F.length)}:function(e,D,C){return Array.prototype.slice.call(e,D||0,C||e.length)}}(),isIterable:function(e){if(Ext.isArray(e)||e.callee){return true}if(/NodeList|HTMLCollection/.test(s.call(e))){return true}return((typeof e.nextNode!="undefined"||e.item)&&Ext.isNumber(e.length))},each:function(F,E,D){if(Ext.isEmpty(F,true)){return}if(!Ext.isIterable(F)||Ext.isPrimitive(F)){F=[F]}for(var C=0,e=F.length;C<e;C++){if(E.call(D||F[C],F[C],C,F)===false){return C}}},iterate:function(D,C,e){if(Ext.isEmpty(D)){return}if(Ext.isIterable(D)){Ext.each(D,C,e);return}else{if(typeof D=="object"){for(var E in D){if(D.hasOwnProperty(E)){if(C.call(e||D,E,D[E],D)===false){return}}}}}},getDom:function(D,C){if(!D||!i){return null}if(D.dom){return D.dom}else{if(typeof D=="string"){var E=i.getElementById(D);if(E&&r&&C){if(D==E.getAttribute("id")){return E}else{return null}}return E}else{return D}}},getBody:function(){return Ext.get(i.body||i.documentElement)},removeNode:r&&!o?function(){var e;return function(C){if(C&&C.tagName!="BODY"){(Ext.enableNestedListenerRemoval)?Ext.EventManager.purgeElement(C,true):Ext.EventManager.removeAll(C);e=e||i.createElement("div");e.appendChild(C);e.innerHTML="";delete Ext.elCache[C.id]}}}():function(e){if(e&&e.parentNode&&e.tagName!="BODY"){(Ext.enableNestedListenerRemoval)?Ext.EventManager.purgeElement(e,true):Ext.EventManager.removeAll(e);e.parentNode.removeChild(e);delete Ext.elCache[e.id]}},isEmpty:function(C,e){return C===null||C===undefined||((Ext.isArray(C)&&!C.length))||(!e?C==="":false)},isArray:function(e){return s.apply(e)==="[object Array]"},isDate:function(e){return s.apply(e)==="[object Date]"},isObject:function(e){return !!e&&Object.prototype.toString.call(e)==="[object Object]"},isPrimitive:function(e){return Ext.isString(e)||Ext.isNumber(e)||Ext.isBoolean(e)},isFunction:function(e){return s.apply(e)==="[object Function]"},isNumber:function(e){return typeof e==="number"&&isFinite(e)},isString:function(e){return typeof e==="string"},isBoolean:function(e){return typeof e==="boolean"},isElement:function(e){return e?!!e.tagName:false},isDefined:function(e){return typeof e!=="undefined"},isOpera:A,isWebKit:u,isChrome:h,isSafari:x,isSafari3:b,isSafari4:B,isSafari2:f,isIE:r,isIE6:q,isIE7:p,isIE8:o,isGecko:n,isGecko2:d,isGecko3:a,isBorderBox:v,isLinux:m,isWindows:z,isMac:k,isAir:j});Ext.ns=Ext.namespace})();Ext.ns("Ext.util","Ext.lib","Ext.data");Ext.elCache={};Ext.apply(Function.prototype,{createInterceptor:function(b,a){var c=this;return !Ext.isFunction(b)?this:function(){var e=this,d=arguments;b.target=e;b.method=c;return(b.apply(a||e||window,d)!==false)?c.apply(e||window,d):null}},createCallback:function(){var a=arguments,b=this;return function(){return b.apply(window,a)}},createDelegate:function(c,b,a){var d=this;return function(){var f=b||arguments;if(a===true){f=Array.prototype.slice.call(arguments,0);f=f.concat(b)}else{if(Ext.isNumber(a)){f=Array.prototype.slice.call(arguments,0);var e=[a,0].concat(b);Array.prototype.splice.apply(f,e)}}return d.apply(c||window,f)}},defer:function(c,e,b,a){var d=this.createDelegate(e,b,a);if(c>0){return setTimeout(d,c)}d();return 0}});Ext.applyIf(String,{format:function(b){var a=Ext.toArray(arguments,1);return b.replace(/\{(\d+)\}/g,function(c,d){return a[d]})}});Ext.applyIf(Array.prototype,{indexOf:function(b,c){var a=this.length;c=c||0;c+=(c<0)?a:0;for(;c<a;++c){if(this[c]===b){return c}}return -1},remove:function(b){var a=this.indexOf(b);if(a!=-1){this.splice(a,1)}return this}});Ext.ns("Ext.grid","Ext.list","Ext.dd","Ext.tree","Ext.form","Ext.menu","Ext.state","Ext.layout","Ext.app","Ext.ux","Ext.chart","Ext.direct");Ext.apply(Ext,function(){var c=Ext,a=0,b=null;return{emptyFn:function(){},BLANK_IMAGE_URL:Ext.isIE6||Ext.isIE7||Ext.isAir?"http://www.extjs.com/s.gif":"data:image/gif;base64,R0lGODlhAQABAID/AMDAwAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==",extendX:function(d,e){return Ext.extend(d,e(d.prototype))},getDoc:function(){return Ext.get(document)},num:function(e,d){e=Number(Ext.isEmpty(e)||Ext.isArray(e)||typeof e=="boolean"||(typeof e=="string"&&e.trim().length==0)?NaN:e);return isNaN(e)?d:e},value:function(f,d,e){return Ext.isEmpty(f,e)?d:f},escapeRe:function(d){return d.replace(/([-.*+?^${}()|[\]\/\\])/g,"\\$1")},sequence:function(g,d,f,e){g[d]=g[d].createSequence(f,e)},addBehaviors:function(h){if(!Ext.isReady){Ext.onReady(function(){Ext.addBehaviors(h)})}else{var e={},g,d,f;for(d in h){if((g=d.split("@"))[1]){f=g[0];if(!e[f]){e[f]=Ext.select(f)}e[f].on(g[1],h[d])}}e=null}},getScrollBarWidth:function(f){if(!Ext.isReady){return 0}if(f===true||b===null){var h=Ext.getBody().createChild('<div class="x-hide-offsets" style="width:100px;height:50px;overflow:hidden;"><div style="height:200px;"></div></div>'),g=h.child("div",true);var e=g.offsetWidth;h.setStyle("overflow",(Ext.isWebKit||Ext.isGecko)?"auto":"scroll");var d=g.offsetWidth;h.remove();b=e-d+2}return b},combine:function(){var f=arguments,e=f.length,h=[];for(var g=0;g<e;g++){var d=f[g];if(Ext.isArray(d)){h=h.concat(d)}else{if(d.length!==undefined&&!d.substr){h=h.concat(Array.prototype.slice.call(d,0))}else{h.push(d)}}}return h},copyTo:function(d,e,f){if(typeof f=="string"){f=f.split(/[,;\s]/)}Ext.each(f,function(g){if(e.hasOwnProperty(g)){d[g]=e[g]}},this);return d},destroy:function(){Ext.each(arguments,function(d){if(d){if(Ext.isArray(d)){this.destroy.apply(this,d)}else{if(typeof d.destroy=="function"){d.destroy()}else{if(d.dom){d.remove()}}}}},this)},destroyMembers:function(k,h,f,g){for(var j=1,e=arguments,d=e.length;j<d;j++){Ext.destroy(k[e[j]]);delete k[e[j]]}},clean:function(d){var e=[];Ext.each(d,function(f){if(!!f){e.push(f)}});return e},unique:function(d){var e=[],f={};Ext.each(d,function(g){if(!f[g]){e.push(g)}f[g]=true});return e},flatten:function(d){var f=[];function e(g){Ext.each(g,function(h){if(Ext.isArray(h)){e(h)}else{f.push(h)}});return f}return e(d)},min:function(d,e){var f=d[0];e=e||function(h,g){return h<g?-1:1};Ext.each(d,function(g){f=e(f,g)==-1?f:g});return f},max:function(d,e){var f=d[0];e=e||function(h,g){return h>g?1:-1};Ext.each(d,function(g){f=e(f,g)==1?f:g});return f},mean:function(d){return d.length>0?Ext.sum(d)/d.length:undefined},sum:function(d){var e=0;Ext.each(d,function(f){e+=f});return e},partition:function(d,e){var f=[[],[]];Ext.each(d,function(h,j,g){f[(e&&e(h,j,g))||(!e&&h)?0:1].push(h)});return f},invoke:function(d,e){var g=[],f=Array.prototype.slice.call(arguments,2);Ext.each(d,function(h,j){if(h&&typeof h[e]=="function"){g.push(h[e].apply(h,f))}else{g.push(undefined)}});return g},pluck:function(d,f){var e=[];Ext.each(d,function(g){e.push(g[f])});return e},zip:function(){var m=Ext.partition(arguments,function(i){return typeof i!="function"}),h=m[0],l=m[1][0],d=Ext.max(Ext.pluck(h,"length")),g=[];for(var k=0;k<d;k++){g[k]=[];if(l){g[k]=l.apply(l,Ext.pluck(h,k))}else{for(var f=0,e=h.length;f<e;f++){g[k].push(h[f][k])}}}return g},getCmp:function(d){return Ext.ComponentMgr.get(d)},useShims:c.isIE6||(c.isMac&&c.isGecko2),type:function(e){if(e===undefined||e===null){return false}if(e.htmlElement){return"element"}var d=typeof e;if(d=="object"&&e.nodeName){switch(e.nodeType){case 1:return"element";case 3:return(/\S/).test(e.nodeValue)?"textnode":"whitespace"}}if(d=="object"||d=="function"){switch(e.constructor){case Array:return"array";case RegExp:return"regexp";case Date:return"date"}if(typeof e.length=="number"&&typeof e.item=="function"){return"nodelist"}}return d},intercept:function(g,d,f,e){g[d]=g[d].createInterceptor(f,e)},callback:function(d,g,f,e){if(typeof d=="function"){if(e){d.defer(e,g,f||[])}else{d.apply(g,f||[])}}}}}());Ext.apply(Function.prototype,{createSequence:function(b,a){var c=this;return(typeof b!="function")?this:function(){var d=c.apply(this||window,arguments);b.apply(a||this||window,arguments);return d}}});Ext.applyIf(String,{escape:function(a){return a.replace(/('|\\)/g,"\\$1")},leftPad:function(d,b,c){var a=String(d);if(!c){c=" "}while(a.length<b){a=c+a}return a}});String.prototype.toggle=function(b,a){return this==b?a:b};String.prototype.trim=function(){var a=/^\s+|\s+$/g;return function(){return this.replace(a,"")}}();Date.prototype.getElapsed=function(a){return Math.abs((a||new Date()).getTime()-this.getTime())};Ext.applyIf(Number.prototype,{constrain:function(b,a){return Math.min(Math.max(this,b),a)}});Ext.util.TaskRunner=function(e){e=e||10;var f=[],a=[],b=0,g=false,d=function(){g=false;clearInterval(b);b=0},h=function(){if(!g){g=true;b=setInterval(i,e)}},c=function(j){a.push(j);if(j.onStop){j.onStop.apply(j.scope||j)}},i=function(){var l=a.length,n=new Date().getTime();if(l>0){for(var p=0;p<l;p++){f.remove(a[p])}a=[];if(f.length<1){d();return}}for(var p=0,o,k,m,j=f.length;p<j;++p){o=f[p];k=n-o.taskRunTime;if(o.interval<=k){m=o.run.apply(o.scope||o,o.args||[++o.taskRunCount]);o.taskRunTime=n;if(m===false||o.taskRunCount===o.repeat){c(o);return}}if(o.duration&&o.duration<=(n-o.taskStartTime)){c(o)}}};this.start=function(j){f.push(j);j.taskStartTime=new Date().getTime();j.taskRunTime=0;j.taskRunCount=0;h();return j};this.stop=function(j){c(j);return j};this.stopAll=function(){d();for(var k=0,j=f.length;k<j;k++){if(f[k].onStop){f[k].onStop()}}f=[];a=[]}};Ext.TaskMgr=new Ext.util.TaskRunner();(function(){var b;function c(d){if(!b){b=new Ext.Element.Flyweight()}b.dom=d;return b}(function(){var g=document,e=g.compatMode=="CSS1Compat",f=Math.max,d=Math.round,h=parseInt;Ext.lib.Dom={isAncestor:function(j,k){var i=false;j=Ext.getDom(j);k=Ext.getDom(k);if(j&&k){if(j.contains){return j.contains(k)}else{if(j.compareDocumentPosition){return !!(j.compareDocumentPosition(k)&16)}else{while(k=k.parentNode){i=k==j||i}}}}return i},getViewWidth:function(i){return i?this.getDocumentWidth():this.getViewportWidth()},getViewHeight:function(i){return i?this.getDocumentHeight():this.getViewportHeight()},getDocumentHeight:function(){return f(!e?g.body.scrollHeight:g.documentElement.scrollHeight,this.getViewportHeight())},getDocumentWidth:function(){return f(!e?g.body.scrollWidth:g.documentElement.scrollWidth,this.getViewportWidth())},getViewportHeight:function(){return Ext.isIE?(Ext.isStrict?g.documentElement.clientHeight:g.body.clientHeight):self.innerHeight},getViewportWidth:function(){return !Ext.isStrict&&!Ext.isOpera?g.body.clientWidth:Ext.isIE?g.documentElement.clientWidth:self.innerWidth},getY:function(i){return this.getXY(i)[1]},getX:function(i){return this.getXY(i)[0]},getXY:function(k){var j,q,s,v,l,m,u=0,r=0,t,i,n=(g.body||g.documentElement),o=[0,0];k=Ext.getDom(k);if(k!=n){if(k.getBoundingClientRect){s=k.getBoundingClientRect();t=c(document).getScroll();o=[d(s.left+t.left),d(s.top+t.top)]}else{j=k;i=c(k).isStyle("position","absolute");while(j){q=c(j);u+=j.offsetLeft;r+=j.offsetTop;i=i||q.isStyle("position","absolute");if(Ext.isGecko){r+=v=h(q.getStyle("borderTopWidth"),10)||0;u+=l=h(q.getStyle("borderLeftWidth"),10)||0;if(j!=k&&!q.isStyle("overflow","visible")){u+=l;r+=v}}j=j.offsetParent}if(Ext.isSafari&&i){u-=n.offsetLeft;r-=n.offsetTop}if(Ext.isGecko&&!i){m=c(n);u+=h(m.getStyle("borderLeftWidth"),10)||0;r+=h(m.getStyle("borderTopWidth"),10)||0}j=k.parentNode;while(j&&j!=n){if(!Ext.isOpera||(j.tagName!="TR"&&!c(j).isStyle("display","inline"))){u-=j.scrollLeft;r-=j.scrollTop}j=j.parentNode}o=[u,r]}}return o},setXY:function(j,k){(j=Ext.fly(j,"_setXY")).position();var l=j.translatePoints(k),i=j.dom.style,m;for(m in l){if(!isNaN(l[m])){i[m]=l[m]+"px"}}},setX:function(j,i){this.setXY(j,[i,false])},setY:function(i,j){this.setXY(i,[false,j])}}})();Ext.lib.Dom.getRegion=function(d){return Ext.lib.Region.getRegion(d)};Ext.lib.Event=function(){var w=false,g={},A=0,p=[],d,C=false,k=window,G=document,l=200,s=20,B=0,r=0,i=1,m=2,t=2,x=3,u="scrollLeft",q="scrollTop",f="unload",z="mouseover",F="mouseout",e=function(){var H;if(k.addEventListener){H=function(L,J,K,I){if(J=="mouseenter"){K=K.createInterceptor(o);L.addEventListener(z,K,(I))}else{if(J=="mouseleave"){K=K.createInterceptor(o);L.addEventListener(F,K,(I))}else{L.addEventListener(J,K,(I))}}return K}}else{if(k.attachEvent){H=function(L,J,K,I){L.attachEvent("on"+J,K);return K}}else{H=function(){}}}return H}(),h=function(){var H;if(k.removeEventListener){H=function(L,J,K,I){if(J=="mouseenter"){J=z}else{if(J=="mouseleave"){J=F}}L.removeEventListener(J,K,(I))}}else{if(k.detachEvent){H=function(K,I,J){K.detachEvent("on"+I,J)}}else{H=function(){}}}return H}();function o(H){return !v(H.currentTarget,y.getRelatedTarget(H))}function v(H,I){if(H&&H.firstChild){while(I){if(I===H){return true}I=I.parentNode;if(I&&(I.nodeType!=1)){I=null}}}return false}function D(){var I=false,N=[],L,K,H,J,M=!w||(A>0);if(!C){C=true;for(K=0;K<p.length;++K){H=p[K];if(H&&(L=G.getElementById(H.id))){if(!H.checkReady||w||L.nextSibling||(G&&G.body)){J=H.override;L=J?(J===true?H.obj:J):L;H.fn.call(L,H.obj);p.remove(H);--K}else{N.push(H)}}}A=(N.length===0)?0:A-1;if(M){n()}else{clearInterval(d);d=null}I=!(C=false)}return I}function n(){if(!d){var H=function(){D()};d=setInterval(H,s)}}function E(){var H=G.documentElement,I=G.body;if(H&&(H[q]||H[u])){return[H[u],H[q]]}else{if(I){return[I[u],I[q]]}else{return[0,0]}}}function j(H,I){H=H.browserEvent||H;var J=H["page"+I];if(!J&&J!==0){J=H["client"+I]||0;if(Ext.isIE){J+=E()[I=="X"?0:1]}}return J}var y={extAdapter:true,onAvailable:function(J,H,K,I){p.push({id:J,fn:H,obj:K,override:I,checkReady:false});A=l;n()},addListener:function(J,H,I){J=Ext.getDom(J);if(J&&I){if(H==f){if(g[J.id]===undefined){g[J.id]=[]}g[J.id].push([H,I]);return I}return e(J,H,I,false)}return false},removeListener:function(N,J,M){N=Ext.getDom(N);var L,I,H,K;if(N&&M){if(J==f){if((K=g[N.id])!==undefined){for(L=0,I=K.length;L<I;L++){if((H=K[L])&&H[r]==J&&H[i]==M){g[N.id].splice(L,1)}}}return}h(N,J,M,false)}},getTarget:function(H){H=H.browserEvent||H;return this.resolveTextNode(H.target||H.srcElement)},resolveTextNode:Ext.isGecko?function(I){if(!I){return}var H=HTMLElement.prototype.toString.call(I);if(H=="[xpconnect wrapped native prototype]"||H=="[object XULElement]"){return}return I.nodeType==3?I.parentNode:I}:function(H){return H&&H.nodeType==3?H.parentNode:H},getRelatedTarget:function(H){H=H.browserEvent||H;return this.resolveTextNode(H.relatedTarget||(H.type==F?H.toElement:H.type==z?H.fromElement:null))},getPageX:function(H){return j(H,"X")},getPageY:function(H){return j(H,"Y")},getXY:function(H){return[this.getPageX(H),this.getPageY(H)]},stopEvent:function(H){this.stopPropagation(H);this.preventDefault(H)},stopPropagation:function(H){H=H.browserEvent||H;if(H.stopPropagation){H.stopPropagation()}else{H.cancelBubble=true}},preventDefault:function(H){H=H.browserEvent||H;if(H.preventDefault){H.preventDefault()}else{H.returnValue=false}},getEvent:function(H){H=H||k.event;if(!H){var I=this.getEvent.caller;while(I){H=I.arguments[0];if(H&&Event==H.constructor){break}I=I.caller}}return H},getCharCode:function(H){H=H.browserEvent||H;return H.charCode||H.keyCode||0},getListeners:function(I,H){Ext.EventManager.getListeners(I,H)},purgeElement:function(I,J,H){Ext.EventManager.purgeElement(I,J,H)},_load:function(I){w=true;var H=Ext.lib.Event;if(Ext.isIE&&I!==true){h(k,"load",arguments.callee)}},_unload:function(O){var I=Ext.lib.Event,L,K,J,R,P,H,N,M,S;for(H in g){P=g[H];for(L=0,N=P.length;L<N;L++){R=P[L];if(R){try{S=R[x]?(R[x]===true?R[t]:R[x]):k;R[i].call(S,I.getEvent(O),R[t])}catch(Q){}}}}Ext.EventManager._unload();h(k,f,I._unload)}};y.on=y.addListener;y.un=y.removeListener;if(G&&G.body){y._load(true)}else{e(k,"load",y._load)}e(k,f,y._unload);D();return y}();Ext.lib.Ajax=function(){var g=["MSXML2.XMLHTTP.3.0","MSXML2.XMLHTTP","Microsoft.XMLHTTP"],d="Content-Type";function h(s){var r=s.conn,t;function q(u,v){for(t in v){if(v.hasOwnProperty(t)){u.setRequestHeader(t,v[t])}}}if(k.defaultHeaders){q(r,k.defaultHeaders)}if(k.headers){q(r,k.headers);delete k.headers}}function e(t,s,r,q){return{tId:t,status:r?-1:0,statusText:r?"transaction aborted":"communication failure",isAbort:r,isTimeout:q,argument:s}}function j(q,r){(k.headers=k.headers||{})[q]=r}function o(q,w){var A={},v,u=q.conn,y,z,r=u.status==1223;try{v=q.conn.getAllResponseHeaders();Ext.each(v.replace(/\r\n/g,"\n").split("\n"),function(s){y=s.indexOf(":");if(y>=0){z=s.substr(0,y).toLowerCase();if(s.charAt(y+1)==" "){++y}A[z]=s.substr(y+1)}})}catch(x){}return{tId:q.tId,status:r?204:u.status,statusText:r?"No Content":u.statusText,getResponseHeader:function(s){return A[s.toLowerCase()]},getAllResponseHeaders:function(){return v},responseText:u.responseText,responseXML:u.responseXML,argument:w}}function n(q){if(q.tId){k.conn[q.tId]=null}q.conn=null;q=null}function f(v,w,r,q){if(!w){n(v);return}var t,s;try{if(v.conn.status!==undefined&&v.conn.status!=0){t=v.conn.status}else{t=13030}}catch(u){t=13030}if((t>=200&&t<300)||(Ext.isIE&&t==1223)){s=o(v,w.argument);if(w.success){if(!w.scope){w.success(s)}else{w.success.apply(w.scope,[s])}}}else{switch(t){case 12002:case 12029:case 12030:case 12031:case 12152:case 13030:s=e(v.tId,w.argument,(r?r:false),q);if(w.failure){if(!w.scope){w.failure(s)}else{w.failure.apply(w.scope,[s])}}break;default:s=o(v,w.argument);if(w.failure){if(!w.scope){w.failure(s)}else{w.failure.apply(w.scope,[s])}}}}n(v);s=null}function m(s,v){v=v||{};var q=s.conn,u=s.tId,r=k.poll,t=v.timeout||null;if(t){k.conn[u]=q;k.timeout[u]=setTimeout(function(){k.abort(s,v,true)},t)}r[u]=setInterval(function(){if(q&&q.readyState==4){clearInterval(r[u]);r[u]=null;if(t){clearTimeout(k.timeout[u]);k.timeout[u]=null}f(s,v)}},k.pollInterval)}function i(u,r,t,q){var s=l()||null;if(s){s.conn.open(u,r,true);if(k.useDefaultXhrHeader){j("X-Requested-With",k.defaultXhrHeader)}if(q&&k.useDefaultHeader&&(!k.headers||!k.headers[d])){j(d,k.defaultPostHeader)}if(k.defaultHeaders||k.headers){h(s)}m(s,t);s.conn.send(q||null)}return s}function l(){var r;try{if(r=p(k.transactionId)){k.transactionId++}}catch(q){}finally{return r}}function p(t){var q;try{q=new XMLHttpRequest()}catch(s){for(var r=0;r<g.length;++r){try{q=new ActiveXObject(g[r]);break}catch(s){}}}finally{return{conn:q,tId:t}}}var k={request:function(q,s,t,u,y){if(y){var v=this,r=y.xmlData,w=y.jsonData,x;Ext.applyIf(v,y);if(r||w){x=v.headers;if(!x||!x[d]){j(d,r?"text/xml":"application/json")}u=r||(!Ext.isPrimitive(w)?Ext.encode(w):w)}}return i(q||y.method||"POST",s,t,u)},serializeForm:function(r){var s=r.elements||(document.forms[r]||Ext.getDom(r)).elements,y=false,x=encodeURIComponent,v,z,q,t,u="",w;Ext.each(s,function(A){q=A.name;w=A.type;if(!A.disabled&&q){if(/select-(one|multiple)/i.test(w)){Ext.each(A.options,function(B){if(B.selected){u+=String.format("{0}={1}&",x(q),x((B.hasAttribute?B.hasAttribute("value"):B.getAttribute("value")!==null)?B.value:B.text))}})}else{if(!/file|undefined|reset|button/i.test(w)){if(!(/radio|checkbox/i.test(w)&&!A.checked)&&!(w=="submit"&&y)){u+=x(q)+"="+x(A.value)+"&";y=/submit/i.test(w)}}}}});return u.substr(0,u.length-1)},useDefaultHeader:true,defaultPostHeader:"application/x-www-form-urlencoded; charset=UTF-8",useDefaultXhrHeader:true,defaultXhrHeader:"XMLHttpRequest",poll:{},timeout:{},conn:{},pollInterval:50,transactionId:0,abort:function(t,v,q){var s=this,u=t.tId,r=false;if(s.isCallInProgress(t)){t.conn.abort();clearInterval(s.poll[u]);s.poll[u]=null;clearTimeout(k.timeout[u]);s.timeout[u]=null;f(t,v,(r=true),q)}return r},isCallInProgress:function(q){return q.conn&&!{0:true,4:true}[q.conn.readyState]}};return k}();Ext.lib.Region=function(f,h,d,e){var g=this;g.top=f;g[1]=f;g.right=h;g.bottom=d;g.left=e;g[0]=e};Ext.lib.Region.prototype={contains:function(e){var d=this;return(e.left>=d.left&&e.right<=d.right&&e.top>=d.top&&e.bottom<=d.bottom)},getArea:function(){var d=this;return((d.bottom-d.top)*(d.right-d.left))},intersect:function(i){var h=this,f=Math.max(h.top,i.top),g=Math.min(h.right,i.right),d=Math.min(h.bottom,i.bottom),e=Math.max(h.left,i.left);if(d>=f&&g>=e){return new Ext.lib.Region(f,g,d,e)}},union:function(i){var h=this,f=Math.min(h.top,i.top),g=Math.max(h.right,i.right),d=Math.max(h.bottom,i.bottom),e=Math.min(h.left,i.left);return new Ext.lib.Region(f,g,d,e)},constrainTo:function(e){var d=this;d.top=d.top.constrain(e.top,e.bottom);d.bottom=d.bottom.constrain(e.top,e.bottom);d.left=d.left.constrain(e.left,e.right);d.right=d.right.constrain(e.left,e.right);return d},adjust:function(f,e,d,h){var g=this;g.top+=f;g.left+=e;g.right+=h;g.bottom+=d;return g}};Ext.lib.Region.getRegion=function(g){var i=Ext.lib.Dom.getXY(g),f=i[1],h=i[0]+g.offsetWidth,d=i[1]+g.offsetHeight,e=i[0];return new Ext.lib.Region(f,h,d,e)};Ext.lib.Point=function(d,f){if(Ext.isArray(d)){f=d[1];d=d[0]}var e=this;e.x=e.right=e.left=e[0]=d;e.y=e.top=e.bottom=e[1]=f};Ext.lib.Point.prototype=new Ext.lib.Region();(function(){var g=Ext.lib,i=/width|height|opacity|padding/i,f=/^((width|height)|(top|left))$/,d=/width|height|top$|bottom$|left$|right$/i,h=/\d+(em|%|en|ex|pt|in|cm|mm|pc)$/i,j=function(k){return typeof k!=="undefined"},e=function(){return new Date()};g.Anim={motion:function(n,l,o,p,k,m){return this.run(n,l,o,p,k,m,Ext.lib.Motion)},run:function(o,l,q,r,k,n,m){m=m||Ext.lib.AnimBase;if(typeof r=="string"){r=Ext.lib.Easing[r]}var p=new m(o,l,q,r);p.animateX(function(){if(Ext.isFunction(k)){k.call(n)}});return p}};g.AnimBase=function(l,k,m,n){if(l){this.init(l,k,m,n)}};g.AnimBase.prototype={doMethod:function(k,n,l){var m=this;return m.method(m.curFrame,n,l-n,m.totalFrames)},setAttr:function(k,m,l){if(i.test(k)&&m<0){m=0}Ext.fly(this.el,"_anim").setStyle(k,m+l)},getAttr:function(k){var m=Ext.fly(this.el),n=m.getStyle(k),l=f.exec(k)||[];if(n!=="auto"&&!h.test(n)){return parseFloat(n)}return(!!(l[2])||(m.getStyle("position")=="absolute"&&!!(l[3])))?m.dom["offset"+l[0].charAt(0).toUpperCase()+l[0].substr(1)]:0},getDefaultUnit:function(k){return d.test(k)?"px":""},animateX:function(n,k){var l=this,m=function(){l.onComplete.removeListener(m);if(Ext.isFunction(n)){n.call(k||l,l)}};l.onComplete.addListener(m,l);l.animate()},setRunAttr:function(p){var r=this,s=this.attributes[p],t=s.to,q=s.by,u=s.from,v=s.unit,l=(this.runAttrs[p]={}),m;if(!j(t)&&!j(q)){return false}var k=j(u)?u:r.getAttr(p);if(j(t)){m=t}else{if(j(q)){if(Ext.isArray(k)){m=[];for(var n=0,o=k.length;n<o;n++){m[n]=k[n]+q[n]}}else{m=k+q}}}Ext.apply(l,{start:k,end:m,unit:j(v)?v:r.getDefaultUnit(p)})},init:function(l,p,o,k){var r=this,n=0,s=g.AnimMgr;Ext.apply(r,{isAnimated:false,startTime:null,el:Ext.getDom(l),attributes:p||{},duration:o||1,method:k||g.Easing.easeNone,useSec:true,curFrame:0,totalFrames:s.fps,runAttrs:{},animate:function(){var u=this,v=u.duration;if(u.isAnimated){return false}u.curFrame=0;u.totalFrames=u.useSec?Math.ceil(s.fps*v):v;s.registerElement(u)},stop:function(u){var v=this;if(u){v.curFrame=v.totalFrames;v._onTween.fire()}s.stop(v)}});var t=function(){var v=this,u;v.onStart.fire();v.runAttrs={};for(u in this.attributes){this.setRunAttr(u)}v.isAnimated=true;v.startTime=e();n=0};var q=function(){var v=this;v.onTween.fire({duration:e()-v.startTime,curFrame:v.curFrame});var w=v.runAttrs;for(var u in w){this.setAttr(u,v.doMethod(u,w[u].start,w[u].end),w[u].unit)}++n};var m=function(){var u=this,w=(e()-u.startTime)/1000,v={duration:w,frames:n,fps:n/w};u.isAnimated=false;n=0;u.onComplete.fire(v)};r.onStart=new Ext.util.Event(r);r.onTween=new Ext.util.Event(r);r.onComplete=new Ext.util.Event(r);(r._onStart=new Ext.util.Event(r)).addListener(t);(r._onTween=new Ext.util.Event(r)).addListener(q);(r._onComplete=new Ext.util.Event(r)).addListener(m)}};Ext.lib.AnimMgr=new function(){var o=this,m=null,l=[],k=0;Ext.apply(o,{fps:1000,delay:1,registerElement:function(q){l.push(q);++k;q._onStart.fire();o.start()},unRegister:function(r,q){r._onComplete.fire();q=q||p(r);if(q!=-1){l.splice(q,1)}if(--k<=0){o.stop()}},start:function(){if(m===null){m=setInterval(o.run,o.delay)}},stop:function(s){if(!s){clearInterval(m);for(var r=0,q=l.length;r<q;++r){if(l[0].isAnimated){o.unRegister(l[0],0)}}l=[];m=null;k=0}else{o.unRegister(s)}},run:function(){var t,s,q,r;for(s=0,q=l.length;s<q;s++){r=l[s];if(r&&r.isAnimated){t=r.totalFrames;if(r.curFrame<t||t===null){++r.curFrame;if(r.useSec){n(r)}r._onTween.fire()}else{o.stop(r)}}}}});var p=function(s){var r,q;for(r=0,q=l.length;r<q;r++){if(l[r]===s){return r}}return -1};var n=function(r){var v=r.totalFrames,u=r.curFrame,t=r.duration,s=(u*t*1000/v),q=(e()-r.startTime),w=0;if(q<t*1000){w=Math.round((q/s-1)*u)}else{w=v-(u+1)}if(w>0&&isFinite(w)){if(r.curFrame+w>=v){w=v-(u+1)}r.curFrame+=w}}};g.Bezier=new function(){this.getPosition=function(p,o){var r=p.length,m=[],q=1-o,l,k;for(l=0;l<r;++l){m[l]=[p[l][0],p[l][1]]}for(k=1;k<r;++k){for(l=0;l<r-k;++l){m[l][0]=q*m[l][0]+o*m[parseInt(l+1,10)][0];m[l][1]=q*m[l][1]+o*m[parseInt(l+1,10)][1]}}return[m[0][0],m[0][1]]}};g.Easing={easeNone:function(l,k,n,m){return n*l/m+k},easeIn:function(l,k,n,m){return n*(l/=m)*l+k},easeOut:function(l,k,n,m){return -n*(l/=m)*(l-2)+k}};(function(){g.Motion=function(p,o,q,r){if(p){g.Motion.superclass.constructor.call(this,p,o,q,r)}};Ext.extend(g.Motion,Ext.lib.AnimBase);var n=g.Motion.superclass,m=g.Motion.prototype,l=/^points$/i;Ext.apply(g.Motion.prototype,{setAttr:function(o,s,r){var q=this,p=n.setAttr;if(l.test(o)){r=r||"px";p.call(q,"left",s[0],r);p.call(q,"top",s[1],r)}else{p.call(q,o,s,r)}},getAttr:function(o){var q=this,p=n.getAttr;return l.test(o)?[p.call(q,"left"),p.call(q,"top")]:p.call(q,o)},doMethod:function(o,r,p){var q=this;return l.test(o)?g.Bezier.getPosition(q.runAttrs[o],q.method(q.curFrame,0,100,q.totalFrames)/100):n.doMethod.call(q,o,r,p)},setRunAttr:function(v){if(l.test(v)){var x=this,q=this.el,A=this.attributes.points,t=A.control||[],y=A.from,z=A.to,w=A.by,B=g.Dom,p,s,r,u,o;if(t.length>0&&!Ext.isArray(t[0])){t=[t]}else{}Ext.fly(q,"_anim").position();B.setXY(q,j(y)?y:B.getXY(q));p=x.getAttr("points");if(j(z)){r=k.call(x,z,p);for(s=0,u=t.length;s<u;++s){t[s]=k.call(x,t[s],p)}}else{if(j(w)){r=[p[0]+w[0],p[1]+w[1]];for(s=0,u=t.length;s<u;++s){t[s]=[p[0]+t[s][0],p[1]+t[s][1]]}}}o=this.runAttrs[v]=[p];if(t.length>0){o=o.concat(t)}o[o.length]=r}else{n.setRunAttr.call(this,v)}}});var k=function(o,q){var p=g.Dom.getXY(this.el);return[o[0]-p[0]+q[0],o[1]-p[1]+q[1]]}})()})();(function(){var d=Math.abs,i=Math.PI,h=Math.asin,g=Math.pow,e=Math.sin,f=Ext.lib;Ext.apply(f.Easing,{easeBoth:function(k,j,m,l){return((k/=l/2)<1)?m/2*k*k+j:-m/2*((--k)*(k-2)-1)+j},easeInStrong:function(k,j,m,l){return m*(k/=l)*k*k*k+j},easeOutStrong:function(k,j,m,l){return -m*((k=k/l-1)*k*k*k-1)+j},easeBothStrong:function(k,j,m,l){return((k/=l/2)<1)?m/2*k*k*k*k+j:-m/2*((k-=2)*k*k*k-2)+j},elasticIn:function(l,j,q,o,k,n){if(l==0||(l/=o)==1){return l==0?j:j+q}n=n||(o*0.3);var m;if(k>=d(q)){m=n/(2*i)*h(q/k)}else{k=q;m=n/4}return -(k*g(2,10*(l-=1))*e((l*o-m)*(2*i)/n))+j},elasticOut:function(l,j,q,o,k,n){if(l==0||(l/=o)==1){return l==0?j:j+q}n=n||(o*0.3);var m;if(k>=d(q)){m=n/(2*i)*h(q/k)}else{k=q;m=n/4}return k*g(2,-10*l)*e((l*o-m)*(2*i)/n)+q+j},elasticBoth:function(l,j,q,o,k,n){if(l==0||(l/=o/2)==2){return l==0?j:j+q}n=n||(o*(0.3*1.5));var m;if(k>=d(q)){m=n/(2*i)*h(q/k)}else{k=q;m=n/4}return l<1?-0.5*(k*g(2,10*(l-=1))*e((l*o-m)*(2*i)/n))+j:k*g(2,-10*(l-=1))*e((l*o-m)*(2*i)/n)*0.5+q+j},backIn:function(k,j,n,m,l){l=l||1.70158;return n*(k/=m)*k*((l+1)*k-l)+j},backOut:function(k,j,n,m,l){if(!l){l=1.70158}return n*((k=k/m-1)*k*((l+1)*k+l)+1)+j},backBoth:function(k,j,n,m,l){l=l||1.70158;return((k/=m/2)<1)?n/2*(k*k*(((l*=(1.525))+1)*k-l))+j:n/2*((k-=2)*k*(((l*=(1.525))+1)*k+l)+2)+j},bounceIn:function(k,j,m,l){return m-f.Easing.bounceOut(l-k,0,m,l)+j},bounceOut:function(k,j,m,l){if((k/=l)<(1/2.75)){return m*(7.5625*k*k)+j}else{if(k<(2/2.75)){return m*(7.5625*(k-=(1.5/2.75))*k+0.75)+j}else{if(k<(2.5/2.75)){return m*(7.5625*(k-=(2.25/2.75))*k+0.9375)+j}}}return m*(7.5625*(k-=(2.625/2.75))*k+0.984375)+j},bounceBoth:function(k,j,m,l){return(k<l/2)?f.Easing.bounceIn(k*2,0,m,l)*0.5+j:f.Easing.bounceOut(k*2-l,0,m,l)*0.5+m*0.5+j}})})();(function(){var h=Ext.lib;h.Anim.color=function(p,n,q,r,m,o){return h.Anim.run(p,n,q,r,m,o,h.ColorAnim)};h.ColorAnim=function(n,m,o,p){h.ColorAnim.superclass.constructor.call(this,n,m,o,p)};Ext.extend(h.ColorAnim,h.AnimBase);var j=h.ColorAnim.superclass,i=/color$/i,f=/^transparent|rgba\(0, 0, 0, 0\)$/,l=/^rgb\(([0-9]+)\s*,\s*([0-9]+)\s*,\s*([0-9]+)\)$/i,d=/^#?([0-9A-F]{2})([0-9A-F]{2})([0-9A-F]{2})$/i,e=/^#?([0-9A-F]{1})([0-9A-F]{1})([0-9A-F]{1})$/i,g=function(m){return typeof m!=="undefined"};function k(n){var p=parseInt,o,m=null,q;if(n.length==3){return n}Ext.each([d,l,e],function(s,r){o=(r%2==0)?16:10;q=s.exec(n);if(q&&q.length==4){m=[p(q[1],o),p(q[2],o),p(q[3],o)];return false}});return m}Ext.apply(h.ColorAnim.prototype,{getAttr:function(m){var o=this,n=o.el,p;if(i.test(m)){while(n&&f.test(p=Ext.fly(n).getStyle(m))){n=n.parentNode;p="fff"}}else{p=j.getAttr.call(o,m)}return p},doMethod:function(s,m,o){var t=this,n,q=Math.floor,p,r,u;if(i.test(s)){n=[];o=o||[];for(p=0,r=m.length;p<r;p++){u=m[p];n[p]=j.doMethod.call(t,s,u,o[p])}n="rgb("+q(n[0])+","+q(n[1])+","+q(n[2])+")"}else{n=j.doMethod.call(t,s,m,o)}return n},setRunAttr:function(r){var t=this,u=t.attributes[r],v=u.to,s=u.by,n;j.setRunAttr.call(t,r);n=t.runAttrs[r];if(i.test(r)){var m=k(n.start),o=k(n.end);if(!g(v)&&g(s)){o=k(s);for(var p=0,q=m.length;p<q;p++){o[p]=m[p]+o[p]}}n.start=m;n.end=o}}})})();(function(){var d=Ext.lib;d.Anim.scroll=function(j,h,k,l,g,i){return d.Anim.run(j,h,k,l,g,i,d.Scroll)};d.Scroll=function(h,g,i,j){if(h){d.Scroll.superclass.constructor.call(this,h,g,i,j)}};Ext.extend(d.Scroll,d.ColorAnim);var f=d.Scroll.superclass,e="scroll";Ext.apply(d.Scroll.prototype,{doMethod:function(g,m,h){var k,j=this,l=j.curFrame,i=j.totalFrames;if(g==e){k=[j.method(l,m[0],h[0]-m[0],i),j.method(l,m[1],h[1]-m[1],i)]}else{k=f.doMethod.call(j,g,m,h)}return k},getAttr:function(g){var h=this;if(g==e){return[h.el.scrollLeft,h.el.scrollTop]}else{return f.getAttr.call(h,g)}},setAttr:function(g,j,i){var h=this;if(g==e){h.el.scrollLeft=j[0];h.el.scrollTop=j[1]}else{f.setAttr.call(h,g,j,i)}}})})();if(Ext.isIE){function a(){var d=Function.prototype;delete d.createSequence;delete d.defer;delete d.createDelegate;delete d.createCallback;delete d.createInterceptor;window.detachEvent("onunload",a)}window.attachEvent("onunload",a)}})();
                                                                                                                    </script>                                                                                                              </script>
    <!-- Include Ext stylesheets here: -->
    <link rel="stylesheet" type="text/css" href="system/resources/js/extjs/resources/css/ext-all.css">
    <link rel="stylesheet" type="text/css" href="system/application/views/css/ExtStart.css">

</head>
<body>
    <h1>My Grid</h1>
    <div id="mainMenu"></div>

    <div id="mainGrid"></div>

</body>
</html>

<script type="text/javascript">
var BASE_URL = '<?php echo base_url(); ?>' + 'index.php/';
var BASE_PATH = '<?php echo base_url(); ?>';
var BASE_ICONS = BASE_PATH + 'assets/icons/';
Ext.onReady(function() {
    var strUsers = new Ext.data.Store({
        reader: new Ext.data.JsonReader({
            fields: [
                'id', 'fullname', 'email', 'country_id',
                'country_name', 'occupation', 'birthdate'
            ],
            root: 'rows', totalProperty: 'results'
        }),
        proxy: new Ext.data.HttpProxy({
            url: BASE_URL + 'user/ext_get_all',
            method: 'POST'
        })
    });

    var tbUsers = new Ext.Toolbar({
        items:[{
            text: 'Add',
            icon: BASE_ICONS + 'user_add.png'
        }, '-', {
            text: 'Delete',
            icon: BASE_ICONS + 'user_delete.png'
        }]
    });

    var cbGrid = new Ext.grid.CheckboxSelectionModel();

    var gridUsers = new Ext.grid.GridPanel({
        frame: true, border: true, stripeRows: true, sm: cbGrid,
        store: strUsers, loadMask: true, title: 'Users List',
        style: 'margin:0 auto;', height: 330, width: 722,
        columns: [
            cbGrid, {
                header: "Fullname",
                dataIndex: 'fullname',
                width: 180
            }, {
                header: "Email",
                dataIndex: 'email',
                width: 180
            }, {
                header: "Country",
                dataIndex: 'country_name',
                width: 120
            }, {
                header: "Occupation",
                dataIndex: 'occupation',
                width: 120
            }, {
                header: "Birth",
                dataIndex: 'birthdate',
                width: 80,
                renderer : Ext.util.Format.dateRenderer('d/m/Y')
            }
        ],
        tbar: tbUsers,
        bbar: new Ext.PagingToolbar({
            pageSize: 10,
            store: strUsers,
            displayInfo: true
        })
    });

    gridUsers.render('divgrid');
    strUsers.load();
});
</script>

