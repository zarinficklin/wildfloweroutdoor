// Modernizr v1.7  www.modernizr.com
window.Modernizr=function(a,b,c){function G(){e.input=function(a){for(var b=0,c=a.length;b<c;b++)t[a[b]]=!!(a[b]in l);return t}("autocomplete autofocus list placeholder max min multiple pattern required step".split(" ")),e.inputtypes=function(a){for(var d=0,e,f,h,i=a.length;d<i;d++)l.setAttribute("type",f=a[d]),e=l.type!=="text",e&&(l.value=m,l.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(f)&&l.style.WebkitAppearance!==c?(g.appendChild(l),h=b.defaultView,e=h.getComputedStyle&&h.getComputedStyle(l,null).WebkitAppearance!=="textfield"&&l.offsetHeight!==0,g.removeChild(l)):/^(search|tel)$/.test(f)||(/^(url|email)$/.test(f)?e=l.checkValidity&&l.checkValidity()===!1:/^color$/.test(f)?(g.appendChild(l),g.offsetWidth,e=l.value!=m,g.removeChild(l)):e=l.value!=m)),s[a[d]]=!!e;return s}("search tel url email datetime date month week time datetime-local number range color".split(" "))}function F(a,b){var c=a.charAt(0).toUpperCase()+a.substr(1),d=(a+" "+p.join(c+" ")+c).split(" ");return!!E(d,b)}function E(a,b){for(var d in a)if(k[a[d]]!==c&&(!b||b(a[d],j)))return!0}function D(a,b){return(""+a).indexOf(b)!==-1}function C(a,b){return typeof a===b}function B(a,b){return A(o.join(a+";")+(b||""))}function A(a){k.cssText=a}var d="1.7",e={},f=!0,g=b.documentElement,h=b.head||b.getElementsByTagName("head")[0],i="modernizr",j=b.createElement(i),k=j.style,l=b.createElement("input"),m=":)",n=Object.prototype.toString,o=" -webkit- -moz- -o- -ms- -khtml- ".split(" "),p="Webkit Moz O ms Khtml".split(" "),q={svg:"http://www.w3.org/2000/svg"},r={},s={},t={},u=[],v,w=function(a){var c=b.createElement("style"),d=b.createElement("div"),e;c.textContent=a+"{#modernizr{height:3px}}",h.appendChild(c),d.id="modernizr",g.appendChild(d),e=d.offsetHeight===3,c.parentNode.removeChild(c),d.parentNode.removeChild(d);return!!e},x=function(){function d(d,e){e=e||b.createElement(a[d]||"div");var f=(d="on"+d)in e;f||(e.setAttribute||(e=b.createElement("div")),e.setAttribute&&e.removeAttribute&&(e.setAttribute(d,""),f=C(e[d],"function"),C(e[d],c)||(e[d]=c),e.removeAttribute(d))),e=null;return f}var a={select:"input",change:"input",submit:"form",reset:"form",error:"img",load:"img",abort:"img"};return d}(),y=({}).hasOwnProperty,z;C(y,c)||C(y.call,c)?z=function(a,b){return b in a&&C(a.constructor.prototype[b],c)}:z=function(a,b){return y.call(a,b)},r.flexbox=function(){function c(a,b,c,d){a.style.cssText=o.join(b+":"+c+";")+(d||"")}function a(a,b,c,d){b+=":",a.style.cssText=(b+o.join(c+";"+b)).slice(0,-b.length)+(d||"")}var d=b.createElement("div"),e=b.createElement("div");a(d,"display","box","width:42px;padding:0;"),c(e,"box-flex","1","width:10px;"),d.appendChild(e),g.appendChild(d);var f=e.offsetWidth===42;d.removeChild(e),g.removeChild(d);return f},r.canvas=function(){var a=b.createElement("canvas");return a.getContext&&a.getContext("2d")},r.canvastext=function(){return e.canvas&&C(b.createElement("canvas").getContext("2d").fillText,"function")},r.webgl=function(){return!!a.WebGLRenderingContext},r.touch=function(){return"ontouchstart"in a||w("@media ("+o.join("touch-enabled),(")+"modernizr)")},r.geolocation=function(){return!!navigator.geolocation},r.postmessage=function(){return!!a.postMessage},r.websqldatabase=function(){var b=!!a.openDatabase;return b},r.indexedDB=function(){for(var b=-1,c=p.length;++b<c;){var d=p[b].toLowerCase();if(a[d+"_indexedDB"]||a[d+"IndexedDB"])return!0}return!1},r.hashchange=function(){return x("hashchange",a)&&(b.documentMode===c||b.documentMode>7)},r.history=function(){return !!(a.history&&history.pushState)},r.draganddrop=function(){return x("dragstart")&&x("drop")},r.websockets=function(){return"WebSocket"in a},r.rgba=function(){A("background-color:rgba(150,255,150,.5)");return D(k.backgroundColor,"rgba")},r.hsla=function(){A("background-color:hsla(120,40%,100%,.5)");return D(k.backgroundColor,"rgba")||D(k.backgroundColor,"hsla")},r.multiplebgs=function(){A("background:url(//:),url(//:),red url(//:)");return(new RegExp("(url\\s*\\(.*?){3}")).test(k.background)},r.backgroundsize=function(){return F("backgroundSize")},r.borderimage=function(){return F("borderImage")},r.borderradius=function(){return F("borderRadius","",function(a){return D(a,"orderRadius")})},r.boxshadow=function(){return F("boxShadow")},r.textshadow=function(){return b.createElement("div").style.textShadow===""},r.opacity=function(){B("opacity:.55");return/^0.55$/.test(k.opacity)},r.cssanimations=function(){return F("animationName")},r.csscolumns=function(){return F("columnCount")},r.cssgradients=function(){var a="background-image:",b="gradient(linear,left top,right bottom,from(#9f9),to(white));",c="linear-gradient(left top,#9f9, white);";A((a+o.join(b+a)+o.join(c+a)).slice(0,-a.length));return D(k.backgroundImage,"gradient")},r.cssreflections=function(){return F("boxReflect")},r.csstransforms=function(){return!!E(["transformProperty","WebkitTransform","MozTransform","OTransform","msTransform"])},r.csstransforms3d=function(){var a=!!E(["perspectiveProperty","WebkitPerspective","MozPerspective","OPerspective","msPerspective"]);a&&"webkitPerspective"in g.style&&(a=w("@media ("+o.join("transform-3d),(")+"modernizr)"));return a},r.csstransitions=function(){return F("transitionProperty")},r.fontface=function(){var a,c,d=h||g,e=b.createElement("style"),f=b.implementation||{hasFeature:function(){return!1}};e.type="text/css",d.insertBefore(e,d.firstChild),a=e.sheet||e.styleSheet;var i=f.hasFeature("CSS2","")?function(b){if(!a||!b)return!1;var c=!1;try{a.insertRule(b,0),c=/src/i.test(a.cssRules[0].cssText),a.deleteRule(a.cssRules.length-1)}catch(d){}return c}:function(b){if(!a||!b)return!1;a.cssText=b;return a.cssText.length!==0&&/src/i.test(a.cssText)&&a.cssText.replace(/\r+|\n+/g,"").indexOf(b.split(" ")[0])===0};c=i('@font-face { font-family: "font"; src: url(data:,); }'),d.removeChild(e);return c},r.video=function(){var a=b.createElement("video"),c=!!a.canPlayType;if(c){c=new Boolean(c),c.ogg=a.canPlayType('video/ogg; codecs="theora"');var d='video/mp4; codecs="avc1.42E01E';c.h264=a.canPlayType(d+'"')||a.canPlayType(d+', mp4a.40.2"'),c.webm=a.canPlayType('video/webm; codecs="vp8, vorbis"')}return c},r.audio=function(){var a=b.createElement("audio"),c=!!a.canPlayType;c&&(c=new Boolean(c),c.ogg=a.canPlayType('audio/ogg; codecs="vorbis"'),c.mp3=a.canPlayType("audio/mpeg;"),c.wav=a.canPlayType('audio/wav; codecs="1"'),c.m4a=a.canPlayType("audio/x-m4a;")||a.canPlayType("audio/aac;"));return c},r.localstorage=function(){try{return!!localStorage.getItem}catch(a){return!1}},r.sessionstorage=function(){try{return!!sessionStorage.getItem}catch(a){return!1}},r.webWorkers=function(){return!!a.Worker},r.applicationcache=function(){return!!a.applicationCache},r.svg=function(){return!!b.createElementNS&&!!b.createElementNS(q.svg,"svg").createSVGRect},r.inlinesvg=function(){var a=b.createElement("div");a.innerHTML="<svg/>";return(a.firstChild&&a.firstChild.namespaceURI)==q.svg},r.smil=function(){return!!b.createElementNS&&/SVG/.test(n.call(b.createElementNS(q.svg,"animate")))},r.svgclippaths=function(){return!!b.createElementNS&&/SVG/.test(n.call(b.createElementNS(q.svg,"clipPath")))};for(var H in r)z(r,H)&&(v=H.toLowerCase(),e[v]=r[H](),u.push((e[v]?"":"no-")+v));e.input||G(),e.crosswindowmessaging=e.postmessage,e.historymanagement=e.history,e.addTest=function(a,b){a=a.toLowerCase();if(!e[a]){b=!!b(),g.className+=" "+(b?"":"no-")+a,e[a]=b;return e}},A(""),j=l=null,f&&a.attachEvent&&function(){var a=b.createElement("div");a.innerHTML="<elem></elem>";return a.childNodes.length!==1}()&&function(a,b){function p(a,b){var c=-1,d=a.length,e,f=[];while(++c<d)e=a[c],(b=e.media||b)!="screen"&&f.push(p(e.imports,b),e.cssText);return f.join("")}function o(a){var b=-1;while(++b<e)a.createElement(d[b])}var c="abbr|article|aside|audio|canvas|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",d=c.split("|"),e=d.length,f=new RegExp("(^|\\s)("+c+")","gi"),g=new RegExp("<(/*)("+c+")","gi"),h=new RegExp("(^|[^\\n]*?\\s)("+c+")([^\\n]*)({[\\n\\w\\W]*?})","gi"),i=b.createDocumentFragment(),j=b.documentElement,k=j.firstChild,l=b.createElement("body"),m=b.createElement("style"),n;o(b),o(i),k.insertBefore(m,k.firstChild),m.media="print",a.attachEvent("onbeforeprint",function(){var a=-1,c=p(b.styleSheets,"all"),k=[],o;n=n||b.body;while((o=h.exec(c))!=null)k.push((o[1]+o[2]+o[3]).replace(f,"$1.iepp_$2")+o[4]);m.styleSheet.cssText=k.join("\n");while(++a<e){var q=b.getElementsByTagName(d[a]),r=q.length,s=-1;while(++s<r)q[s].className.indexOf("iepp_")<0&&(q[s].className+=" iepp_"+d[a])}i.appendChild(n),j.appendChild(l),l.className=n.className,l.innerHTML=n.innerHTML.replace(g,"<$1font")}),a.attachEvent("onafterprint",function(){l.innerHTML="",j.removeChild(l),j.appendChild(n),m.styleSheet.cssText=""})}(a,b),e._enableHTML5=f,e._version=d,g.className=g.className.replace(/\bno-js\b/,"")+" js "+u.join(" ");return e}(this,this.document);



/*
 * jQuery Tools 1.2.4 - The missing UI library for the Web
 * 
 * [tabs, tooltip, overlay, scrollable]
 * 
 * NO COPYRIGHTS OR LICENSES. DO WHAT YOU LIKE.
 * 
 * http://flowplayer.org/tools/
 * 
 * File generated: Wed Aug 18 09:10:12 GMT 2010
 */
(function(c){function p(d,b,a){var e=this,l=d.add(this),h=d.find(a.tabs),i=b.jquery?b:d.children(b),j;h.length||(h=d.children());i.length||(i=d.parent().find(b));i.length||(i=c(b));c.extend(this,{click:function(f,g){var k=h.eq(f);if(typeof f=="string"&&f.replace("#","")){k=h.filter("[href*="+f.replace("#","")+"]");f=Math.max(h.index(k),0)}if(a.rotate){var n=h.length-1;if(f<0)return e.click(n,g);if(f>n)return e.click(0,g)}if(!k.length){if(j>=0)return e;f=a.initialIndex;k=h.eq(f)}if(f===j)return e;
g=g||c.Event();g.type="onBeforeClick";l.trigger(g,[f]);if(!g.isDefaultPrevented()){o[a.effect].call(e,f,function(){g.type="onClick";l.trigger(g,[f])});j=f;h.removeClass(a.current);k.addClass(a.current);return e}},getConf:function(){return a},getTabs:function(){return h},getPanes:function(){return i},getCurrentPane:function(){return i.eq(j)},getCurrentTab:function(){return h.eq(j)},getIndex:function(){return j},next:function(){return e.click(j+1)},prev:function(){return e.click(j-1)},destroy:function(){h.unbind(a.event).removeClass(a.current);
i.find("a[href^=#]").unbind("click.T");return e}});c.each("onBeforeClick,onClick".split(","),function(f,g){c.isFunction(a[g])&&c(e).bind(g,a[g]);e[g]=function(k){k&&c(e).bind(g,k);return e}});if(a.history&&c.fn.history){c.tools.history.init(h);a.event="history"}h.each(function(f){c(this).bind(a.event,function(g){e.click(f,g);return g.preventDefault()})});i.find("a[href^=#]").bind("click.T",function(f){e.click(c(this).attr("href"),f)});if(location.hash&&a.tabs==="a"&&d.find(a.tabs+location.hash).length)e.click(location.hash);
else if(a.initialIndex===0||a.initialIndex>0)e.click(a.initialIndex)}c.tools=c.tools||{version:"1.2.4"};c.tools.tabs={conf:{tabs:"a",current:"current",onBeforeClick:null,onClick:null,effect:"default",initialIndex:0,event:"click",rotate:false,history:false},addEffect:function(d,b){o[d]=b}};var o={"default":function(d,b){this.getPanes().hide().eq(d).show();b.call()},fade:function(d,b){var a=this.getConf(),e=a.fadeOutSpeed,l=this.getPanes();e?l.fadeOut(e):l.hide();l.eq(d).fadeIn(a.fadeInSpeed,b)},slide:function(d,
b){this.getPanes().slideUp(200);this.getPanes().eq(d).slideDown(400,b)},ajax:function(d,b){this.getPanes().eq(0).load(this.getTabs().eq(d).attr("href"),b)}},m;c.tools.tabs.addEffect("horizontal",function(d,b){m||(m=this.getPanes().eq(0).width());this.getCurrentPane().animate({width:0},function(){c(this).hide()});this.getPanes().eq(d).animate({width:m},function(){c(this).show();b.call()})});c.fn.tabs=function(d,b){var a=this.data("tabs");if(a){a.destroy();this.removeData("tabs")}if(c.isFunction(b))b=
{onBeforeClick:b};b=c.extend({},c.tools.tabs.conf,b);this.each(function(){a=new p(c(this),d,b);c(this).data("tabs",a)});return b.api?a:this}})(jQuery);
(function(f){function p(a,b,c){var h=c.relative?a.position().top:a.offset().top,e=c.relative?a.position().left:a.offset().left,i=c.position[0];h-=b.outerHeight()-c.offset[0];e+=a.outerWidth()+c.offset[1];var j=b.outerHeight()+a.outerHeight();if(i=="center")h+=j/2;if(i=="bottom")h+=j;i=c.position[1];a=b.outerWidth()+a.outerWidth();if(i=="center")e-=a/2;if(i=="left")e-=a;return{top:h,left:e}}function u(a,b){var c=this,h=a.add(c),e,i=0,j=0,m=a.attr("title"),q=a.attr("data-tooltip"),r=n[b.effect],l,s=
a.is(":input"),v=s&&a.is(":checkbox, :radio, select, :button, :submit"),t=a.attr("type"),k=b.events[t]||b.events[s?v?"widget":"input":"def"];if(!r)throw'Nonexistent effect "'+b.effect+'"';k=k.split(/,\s*/);if(k.length!=2)throw"Tooltip: bad events configuration for "+t;a.bind(k[0],function(d){clearTimeout(i);if(b.predelay)j=setTimeout(function(){c.show(d)},b.predelay);else c.show(d)}).bind(k[1],function(d){clearTimeout(j);if(b.delay)i=setTimeout(function(){c.hide(d)},b.delay);else c.hide(d)});if(m&&
b.cancelDefault){a.removeAttr("title");a.data("title",m)}f.extend(c,{show:function(d){if(!e){if(q)e=f(q);else if(m)e=f(b.layout).addClass(b.tipClass).appendTo(document.body).hide().append(m);else if(b.tip)e=f(b.tip).eq(0);else{e=a.next();e.length||(e=a.parent().next())}if(!e.length)throw"Cannot find tooltip for "+a;}if(c.isShown())return c;e.stop(true,true);var g=p(a,e,b);d=d||f.Event();d.type="onBeforeShow";h.trigger(d,[g]);if(d.isDefaultPrevented())return c;g=p(a,e,b);e.css({position:"absolute",
top:g.top,left:g.left});l=true;r[0].call(c,function(){d.type="onShow";l="full";h.trigger(d)});g=b.events.tooltip.split(/,\s*/);e.bind(g[0],function(){clearTimeout(i);clearTimeout(j)});g[1]&&!a.is("input:not(:checkbox, :radio), textarea")&&e.bind(g[1],function(o){o.relatedTarget!=a[0]&&a.trigger(k[1].split(" ")[0])});return c},hide:function(d){if(!e||!c.isShown())return c;d=d||f.Event();d.type="onBeforeHide";h.trigger(d);if(!d.isDefaultPrevented()){l=false;n[b.effect][1].call(c,function(){d.type="onHide";
h.trigger(d)});return c}},isShown:function(d){return d?l=="full":l},getConf:function(){return b},getTip:function(){return e},getTrigger:function(){return a}});f.each("onHide,onBeforeShow,onShow,onBeforeHide".split(","),function(d,g){f.isFunction(b[g])&&f(c).bind(g,b[g]);c[g]=function(o){f(c).bind(g,o);return c}})}f.tools=f.tools||{version:"1.2.4"};f.tools.tooltip={conf:{effect:"toggle",fadeOutSpeed:"fast",predelay:0,delay:30,opacity:1,tip:0,position:["top","center"],offset:[0,0],relative:false,cancelDefault:true,
events:{def:"mouseenter,mouseleave",input:"focus,blur",widget:"focus mouseenter,blur mouseleave",tooltip:"mouseenter,mouseleave"},layout:"<div/>",tipClass:"tooltip"},addEffect:function(a,b,c){n[a]=[b,c]}};var n={toggle:[function(a){var b=this.getConf(),c=this.getTip();b=b.opacity;b<1&&c.css({opacity:b});c.show();a.call()},function(a){this.getTip().hide();a.call()}],fade:[function(a){var b=this.getConf();this.getTip().fadeTo(b.fadeInSpeed,b.opacity,a)},function(a){this.getTip().fadeOut(this.getConf().fadeOutSpeed,
a)}]};f.fn.tooltip=function(a){var b=this.data("tooltip");if(b)return b;a=f.extend(true,{},f.tools.tooltip.conf,a);if(typeof a.position=="string")a.position=a.position.split(/,?\s/);this.each(function(){b=new u(f(this),a);f(this).data("tooltip",b)});return a.api?b:this}})(jQuery);
(function(a){function t(d,b){var c=this,i=d.add(c),o=a(window),k,f,m,g=a.tools.expose&&(b.mask||b.expose),n=Math.random().toString().slice(10);if(g){if(typeof g=="string")g={color:g};g.closeOnClick=g.closeOnEsc=false}var p=b.target||d.attr("rel");f=p?a(p):d;if(!f.length)throw"Could not find Overlay: "+p;d&&d.index(f)==-1&&d.click(function(e){c.load(e);return e.preventDefault()});a.extend(c,{load:function(e){if(c.isOpened())return c;var h=q[b.effect];if(!h)throw'Overlay: cannot find effect : "'+b.effect+
'"';b.oneInstance&&a.each(s,function(){this.close(e)});e=e||a.Event();e.type="onBeforeLoad";i.trigger(e);if(e.isDefaultPrevented())return c;m=true;g&&a(f).expose(g);var j=b.top,r=b.left,u=f.outerWidth({margin:true}),v=f.outerHeight({margin:true});if(typeof j=="string")j=j=="center"?Math.max((o.height()-v)/2,0):parseInt(j,10)/100*o.height();if(r=="center")r=Math.max((o.width()-u)/2,0);h[0].call(c,{top:j,left:r},function(){if(m){e.type="onLoad";i.trigger(e)}});g&&b.closeOnClick&&a.mask.getMask().one("click",
c.close);b.closeOnClick&&a(document).bind("click."+n,function(l){a(l.target).parents(f).length||c.close(l)});b.closeOnEsc&&a(document).bind("keydown."+n,function(l){l.keyCode==27&&c.close(l)});return c},close:function(e){if(!c.isOpened())return c;e=e||a.Event();e.type="onBeforeClose";i.trigger(e);if(!e.isDefaultPrevented()){m=false;q[b.effect][1].call(c,function(){e.type="onClose";i.trigger(e)});a(document).unbind("click."+n).unbind("keydown."+n);g&&a.mask.close();return c}},getOverlay:function(){return f},
getTrigger:function(){return d},getClosers:function(){return k},isOpened:function(){return m},getConf:function(){return b}});a.each("onBeforeLoad,onStart,onLoad,onBeforeClose,onClose".split(","),function(e,h){a.isFunction(b[h])&&a(c).bind(h,b[h]);c[h]=function(j){a(c).bind(h,j);return c}});k=f.find(b.close||".close");if(!k.length&&!b.close){k=a('<a class="close"></a>');f.prepend(k)}k.click(function(e){c.close(e)});b.load&&c.load()}a.tools=a.tools||{version:"1.2.4"};a.tools.overlay={addEffect:function(d,
b,c){q[d]=[b,c]},conf:{close:null,closeOnClick:true,closeOnEsc:true,closeSpeed:"fast",effect:"default",fixed:!a.browser.msie||a.browser.version>6,left:"center",load:false,mask:null,oneInstance:true,speed:"normal",target:null,top:"10%"}};var s=[],q={};a.tools.overlay.addEffect("default",function(d,b){var c=this.getConf(),i=a(window);if(!c.fixed){d.top+=i.scrollTop();d.left+=i.scrollLeft()}d.position=c.fixed?"fixed":"absolute";this.getOverlay().css(d).fadeIn(c.speed,b)},function(d){this.getOverlay().fadeOut(this.getConf().closeSpeed,
d)});a.fn.overlay=function(d){var b=this.data("overlay");if(b)return b;if(a.isFunction(d))d={onBeforeLoad:d};d=a.extend(true,{},a.tools.overlay.conf,d);this.each(function(){b=new t(a(this),d);s.push(b);a(this).data("overlay",b)});return d.api?b:this}})(jQuery);
(function(e){function n(f,c){var a=e(c);return a.length<2?a:f.parent().find(c)}function t(f,c){var a=this,l=f.add(a),g=f.children(),k=0,m=c.vertical;j||(j=a);if(g.length>1)g=e(c.items,f);e.extend(a,{getConf:function(){return c},getIndex:function(){return k},getSize:function(){return a.getItems().size()},getNaviButtons:function(){return o.add(p)},getRoot:function(){return f},getItemWrap:function(){return g},getItems:function(){return g.children(c.item).not("."+c.clonedClass)},move:function(b,d){return a.seekTo(k+
b,d)},next:function(b){return a.move(1,b)},prev:function(b){return a.move(-1,b)},begin:function(b){return a.seekTo(0,b)},end:function(b){return a.seekTo(a.getSize()-1,b)},focus:function(){return j=a},addItem:function(b){b=e(b);if(c.circular){g.children("."+c.clonedClass+":last").before(b);g.children("."+c.clonedClass+":first").replaceWith(b.clone().addClass(c.clonedClass))}else g.append(b);l.trigger("onAddItem",[b]);return a},seekTo:function(b,d,h){b.jquery||(b*=1);if(c.circular&&b===0&&k==-1&&d!==
0)return a;if(!c.circular&&b<0||b>a.getSize()||b<-1)return a;var i=b;if(b.jquery)b=a.getItems().index(b);else i=a.getItems().eq(b);var q=e.Event("onBeforeSeek");if(!h){l.trigger(q,[b,d]);if(q.isDefaultPrevented()||!i.length)return a}i=m?{top:-i.position().top}:{left:-i.position().left};k=b;j=a;if(d===undefined)d=c.speed;g.animate(i,d,c.easing,h||function(){l.trigger("onSeek",[b])});return a}});e.each(["onBeforeSeek","onSeek","onAddItem"],function(b,d){e.isFunction(c[d])&&e(a).bind(d,c[d]);a[d]=function(h){e(a).bind(d,
h);return a}});if(c.circular){var r=a.getItems().slice(-1).clone().prependTo(g),s=a.getItems().eq(1).clone().appendTo(g);r.add(s).addClass(c.clonedClass);a.onBeforeSeek(function(b,d,h){if(!b.isDefaultPrevented())if(d==-1){a.seekTo(r,h,function(){a.end(0)});return b.preventDefault()}else d==a.getSize()&&a.seekTo(s,h,function(){a.begin(0)})});a.seekTo(0,0,function(){})}var o=n(f,c.prev).click(function(){a.prev()}),p=n(f,c.next).click(function(){a.next()});!c.circular&&a.getSize()>1&&a.onBeforeSeek(function(b,
d){setTimeout(function(){if(!b.isDefaultPrevented()){o.toggleClass(c.disabledClass,d<=0);p.toggleClass(c.disabledClass,d>=a.getSize()-1)}},1)});c.mousewheel&&e.fn.mousewheel&&f.mousewheel(function(b,d){if(c.mousewheel){a.move(d<0?1:-1,c.wheelSpeed||50);return false}});c.keyboard&&e(document).bind("keydown.scrollable",function(b){if(!(!c.keyboard||b.altKey||b.ctrlKey||e(b.target).is(":input")))if(!(c.keyboard!="static"&&j!=a)){var d=b.keyCode;if(m&&(d==38||d==40)){a.move(d==38?-1:1);return b.preventDefault()}if(!m&&
(d==37||d==39)){a.move(d==37?-1:1);return b.preventDefault()}}});c.initialIndex&&a.seekTo(c.initialIndex,0,function(){})}e.tools=e.tools||{version:"1.2.4"};e.tools.scrollable={conf:{activeClass:"active",circular:false,clonedClass:"cloned",disabledClass:"disabled",easing:"swing",initialIndex:0,item:null,items:".items",keyboard:true,mousewheel:false,next:".next",prev:".prev",speed:400,vertical:false,wheelSpeed:0}};var j;e.fn.scrollable=function(f){var c=this.data("scrollable");if(c)return c;f=e.extend({},
e.tools.scrollable.conf,f);this.each(function(){c=new t(e(this),f);e(this).data("scrollable",c)});return f.api?c:this}})(jQuery);


/*!
 * jCarousel - Riding carousels with jQuery
 *   http://sorgalla.com/jcarousel/
 *
 * Copyright (c) 2006 Jan Sorgalla (http://sorgalla.com)
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 *
 * Built on top of the jQuery library
 *   http://jquery.com
 *
 * Inspired by the "Carousel Component" by Bill Scott
 *   http://billwscott.com/carousel/
 */

(function($){var defaults={vertical:false,rtl:false,start:1,offset:1,size:null,scroll:3,visible:null,animation:'normal',easing:'swing',auto:0,wrap:null,initCallback:null,setupCallback:null,reloadCallback:null,itemLoadCallback:null,itemFirstInCallback:null,itemFirstOutCallback:null,itemLastInCallback:null,itemLastOutCallback:null,itemVisibleInCallback:null,itemVisibleOutCallback:null,animationStepCallback:null,buttonNextHTML:'<div></div>',buttonPrevHTML:'<div></div>',buttonNextEvent:'click',buttonPrevEvent:'click',buttonNextCallback:null,buttonPrevCallback:null,itemFallbackDimension:null},windowLoaded=false;$(window).bind('load.jcarousel',function(){windowLoaded=true});$.jcarousel=function(e,o){this.options=$.extend({},defaults,o||{});this.locked=false;this.autoStopped=false;this.container=null;this.clip=null;this.list=null;this.buttonNext=null;this.buttonPrev=null;this.buttonNextState=null;this.buttonPrevState=null;if(!o||o.rtl===undefined){this.options.rtl=($(e).attr('dir')||$('html').attr('dir')||'').toLowerCase()=='rtl'}this.wh=!this.options.vertical?'width':'height';this.lt=!this.options.vertical?(this.options.rtl?'right':'left'):'top';var skin='',split=e.className.split(' ');for(var i=0;i<split.length;i++){if(split[i].indexOf('jcarousel-skin')!=-1){$(e).removeClass(split[i]);skin=split[i];break}}if(e.nodeName.toUpperCase()=='UL'||e.nodeName.toUpperCase()=='OL'){this.list=$(e);this.clip=this.list.parents('.jcarousel-clip');this.container=this.list.parents('.jcarousel-container')}else{this.container=$(e);this.list=this.container.find('ul,ol').eq(0);this.clip=this.container.find('.jcarousel-clip')}if(this.clip.size()===0){this.clip=this.list.wrap('<div></div>').parent()}if(this.container.size()===0){this.container=this.clip.wrap('<div></div>').parent()}if(skin!==''&&this.container.parent()[0].className.indexOf('jcarousel-skin')==-1){this.container.wrap('<div class=" '+skin+'"></div>')}this.buttonPrev=$('.jcarousel-prev',this.container);if(this.buttonPrev.size()===0&&this.options.buttonPrevHTML!==null){this.buttonPrev=$(this.options.buttonPrevHTML).appendTo(this.container)}this.buttonPrev.addClass(this.className('jcarousel-prev'));this.buttonNext=$('.jcarousel-next',this.container);if(this.buttonNext.size()===0&&this.options.buttonNextHTML!==null){this.buttonNext=$(this.options.buttonNextHTML).appendTo(this.container)}this.buttonNext.addClass(this.className('jcarousel-next'));this.clip.addClass(this.className('jcarousel-clip')).css({position:'relative'});this.list.addClass(this.className('jcarousel-list')).css({overflow:'hidden',position:'relative',top:0,margin:0,padding:0}).css((this.options.rtl?'right':'left'),0);this.container.addClass(this.className('jcarousel-container')).css({position:'relative'});if(!this.options.vertical&&this.options.rtl){this.container.addClass('jcarousel-direction-rtl').attr('dir','rtl')}var di=this.options.visible!==null?Math.ceil(this.clipping()/this.options.visible):null;var li=this.list.children('li');var self=this;if(li.size()>0){var wh=0,j=this.options.offset;li.each(function(){self.format(this,j++);wh+=self.dimension(this,di)});this.list.css(this.wh,(wh+100)+'px');if(!o||o.size===undefined){this.options.size=li.size()}}this.container.css('display','block');this.buttonNext.css('display','block');this.buttonPrev.css('display','block');this.funcNext=function(){self.next();return false};this.funcPrev=function(){self.prev();return false};this.funcResize=function(){if(self.resizeTimer){clearTimeout(self.resizeTimer)}self.resizeTimer=setTimeout(function(){self.reload()},100)};if(this.options.initCallback!==null){this.options.initCallback(this,'init')}if(!windowLoaded&&$.browser.safari){this.buttons(false,false);$(window).bind('load.jcarousel',function(){self.setup()})}else{this.setup()}};var $jc=$.jcarousel;$jc.fn=$jc.prototype={jcarousel:'0.2.8'};$jc.fn.extend=$jc.extend=$.extend;$jc.fn.extend({setup:function(){this.first=null;this.last=null;this.prevFirst=null;this.prevLast=null;this.animating=false;this.timer=null;this.resizeTimer=null;this.tail=null;this.inTail=false;if(this.locked){return}this.list.css(this.lt,this.pos(this.options.offset)+'px');var p=this.pos(this.options.start,true);this.prevFirst=this.prevLast=null;this.animate(p,false);$(window).unbind('resize.jcarousel',this.funcResize).bind('resize.jcarousel',this.funcResize);if(this.options.setupCallback!==null){this.options.setupCallback(this)}},reset:function(){this.list.empty();this.list.css(this.lt,'0px');this.list.css(this.wh,'10px');if(this.options.initCallback!==null){this.options.initCallback(this,'reset')}this.setup()},reload:function(){if(this.tail!==null&&this.inTail){this.list.css(this.lt,$jc.intval(this.list.css(this.lt))+this.tail)}this.tail=null;this.inTail=false;if(this.options.reloadCallback!==null){this.options.reloadCallback(this)}if(this.options.visible!==null){var self=this;var di=Math.ceil(this.clipping()/this.options.visible),wh=0,lt=0;this.list.children('li').each(function(i){wh+=self.dimension(this,di);if(i+1<self.first){lt=wh}});this.list.css(this.wh,wh+'px');this.list.css(this.lt,-lt+'px')}this.scroll(this.first,false)},lock:function(){this.locked=true;this.buttons()},unlock:function(){this.locked=false;this.buttons()},size:function(s){if(s!==undefined){this.options.size=s;if(!this.locked){this.buttons()}}return this.options.size},has:function(i,i2){if(i2===undefined||!i2){i2=i}if(this.options.size!==null&&i2>this.options.size){i2=this.options.size}for(var j=i;j<=i2;j++){var e=this.get(j);if(!e.length||e.hasClass('jcarousel-item-placeholder')){return false}}return true},get:function(i){return $('>.jcarousel-item-'+i,this.list)},add:function(i,s){var e=this.get(i),old=0,n=$(s);if(e.length===0){var c,j=$jc.intval(i);e=this.create(i);while(true){c=this.get(--j);if(j<=0||c.length){if(j<=0){this.list.prepend(e)}else{c.after(e)}break}}}else{old=this.dimension(e)}if(n.get(0).nodeName.toUpperCase()=='LI'){e.replaceWith(n);e=n}else{e.empty().append(s)}this.format(e.removeClass(this.className('jcarousel-item-placeholder')),i);var di=this.options.visible!==null?Math.ceil(this.clipping()/this.options.visible):null;var wh=this.dimension(e,di)-old;if(i>0&&i<this.first){this.list.css(this.lt,$jc.intval(this.list.css(this.lt))-wh+'px')}this.list.css(this.wh,$jc.intval(this.list.css(this.wh))+wh+'px');return e},remove:function(i){var e=this.get(i);if(!e.length||(i>=this.first&&i<=this.last)){return}var d=this.dimension(e);if(i<this.first){this.list.css(this.lt,$jc.intval(this.list.css(this.lt))+d+'px')}e.remove();this.list.css(this.wh,$jc.intval(this.list.css(this.wh))-d+'px')},next:function(){if(this.tail!==null&&!this.inTail){this.scrollTail(false)}else{this.scroll(((this.options.wrap=='both'||this.options.wrap=='last')&&this.options.size!==null&&this.last==this.options.size)?1:this.first+this.options.scroll)}},prev:function(){if(this.tail!==null&&this.inTail){this.scrollTail(true)}else{this.scroll(((this.options.wrap=='both'||this.options.wrap=='first')&&this.options.size!==null&&this.first==1)?this.options.size:this.first-this.options.scroll)}},scrollTail:function(b){if(this.locked||this.animating||!this.tail){return}this.pauseAuto();var pos=$jc.intval(this.list.css(this.lt));pos=!b?pos-this.tail:pos+this.tail;this.inTail=!b;this.prevFirst=this.first;this.prevLast=this.last;this.animate(pos)},scroll:function(i,a){if(this.locked||this.animating){return}this.pauseAuto();this.animate(this.pos(i),a)},pos:function(i,fv){var pos=$jc.intval(this.list.css(this.lt));if(this.locked||this.animating){return pos}if(this.options.wrap!='circular'){i=i<1?1:(this.options.size&&i>this.options.size?this.options.size:i)}var back=this.first>i;var f=this.options.wrap!='circular'&&this.first<=1?1:this.first;var c=back?this.get(f):this.get(this.last);var j=back?f:f-1;var e=null,l=0,p=false,d=0,g;while(back?--j>=i:++j<i){e=this.get(j);p=!e.length;if(e.length===0){e=this.create(j).addClass(this.className('jcarousel-item-placeholder'));c[back?'before':'after'](e);if(this.first!==null&&this.options.wrap=='circular'&&this.options.size!==null&&(j<=0||j>this.options.size)){g=this.get(this.index(j));if(g.length){e=this.add(j,g.clone(true))}}}c=e;d=this.dimension(e);if(p){l+=d}if(this.first!==null&&(this.options.wrap=='circular'||(j>=1&&(this.options.size===null||j<=this.options.size)))){pos=back?pos+d:pos-d}}var clipping=this.clipping(),cache=[],visible=0,v=0;c=this.get(i-1);j=i;while(++visible){e=this.get(j);p=!e.length;if(e.length===0){e=this.create(j).addClass(this.className('jcarousel-item-placeholder'));if(c.length===0){this.list.prepend(e)}else{c[back?'before':'after'](e)}if(this.first!==null&&this.options.wrap=='circular'&&this.options.size!==null&&(j<=0||j>this.options.size)){g=this.get(this.index(j));if(g.length){e=this.add(j,g.clone(true))}}}c=e;d=this.dimension(e);if(d===0){throw new Error('jCarousel: No width/height set for items. This will cause an infinite loop. Aborting...')}if(this.options.wrap!='circular'&&this.options.size!==null&&j>this.options.size){cache.push(e)}else if(p){l+=d}v+=d;if(v>=clipping){break}j++}for(var x=0;x<cache.length;x++){cache[x].remove()}if(l>0){this.list.css(this.wh,this.dimension(this.list)+l+'px');if(back){pos-=l;this.list.css(this.lt,$jc.intval(this.list.css(this.lt))-l+'px')}}var last=i+visible-1;if(this.options.wrap!='circular'&&this.options.size&&last>this.options.size){last=this.options.size}if(j>last){visible=0;j=last;v=0;while(++visible){e=this.get(j--);if(!e.length){break}v+=this.dimension(e);if(v>=clipping){break}}}var first=last-visible+1;if(this.options.wrap!='circular'&&first<1){first=1}if(this.inTail&&back){pos+=this.tail;this.inTail=false}this.tail=null;if(this.options.wrap!='circular'&&last==this.options.size&&(last-visible+1)>=1){var m=$jc.intval(this.get(last).css(!this.options.vertical?'marginRight':'marginBottom'));if((v-m)>clipping){this.tail=v-clipping-m}}if(fv&&i===this.options.size&&this.tail){pos-=this.tail;this.inTail=true}while(i-->first){pos+=this.dimension(this.get(i))}this.prevFirst=this.first;this.prevLast=this.last;this.first=first;this.last=last;return pos},animate:function(p,a){if(this.locked||this.animating){return}this.animating=true;var self=this;var scrolled=function(){self.animating=false;if(p===0){self.list.css(self.lt,0)}if(!self.autoStopped&&(self.options.wrap=='circular'||self.options.wrap=='both'||self.options.wrap=='last'||self.options.size===null||self.last<self.options.size||(self.last==self.options.size&&self.tail!==null&&!self.inTail))){self.startAuto()}self.buttons();self.notify('onAfterAnimation');if(self.options.wrap=='circular'&&self.options.size!==null){for(var i=self.prevFirst;i<=self.prevLast;i++){if(i!==null&&!(i>=self.first&&i<=self.last)&&(i<1||i>self.options.size)){self.remove(i)}}}};this.notify('onBeforeAnimation');if(!this.options.animation||a===false){this.list.css(this.lt,p+'px');scrolled()}else{var o=!this.options.vertical?(this.options.rtl?{'right':p}:{'left':p}):{'top':p};var settings={duration:this.options.animation,easing:this.options.easing,complete:scrolled};if($.isFunction(this.options.animationStepCallback)){settings.step=this.options.animationStepCallback}this.list.animate(o,settings)}},startAuto:function(s){if(s!==undefined){this.options.auto=s}if(this.options.auto===0){return this.stopAuto()}if(this.timer!==null){return}this.autoStopped=false;var self=this;this.timer=window.setTimeout(function(){self.next()},this.options.auto*1000)},stopAuto:function(){this.pauseAuto();this.autoStopped=true},pauseAuto:function(){if(this.timer===null){return}window.clearTimeout(this.timer);this.timer=null},buttons:function(n,p){if(n==null){n=!this.locked&&this.options.size!==0&&((this.options.wrap&&this.options.wrap!='first')||this.options.size===null||this.last<this.options.size);if(!this.locked&&(!this.options.wrap||this.options.wrap=='first')&&this.options.size!==null&&this.last>=this.options.size){n=this.tail!==null&&!this.inTail}}if(p==null){p=!this.locked&&this.options.size!==0&&((this.options.wrap&&this.options.wrap!='last')||this.first>1);if(!this.locked&&(!this.options.wrap||this.options.wrap=='last')&&this.options.size!==null&&this.first==1){p=this.tail!==null&&this.inTail}}var self=this;if(this.buttonNext.size()>0){this.buttonNext.unbind(this.options.buttonNextEvent+'.jcarousel',this.funcNext);if(n){this.buttonNext.bind(this.options.buttonNextEvent+'.jcarousel',this.funcNext)}this.buttonNext[n?'removeClass':'addClass'](this.className('jcarousel-next-disabled')).attr('disabled',n?false:true);if(this.options.buttonNextCallback!==null&&this.buttonNext.data('jcarouselstate')!=n){this.buttonNext.each(function(){self.options.buttonNextCallback(self,this,n)}).data('jcarouselstate',n)}}else{if(this.options.buttonNextCallback!==null&&this.buttonNextState!=n){this.options.buttonNextCallback(self,null,n)}}if(this.buttonPrev.size()>0){this.buttonPrev.unbind(this.options.buttonPrevEvent+'.jcarousel',this.funcPrev);if(p){this.buttonPrev.bind(this.options.buttonPrevEvent+'.jcarousel',this.funcPrev)}this.buttonPrev[p?'removeClass':'addClass'](this.className('jcarousel-prev-disabled')).attr('disabled',p?false:true);if(this.options.buttonPrevCallback!==null&&this.buttonPrev.data('jcarouselstate')!=p){this.buttonPrev.each(function(){self.options.buttonPrevCallback(self,this,p)}).data('jcarouselstate',p)}}else{if(this.options.buttonPrevCallback!==null&&this.buttonPrevState!=p){this.options.buttonPrevCallback(self,null,p)}}this.buttonNextState=n;this.buttonPrevState=p},notify:function(evt){var state=this.prevFirst===null?'init':(this.prevFirst<this.first?'next':'prev');this.callback('itemLoadCallback',evt,state);if(this.prevFirst!==this.first){this.callback('itemFirstInCallback',evt,state,this.first);this.callback('itemFirstOutCallback',evt,state,this.prevFirst)}if(this.prevLast!==this.last){this.callback('itemLastInCallback',evt,state,this.last);this.callback('itemLastOutCallback',evt,state,this.prevLast)}this.callback('itemVisibleInCallback',evt,state,this.first,this.last,this.prevFirst,this.prevLast);this.callback('itemVisibleOutCallback',evt,state,this.prevFirst,this.prevLast,this.first,this.last)},callback:function(cb,evt,state,i1,i2,i3,i4){if(this.options[cb]==null||(typeof this.options[cb]!='object'&&evt!='onAfterAnimation')){return}var callback=typeof this.options[cb]=='object'?this.options[cb][evt]:this.options[cb];if(!$.isFunction(callback)){return}var self=this;if(i1===undefined){callback(self,state,evt)}else if(i2===undefined){this.get(i1).each(function(){callback(self,this,i1,state,evt)})}else{var call=function(i){self.get(i).each(function(){callback(self,this,i,state,evt)})};for(var i=i1;i<=i2;i++){if(i!==null&&!(i>=i3&&i<=i4)){call(i)}}}},create:function(i){return this.format('<li></li>',i)},format:function(e,i){e=$(e);var split=e.get(0).className.split(' ');for(var j=0;j<split.length;j++){if(split[j].indexOf('jcarousel-')!=-1){e.removeClass(split[j])}}e.addClass(this.className('jcarousel-item')).addClass(this.className('jcarousel-item-'+i)).css({'float':(this.options.rtl?'right':'left'),'list-style':'none'}).attr('jcarouselindex',i);return e},className:function(c){return c+' '+c+(!this.options.vertical?'-horizontal':'-vertical')},dimension:function(e,d){var el=$(e);if(d==null){return!this.options.vertical?((el.innerWidth()+$jc.intval(el.css('margin-left'))+$jc.intval(el.css('margin-right'))+$jc.intval(el.css('border-left-width'))+$jc.intval(el.css('border-right-width')))||$jc.intval(this.options.itemFallbackDimension)):((el.innerHeight()+$jc.intval(el.css('margin-top'))+$jc.intval(el.css('margin-bottom'))+$jc.intval(el.css('border-top-width'))+$jc.intval(el.css('border-bottom-width')))||$jc.intval(this.options.itemFallbackDimension))}else{var w=!this.options.vertical?d-$jc.intval(el.css('marginLeft'))-$jc.intval(el.css('marginRight')):d-$jc.intval(el.css('marginTop'))-$jc.intval(el.css('marginBottom'));$(el).css(this.wh,w+'px');return this.dimension(el)}},clipping:function(){return!this.options.vertical?this.clip[0].offsetWidth-$jc.intval(this.clip.css('borderLeftWidth'))-$jc.intval(this.clip.css('borderRightWidth')):this.clip[0].offsetHeight-$jc.intval(this.clip.css('borderTopWidth'))-$jc.intval(this.clip.css('borderBottomWidth'))},index:function(i,s){if(s==null){s=this.options.size}return Math.round((((i-1)/s)-Math.floor((i-1)/s))*s)+1}});$jc.extend({defaults:function(d){return $.extend(defaults,d||{})},intval:function(v){v=parseInt(v,10);return isNaN(v)?0:v},windowLoaded:function(){windowLoaded=true}});$.fn.jcarousel=function(o){if(typeof o=='string'){var instance=$(this).data('jcarousel'),args=Array.prototype.slice.call(arguments,1);return instance[o].apply(instance,args)}else{return this.each(function(){var instance=$(this).data('jcarousel');if(instance){if(o){$.extend(instance.options,o)}instance.reload()}else{$(this).data('jcarousel',new $jc(this,o))}})}}})(jQuery);



/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 * 
 * Open source under the BSD License. 
 * 
 * Copyright 惹 2008 George McGinley Smith
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
*/

jQuery.easing.jswing=jQuery.easing.swing;jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(e,f,a,h,g){return jQuery.easing[jQuery.easing.def](e,f,a,h,g)},easeInQuad:function(e,f,a,h,g){return h*(f/=g)*f+a},easeOutQuad:function(e,f,a,h,g){return -h*(f/=g)*(f-2)+a},easeInOutQuad:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f+a}return -h/2*((--f)*(f-2)-1)+a},easeInCubic:function(e,f,a,h,g){return h*(f/=g)*f*f+a},easeOutCubic:function(e,f,a,h,g){return h*((f=f/g-1)*f*f+1)+a},easeInOutCubic:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f+a}return h/2*((f-=2)*f*f+2)+a},easeInQuart:function(e,f,a,h,g){return h*(f/=g)*f*f*f+a},easeOutQuart:function(e,f,a,h,g){return -h*((f=f/g-1)*f*f*f-1)+a},easeInOutQuart:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f*f+a}return -h/2*((f-=2)*f*f*f-2)+a},easeInQuint:function(e,f,a,h,g){return h*(f/=g)*f*f*f*f+a},easeOutQuint:function(e,f,a,h,g){return h*((f=f/g-1)*f*f*f*f+1)+a},easeInOutQuint:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f*f*f+a}return h/2*((f-=2)*f*f*f*f+2)+a},easeInSine:function(e,f,a,h,g){return -h*Math.cos(f/g*(Math.PI/2))+h+a},easeOutSine:function(e,f,a,h,g){return h*Math.sin(f/g*(Math.PI/2))+a},easeInOutSine:function(e,f,a,h,g){return -h/2*(Math.cos(Math.PI*f/g)-1)+a},easeInExpo:function(e,f,a,h,g){return(f==0)?a:h*Math.pow(2,10*(f/g-1))+a},easeOutExpo:function(e,f,a,h,g){return(f==g)?a+h:h*(-Math.pow(2,-10*f/g)+1)+a},easeInOutExpo:function(e,f,a,h,g){if(f==0){return a}if(f==g){return a+h}if((f/=g/2)<1){return h/2*Math.pow(2,10*(f-1))+a}return h/2*(-Math.pow(2,-10*--f)+2)+a},easeInCirc:function(e,f,a,h,g){return -h*(Math.sqrt(1-(f/=g)*f)-1)+a},easeOutCirc:function(e,f,a,h,g){return h*Math.sqrt(1-(f=f/g-1)*f)+a},easeInOutCirc:function(e,f,a,h,g){if((f/=g/2)<1){return -h/2*(Math.sqrt(1-f*f)-1)+a}return h/2*(Math.sqrt(1-(f-=2)*f)+1)+a},easeInElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k)==1){return e+l}if(!j){j=k*0.3}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}return -(g*Math.pow(2,10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j))+e},easeOutElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k)==1){return e+l}if(!j){j=k*0.3}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}return g*Math.pow(2,-10*h)*Math.sin((h*k-i)*(2*Math.PI)/j)+l+e},easeInOutElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k/2)==2){return e+l}if(!j){j=k*(0.3*1.5)}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}if(h<1){return -0.5*(g*Math.pow(2,10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j))+e}return g*Math.pow(2,-10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j)*0.5+l+e},easeInBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}return i*(f/=h)*f*((g+1)*f-g)+a},easeOutBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}return i*((f=f/h-1)*f*((g+1)*f+g)+1)+a},easeInOutBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}if((f/=h/2)<1){return i/2*(f*f*(((g*=(1.525))+1)*f-g))+a}return i/2*((f-=2)*f*(((g*=(1.525))+1)*f+g)+2)+a},easeInBounce:function(e,f,a,h,g){return h-jQuery.easing.easeOutBounce(e,g-f,0,h,g)+a},easeOutBounce:function(e,f,a,h,g){if((f/=g)<(1/2.75)){return h*(7.5625*f*f)+a}else{if(f<(2/2.75)){return h*(7.5625*(f-=(1.5/2.75))*f+0.75)+a}else{if(f<(2.5/2.75)){return h*(7.5625*(f-=(2.25/2.75))*f+0.9375)+a}else{return h*(7.5625*(f-=(2.625/2.75))*f+0.984375)+a}}}},easeInOutBounce:function(e,f,a,h,g){if(f<g/2){return jQuery.easing.easeInBounce(e,f*2,0,h,g)*0.5+a}return jQuery.easing.easeOutBounce(e,f*2-g,0,h,g)*0.5+h*0.5+a}});

/*
 *
 * TERMS OF USE - EASING EQUATIONS
 * 
 * Open source under the BSD License. 
 * 
 * Copyright 惹 2001 Robert Penner
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
 */
 
/**
 * jQuery gMap - Google Maps API V3
 *
 * @url		http://github.com/marioestrada/jQuery-gMap
 * @author	Cedric Kastner <cedric@nur-text.de> and Mario Estrada <me@mario.ec>
 * @version	2.1
 */(function(a){a.fn.gMap=function(b,c){switch(b){case"addMarker":return a(this).trigger("gMap.addMarker",[c.latitude,c.longitude,c.content,c.icon,c.popup]);case"centerAt":return a(this).trigger("gMap.centerAt",[c.latitude,c.longitude,c.zoom])}opts=a.extend({},a.fn.gMap.defaults,b);return this.each(function(){var b=new google.maps.Map(this);$geocoder=new google.maps.Geocoder,opts.address?$geocoder.geocode({address:opts.address},function(a,c){a&&a.length&&b.setCenter(a[0].geometry.location)}):opts.latitude&&opts.longitude?b.setCenter(new google.maps.LatLng(opts.latitude,opts.longitude)):a.isArray(opts.markers)&&opts.markers.length>0?opts.markers[0].address?$geocoder.geocode({address:opts.markers[0].address},function(a,c){a&&a.length>0&&b.setCenter(a[0].geometry.location)}):b.setCenter(new google.maps.LatLng(opts.markers[0].latitude,opts.markers[0].longitude)):b.setCenter(new google.maps.LatLng(34.885931,9.84375)),b.setZoom(opts.zoom),b.setMapTypeId(google.maps.MapTypeId[opts.maptype]),map_options={scrollwheel:opts.scrollwheel},opts.controls===!1?a.extend(map_options,{disableDefaultUI:!0}):opts.controls.length!=0&&a.extend(map_options,opts.controls,{disableDefaultUI:!0}),b.setOptions(map_options);var c=new google.maps.Marker;marker_icon=new google.maps.MarkerImage(opts.icon.image),marker_icon.size=new google.maps.Size(opts.icon.iconsize[0],opts.icon.iconsize[1]),marker_icon.anchor=new google.maps.Point(opts.icon.iconanchor[0],opts.icon.iconanchor[1]),c.setIcon(marker_icon),opts.icon.shadow&&(marker_shadow=new google.maps.MarkerImage(opts.icon.shadow),marker_shadow.size=new google.maps.Size(opts.icon.shadowsize[0],opts.icon.shadowsize[1]),marker_shadow.anchor=new google.maps.Point(opts.icon.shadowanchor[0],opts.icon.shadowanchor[1]),c.setShadow(marker_shadow)),a(this).bind("gMap.centerAt",function(a,c,d,e){e&&b.setZoom(e),b.panTo(new google.maps.LatLng(parseFloat(c),parseFloat(d)))});var d;a(this).bind("gMap.addMarker",function(a,e,f,g,h,i){var j=new google.maps.LatLng(parseFloat(e),parseFloat(f)),k=new google.maps.Marker({position:j});h?(marker_icon=new google.maps.MarkerImage(h.image),marker_icon.size=new google.maps.Size(h.iconsize[0],h.iconsize[1]),marker_icon.anchor=new google.maps.Point(h.iconanchor[0],h.iconanchor[1]),k.setIcon(marker_icon),h.shadow&&(marker_shadow=new google.maps.MarkerImage(h.shadow),marker_shadow.size=new google.maps.Size(h.shadowsize[0],h.shadowsize[1]),marker_shadow.anchor=new google.maps.Point(h.shadowanchor[0],h.shadowanchor[1]),c.setShadow(marker_shadow))):(k.setIcon(c.getIcon()),k.setShadow(c.getShadow()));if(g){g=="_latlng"&&(g=e+", "+f);var l=new google.maps.InfoWindow({content:opts.html_prepend+g+opts.html_append});google.maps.event.addListener(k,"click",function(){d&&d.close(),l.open(b,k),d=l}),i&&l.open(b,k)}k.setMap(b)});for(var e=0;e<opts.markers.length;e++){marker=opts.markers[e];if(marker.address){marker.html=="_address"&&(marker.html=marker.address);var f=this;$geocoder.geocode({address:marker.address},function(b,c){return function(d,e){d&&d.length>0&&a(c).trigger("gMap.addMarker",[d[0].geometry.location.lat(),d[0].geometry.location.lng(),b.html,b.icon])}}(marker,f))}else a(this).trigger("gMap.addMarker",[marker.latitude,marker.longitude,marker.html,marker.icon])}})},a.fn.gMap.defaults={address:"",latitude:0,longitude:0,zoom:1,markers:[],controls:[],scrollwheel:!1,maptype:"ROADMAP",html_prepend:'<div class="gmap_marker">',html_append:"</div>",icon:{image:"http://www.google.com/mapfiles/marker.png",shadow:"http://www.google.com/mapfiles/shadow50.png",iconsize:[20,34],shadowsize:[37,34],iconanchor:[9,34],shadowanchor:[6,34]}}})(jQuery);
 
 
 /*
 * jQuery 'onImagesLoaded' plugin v1.1.1 (Updated January 27, 2010)
 * Fires callback functions when images have loaded within a particular selector.
 *
 * Copyright (c) Cirkuit Networks, Inc. (http://www.cirkuit.net), 2008-2010.
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 *
 * For documentation and usage, visit "http://includes.cirkuit.net/includes/js/jquery/plugins/onImagesLoad/1.1.1/documentation/"
 */
(function(b){b.fn.onImagesLoad=function(j){var a=this;a.opts=b.extend({},b.fn.onImagesLoad.defaults,j);a.bindEvents=function(c,e,d){if(c.length===0)a.opts.callbackIfNoImagesExist&&d&&d(e);else{var f=[];c.jquery||(c=b(c));c.each(function(h){var i=this.src;if(!b.browser.msie)this.src="";b(this).bind("load",function(){if(jQuery.inArray(h,f)<0){f.push(h);f.length==c.length&&d&&d.call(e,e)}});if(b.browser.msie){if(this.complete||this.complete===undefined)this.src=i}else this.src=i})}};var g=[];a.each(function(){if(a.opts.itemCallback){var c; c=this.tagName=="IMG"?this:b("img",this);a.bindEvents(c,this,a.opts.itemCallback)}if(a.opts.selectorCallback)this.tagName=="IMG"?g.push(this):b("img",this).each(function(){g.push(this)})});a.opts.selectorCallback&&a.bindEvents(g,this,a.opts.selectorCallback);return a.each(function(){})};b.fn.onImagesLoad.defaults={selectorCallback:null,itemCallback:null,callbackIfNoImagesExist:false}})(jQuery);



/*
 * Pixastic Lib - Core Functions - v0.1.3
 * Copyright (c) 2008 Jacob Seidelin, jseidelin@nihilogic.dk, http://blog.nihilogic.dk/
 * License: [http://www.pixastic.com/lib/license.txt]
 */
var Pixastic=(function(){function addEvent(el,event,handler){if(el.addEventListener){el.addEventListener(event,handler,false)}else{if(el.attachEvent){el.attachEvent("on"+event,handler)}}}function onready(handler){var handlerDone=false;var execHandler=function(){if(!handlerDone){handlerDone=true;handler()}};document.write('<script defer src="//:" id="__onload_ie_pixastic__"><\/script>');var script=document.getElementById("__onload_ie_pixastic__");script.onreadystatechange=function(){if(script.readyState=="complete"){script.parentNode.removeChild(script);execHandler()}};if(document.addEventListener){document.addEventListener("DOMContentLoaded",execHandler,false)}addEvent(window,"load",execHandler)}function init(){var imgEls=getElementsByClass("pixastic",null,"img");var canvasEls=getElementsByClass("pixastic",null,"canvas");var elements=imgEls.concat(canvasEls);for(var i=0;i<elements.length;i++){(function(){var el=elements[i];var actions=[];var classes=el.className.split(" ");for(var c=0;c<classes.length;c++){var cls=classes[c];if(cls.substring(0,9)=="pixastic-"){var actionName=cls.substring(9);if(actionName!=""){actions.push(actionName)}}}if(actions.length){if(el.tagName.toLowerCase()=="img"){var dataImg=new Image();dataImg.src=el.src;if(dataImg.complete){for(var a=0;a<actions.length;a++){var res=Pixastic.applyAction(el,el,actions[a],null);if(res){el=res}}}else{dataImg.onload=function(){for(var a=0;a<actions.length;a++){var res=Pixastic.applyAction(el,el,actions[a],null);if(res){el=res}}}}}else{setTimeout(function(){for(var a=0;a<actions.length;a++){var res=Pixastic.applyAction(el,el,actions[a],null);if(res){el=res}}},1)}}})()}}if(typeof pixastic_parseonload!="undefined"&&pixastic_parseonload){onready(init)}function getElementsByClass(searchClass,node,tag){var classElements=new Array();if(node==null){node=document}if(tag==null){tag="*"}var els=node.getElementsByTagName(tag);var elsLen=els.length;var pattern=new RegExp("(^|\\s)"+searchClass+"(\\s|$)");for(i=0,j=0;i<elsLen;i++){if(pattern.test(els[i].className)){classElements[j]=els[i];j++}}return classElements}var debugElement;function writeDebug(text,level){if(!Pixastic.debug){return}try{switch(level){case"warn":console.warn("Pixastic:",text);break;case"error":console.error("Pixastic:",text);break;default:console.log("Pixastic:",text)}}catch(e){}if(!debugElement){}}var hasCanvas=(function(){var c=document.createElement("canvas");var val=false;try{val=!!((typeof c.getContext=="function")&&c.getContext("2d"))}catch(e){}return function(){return val}})();var hasCanvasImageData=(function(){var c=document.createElement("canvas");var val=false;var ctx;try{if(typeof c.getContext=="function"&&(ctx=c.getContext("2d"))){val=(typeof ctx.getImageData=="function")}}catch(e){}return function(){return val}})();var hasGlobalAlpha=(function(){var hasAlpha=false;var red=document.createElement("canvas");if(hasCanvas()&&hasCanvasImageData()){red.width=red.height=1;var redctx=red.getContext("2d");redctx.fillStyle="rgb(255,0,0)";redctx.fillRect(0,0,1,1);var blue=document.createElement("canvas");blue.width=blue.height=1;var bluectx=blue.getContext("2d");bluectx.fillStyle="rgb(0,0,255)";bluectx.fillRect(0,0,1,1);redctx.globalAlpha=0.5;redctx.drawImage(blue,0,0);var reddata=redctx.getImageData(0,0,1,1).data;hasAlpha=(reddata[2]!=255)}return function(){return hasAlpha}})();return{parseOnLoad:false,debug:false,applyAction:function(img,dataImg,actionName,options){options=options||{};var imageIsCanvas=(img.tagName.toLowerCase()=="canvas");if(imageIsCanvas&&Pixastic.Client.isIE()){if(Pixastic.debug){writeDebug("Tried to process a canvas element but browser is IE.")}return false}var canvas,ctx;var hasOutputCanvas=false;if(Pixastic.Client.hasCanvas()){hasOutputCanvas=!!options.resultCanvas;canvas=options.resultCanvas||document.createElement("canvas");ctx=canvas.getContext("2d")}var w=img.offsetWidth;var h=img.offsetHeight;if(imageIsCanvas){w=img.width;h=img.height}if(w==0||h==0){if(img.parentNode==null){var oldpos=img.style.position;var oldleft=img.style.left;img.style.position="absolute";img.style.left="-9999px";document.body.appendChild(img);w=img.offsetWidth;h=img.offsetHeight;document.body.removeChild(img);img.style.position=oldpos;img.style.left=oldleft}else{if(Pixastic.debug){writeDebug("Image has 0 width and/or height.")}return}}if(actionName.indexOf("(")>-1){var tmp=actionName;actionName=tmp.substr(0,tmp.indexOf("("));var arg=tmp.match(/\((.*?)\)/);if(arg[1]){arg=arg[1].split(";");for(var a=0;a<arg.length;a++){thisArg=arg[a].split("=");if(thisArg.length==2){if(thisArg[0]=="rect"){var rectVal=thisArg[1].split(",");options[thisArg[0]]={left:parseInt(rectVal[0],10)||0,top:parseInt(rectVal[1],10)||0,width:parseInt(rectVal[2],10)||0,height:parseInt(rectVal[3],10)||0}}else{options[thisArg[0]]=thisArg[1]}}}}}if(!options.rect){options.rect={left:0,top:0,width:w,height:h}}else{options.rect.left=Math.round(options.rect.left);options.rect.top=Math.round(options.rect.top);options.rect.width=Math.round(options.rect.width);options.rect.height=Math.round(options.rect.height)}var validAction=false;if(Pixastic.Actions[actionName]&&typeof Pixastic.Actions[actionName].process=="function"){validAction=true}if(!validAction){if(Pixastic.debug){writeDebug('Invalid action "'+actionName+'". Maybe file not included?')}return false}if(!Pixastic.Actions[actionName].checkSupport()){if(Pixastic.debug){writeDebug('Action "'+actionName+'" not supported by this browser.')}return false}if(Pixastic.Client.hasCanvas()){if(canvas!==img){canvas.width=w;canvas.height=h}if(!hasOutputCanvas){canvas.style.width=w+"px";canvas.style.height=h+"px"}ctx.drawImage(dataImg,0,0,w,h);if(!img.__pixastic_org_image){canvas.__pixastic_org_image=img;canvas.__pixastic_org_width=w;canvas.__pixastic_org_height=h}else{canvas.__pixastic_org_image=img.__pixastic_org_image;canvas.__pixastic_org_width=img.__pixastic_org_width;canvas.__pixastic_org_height=img.__pixastic_org_height}}else{if(Pixastic.Client.isIE()&&typeof img.__pixastic_org_style=="undefined"){img.__pixastic_org_style=img.style.cssText}}var params={image:img,canvas:canvas,width:w,height:h,useData:true,options:options};var res=Pixastic.Actions[actionName].process(params);if(!res){return false}if(Pixastic.Client.hasCanvas()){if(params.useData){if(Pixastic.Client.hasCanvasImageData()){canvas.getContext("2d").putImageData(params.canvasData,options.rect.left,options.rect.top);canvas.getContext("2d").fillRect(0,0,0,0)}}if(!options.leaveDOM){canvas.title=img.title;canvas.imgsrc=img.imgsrc;if(!imageIsCanvas){canvas.alt=img.alt}if(!imageIsCanvas){canvas.imgsrc=img.src}canvas.className=img.className;canvas.style.cssText=img.style.cssText;canvas.name=img.name;canvas.tabIndex=img.tabIndex;canvas.id=img.id;if(img.parentNode&&img.parentNode.replaceChild){img.parentNode.replaceChild(canvas,img)}}options.resultCanvas=canvas;return canvas}return img},prepareData:function(params,getCopy){var ctx=params.canvas.getContext("2d");var rect=params.options.rect;var dataDesc=ctx.getImageData(rect.left,rect.top,rect.width,rect.height);var data=dataDesc.data;if(!getCopy){params.canvasData=dataDesc}return data},process:function(img,actionName,options,callback){if(img.tagName.toLowerCase()=="img"){var dataImg=new Image();dataImg.src=img.src;if(dataImg.complete){var res=Pixastic.applyAction(img,dataImg,actionName,options);if(callback){callback(res)}return res}else{dataImg.onload=function(){var res=Pixastic.applyAction(img,dataImg,actionName,options);if(callback){callback(res)}}}}if(img.tagName.toLowerCase()=="canvas"){var res=Pixastic.applyAction(img,img,actionName,options);if(callback){callback(res)}return res}},revert:function(img){if(Pixastic.Client.hasCanvas()){if(img.tagName.toLowerCase()=="canvas"&&img.__pixastic_org_image){img.width=img.__pixastic_org_width;img.height=img.__pixastic_org_height;img.getContext("2d").drawImage(img.__pixastic_org_image,0,0);if(img.parentNode&&img.parentNode.replaceChild){img.parentNode.replaceChild(img.__pixastic_org_image,img)}return img}}else{if(Pixastic.Client.isIE()){if(typeof img.__pixastic_org_style!="undefined"){img.style.cssText=img.__pixastic_org_style}}}},Client:{hasCanvas:hasCanvas,hasCanvasImageData:hasCanvasImageData,hasGlobalAlpha:hasGlobalAlpha,isIE:function(){return !!document.all&&!!window.attachEvent&&!window.opera}},Actions:{}}})();if(typeof jQuery!="undefined"&&jQuery&&jQuery.fn){jQuery.fn.pixastic=function(action,options){var newElements=[];this.each(function(){if(this.tagName.toLowerCase()=="img"&&!this.complete){return}var res=Pixastic.process(this,action,options);if(res){newElements.push(res)}});if(newElements.length>0){return jQuery(newElements)}else{return this}}}Pixastic.Actions.desaturate={process:function(params){var useAverage=!!(params.options.average&&params.options.average!="false");if(Pixastic.Client.hasCanvasImageData()){var data=Pixastic.prepareData(params);var rect=params.options.rect;var w=rect.width;var h=rect.height;var p=w*h;var pix=p*4,pix1,pix2;if(useAverage){while(p--){data[pix-=4]=data[pix1=pix+1]=data[pix2=pix+2]=(data[pix]+data[pix1]+data[pix2])/3}}else{while(p--){data[pix-=4]=data[pix1=pix+1]=data[pix2=pix+2]=(data[pix]*0.3+data[pix1]*0.59+data[pix2]*0.11)}}return true}else{if(Pixastic.Client.isIE()){params.image.style.filter+=" gray";return true}}},checkSupport:function(){return(Pixastic.Client.hasCanvasImageData()||Pixastic.Client.isIE())}};


/*
|--------------------------------------------------------------------------
| UItoTop jQuery Plugin 1.1
| http://www.mattvarone.com/web-design/uitotop-jquery-plugin/
|--------------------------------------------------------------------------
*/
(function($){
	$.fn.UItoTop = function(options) {

 		var defaults = {
			text: 'To Top',
			min: 200,
			inDelay:600,
			outDelay:400,
  			containerID: 'toTop',
			containerHoverID: 'toTopHover',
			scrollSpeed: 1200,
			easingType: 'linear'
 		};

 		var settings = $.extend(defaults, options);
		var containerIDhash = '#' + settings.containerID;
		var containerHoverIDHash = '#'+settings.containerHoverID;
		
		$('body').append('<a href="#" id="'+settings.containerID+'">'+settings.text+'</a>');
		$(containerIDhash).hide().click(function(){
			$('html, body').animate({scrollTop:0}, settings.scrollSpeed, settings.easingType);
			$('#'+settings.containerHoverID, this).stop().animate({'opacity': 0 }, settings.inDelay, settings.easingType);
			return false;
		})
		.prepend('<span id="'+settings.containerHoverID+'"></span>')
		.hover(function() {
				$(containerHoverIDHash, this).stop().animate({
					'opacity': 1
				}, 600, 'linear');
			}, function() { 
				$(containerHoverIDHash, this).stop().animate({
					'opacity': 0
				}, 700, 'linear');
			});
					
		$(window).scroll(function() {
			var sd = $(window).scrollTop();
			if(typeof document.body.style.maxHeight === "undefined") {
				$(containerIDhash).css({
					'position': 'absolute',
					'top': $(window).scrollTop() + $(window).height() - 50
				});
			}
			if ( sd > settings.min ) 
				$(containerIDhash).fadeIn(settings.inDelay);
			else 
				$(containerIDhash).fadeOut(settings.Outdelay);
		});

};
})(jQuery);


/**
 * Desaturates a set of images and adds a hover effect - when the mouse hovers the selected parent,
 * the images get colored.
 * Note: a parent should be set in the options - this is the element whose hover event will trigger
 * the images to get colored.
 * 
 * Dependencies: Pixastic Desaturate http://www.pixastic.com/lib/docs/actions/desaturate/
 * 
 * @author Hana
 */
(function($){

	$.fn.hanaDesaturate=function(options){
		var defaults={
			globalHover:true,  //if set to true, when hovering the parent element, all the images within it will get saturated. If set to false, only the hovered image will be saturated.
			
			//selectors
			saturateClass:'color',
			desaturateClass:'no-color',
			wrapperClass:'p-desaturate'
		};
		
		var o=$.extend(defaults, options),
			$images=$(this),
			$parent=o.parent || $images.parent(),
			$desaturateImages=null,
			ie= jQuery.browser.msie;
		
		/**
		 * Inits the main functionality.
		 */
		function init(){
			buldImageStructure();
			bindMouseEvents();
		}
		
		/**
		 * Creates a new image structure - clones the original image and inserts the cloned copy behind the it.
		 * After that desaturates the main image.
		 */
		function buldImageStructure(){
			$images.each(function(){
				var $img=$(this),
					$wrapper=$('<div/>',{'class':o.wrapperClass});
				
				$img.wrap($wrapper);
				
					$img.addClass(o.saturateClass);
					var img = new Image();
					img.onload = function() {
						img.width=$img.width();
						img.height=$img.height();
						Pixastic.process(img, "desaturate", {average : false});
					};
					
					$(img).addClass(o.desaturateClass).insertAfter($img);
					img.src = $img.attr('src');
				
			});
			
			$desaturateImages=$parent.find('.'+o.desaturateClass);
		}
		
		/**
		 * Binds the mouse events depending on the hover option selected.
		 */
		function bindMouseEvents(){
			if(o.globalHover){
				//all the images will get colored
				$parent.bind('mouseenter',function(){
							saturate($desaturateImages);
						}).bind('mouseleave',function(){
							desaturate($desaturateImages);
						});
			}else{
				//only the hovered image will get colored
				$parent.bind('mouseenter',function(){
					saturate($(this).find('.'+o.desaturateClass));
				}).bind('mouseleave',function(){
					desaturate($(this).find('.'+o.desaturateClass));
				});
			}	
		}
		
		/**
		 * Does the saturate (coloring) action to the selected element(s).
		 */
		function saturate($elem){
			if(!ie){
			$elem.stop().animate({opacity:0},200);
			}else{
			$elem.hide();
			}
		}
		
		/**
		 * Does the desaturate action to the selected element(s).
		 */
		function desaturate($elem){
			if(!ie){
			$elem.stop().animate({opacity:1},200);
			}else{
			$elem.show();
			}
		}
		
		init();
	};
	
}(jQuery));



/**
 * Hana Contact Form - contains all the contact form functionality.
 * @author Hana
 */
(function($){
	$.fn.hanaContactForm=function(options){
		var defaults={
			//set the default options (can be overwritten from the calling function)
			ajaxurl:'',
			invalidClass:'invalid',
			afterValidClass:'after-validation',
			
			//selectors
			submitSel:'.send-button',
			errorSel:'.error-message',
			statusSel:'.contact-status',
			sentSel:'.sent-message',
			loaderSel:'.contact-loader',
			checkSel:'.check',
			failSel:'.fail-message',
			inputWrapperSel:'.contact-input-wrapper'
		};
		
	
	var options=$.extend(defaults, options);
	options.ajaxurl = hanaSite.ajaxurl;
	
	//define some variables that will be used globally within the script
	var $root=$(this),
		$requiredFields=$root.find('input.required, textarea.required'),
		$fields=$root.find('input, textarea'),
		$errorBox=$root.find(options.errorSel),
		$sentBox=$root.find(options.sentSel),
		$loader=$root.find(options.loaderSel),
		$check=$root.find(options.checkSel),
		$failBox=$root.find(options.failSel);
	
	/**
	 * Inits the main functionality.
	 */
	function init(){
		setInputEventHandler();
		
		//set the send button click handler functionality
		$root.find(options.submitSel).eq(0).click(function(e){
			e.preventDefault();
			var isValid=validateForm();

			if(isValid){
				//the form is valid, send the email
				$loader.css({visibility:'visible'});
				
				var data=$root.serialize()+'&action=hana_send_email';
				//send the AJAX request
				$.ajax({
					url:options.ajaxurl,
					data: data,
					type:'post',
					success:function(res){
						//reset the form
						
						$loader.css({visibility:'hidden'});
						if(res==='1'){
							$root.get(0).reset();
							hideAfterValidationErrors();
							$check.css({visibility:'visible'},200);
							$errorBox.slideUp();
							$sentBox.slideDown();
							
							setTimeout(function() {
								$sentBox.slideUp();
								$check.css({visibility:'hidden'},200);
							}, 3000);
						}else{
							showFailError();
						}
					},
					error:function(){
						$loader.css({visibility:'hidden'});
						showFailError();
					}
				});
			}
		});
	}
	
	/**
	 * Validates the form input.
	 * @return true if the form is valid.
	 */
	function validateForm(){
		var isValid=true;
		
		hideValidationErrors();
		$requiredFields.each(function(){
			var $elem=$(this);
			if(!$.trim($elem.val()) || ($elem.hasClass('email') && !isValidEmail($elem.val()))){
				//this field value is not valid display an error
				showError($elem);
				isValid=false;
			}
		});
		
		if(!isValid){
			$errorBox.slideDown();
		}
		return isValid;
	}
	
	function hideValidationErrors(){
		$requiredFields.removeClass(options.invalidClass).removeClass(options.afterValidClass);
	}
	
	function hideAfterValidationErrors(){
		$requiredFields.each(function(){
			var $wrapper=$(this).parents(options.inputWrapperSel).eq(0),
			$errorElem=$wrapper.length?$wrapper:$(this);
			$errorElem.removeClass(options.afterValidClass);
		});
	}
	
	function showError($elem){
		var $wrapper=$elem.parents(options.inputWrapperSel).eq(0),
		$errorElem=$wrapper.length?$wrapper:$elem;
		$errorElem.addClass(options.invalidClass);
	}
	
	function showFailError(){
		$failBox.slideDown();
		setTimeout(function() {
			$failBox.slideUp();
		}, 5000);
	}
	
	function setInputEventHandler() {
		$fields.click(function() {
			var $wrapper=$(this).parents(options.inputWrapperSel).eq(0),
			$errorElem=$wrapper.length?$wrapper:$(this);
			if($errorElem.hasClass(options.invalidClass)){
				$errorElem.addClass(options.afterValidClass);
			}
			$errorElem.removeClass(options.invalidClass);
		}).keydown(function(e) {
			var keyCode = e.keyCode || e.which,
				index = $fields.index($(this));

			if (keyCode == 9) {
				var $field=$fields.eq(index + 1),
				$wrapper=$field.parents(options.inputWrapperSel).eq(0),
				$errorElem=$wrapper.length?$wrapper:$field;
				
				if($errorElem.hasClass(options.invalidClass)){
					$errorElem.addClass(options.afterValidClass);
				}
				$errorElem.removeClass(options.invalidClass);
			}
		});
	}
	
	/**
	 * Checks if an email address is a valid one.
	 * 
	 * @param email
	 *            the email address to validate
	 * @return true if the address is a valid one
	 */
	function isValidEmail(email) {
		var pattern = new RegExp(
				/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
		return pattern.test(email);
	}
	
	if($root.length){
		init();
	}
	
	};
}(jQuery));

/**
 * Hana Form Switching Animation
 * @author Hana
 */
(function($){
	$.fn.hanaFormSwitching=function(options){
		//the form wrapper (includes all forms)
		var $form_wrapper	= $(this),
		//the current form is the one with class active
		$currentForm	= $form_wrapper.children('form.active'),
		//the change form links
		$linkform		= $form_wrapper.find('.linkform');
		
		function init(){
			//get width and height of each form and store them for later						
			$form_wrapper.children('form').each(function(i){
				var $theForm	= $(this);
				//solve the inline display none problem when using fadeIn fadeOut
				if(!$theForm.hasClass('active'))
					$theForm.hide();
				$theForm.data({
					width	: $theForm.outerWidth(true),
					height	: $theForm.outerHeight(true)
				});
			});
			
			//set width and height of wrapper (same of current form)
			setWrapperWidth();
			
			/*
			clicking a link (change form event) in the form
			makes the current form hide.
			The wrapper animates its width and height to the 
			width and height of the new current form.
			After the animation, the new form is shown
			*/
			$linkform.bind('click',function(e){
				var $link	= $(this);
				var target	= $link.attr('rel');
				$currentForm.fadeOut(400,function(){
					//remove class active from current form
					$currentForm.removeClass('active');
					//new current form
					$currentForm= $form_wrapper.children('form.'+target);
					//animate the wrapper
					$form_wrapper.stop();
					$form_wrapper.width($currentForm.data('width'))
								 .height($currentForm.data('height'));
					//new form gets class active
					$currentForm.addClass('active');
					//show the new form
					$currentForm.fadeIn(400);
				});
				e.preventDefault();
			});
		}
		
		function setWrapperWidth(){
			$form_wrapper.css({
				width	: $currentForm.data('width') + 'px',
				height	: $currentForm.data('height') + 'px'
			});
		}
		
		if($form_wrapper.length){
			init();
		}	
	}
}(jQuery));


(function($){
	$.fn.hanaResizeProductCarousel=function(options){
		var $carousel_wrapper	= $(this);
		var isphone		= false;
		var carousel;
		
		function init(){
			$(window).resize(function() {
				var temp_isphone = false;
				if($(window).width()<768) temp_isphone = true;
				if(temp_isphone != isphone) 
					resizeCarousel();
				isphone=temp_isphone;
			});
			
			$(function() {
				carousel = $carousel_wrapper.find('ul').data('jcarousel');
				if($(window).width()<768) isphone = true;
				resizeCarousel();
			});
		}
		
		function resizeCarousel() {
			margin=parseInt($carousel_wrapper.find('ul li:first').css('marginRight').replace('px',''));
			element_width=parseInt($carousel_wrapper.find('ul li:first').css('width').replace('px',''));
			clip_width=(element_width + margin) * options.visible - margin;
			ul_width=(element_width + margin) * $carousel_wrapper.find('ul li').length;	
			$carousel_wrapper.css('width',clip_width);
			$carousel_wrapper.find('ul').css('width',ul_width);
			if(carousel.first)
				$carousel_wrapper.find('ul').css('left',-(carousel.first-1)*(element_width + margin));
		}
		
		if($carousel_wrapper.length){
			init();
		}
	}
}(jQuery));


/**
 * Hana Equal Height
 * @author Hana
 */
(function($){
	$.fn.hanaEqualHeight=function(options){
		var $grid_wrapper	= $(this);
		
		var currentTallest = 0,
		    currentRowStart = 0,
		    rowDivs = new Array(),
			isphone		= false;
		
		function init(){
			$(window).resize(function() {
				var temp_isphone = false;
				if($(window).width()<768) temp_isphone = true;
				if(temp_isphone != isphone) 
					setOriginalHeights();
				isphone=temp_isphone;
				columnConform();
			});
			
			// Dom Ready
			// You might also want to wait until window.onload if images are the things that
			// are unequalizing the blocks
			$(function() {
				setOriginalHeights();
				columnConform();
			});
		}
		
		function setOriginalHeights() {
			$grid_wrapper.children('li').each(function() {
				$(this).attr("originalHeight", $(this).height());
				if($(this).hasClass('product')) 
					$(this).attr("originalHeight", $(this).find('.product-box-wrapper').height());
			});
		}
		
		function setConformingHeight(el, newHeight) {
			el.height(newHeight);
		}
		
		function getOriginalHeight(el) {
			// if the height has changed, send the originalHeight
			return parseInt(el.attr("originalHeight"));
		}
		
		function columnConform() {
			// find the tallest DIV in the row, and set the heights of all of the DIVs to match it.
			$grid_wrapper.children('li').each(function() {
			
				// "caching"
				var $el = $(this);
				
				var topPosition = $el.position().top;
		
				if (currentRowStart != topPosition) {
		
					// we just came to a new row.  Set all the heights on the completed row
					for(currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) setConformingHeight(rowDivs[currentDiv], currentTallest);
		
					// set the variables for the new row
					rowDivs.length = 0; // empty the array
					currentRowStart = topPosition;
					currentTallest = getOriginalHeight($el);
					rowDivs.push($el);
		
				} else {
		
					// another div on the current row.  Add it to the list and check if it's taller
					rowDivs.push($el);
					currentTallest = (currentTallest < getOriginalHeight($el)) ? (getOriginalHeight($el)) : (currentTallest);
		
				}
				// do the last row
				for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) setConformingHeight(rowDivs[currentDiv], currentTallest);
		
			});
		
		}
		
		if($grid_wrapper.length){
			$grid_wrapper.onImagesLoad({selectorCallback: init});
		}
	}
}(jQuery));


var hanaSite;

(function($){
hanaSite = {
	
	enableCufon:'off',
	ajaxurl:'',
	lightboxStyle:'light_rounded',
	initSite : function() {	
		
		//set the hover animation of the images within anchors
		$('a img').not('#header_wrapper a img, #slider-wrapper a img, .nohover').hover(function(){
			$(this).stop().animate({opacity:0.9}, 300);
		},function(){
			$(this).stop().animate({opacity:1}, 300);
		});
		//set the accordion functionality
		jQuery('.accordion-container').each(function(){
			jQuery(this).tabs(jQuery(this).find('div.pane'), {tabs: 'h2', effect: 'slide', initialIndex: 0});
		});
		
		//SET THE SEARCH BUTTON CLICK HANDLER
		jQuery('#search_button').click(function(event){
			event.preventDefault();
			jQuery('#searchform').submit();
		});
		
		//init the contact form functionality
		$('.hana-contact-form').each(function(){
			jQuery(this).hanaContactForm();
		});
		
		
		//set the tabs functionality
		this.loadtabs();
		//load cufon
		this.loadCufon();
		//initialize the menu
		this.setDropDown();
		//initialize the lightbox
		this.setLightbox($("a[rel^='lightbox'],a[rel^='lightbox[group]']"));
		this.setPlaceholderFunc();
		this.setFixedNavigation();
		
		$('ul.products').hanaEqualHeight();
		$().UItoTop({ easingType: 'easeOutQuart' });
	},
	
	/**
	 * JavaScript templating function
	 * http://mir.aculo.us/2011/03/09/little-helpers-a-tweet-sized-javascript-templating-engine/
	 */
	template:function(s,d){
		 for(var p in d)
		   s=s.replace(new RegExp('{'+p+'}','g'), d[p]);
		 return s;
	},
	
	loadtabs:function(){
		
		$.tools.tabs.addEffect("custom", function(tabIndex, done) {
 
		  	// hide all panes and show the one that is clicked
		  	this.getPanes().removeClass('current').eq(tabIndex).addClass('current');
		  
		  	// the supplied callback must be called after the effect has finished its job
		  	done.call();
			this.getCurrentPane().parent().height(this.getPanes().eq(tabIndex).outerHeight());
		});
		
		$("ul.tabs").tabs("div.panes > div", {
			effect: 'custom'
		});
  
		$("ul.tabs").each(function(){
			
			//set z-index of tabs
			var count = $(this).find('a').length;
			$(this).find('a').each(function(){
				$(this).css('z-index',count);
				count--;
			});
			
		});
		
		$("div.panes").each(function(){
			$(this).height($(this).children("div:first").outerHeight());
		});
		
		//demo2
		$('ul.tabs.third li a').hover(function() {
			var $zindex = $(this).css('z-index');
			var shadow = $(this).closest('.tabs.third').next('.clear-shadow');
			if($(this).hasClass('current')) 
				$(shadow).addClass('hidden') 
			else $(shadow).removeClass('hidden');
			$(shadow).css('z-index', $zindex-1);
		});
	},
	
	setLightbox:function(elem){
		var options={animation_speed:'normal', theme:hanaSite.lightboxStyle, overlay_gallery: false, slideshow:false, social_tools:''};
		elem.prettyPhoto(options);
	},
	
	setFixedNavigation:function(){
		jQuery(window).scroll(function(){
        	if( jQuery(window).scrollTop()>=176 ) {
            	jQuery('#main_menu_wrapper').addClass('fixedNavWrapper');
        		jQuery('#header_wrapper').addClass('fixedNavPadding');
        	}
        	else{
        		jQuery('#main_menu_wrapper').removeClass('fixedNavWrapper');
        		jQuery('#header_wrapper').removeClass('fixedNavPadding');				
        	}
        });
	},
	
	/**
	 * Adds a drop down functionality.
	 */
	setDropDown:function(){
		var padding=jQuery.browser.msie?5:12;
		
		jQuery("ul.dropdown-menu li, .dropdown-menu > ul li").each(function(){
			if(jQuery(this).children('ul').length>0){
				jQuery(this).find('a:first').append('<span class="drop-arrow"></span>');
			}
		});
		
		jQuery("ul.dropdown-menu > li, .dropdown-menu > ul > li").hover(function(){
			if(jQuery(this).children('ul').length>0){
				var a = jQuery(this).find('a:first');
				a.css('padding-top',parseInt(a.css('padding-top'))+2);
				a.css('padding-bottom',parseInt(a.css('padding-bottom'))+5);
			}
		}, function(){
			if(jQuery(this).children('ul').length>0){
				var a = jQuery(this).find('a:first');
				a.css('padding-top',parseInt(a.css('padding-top'))-2);
				a.css('padding-bottom',parseInt(a.css('padding-bottom'))-5);
			}
		});
		
		jQuery("ul.dropdown-menu ul ul, .dropdown-menu > ul ul ul").data('padding', 0);
		jQuery("ul.dropdown-menu ul ul, .dropdown-menu > ul ul ul").data('top', 0);
		
		jQuery("ul.dropdown-menu li, .dropdown-menu > ul li").hover(function(){
			if(jQuery(this).children('ul').length>0){
				var ul = jQuery(this).find('ul:first');
				ul.stop().css({height:'auto'}).slideDown(300, function()
				{
					ul.css({overflow:"visible", visibility:'visible', paddingTop:ul.data('padding'), top:ul.data('top')});
				});
			}
		}, function(){
			if(jQuery(this).children('ul').length>0){
				var ul = jQuery(this).find('ul:first');
				var top=ul.data('padding')+ul.data('top');
				ul.stop().css({paddingTop:0, top:top}).slideUp(300, function()
				{	
					ul.css({overflow:"hidden", display:"none"});
				});
			}
		});
	},
	
	loadCufon:function(){
		if(this.enableCufon==='on'){
			Cufon.replace('h1,h2,h3,h4,h5,h6,#portfolio-big-pagination,.showcase-item span,a.button span,.intro-text, a.button-small span,.drop-caps,h1.page-heading');
		}
	},
	
	/**
	 * Sets a "placeholder" like functionality for the browsers that don't support input placeholders.
	 */
	setPlaceholderFunc:function(){
		if(!Modernizr.input.placeholder){

			$('[placeholder]').focus(function() {
			  var input = $(this);
			  if (input.val() == input.attr('placeholder')) {
				input.val('');
				input.removeClass('placeholder');
			  }
			}).blur(function() {
			  var input = $(this);
			  if (input.val() == '' || input.val() == input.attr('placeholder')) {
				input.addClass('placeholder');
				input.val(input.attr('placeholder'));
			  }
			}).blur();
			$('[placeholder]').parents('form').submit(function() {
			  $(this).find('[placeholder]').each(function() {
				var input = $(this);
				if (input.val() == input.attr('placeholder')) {
				  input.val('');
				}
			  })
			});
		
		}
	}
};
}(jQuery));
