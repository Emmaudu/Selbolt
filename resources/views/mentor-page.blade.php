
<!DOCTYPE html>
<html class="" lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge"><script type="text/javascript">(window.NREUM||(NREUM={})).init={privacy:{cookies_enabled:true},distributed_tracing:{enabled:true}};(window.NREUM||(NREUM={})).loader_config={agentID:"1588584367",accountID:"3298526",trustKey:"3298526",xpid:"VwQOWVNRDhABUFNUAgIOXlIB",licenseKey:"NRJS-24dde71c9b6945ab0fd",applicationID:"1426539860"};window.NREUM||(NREUM={}),__nr_require=function(t,e,n){function r(n){if(!e[n]){var o=e[n]={exports:{}};t[n][0].call(o.exports,function(e){var o=t[n][1][e];return r(o||e)},o,o.exports)}return e[n].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<n.length;o++)r(n[o]);return r}({1:[function(t,e,n){function r(t){try{s.console&&console.log(t)}catch(e){}}var o,i=t("ee"),a=t(29),s={};try{o=localStorage.getItem("__nr_flags").split(","),console&&"function"==typeof console.log&&(s.console=!0,o.indexOf("dev")!==-1&&(s.dev=!0),o.indexOf("nr_dev")!==-1&&(s.nrDev=!0))}catch(c){}s.nrDev&&i.on("internal-error",function(t){r(t.stack)}),s.dev&&i.on("fn-err",function(t,e,n){r(n.stack)}),s.dev&&(r("NR AGENT IN DEVELOPMENT MODE"),r("flags: "+a(s,function(t,e){return t}).join(", ")))},{}],2:[function(t,e,n){function r(t,e,n,r,s){try{l?l-=1:o(s||new UncaughtException(t,e,n),!0)}catch(f){try{i("ierr",[f,c.now(),!0])}catch(d){}}return"function"==typeof u&&u.apply(this,a(arguments))}function UncaughtException(t,e,n){this.message=t||"Uncaught error with no additional information",this.sourceURL=e,this.line=n}function o(t,e){var n=e?null:c.now();i("err",[t,n])}var i=t("handle"),a=t(30),s=t("ee"),c=t("loader"),f=t("gos"),u=window.onerror,d=!1,p="nr@seenError";if(!c.disabled){var l=0;c.features.err=!0,t(1),window.onerror=r;try{throw new Error}catch(h){"stack"in h&&(t(13),t(12),"addEventListener"in window&&t(6),c.xhrWrappable&&t(14),d=!0)}s.on("fn-start",function(t,e,n){d&&(l+=1)}),s.on("fn-err",function(t,e,n){d&&!n[p]&&(f(n,p,function(){return!0}),this.thrown=!0,o(n))}),s.on("fn-end",function(){d&&!this.thrown&&l>0&&(l-=1)}),s.on("internal-error",function(t){i("ierr",[t,c.now(),!0])})}},{}],3:[function(t,e,n){var r=t("loader");r.disabled||(r.features.ins=!0)},{}],4:[function(t,e,n){function r(){L++,C=g.hash,this[u]=y.now()}function o(){L--,g.hash!==C&&i(0,!0);var t=y.now();this[h]=~~this[h]+t-this[u],this[d]=t}function i(t,e){E.emit("newURL",[""+g,e])}function a(t,e){t.on(e,function(){this[e]=y.now()})}var s="-start",c="-end",f="-body",u="fn"+s,d="fn"+c,p="cb"+s,l="cb"+c,h="jsTime",m="fetch",v="addEventListener",w=window,g=w.location,y=t("loader");if(w[v]&&y.xhrWrappable&&!y.disabled){var x=t(10),b=t(11),E=t(8),R=t(6),O=t(13),S=t(7),N=t(14),M=t(9),P=t("ee"),T=P.get("tracer");t(16),y.features.spa=!0;var C,L=0;P.on(u,r),b.on(p,r),M.on(p,r),P.on(d,o),b.on(l,o),M.on(l,o),P.buffer([u,d,"xhr-done","xhr-resolved"]),R.buffer([u]),O.buffer(["setTimeout"+c,"clearTimeout"+s,u]),N.buffer([u,"new-xhr","send-xhr"+s]),S.buffer([m+s,m+"-done",m+f+s,m+f+c]),E.buffer(["newURL"]),x.buffer([u]),b.buffer(["propagate",p,l,"executor-err","resolve"+s]),T.buffer([u,"no-"+u]),M.buffer(["new-jsonp","cb-start","jsonp-error","jsonp-end"]),a(N,"send-xhr"+s),a(P,"xhr-resolved"),a(P,"xhr-done"),a(S,m+s),a(S,m+"-done"),a(M,"new-jsonp"),a(M,"jsonp-end"),a(M,"cb-start"),E.on("pushState-end",i),E.on("replaceState-end",i),w[v]("hashchange",i,!0),w[v]("load",i,!0),w[v]("popstate",function(){i(0,L>1)},!0)}},{}],5:[function(t,e,n){function r(t){}if(window.performance&&window.performance.timing&&window.performance.getEntriesByType){var o=t("ee"),i=t("handle"),a=t(13),s=t(12),c="learResourceTimings",f="addEventListener",u="resourcetimingbufferfull",d="bstResource",p="resource",l="-start",h="-end",m="fn"+l,v="fn"+h,w="bstTimer",g="pushState",y=t("loader");if(!y.disabled){y.features.stn=!0,t(8),"addEventListener"in window&&t(6);var x=NREUM.o.EV;o.on(m,function(t,e){var n=t[0];n instanceof x&&(this.bstStart=y.now())}),o.on(v,function(t,e){var n=t[0];n instanceof x&&i("bst",[n,e,this.bstStart,y.now()])}),a.on(m,function(t,e,n){this.bstStart=y.now(),this.bstType=n}),a.on(v,function(t,e){i(w,[e,this.bstStart,y.now(),this.bstType])}),s.on(m,function(){this.bstStart=y.now()}),s.on(v,function(t,e){i(w,[e,this.bstStart,y.now(),"requestAnimationFrame"])}),o.on(g+l,function(t){this.time=y.now(),this.startPath=location.pathname+location.hash}),o.on(g+h,function(t){i("bstHist",[location.pathname+location.hash,this.startPath,this.time])}),f in window.performance&&(window.performance["c"+c]?window.performance[f](u,function(t){i(d,[window.performance.getEntriesByType(p)]),window.performance["c"+c]()},!1):window.performance[f]("webkit"+u,function(t){i(d,[window.performance.getEntriesByType(p)]),window.performance["webkitC"+c]()},!1)),document[f]("scroll",r,{passive:!0}),document[f]("keypress",r,!1),document[f]("click",r,!1)}}},{}],6:[function(t,e,n){function r(t){for(var e=t;e&&!e.hasOwnProperty(u);)e=Object.getPrototypeOf(e);e&&o(e)}function o(t){s.inPlace(t,[u,d],"-",i)}function i(t,e){return t[1]}var a=t("ee").get("events"),s=t("wrap-function")(a,!0),c=t("gos"),f=XMLHttpRequest,u="addEventListener",d="removeEventListener";e.exports=a,"getPrototypeOf"in Object?(r(document),r(window),r(f.prototype)):f.prototype.hasOwnProperty(u)&&(o(window),o(f.prototype)),a.on(u+"-start",function(t,e){var n=t[1],r=c(n,"nr@wrapped",function(){function t(){if("function"==typeof n.handleEvent)return n.handleEvent.apply(n,arguments)}var e={object:t,"function":n}[typeof n];return e?s(e,"fn-",null,e.name||"anonymous"):n});this.wrapped=t[1]=r}),a.on(d+"-start",function(t){t[1]=this.wrapped||t[1]})},{}],7:[function(t,e,n){function r(t,e,n){var r=t[e];"function"==typeof r&&(t[e]=function(){var t=i(arguments),e={};o.emit(n+"before-start",[t],e);var a;e[m]&&e[m].dt&&(a=e[m].dt);var s=r.apply(this,t);return o.emit(n+"start",[t,a],s),s.then(function(t){return o.emit(n+"end",[null,t],s),t},function(t){throw o.emit(n+"end",[t],s),t})})}var o=t("ee").get("fetch"),i=t(30),a=t(29);e.exports=o;var s=window,c="fetch-",f=c+"body-",u=["arrayBuffer","blob","json","text","formData"],d=s.Request,p=s.Response,l=s.fetch,h="prototype",m="nr@context";d&&p&&l&&(a(u,function(t,e){r(d[h],e,f),r(p[h],e,f)}),r(s,"fetch",c),o.on(c+"end",function(t,e){var n=this;if(e){var r=e.headers.get("content-length");null!==r&&(n.rxSize=r),o.emit(c+"done",[null,e],n)}else o.emit(c+"done",[t],n)}))},{}],8:[function(t,e,n){var r=t("ee").get("history"),o=t("wrap-function")(r);e.exports=r;var i=window.history&&window.history.constructor&&window.history.constructor.prototype,a=window.history;i&&i.pushState&&i.replaceState&&(a=i),o.inPlace(a,["pushState","replaceState"],"-")},{}],9:[function(t,e,n){function r(t){function e(){c.emit("jsonp-end",[],p),t.removeEventListener("load",e,!1),t.removeEventListener("error",n,!1)}function n(){c.emit("jsonp-error",[],p),c.emit("jsonp-end",[],p),t.removeEventListener("load",e,!1),t.removeEventListener("error",n,!1)}var r=t&&"string"==typeof t.nodeName&&"script"===t.nodeName.toLowerCase();if(r){var o="function"==typeof t.addEventListener;if(o){var a=i(t.src);if(a){var u=s(a),d="function"==typeof u.parent[u.key];if(d){var p={};f.inPlace(u.parent,[u.key],"cb-",p),t.addEventListener("load",e,!1),t.addEventListener("error",n,!1),c.emit("new-jsonp",[t.src],p)}}}}}function o(){return"addEventListener"in window}function i(t){var e=t.match(u);return e?e[1]:null}function a(t,e){var n=t.match(p),r=n[1],o=n[3];return o?a(o,e[r]):e[r]}function s(t){var e=t.match(d);return e&&e.length>=3?{key:e[2],parent:a(e[1],window)}:{key:t,parent:window}}var c=t("ee").get("jsonp"),f=t("wrap-function")(c);if(e.exports=c,o()){var u=/[?&](?:callback|cb)=([^&#]+)/,d=/(.*)\.([^.]+)/,p=/^(\w+)(\.|$)(.*)$/,l=["appendChild","insertBefore","replaceChild"];Node&&Node.prototype&&Node.prototype.appendChild?f.inPlace(Node.prototype,l,"dom-"):(f.inPlace(HTMLElement.prototype,l,"dom-"),f.inPlace(HTMLHeadElement.prototype,l,"dom-"),f.inPlace(HTMLBodyElement.prototype,l,"dom-")),c.on("dom-start",function(t){r(t[0])})}},{}],10:[function(t,e,n){var r=t("ee").get("mutation"),o=t("wrap-function")(r),i=NREUM.o.MO;e.exports=r,i&&(window.MutationObserver=function(t){return this instanceof i?new i(o(t,"fn-")):i.apply(this,arguments)},MutationObserver.prototype=i.prototype)},{}],11:[function(t,e,n){function r(t){var e=i.context(),n=s(t,"executor-",e,null,!1),r=new f(n);return i.context(r).getCtx=function(){return e},r}var o=t("wrap-function"),i=t("ee").get("promise"),a=t("ee").getOrSetContext,s=o(i),c=t(29),f=NREUM.o.PR;e.exports=i,f&&(window.Promise=r,["all","race"].forEach(function(t){var e=f[t];f[t]=function(n){function r(t){return function(){i.emit("propagate",[null,!o],a,!1,!1),o=o||!t}}var o=!1;c(n,function(e,n){Promise.resolve(n).then(r("all"===t),r(!1))});var a=e.apply(f,arguments),s=f.resolve(a);return s}}),["resolve","reject"].forEach(function(t){var e=f[t];f[t]=function(t){var n=e.apply(f,arguments);return t!==n&&i.emit("propagate",[t,!0],n,!1,!1),n}}),f.prototype["catch"]=function(t){return this.then(null,t)},f.prototype=Object.create(f.prototype,{constructor:{value:r}}),c(Object.getOwnPropertyNames(f),function(t,e){try{r[e]=f[e]}catch(n){}}),o.wrapInPlace(f.prototype,"then",function(t){return function(){var e=this,n=o.argsToArray.apply(this,arguments),r=a(e);r.promise=e,n[0]=s(n[0],"cb-",r,null,!1),n[1]=s(n[1],"cb-",r,null,!1);var c=t.apply(this,n);return r.nextPromise=c,i.emit("propagate",[e,!0],c,!1,!1),c}}),i.on("executor-start",function(t){t[0]=s(t[0],"resolve-",this,null,!1),t[1]=s(t[1],"resolve-",this,null,!1)}),i.on("executor-err",function(t,e,n){t[1](n)}),i.on("cb-end",function(t,e,n){i.emit("propagate",[n,!0],this.nextPromise,!1,!1)}),i.on("propagate",function(t,e,n){this.getCtx&&!e||(this.getCtx=function(){if(t instanceof Promise)var e=i.context(t);return e&&e.getCtx?e.getCtx():this})}),r.toString=function(){return""+f})},{}],12:[function(t,e,n){var r=t("ee").get("raf"),o=t("wrap-function")(r),i="equestAnimationFrame";e.exports=r,o.inPlace(window,["r"+i,"mozR"+i,"webkitR"+i,"msR"+i],"raf-"),r.on("raf-start",function(t){t[0]=o(t[0],"fn-")})},{}],13:[function(t,e,n){function r(t,e,n){t[0]=a(t[0],"fn-",null,n)}function o(t,e,n){this.method=n,this.timerDuration=isNaN(t[1])?0:+t[1],t[0]=a(t[0],"fn-",this,n)}var i=t("ee").get("timer"),a=t("wrap-function")(i),s="setTimeout",c="setInterval",f="clearTimeout",u="-start",d="-";e.exports=i,a.inPlace(window,[s,"setImmediate"],s+d),a.inPlace(window,[c],c+d),a.inPlace(window,[f,"clearImmediate"],f+d),i.on(c+u,r),i.on(s+u,o)},{}],14:[function(t,e,n){function r(t,e){d.inPlace(e,["onreadystatechange"],"fn-",s)}function o(){var t=this,e=u.context(t);t.readyState>3&&!e.resolved&&(e.resolved=!0,u.emit("xhr-resolved",[],t)),d.inPlace(t,g,"fn-",s)}function i(t){y.push(t),h&&(b?b.then(a):v?v(a):(E=-E,R.data=E))}function a(){for(var t=0;t<y.length;t++)r([],y[t]);y.length&&(y=[])}function s(t,e){return e}function c(t,e){for(var n in t)e[n]=t[n];return e}t(6);var f=t("ee"),u=f.get("xhr"),d=t("wrap-function")(u),p=NREUM.o,l=p.XHR,h=p.MO,m=p.PR,v=p.SI,w="readystatechange",g=["onload","onerror","onabort","onloadstart","onloadend","onprogress","ontimeout"],y=[];e.exports=u;var x=window.XMLHttpRequest=function(t){var e=new l(t);try{u.emit("new-xhr",[e],e),e.addEventListener(w,o,!1)}catch(n){try{u.emit("internal-error",[n])}catch(r){}}return e};if(c(l,x),x.prototype=l.prototype,d.inPlace(x.prototype,["open","send"],"-xhr-",s),u.on("send-xhr-start",function(t,e){r(t,e),i(e)}),u.on("open-xhr-start",r),h){var b=m&&m.resolve();if(!v&&!m){var E=1,R=document.createTextNode(E);new h(a).observe(R,{characterData:!0})}}else f.on("fn-end",function(t){t[0]&&t[0].type===w||a()})},{}],15:[function(t,e,n){function r(t){if(!s(t))return null;var e=window.NREUM;if(!e.loader_config)return null;var n=(e.loader_config.accountID||"").toString()||null,r=(e.loader_config.agentID||"").toString()||null,f=(e.loader_config.trustKey||"").toString()||null;if(!n||!r)return null;var h=l.generateSpanId(),m=l.generateTraceId(),v=Date.now(),w={spanId:h,traceId:m,timestamp:v};return(t.sameOrigin||c(t)&&p())&&(w.traceContextParentHeader=o(h,m),w.traceContextStateHeader=i(h,v,n,r,f)),(t.sameOrigin&&!u()||!t.sameOrigin&&c(t)&&d())&&(w.newrelicHeader=a(h,m,v,n,r,f)),w}function o(t,e){return"00-"+e+"-"+t+"-01"}function i(t,e,n,r,o){var i=0,a="",s=1,c="",f="";return o+"@nr="+i+"-"+s+"-"+n+"-"+r+"-"+t+"-"+a+"-"+c+"-"+f+"-"+e}function a(t,e,n,r,o,i){var a="btoa"in window&&"function"==typeof window.btoa;if(!a)return null;var s={v:[0,1],d:{ty:"Browser",ac:r,ap:o,id:t,tr:e,ti:n}};return i&&r!==i&&(s.d.tk=i),btoa(JSON.stringify(s))}function s(t){return f()&&c(t)}function c(t){var e=!1,n={};if("init"in NREUM&&"distributed_tracing"in NREUM.init&&(n=NREUM.init.distributed_tracing),t.sameOrigin)e=!0;else if(n.allowed_origins instanceof Array)for(var r=0;r<n.allowed_origins.length;r++){var o=h(n.allowed_origins[r]);if(t.hostname===o.hostname&&t.protocol===o.protocol&&t.port===o.port){e=!0;break}}return e}function f(){return"init"in NREUM&&"distributed_tracing"in NREUM.init&&!!NREUM.init.distributed_tracing.enabled}function u(){return"init"in NREUM&&"distributed_tracing"in NREUM.init&&!!NREUM.init.distributed_tracing.exclude_newrelic_header}function d(){return"init"in NREUM&&"distributed_tracing"in NREUM.init&&NREUM.init.distributed_tracing.cors_use_newrelic_header!==!1}function p(){return"init"in NREUM&&"distributed_tracing"in NREUM.init&&!!NREUM.init.distributed_tracing.cors_use_tracecontext_headers}var l=t(26),h=t(17);e.exports={generateTracePayload:r,shouldGenerateTrace:s}},{}],16:[function(t,e,n){function r(t){var e=this.params,n=this.metrics;if(!this.ended){this.ended=!0;for(var r=0;r<p;r++)t.removeEventListener(d[r],this.listener,!1);e.aborted||(n.duration=a.now()-this.startTime,this.loadCaptureCalled||4!==t.readyState?null==e.status&&(e.status=0):i(this,t),n.cbTime=this.cbTime,u.emit("xhr-done",[t],t),s("xhr",[e,n,this.startTime]))}}function o(t,e){var n=c(e),r=t.params;r.host=n.hostname+":"+n.port,r.pathname=n.pathname,t.parsedOrigin=n,t.sameOrigin=n.sameOrigin}function i(t,e){t.params.status=e.status;var n=v(e,t.lastSize);if(n&&(t.metrics.rxSize=n),t.sameOrigin){var r=e.getResponseHeader("X-NewRelic-App-Data");r&&(t.params.cat=r.split(", ").pop())}t.loadCaptureCalled=!0}var a=t("loader");if(a.xhrWrappable&&!a.disabled){var s=t("handle"),c=t(17),f=t(15).generateTracePayload,u=t("ee"),d=["load","error","abort","timeout"],p=d.length,l=t("id"),h=t(22),m=t(21),v=t(18),w=NREUM.o.REQ,g=window.XMLHttpRequest;a.features.xhr=!0,t(14),t(7),u.on("new-xhr",function(t){var e=this;e.totalCbs=0,e.called=0,e.cbTime=0,e.end=r,e.ended=!1,e.xhrGuids={},e.lastSize=null,e.loadCaptureCalled=!1,e.params=this.params||{},e.metrics=this.metrics||{},t.addEventListener("load",function(n){i(e,t)},!1),h&&(h>34||h<10)||window.opera||t.addEventListener("progress",function(t){e.lastSize=t.loaded},!1)}),u.on("open-xhr-start",function(t){this.params={method:t[0]},o(this,t[1]),this.metrics={}}),u.on("open-xhr-end",function(t,e){"loader_config"in NREUM&&"xpid"in NREUM.loader_config&&this.sameOrigin&&e.setRequestHeader("X-NewRelic-ID",NREUM.loader_config.xpid);var n=f(this.parsedOrigin);if(n){var r=!1;n.newrelicHeader&&(e.setRequestHeader("newrelic",n.newrelicHeader),r=!0),n.traceContextParentHeader&&(e.setRequestHeader("traceparent",n.traceContextParentHeader),n.traceContextStateHeader&&e.setRequestHeader("tracestate",n.traceContextStateHeader),r=!0),r&&(this.dt=n)}}),u.on("send-xhr-start",function(t,e){var n=this.metrics,r=t[0],o=this;if(n&&r){var i=m(r);i&&(n.txSize=i)}this.startTime=a.now(),this.listener=function(t){try{"abort"!==t.type||o.loadCaptureCalled||(o.params.aborted=!0),("load"!==t.type||o.called===o.totalCbs&&(o.onloadCalled||"function"!=typeof e.onload))&&o.end(e)}catch(n){try{u.emit("internal-error",[n])}catch(r){}}};for(var s=0;s<p;s++)e.addEventListener(d[s],this.listener,!1)}),u.on("xhr-cb-time",function(t,e,n){this.cbTime+=t,e?this.onloadCalled=!0:this.called+=1,this.called!==this.totalCbs||!this.onloadCalled&&"function"==typeof n.onload||this.end(n)}),u.on("xhr-load-added",function(t,e){var n=""+l(t)+!!e;this.xhrGuids&&!this.xhrGuids[n]&&(this.xhrGuids[n]=!0,this.totalCbs+=1)}),u.on("xhr-load-removed",function(t,e){var n=""+l(t)+!!e;this.xhrGuids&&this.xhrGuids[n]&&(delete this.xhrGuids[n],this.totalCbs-=1)}),u.on("addEventListener-end",function(t,e){e instanceof g&&"load"===t[0]&&u.emit("xhr-load-added",[t[1],t[2]],e)}),u.on("removeEventListener-end",function(t,e){e instanceof g&&"load"===t[0]&&u.emit("xhr-load-removed",[t[1],t[2]],e)}),u.on("fn-start",function(t,e,n){e instanceof g&&("onload"===n&&(this.onload=!0),("load"===(t[0]&&t[0].type)||this.onload)&&(this.xhrCbStart=a.now()))}),u.on("fn-end",function(t,e){this.xhrCbStart&&u.emit("xhr-cb-time",[a.now()-this.xhrCbStart,this.onload,e],e)}),u.on("fetch-before-start",function(t){function e(t,e){var n=!1;return e.newrelicHeader&&(t.set("newrelic",e.newrelicHeader),n=!0),e.traceContextParentHeader&&(t.set("traceparent",e.traceContextParentHeader),e.traceContextStateHeader&&t.set("tracestate",e.traceContextStateHeader),n=!0),n}var n,r=t[1]||{};"string"==typeof t[0]?n=t[0]:t[0]&&t[0].url?n=t[0].url:window.URL&&t[0]&&t[0]instanceof URL&&(n=t[0].href),n&&(this.parsedOrigin=c(n),this.sameOrigin=this.parsedOrigin.sameOrigin);var o=f(this.parsedOrigin);if(o&&(o.newrelicHeader||o.traceContextParentHeader))if("string"==typeof t[0]||window.URL&&t[0]&&t[0]instanceof URL){var i={};for(var a in r)i[a]=r[a];i.headers=new Headers(r.headers||{}),e(i.headers,o)&&(this.dt=o),t.length>1?t[1]=i:t.push(i)}else t[0]&&t[0].headers&&e(t[0].headers,o)&&(this.dt=o)}),u.on("fetch-start",function(t,e){this.params={},this.metrics={},this.startTime=a.now(),t.length>=1&&(this.target=t[0]),t.length>=2&&(this.opts=t[1]);var n,r=this.opts||{},i=this.target;"string"==typeof i?n=i:"object"==typeof i&&i instanceof w?n=i.url:window.URL&&"object"==typeof i&&i instanceof URL&&(n=i.href),o(this,n);var s=(""+(i&&i instanceof w&&i.method||r.method||"GET")).toUpperCase();this.params.method=s,this.txSize=m(r.body)||0}),u.on("fetch-done",function(t,e){this.params||(this.params={}),this.params.status=e?e.status:0;var n;"string"==typeof this.rxSize&&this.rxSize.length>0&&(n=+this.rxSize);var r={txSize:this.txSize,rxSize:n,duration:a.now()-this.startTime};s("xhr",[this.params,r,this.startTime])})}},{}],17:[function(t,e,n){var r={};e.exports=function(t){if(t in r)return r[t];var e=document.createElement("a"),n=window.location,o={};e.href=t,o.port=e.port;var i=e.href.split("://");!o.port&&i[1]&&(o.port=i[1].split("/")[0].split("@").pop().split(":")[1]),o.port&&"0"!==o.port||(o.port="https"===i[0]?"443":"80"),o.hostname=e.hostname||n.hostname,o.pathname=e.pathname,o.protocol=i[0],"/"!==o.pathname.charAt(0)&&(o.pathname="/"+o.pathname);var a=!e.protocol||":"===e.protocol||e.protocol===n.protocol,s=e.hostname===document.domain&&e.port===n.port;return o.sameOrigin=a&&(!e.hostname||s),"/"===o.pathname&&(r[t]=o),o}},{}],18:[function(t,e,n){function r(t,e){var n=t.responseType;return"json"===n&&null!==e?e:"arraybuffer"===n||"blob"===n||"json"===n?o(t.response):"text"===n||""===n||void 0===n?o(t.responseText):void 0}var o=t(21);e.exports=r},{}],19:[function(t,e,n){function r(){}function o(t,e,n){return function(){return i(t,[f.now()].concat(s(arguments)),e?null:this,n),e?void 0:this}}var i=t("handle"),a=t(29),s=t(30),c=t("ee").get("tracer"),f=t("loader"),u=NREUM;"undefined"==typeof window.newrelic&&(newrelic=u);var d=["setPageViewName","setCustomAttribute","setErrorHandler","finished","addToTrace","inlineHit","addRelease"],p="api-",l=p+"ixn-";a(d,function(t,e){u[e]=o(p+e,!0,"api")}),u.addPageAction=o(p+"addPageAction",!0),u.setCurrentRouteName=o(p+"routeName",!0),e.exports=newrelic,u.interaction=function(){return(new r).get()};var h=r.prototype={createTracer:function(t,e){var n={},r=this,o="function"==typeof e;return i(l+"tracer",[f.now(),t,n],r),function(){if(c.emit((o?"":"no-")+"fn-start",[f.now(),r,o],n),o)try{return e.apply(this,arguments)}catch(t){throw c.emit("fn-err",[arguments,this,t],n),t}finally{c.emit("fn-end",[f.now()],n)}}}};a("actionText,setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","),function(t,e){h[e]=o(l+e)}),newrelic.noticeError=function(t,e){"string"==typeof t&&(t=new Error(t)),i("err",[t,f.now(),!1,e])}},{}],20:[function(t,e,n){function r(t){if(NREUM.init){for(var e=NREUM.init,n=t.split("."),r=0;r<n.length-1;r++)if(e=e[n[r]],"object"!=typeof e)return;return e=e[n[n.length-1]]}}e.exports={getConfiguration:r}},{}],21:[function(t,e,n){e.exports=function(t){if("string"==typeof t&&t.length)return t.length;if("object"==typeof t){if("undefined"!=typeof ArrayBuffer&&t instanceof ArrayBuffer&&t.byteLength)return t.byteLength;if("undefined"!=typeof Blob&&t instanceof Blob&&t.size)return t.size;if(!("undefined"!=typeof FormData&&t instanceof FormData))try{return JSON.stringify(t).length}catch(e){return}}}},{}],22:[function(t,e,n){var r=0,o=navigator.userAgent.match(/Firefox[\/\s](\d+\.\d+)/);o&&(r=+o[1]),e.exports=r},{}],23:[function(t,e,n){function r(){return s.exists&&performance.now?Math.round(performance.now()):(i=Math.max((new Date).getTime(),i))-a}function o(){return i}var i=(new Date).getTime(),a=i,s=t(31);e.exports=r,e.exports.offset=a,e.exports.getLastTimestamp=o},{}],24:[function(t,e,n){function r(t){return!(!t||!t.protocol||"file:"===t.protocol)}e.exports=r},{}],25:[function(t,e,n){function r(t,e){var n=t.getEntries();n.forEach(function(t){"first-paint"===t.name?d("timing",["fp",Math.floor(t.startTime)]):"first-contentful-paint"===t.name&&d("timing",["fcp",Math.floor(t.startTime)])})}function o(t,e){var n=t.getEntries();n.length>0&&d("lcp",[n[n.length-1]])}function i(t){t.getEntries().forEach(function(t){t.hadRecentInput||d("cls",[t])})}function a(t){if(t instanceof h&&!v){var e=Math.round(t.timeStamp),n={type:t.type};e<=p.now()?n.fid=p.now()-e:e>p.offset&&e<=Date.now()?(e-=p.offset,n.fid=p.now()-e):e=p.now(),v=!0,d("timing",["fi",e,n])}}function s(t){"hidden"===t&&d("pageHide",[p.now()])}if(!("init"in NREUM&&"page_view_timing"in NREUM.init&&"enabled"in NREUM.init.page_view_timing&&NREUM.init.page_view_timing.enabled===!1)){var c,f,u,d=t("handle"),p=t("loader"),l=t(28),h=NREUM.o.EV;if("PerformanceObserver"in window&&"function"==typeof window.PerformanceObserver){c=new PerformanceObserver(r);try{c.observe({entryTypes:["paint"]})}catch(m){}f=new PerformanceObserver(o);try{f.observe({entryTypes:["largest-contentful-paint"]})}catch(m){}u=new PerformanceObserver(i);try{u.observe({type:"layout-shift",buffered:!0})}catch(m){}}if("addEventListener"in document){var v=!1,w=["click","keydown","mousedown","pointerdown","touchstart"];w.forEach(function(t){document.addEventListener(t,a,!1)})}l(s)}},{}],26:[function(t,e,n){function r(){function t(){return e?15&e[n++]:16*Math.random()|0}var e=null,n=0,r=window.crypto||window.msCrypto;r&&r.getRandomValues&&(e=r.getRandomValues(new Uint8Array(31)));for(var o,i="xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx",a="",s=0;s<i.length;s++)o=i[s],"x"===o?a+=t().toString(16):"y"===o?(o=3&t()|8,a+=o.toString(16)):a+=o;return a}function o(){return a(16)}function i(){return a(32)}function a(t){function e(){return n?15&n[r++]:16*Math.random()|0}var n=null,r=0,o=window.crypto||window.msCrypto;o&&o.getRandomValues&&Uint8Array&&(n=o.getRandomValues(new Uint8Array(31)));for(var i=[],a=0;a<t;a++)i.push(e().toString(16));return i.join("")}e.exports={generateUuid:r,generateSpanId:o,generateTraceId:i}},{}],27:[function(t,e,n){function r(t,e){if(!o)return!1;if(t!==o)return!1;if(!e)return!0;if(!i)return!1;for(var n=i.split("."),r=e.split("."),a=0;a<r.length;a++)if(r[a]!==n[a])return!1;return!0}var o=null,i=null,a=/Version\/(\S+)\s+Safari/;if(navigator.userAgent){var s=navigator.userAgent,c=s.match(a);c&&s.indexOf("Chrome")===-1&&s.indexOf("Chromium")===-1&&(o="Safari",i=c[1])}e.exports={agent:o,version:i,match:r}},{}],28:[function(t,e,n){function r(t){function e(){t(a&&document[a]?document[a]:document[o]?"hidden":"visible")}"addEventListener"in document&&i&&document.addEventListener(i,e,!1)}e.exports=r;var o,i,a;"undefined"!=typeof document.hidden?(o="hidden",i="visibilitychange",a="visibilityState"):"undefined"!=typeof document.msHidden?(o="msHidden",i="msvisibilitychange"):"undefined"!=typeof document.webkitHidden&&(o="webkitHidden",i="webkitvisibilitychange",a="webkitVisibilityState")},{}],29:[function(t,e,n){function r(t,e){var n=[],r="",i=0;for(r in t)o.call(t,r)&&(n[i]=e(r,t[r]),i+=1);return n}var o=Object.prototype.hasOwnProperty;e.exports=r},{}],30:[function(t,e,n){function r(t,e,n){e||(e=0),"undefined"==typeof n&&(n=t?t.length:0);for(var r=-1,o=n-e||0,i=Array(o<0?0:o);++r<o;)i[r]=t[e+r];return i}e.exports=r},{}],31:[function(t,e,n){e.exports={exists:"undefined"!=typeof window.performance&&window.performance.timing&&"undefined"!=typeof window.performance.timing.navigationStart}},{}],ee:[function(t,e,n){function r(){}function o(t){function e(t){return t&&t instanceof r?t:t?f(t,c,a):a()}function n(n,r,o,i,a){if(a!==!1&&(a=!0),!l.aborted||i){t&&a&&t(n,r,o);for(var s=e(o),c=m(n),f=c.length,u=0;u<f;u++)c[u].apply(s,r);var p=d[y[n]];return p&&p.push([x,n,r,s]),s}}function i(t,e){g[t]=m(t).concat(e)}function h(t,e){var n=g[t];if(n)for(var r=0;r<n.length;r++)n[r]===e&&n.splice(r,1)}function m(t){return g[t]||[]}function v(t){return p[t]=p[t]||o(n)}function w(t,e){l.aborted||u(t,function(t,n){e=e||"feature",y[n]=e,e in d||(d[e]=[])})}var g={},y={},x={on:i,addEventListener:i,removeEventListener:h,emit:n,get:v,listeners:m,context:e,buffer:w,abort:s,aborted:!1};return x}function i(t){return f(t,c,a)}function a(){return new r}function s(){(d.api||d.feature)&&(l.aborted=!0,d=l.backlog={})}var c="nr@context",f=t("gos"),u=t(29),d={},p={},l=e.exports=o();e.exports.getOrSetContext=i,l.backlog=d},{}],gos:[function(t,e,n){function r(t,e,n){if(o.call(t,e))return t[e];var r=n();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(t,e,{value:r,writable:!0,enumerable:!1}),r}catch(i){}return t[e]=r,r}var o=Object.prototype.hasOwnProperty;e.exports=r},{}],handle:[function(t,e,n){function r(t,e,n,r){o.buffer([t],r),o.emit(t,e,n)}var o=t("ee").get("handle");e.exports=r,r.ee=o},{}],id:[function(t,e,n){function r(t){var e=typeof t;return!t||"object"!==e&&"function"!==e?-1:t===window?0:a(t,i,function(){return o++})}var o=1,i="nr@id",a=t("gos");e.exports=r},{}],loader:[function(t,e,n){function r(){if(!S++){var t=O.info=NREUM.info,e=m.getElementsByTagName("script")[0];if(setTimeout(f.abort,3e4),!(t&&t.licenseKey&&t.applicationID&&e))return f.abort();c(E,function(e,n){t[e]||(t[e]=n)});var n=a();s("mark",["onload",n+O.offset],null,"api"),s("timing",["load",n]);var r=m.createElement("script");0===t.agent.indexOf("http://")||0===t.agent.indexOf("https:///")?r.src=t.agent:r.src=l+"://"+t.agent,e.parentNode.insertBefore(r,e)}}function o(){"complete"===m.readyState&&i()}function i(){s("mark",["domContent",a()+O.offset],null,"api")}var a=t(23),s=t("handle"),c=t(29),f=t("ee"),u=t(27),d=t(24),p=t(20),l=p.getConfiguration("ssl")===!1?"http":"https",h=window,m=h.document,v="addEventListener",w="attachEvent",g=h.XMLHttpRequest,y=g&&g.prototype,x=!d(h.location);NREUM.o={ST:setTimeout,SI:h.setImmediate,CT:clearTimeout,XHR:g,REQ:h.Request,EV:h.Event,PR:h.Promise,MO:h.MutationObserver};var b=""+location,E={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-spa-1210.min.js"},R=g&&y&&y[v]&&!/CriOS/.test(navigator.userAgent),O=e.exports={offset:a.getLastTimestamp(),now:a,origin:b,features:{},xhrWrappable:R,userAgent:u,disabled:x};if(!x){t(19),t(25),m[v]?(m[v]("DOMContentLoaded",i,!1),h[v]("load",r,!1)):(m[w]("onreadystatechange",o),h[w]("onload",r)),s("mark",["firstbyte",a.getLastTimestamp()],null,"api");var S=0}},{}],"wrap-function":[function(t,e,n){function r(t,e){function n(e,n,r,c,f){function nrWrapper(){var i,a,u,p;try{a=this,i=d(arguments),u="function"==typeof r?r(i,a):r||{}}catch(l){o([l,"",[i,a,c],u],t)}s(n+"start",[i,a,c],u,f);try{return p=e.apply(a,i)}catch(h){throw s(n+"err",[i,a,h],u,f),h}finally{s(n+"end",[i,a,p],u,f)}}return a(e)?e:(n||(n=""),nrWrapper[p]=e,i(e,nrWrapper,t),nrWrapper)}function r(t,e,r,o,i){r||(r="");var s,c,f,u="-"===r.charAt(0);for(f=0;f<e.length;f++)c=e[f],s=t[c],a(s)||(t[c]=n(s,u?c+r:r,o,c,i))}function s(n,r,i,a){if(!h||e){var s=h;h=!0;try{t.emit(n,r,i,e,a)}catch(c){o([c,n,r,i],t)}h=s}}return t||(t=u),n.inPlace=r,n.flag=p,n}function o(t,e){e||(e=u);try{e.emit("internal-error",t)}catch(n){}}function i(t,e,n){if(Object.defineProperty&&Object.keys)try{var r=Object.keys(t);return r.forEach(function(n){Object.defineProperty(e,n,{get:function(){return t[n]},set:function(e){return t[n]=e,e}})}),e}catch(i){o([i],n)}for(var a in t)l.call(t,a)&&(e[a]=t[a]);return e}function a(t){return!(t&&t instanceof Function&&t.apply&&!t[p])}function s(t,e){var n=e(t);return n[p]=t,i(t,n,u),n}function c(t,e,n){var r=t[e];t[e]=s(r,n)}function f(){for(var t=arguments.length,e=new Array(t),n=0;n<t;++n)e[n]=arguments[n];return e}var u=t("ee"),d=t(30),p="nr@original",l=Object.prototype.hasOwnProperty,h=!1;e.exports=r,e.exports.wrapFunction=s,e.exports.wrapInPlace=c,e.exports.argsToArray=f},{}]},{},["loader",2,16,5,3,4]);</script><script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"applicationID":"1426539860","errorBeacon":"bam.nr-data.net","transactionName":"ZVVaMEVTXEdVVRFbC1wffhFZUUZdW1hKXwFcRFcWGURbUUNFX38BXERXFnNXRlVdWjNbAUUeXwFD","beacon":"bam.nr-data.net","licenseKey":"NRJS-24dde71c9b6945ab0fd","queueTime":0,"applicationTime":334,"agent":""}</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{$mentor->fullname()}} on Mentorship.ng</title>
<meta name="robots" content="index, follow">
<link rel="canonical" href="">
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('cdn.mentorcruise.com/img/favicons/apple-touch-icon.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('cdn.mentorcruise.com/img/favicons/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('cdn.mentorcruise.com/img/favicons/favicon-16x16.png')}}">
<link rel="manifest" href="/manifest.json">
<link rel="mask-icon" href="https://cdn.mentorcruise.com/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#ffffff">
<meta prefix="og: http://ogp.me/ns#" property='og:title' content="Visit Jake Sta Teresa on MentorCruise" />
<meta prefix="og: http://ogp.me/ns#" property="og:description" content="MentorCruise connects aspiring students with industry professionals in Tech for long-term mentorship in Engineering, Design and Business." />
<meta prefix="og: http://ogp.me/ns#" property="og:url" content="/mentor/JakeStaTeresa/" />

<meta property="og:image" content="https://api.placid.app/u/kqufeiun7?img[image]=https%3A%2F%2Fcdn.mentorcruise.com%2Fcache%2Ffaa4adb5738082ce08c4acec5f1ff9b9%2F5aa6da80fa020ec4%2F0e50f38623d9ad010f4562c51ac51d88.jpg&amp;title[text]=Jake+Sta+Teresa" />
<meta property="og:image:height" content="630" />
<meta property="og:image:width" content="1200" />

<meta property="twitter:image" content="https://api.placid.app/u/kqufeiun7?img[image]=https%3A%2F%2Fcdn.mentorcruise.com%2Fcache%2Ffaa4adb5738082ce08c4acec5f1ff9b9%2F5aa6da80fa020ec4%2F0e50f38623d9ad010f4562c51ac51d88.jpg&amp;title[text]=Jake+Sta+Teresa" />
<meta name="twitter:card" content="summary_large_image">
<link rel="stylesheet" href="maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('cdn.mentorcruise.com/css/bulma.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('cdn.mentorcruise.com/css/mentorcruise.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('cdn.mentorcruise.com/css/mentorcruise-v2.0.0.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('cdn.mentorcruise.com/css/styles.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('cdn.mentorcruise.com/css/tailwind.min.css')}}" />
<link rel="stylesheet" href="{{asset('rsms.me/inter/inter.css')}}">
<style>
        html, body {
            font-family: 'Inter', sans-serif;
        }

        @media screen and (max-width: 768px) {
            .hero.is-primary .nav-menu {
                background-color: #f8f8f8;
            }
        }

    </style>
<script type="text/javascript">
    (function (e, t) {
        var n = e.amplitude || {_q: [], _iq: {}};
        var r = t.createElement("script")
        ;r.type = "text/javascript"
        ;r.integrity = "sha384-vYYnQ3LPdp/RkQjoKBTGSq0X5F73gXU3G2QopHaIfna0Ct1JRWzwrmEz115NzOta"
        ;r.crossOrigin = "anonymous";
        r.async = true
        ;r.src = "{{asset('cdn.amplitude.com/libs/amplitude-5.8.0-min.gz.js')}}"
        ;r.onload = function () {
            if (!e.amplitude.runQueuedFunctions) {
                console.log("[Amplitude] Error: could not load SDK")
            }
        }
        ;var i = t.getElementsByTagName("script")[0];
        i.parentNode.insertBefore(r, i)
        ;

        function s(e, t) {
            e.prototype[t] = function () {
                this._q.push([t].concat(Array.prototype.slice.call(arguments, 0)));
                return this
            }
        }

        var o = function () {
                this._q = [];
                return this
            }
        ;var a = ["add", "append", "clearAll", "prepend", "set", "setOnce", "unset"]
        ;
        for (var u = 0; u < a.length; u++) {
            s(o, a[u])
        }
        n.Identify = o;
        var c = function () {
                this._q = []
                ;
                return this
            }
        ;var l = ["setProductId", "setQuantity", "setPrice", "setRevenueType", "setEventProperties"]
        ;
        for (var p = 0; p < l.length; p++) {
            s(c, l[p])
        }
        n.Revenue = c
        ;var d = ["init", "logEvent", "logRevenue", "setUserId", "setUserProperties", "setOptOut", "setVersionName", "setDomain", "setDeviceId", "enableTracking", "setGlobalUserProperties", "identify", "clearUserProperties", "setGroup", "logRevenueV2", "regenerateDeviceId", "groupIdentify", "onInit", "logEventWithTimestamp", "logEventWithGroups", "setSessionId", "resetSessionId"]
        ;

        function v(e) {
            function t(t) {
                e[t] = function () {
                    e._q.push([t].concat(Array.prototype.slice.call(arguments, 0)))
                }
            }

            for (var n = 0; n < d.length; n++) {
                t(d[n])
            }
        }

        v(n);
        n.getInstance = function (e) {
            e = (!e || e.length === 0 ? "$default_instance" : e).toLowerCase()
            ;
            if (!n._iq.hasOwnProperty(e)) {
                n._iq[e] = {_q: []};
                v(n._iq[e])
            }
            return n._iq[e]
        }
        ;e.amplitude = n
    })(window, document);

    amplitude.getInstance().init("675f207090826f314ba5a3074e7a0931");
</script>
<script src="{{asset('www.googleoptimize.com/optimize16f1.js?id=GTM-5TPGZPQ')}}"></script>
<script async src='../../cdn-cgi/challenge-platform/h/g/scripts/invisible.js'></script></head>
<body class="" style="background-color: #f8f8ff;">
<link rel="stylesheet" href="{{asset('cdn.mentorcruise.com/css/bulma-tooltip.min.css')}}">
<link rel="stylesheet" href="{{asset('cdn.mentorcruise.com/css/slick-theme.css')}}">
<link rel="stylesheet" href="{{asset('cdn.mentorcruise.com/css/slick.css')}}">

<img style="display:none" src="https://api.placid.app/u/kqufeiun7?img[image]=https%3A%2F%2Fcdn.mentorcruise.com%2Fcache%2Ffaa4adb5738082ce08c4acec5f1ff9b9%2F5aa6da80fa020ec4%2F0e50f38623d9ad010f4562c51ac51d88.jpg&amp;title[text]=Jake+Sta+Teresa" data-pin-description="Get mentored by Jake Sta Teresa on MentorCruise" data-pin-url="/mentor/JakeStaTeresa" />
<style>
    #profile {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #512DA8;
        font-size: 25px;
        text-align: center;
      }
    .slick-track {
        display: flex !important;
    }

    .slick-slide {
        height: inherit !important;
    }

    #bio-truncated a {
        word-break: break-all;
    }

    .testimonial-slider:not(.slick-slider) .box:not(:last-child) {
        margin-bottom: 0 !important;
    }

    ::-webkit-scrollbar {
        -webkit-appearance: none;
        -moz-appearance: none;
        width: 7px;
    }

    ::-webkit-scrollbar-thumb {
        border-radius: 5px;
        background-color: rgba(0, 0, 0, .5);
    }
</style>
<section class="hero is-primary is-large">
<div class="hero-head" style="background-color: white;">
<style>

    #home-nav .navbar-item.is-mega-drop {
        position: relative !important;

    }

    #home-nav .navbar-item.is-mega-drop .is-mega-menu-title {
        margin-bottom: .2rem;
        padding: .375rem;
        display: block;
        color: black !important;
    }

    #home-nav #mega-dropdown {
        left: -20px !important;
        text-align: left !important;
    }

    #home-nav .navbar-item:hover, .navbar-link:hover {
        background-color: transparent !important;
    }

    #home-nav .navbar-dropdown {
        border-radius: 10px;
        border: 0;
        padding: 0;
    }

    #home-nav .navbar-dropdown a.navbar-item {
        padding-right: 1rem;
    }

    #home-nav .navbar-dropdown .column {
        padding: 1rem 1.5rem !important;
    }

    #home-nav .navbar-dropdown .navbar-item {
        padding: .3rem 1rem;
        font-size: 0.95rem;
        font-weight: bold;
    }

    #home-nav .navbar-dropdown .navbar-item:hover {
        background: #f3f1f1 !important;
        color: #1a2435;
    }

    #home-nav .navbar-dropdown .action-items {
        font-weight: bold;
        font-size: 1.1rem;
        padding: 1.25rem 0.25rem;
        display: block;
        white-space: nowrap;
        color: #7a7a7a !important;
    }

    #home-nav .navbar-dropdown .action-items svg {
        height: 24px;
        width: 24px;
        display: inline;
        margin-right: 6px;
        margin-bottom: -3px;
    }

    #noprofile {
      float: center;margin: auto;margin-top: 20px;line-height: 150px;color: white; width:50%; background: #512DA8; font-size: 25px; text-align: center;
    }

    #home-nav .navbar-link.disable-after {
        padding-right: 1em;
    }

    #home-nav .navbar-link.disable-after::after {
        border: none;
        display: none;
        pointer-events: none;
    }

    #home-nav #businessDropdown {
        padding: 1rem 0.5rem;
    }

    @media screen and (max-width: 768px) {

        #home-nav {
            background: transparent;
            height: 4rem;
            padding: 0;
        }

        #home-nav .nav-menu.nav-right {
            background-color: #E4EBF0;
        }

        #home-nav .navbar-item.has-dropdown.is-hoverable.is-hidden-tablet-only.nav-item {

            display: block;

        }

        #home-nav #businessDropdown {
            position: initial;
            background: transparent;
            -webkit-box-shadow: none;
            box-shadow: none;
            font-weight: bold;
            padding-left: 1em;
        }
    }

</style>
<header style="background-color: #191970;" class="nav" id="home-nav">
<div class="container">
<div class="nav-left">
<span class="navbar-item flo skill-navitem text-mc-blue">
<a class="text-white" href="/" title="Login">
<h2 style="color: white;">Mentorships.ng</h2>
</a>
</span>
</div>
<span class="nav-toggle">
<span></span>
<span></span>
<span></span>
</span>
<div class="nav-right nav-menu">
<span class="navbar-item skill-navitem text-mc-blue">
<a class="text-white" href="/login" title="Login">
Login
</a>
</span>
<span class="navbar-item skill-navitem text-mc-blue">
<a class="text-white" href="/register" title="Login">
Register as Mentee
</a>
</span>
<span class="navbar-item skill-navitem text-mc-blue">
<a class="text-white" href="/mentor/register" title="Login">
Register as Mentor
</a>
</span>
</div>
</div>
</header>
</div>
</section>
<div class="max-w-screen-xl mx-auto section">
<nav class="flex sm:pl-8 mb-8" aria-label="Breadcrumb">
<div class="flex items-center space-x-4">
<div>
<div>
<a href="/" class="text-gray-400 hover:text-gray-500">

<svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
<path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
</svg>
<span class="sr-only">Home</span>
</a>
</div>
</div>
<div>
<div class="flex items-center">

<svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
</svg>
<a href="/mentors" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Find a Mentor</a>
</div>
</div>
<div>
<div class="flex items-center">

<svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
</svg>
<a href="" class="ml-4 text-sm font-medium text-gray-700" aria-current="page">{{$mentor->fullname()}}</a>
</div>
</div>
</div>
</nav>
<div class="columns is-desktop">
<div class="column is-8-desktop">
<div>
<div class="columns sm:px-8">
<div class="column is-4" style="text-align: center;">
@if($mentor->pic != null)
<span class="avatar-sm rounded-circle">
<img alt="{{$mentor->fullname()}}" class="profile1-dp" src="{{$mentor->pic}}">
</span>
@else
<div class="block" id="noprofile">{{substr($mentor->first_name, 0, 1)}}{{substr($mentor->last_name, 0, 1)}}</div>
@endif
<div class="media-body  ml-2  d-none d-lg-block">
<span class="mb-0 text-sm  font-weight-bold" id="firstName" style="display: none;">{{$mentor->first_name}}</span>
<span class="mb-0 text-sm  font-weight-bold" id="lastName" style="display: none;">{{$mentor->last_name}}</span>
</div>
<div class="block">
<span class="icon is-medium" style="color: #00aced;">
<a style="color: #00aced;" href="{{json_decode($mentor->social)[0]}}" target="_blank">
<i class="fa fa-lg fa-twitter"></i>
</a>
</span>
<span class="icon is-medium" style="color: #0077B5;">
<a style="color: #0077B5;" target="_blank" href="{{json_decode($mentor->social)[1]}}" target="_blank">
<i class="fa fa-lg fa-linkedin"></i>
</a>
</span>
</div>
</div>
<div class="column relative mt-8 sm:mt-0">
<div>
<a href="#" class="has-text-blue">
<h1 class="title is-4 title-blue nametag inline-block">
{{$mentor->fullname()}}
</h1>
</a>
<h4 class="text-lg title-blue mt-2">{{$mentor->job_title}}
@ <a class="has-text-blue hover:underline text-white" href="/company/barcode-essentials-pty-ltd/">{{$mentor->company_name}}</a></h4>
<div class="star-rating-display" data-rating="5.0"><span class="is-vishidden">5.0 stars</span>
</div>
<span class="rating-display has-text-blue font-bold">{{$mentor->custom_reviews}} ({{$mentor->reviews->count()}} reviews)</span>
<div class="xl:absolute block mt-4 xl:mt-0 top-4 sm:top-0 right-0">
</div>
<div class="meta mt-4">
<div class="block">
<p class="inline mr-4"><img class="" width="10%" src="https://www.countryflagicons.com/SHINY/64/{{$mentor->country}}.png" />
</p>
</div>
<div class="block">
    @for ($i = 0; $i < count(explode(',', json_decode($mentor->tag)[0])); $i++)
        <div class="inline-block text-base">
            <a href="#" style="line-height: 3" class="tag-lg">
            {{explode(',', json_decode($mentor->tag)[0])[$i]}}
            </a>
        </div>
    @endfor
</div>
</div>
</div>
</div>
</div>
</div>
<div class="content sm:px-8">
<div class="inline-block my-12">
<div class="has-text-blue max-w-screen-md overflow-hidden" id="bio-truncated">
<p><p>Hey, </p>
<p>{{$mentor->bio}}</p>
</div>
</div>
</div>
<div class="sm:px-8 mt-6 md:mb-14" id="reviews">
</div>
</div>
<div class="column is-4-desktop sm:pl-8">
<div class="block rounded-2xl" style="background-color: #191970;">
<div class="px-8 pt-6 pb-6">
<p class="text-xl text-white font-semibold">Mentorship Program</p>
<p class="text-4xl text-white font-black mt-4">
$<span id="price-pay" class="text-white">{{$mentor->price()}}</span>
</p>
<div class="mt-6 pl-4 text-base">
<p class="text-lg mb-2 text-white">
<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
</svg>
<a href="/top/" class="has-text-blue underline text-white cursor-pointer tooltip is-tooltip-top is-tooltip-multiline" data-tooltip="This mentor is a top mentor, which is the highest level of mentors. As such, this mentor provides fast responses, brings unique experience and guarantees top service.">Provides
the
highest quality of service</a>
</p>
<p class="text-lg mb-2 text-white">
<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
</svg>
Includes <span class="underline text-white cursor-pointer tooltip is-tooltip-top is-tooltip-multiline" data-tooltip="We will never limit the interactions you have with your mentor, however there's a practical limit to how much your mentor can reply to.">unlimited</span>
Q&A via chat
</p>
<p class="text-lg mb-2 text-white cursor-pointer tooltip is-tooltip-top is-tooltip-multiline" data-tooltip="Mentor can provide sample exercises and tasks">
<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
</svg>
Tasks & exercises
</p>
<p class="text-lg mb-2 text-white">
<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
</svg>
Regular calls, per agreement
</p>
<p class="text-lg mb-2 text-white cursor-pointer">
<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
</svg>
Expect responses in 24 hours or less
</p>
</div>
<div class="mt-8 text-center">
    @auth
    <form>
        <a href="/overview/{{$mentor->username}}/pay">Apply Now</a>
    </form>
    @else
    <a href="/overview/{{$mentor->username}}/pay">Apply Now</a>
    @endauth
<span class="inline-block italic mt-2">

</span>
</div>
</div>
</div>
</div>
</div>

</div>
<footer style="background-color: #191970;" class="mt-5" aria-labelledby="footerHeading">
<h2 id="footerHeading" class="sr-only">Footer</h2>
<div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
<div class="xl:grid xl:grid-cols-3 xl:gap-8">
<div class="space-y-8 xl:col-span-1">
<a href="/" class="flex items-center space-x-4">
</a>
<p class="text-base" style="color: #f8f8ff;">
Your trusted source to find highly-vetted mentors & industry professionals to move your career ahead.
</p>
<div class="flex space-x-6">
<a href="https://facebook.com" title="MentorCruise Facebook" target="_blank" class="text-gray-400 hover:text-gray-500">
<span class="sr-only">Facebook</span>
<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
<path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
</svg>
</a>
<a href="https://www.instagram.com" title="MentorCruise Instagram" target="_blank" class="text-gray-400 hover:text-gray-500">
<span class="sr-only">Instagram</span>
<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
<path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
</svg>
</a>
<a href="https://twitter.com" title="MentorCruise Twitter" target="_blank" class="text-gray-400 hover:text-gray-500">
<span class="sr-only">Twitter</span>
<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
<path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
</svg>
</a>
<a href="https://www.linkedin.com/company" title="MentorCruise Linkedin" target="_blank" class="text-gray-400 hover:text-gray-500">
</svg>
</a>
</div>
</div>
<div class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
<div class="md:grid md:grid-cols-2 md:gap-8">
<div>
<h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
Platform
</h3>
<ul class="mt-4 space-y-4">
<li>
<a href="/mentor/browse/" class="text-base text-gray-500 hover:text-gray-900">
Browse Mentors
</a>
</li>
<li>
<a href="/sessions/" class="text-base text-gray-500 hover:text-gray-900">
Book a Session
</a>
</li>
<li>
<a href="/mentor/" class="text-base text-gray-500 hover:text-gray-900">
Become a Mentor
</a>
</li>
<li>
<a href="/teams/" class="text-base text-gray-500 hover:text-gray-900">
Mentorship for Teams
</a>
</li>
</ul>
</div>
<div class="mt-12 md:mt-0">
<h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
Resources
</h3>
<ul class="mt-4 space-y-4">
<li>
<a href="/partners/" class="text-base text-gray-500 hover:text-gray-900">
Partner Program
</a>
</li>
<li>
<a href="/success/" class="text-base text-gray-500 hover:text-gray-900">
Success Stories
</a>
</li>
<li>
<a href="/testimonials/" class="text-base text-gray-500 hover:text-gray-900">
Testimonials
</a>
</li>
<li>
<a href="/blog/" class="text-base text-gray-500 hover:text-gray-900">
Blog
</a>
</li>
</ul>
</div>
</div>
<div class="md:grid md:grid-cols-2 md:gap-8">
<div>
<h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
Company
</h3>
<ul class="mt-4 space-y-4">
<li>
<a href="/about/" class="text-base text-gray-500 hover:text-gray-900">
About
</a>
</li>
<li>
<a href="/coc/" class="text-base text-gray-500 hover:text-gray-900">
Code of Conduct
</a>
</li>
<li>
<a href="/privacy/" class="text-base text-gray-500 hover:text-gray-900">
Privacy Policy
</a>
</li>
</ul>
</div>
<div class="mt-12 md:mt-0">
<h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
Support
</h3>
<ul class="mt-4 space-y-4">
<li>
<a href="/faq/" class="text-base text-gray-500 hover:text-gray-900">
FAQ
</a>
</li>
<li>
<a href="/contact/" class="text-base text-gray-500 hover:text-gray-900">
Contact
</a>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="mt-12 border-t border-gray-200 pt-8">
<p class="text-base text-gray-400 xl:text-center">&copy; 2021
<a class="underline text-white text-gray-400 normal-case" href="/about/">Mentorship.ng</a>. All Rights Reserved.</p>
</div>
</div>
</footer>
<div class="modal content" id="notifyme">
<div class="modal-card">
<header class="modal-card-head">
<p class="modal-card-title text-white">Notify me when <span class="selected-name">Jake</span>
has new spots</p>
</header>
<section class="modal-card-body">
<p class="text-white">We will send you a quick email if <span class="selected-name">Jake</span> has new
open spots for mentorship, and only in that case!</p>

</section>
</div>
</div>
<div style="display: none;" id="subaccount_id">{{$mentor->subaccount_id}}</div>
@auth
<div style="display: none;" id="user_name">{{auth()->user()->fullname()}}</div>
<div style="display: none;" id="user_email">{{auth()->user()->email}}</div>
<div style="display: none;" id="user_mobile">{{auth()->user()->mobile}}</div>
@endauth
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108818402-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-108818402-1');
    gtag('config', 'AW-921036714');
</script>

<script>
    !function (f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function () {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        connect.facebook.net/en_US/fbevents.js)
    fbq('init', '357205525427846');
    fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=357205525427846&amp;ev=PageView&amp;noscript=1"
/></noscript>


<script>
    !function (e, t, n, s, u, a) {
        e.twq || (s = e.twq = function () {
            s.exe ? s.exe.apply(s, arguments) : s.queue.push(arguments);
        }, s.version = '1.1', s.queue = [], u = t.createElement(n), u.async = !0, u.src = static.ads-twitter.com/uwt.js,
            a = t.getElementsByTagName(n)[0], a.parentNode.insertBefore(u, a))
    }(window, document, 'script');
    // Insert Twitter Pixel ID and Standard Event data below
    twq('init', 'o47q2');
    twq('track', 'PageView');
</script>


<script type="text/javascript">
_linkedin_partner_id = "2355537";
window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
window._linkedin_data_partner_ids.push(_linkedin_partner_id);
</script><script type="text/javascript">
(function(l) {
if (!l){window.lintrk = function(a,b){window.lintrk.q.push([a,b])};
window.lintrk.q=[]}
var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "{{asset('snap.licdn.com/li.lms-analytics/insight.min.js')}}";
s.parentNode.insertBefore(b, s);})(window.lintrk);
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=2355537&amp;fmt=gif" />
</noscript>
<script src="{{asset('script.tapfiliate.com/tapfiliate.js')}}" type="text/javascript" async></script>
<script type="text/javascript">
    (function (t, a, p) {
        t.TapfiliateObject = a;
        t[a] = t[a] || function () {
            (t[a].q = t[a].q || []).push(arguments)
        }
    })(window, 'tap');

    tap('create', '20228-bdae99', {integration: "javascript"});
    tap('detect');
</script>
<script type="text/javascript">var abr_id = 2182;</script>
<script async src="{{asset('cdn.abrankings.com/js/client.js')}}"></script>
<script type="text/javascript" src="{{asset('cdn.mentorcruise.com/js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('cdn.mentorcruise.com/js/bulma.js')}}"></script>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "url": "",
  "logo": "https://cdn.mentorcruise.com/img/mc_green.png",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "/mentor/browse/?search={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}



</script>

<script>
        amplitude.getInstance().logEvent("Mentor Detail");
    </script>
<script src="{{asset('cdn.mentorcruise.com/js/readmore.min.js')}}"></script>
<script>
        $('#bio-truncated').readmore({
            'collapsedHeight': 290,
            'moreLink': '<a href="#" class="has-text-blue font-bold">Read more</a>',
            'lessLink': '<a href="#" class="has-text-blue font-bold">Read less</a>'
        });
    </script>
<script src="{{asset('cdn.mentorcruise.com/js/slick.min.js')}}"></script>
<script>
        
            $(document).ready(function () {
                $('.testimonial-slider').slick({
                    dots: true,
                    mobileFirst: false,
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    autoplay: true,
                    autoplaySpeed: 5000,
                    adaptiveHeight: false,
                    speed: 700,
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            }
                        },
                    ]
                });
            });
        

        // Return an array of bulmaCollapsible instances (empty if no DOM node found)
        const bulmaCollapsibleInstances = bulmaCollapsible.attach('.is-collapsible');
    </script>
<script>
        function switchPlan(hash) {
            $('.selected-plan').removeClass('bg-gray-500').addClass('bg-transparent');
            $('#choose-plan-' + hash + ' .selected-plan').addClass('bg-gray-500').removeClass('bg-transparent');
            $('.plan-details').addClass('hidden');
            $('#plan-' + hash).removeClass('hidden');
        }
    </script>
<script>

    (function () {
        var burger = document.querySelector('.nav-toggle');
        var menu = document.querySelector('.nav-menu');
        if (burger) {
            burger.addEventListener('click', function () {
                burger.classList.toggle('is-active');
                menu.classList.toggle('is-active');
            });
        }
    })();

</script>
<script>
    axios.patch('http://jsonplaceholder.typicode.com/posts/1',{      
        title: 'check my file',
        body: 'it is in the locker'
    })
    .then(function(response){
        $('.patch').html('<b>'+'ID'+'</b><br>'+response.data['id']+'<br><b>'+'BODY'+'</b><br>'+response.data['body']+'<br><b>'+'userID'+'</b><br>'+['userId']+'<br><b>'+'TITLE'+'</b><br>'+response.data['title']);
        console.log(response.data);
    })
    .catch(function(error){
        console.log(error);
    })
    const subaccount_id = $("#subaccount_id").text();
    function makePayment() {
        FlutterwaveCheckout({
        public_key: "FLWPUBK_TEST-08d172126ff89e86aeaad37897e262cd-X",
        tx_ref: "hooli-tx-new-test",
        amount: $('#price-pay').text(),
        currency: "USD",
        payment_options: "card",
        customer: {
            email: $('#user_email').text(),
            phonenumber: $('#user_mobile').text(),
            name: $('#user_name').text(),
        },
        subaccounts: [
            {
            id: $("#subaccount_id").text(),
            transaction_charge_type: "flat_subaccount",
            transaction_charge: (0.8 * $('#price-pay').text())
            }  
        ],
        callback: function (data) {
            console.log(data);
            axios.post('/pending-transaction/flutterwave', {
                flw_ref: data.flw_ref,
                status: 'pending',
                customer_email: data.customer.email,
                transaction_id: data.transaction_id,
                subaccount_id: subaccount_id,
                amount: data.amount,
                tx_ref: data.tx_ref
            }).then(function($data){
                window.location.href = '/mentee/dashboard';
            }).catch(function($data){
                window.location.href = '/mentee/dashboard';
            });
        },
        customizations: {
            title: "Mentorship.ng",
            description: "Payment for mentorship",
            logo: "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.cvYs4BjNBrUjbdvC5KVePQHaEo%26pid%3DApi&f=1",
        },
        });
    }
</script>
<script>
    var storename = $('#firstName').text();
    console.log(storename);
    var first = $('#firstName').text().charAt(0);
    var last = $('#lastName').text().charAt(0);
    var str = first + last; 
    var profile = $('#profile').text(str);

    function sum(id) {
        console.log($('#service'+id+':checked'));
        if($('#service'+id).is(":checked")) {
        $value = parseInt($('.total').text()) + parseInt($('#'+id).text());
        $('.total').text($value);
        $('#total').text($value);
        $('#price-pay').text($value);
        }else{
        $value = parseInt($('.total').text()) - parseInt($('#'+id).text());
        $('.total').text($value);
        $('#total').text($value);
        $('#price-pay').text($value);
        }
    }
    </script>
<script type="text/javascript">(function(){window['__CF$cv$params']={r:'6987c4535a4f416c',m:'M7Xhc16nG8NmeLBh7lPLfW03RZQFR_lMsDxJd5x.bpQ-1633280848-0-AWjK00on0j7FomAsiAWro7iBc5efRoPG6li7Da+kJ9xPI4H36cy9fB8Smmcz6lQqPWmVYHFTbuBTLnZOfNXuR09+aLe5GHcyy277TQ5DpzIP4Sf0kmlm7R+F3EKGs9iaA4+Fa9VZKJIxRcVtf2EGxvs=',s:[0x721a09525a,0x9f8986f194],u:'/cdn-cgi/challenge-platform/h/g'}})();</script><script defer src="{{asset('static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"6987c4535a4f416c","version":"2021.9.0","r":1,"token":"0f39e5003c60468f9c50519c41a8707b","si":100}'></script>
</body>

<!-- Mirrored from mentorcruise.com/mentor/JakeStaTeresa/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Oct 2021 16:09:23 GMT -->
</html>
