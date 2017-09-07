//DETERMINE IF EDITING IS ACTIVE
if (window.location.toString().indexOf("bbe_action_launch_editing")==-1) var bbe_editor_active=false; else bbe_editor_active=true;

  
//////////////////////
// HELPER JS :  EXTRA LIBS
/////////////////////

//SIMPLELIGHTBOX
/*
	By André Rinas, www.andreknieriem.de
	Available for use under the MIT License
*/
!function(a,b,c,d){"use strict";a.fn.simpleLightbox=function(d){var t,d=a.extend({overlay:!0,spinner:!0,nav:!0,navText:["&lsaquo;","&rsaquo;"],captions:!0,captionDelay:0,captionSelector:"img",captionType:"attr",captionsData:"title",captionPosition:"bottom",close:!0,closeText:"×",swipeClose:!0,showCounter:!0,fileExt:"png|jpg|jpeg|gif",animationSlide:!0,animationSpeed:250,preloading:!0,enableKeyboard:!0,loop:!0,rel:!1,docClose:!0,swipeTolerance:50,className:"simple-lightbox",widthRatio:.8,heightRatio:.9,disableRightClick:!1,disableScroll:!0,alertError:!0,alertErrorMessage:"Image not found, next image will be loaded",additionalHtml:!1,history:!0},d),h=(b.navigator.pointerEnabled||b.navigator.msPointerEnabled,0),i=0,j=a(),k=function(){var a=c.body||c.documentElement;return a=a.style,""===a.WebkitTransition?"-webkit-":""===a.MozTransition?"-moz-":""===a.OTransition?"-o-":""===a.transition&&""},l=!1,m=[],n=function(b,c){var d=a(c.selector).filter(function(){return a(this).attr("rel")===b});return d},o=d.rel&&d.rel!==!1?n(d.rel,this):this,k=k(),p=0,q=k!==!1,r="pushState"in history,s=!1,u=b.location,v=function(){return u.hash.substring(1)},w=v(),x=function(){var b=(v(),"pid="+(H+1)),d=u.href.split("#")[0]+"#"+b;r?history[s?"replaceState":"pushState"]("",c.title,d):s?u.replace(d):u.hash=b,s=!0},y=function(){r?history.pushState("",c.title,u.pathname+u.search):u.hash="",clearTimeout(t)},z=function(){s?t=setTimeout(x,800):x()},A="simplelb",B=a("<div>").addClass("sl-overlay"),C=a("<button>").addClass("sl-close").html(d.closeText),D=a("<div>").addClass("sl-spinner").html("<div></div>"),E=a("<div>").addClass("sl-navigation").html('<button class="sl-prev">'+d.navText[0]+'</button><button class="sl-next">'+d.navText[1]+"</button>"),F=a("<div>").addClass("sl-counter").html('<span class="sl-current"></span>/<span class="sl-total"></span>'),G=!1,H=0,I=a("<div>").addClass("sl-caption pos-"+d.captionPosition),J=a("<div>").addClass("sl-image"),K=a("<div>").addClass("sl-wrapper").addClass(d.className),L=function(b){return!d.fileExt||"a"==a(b).prop("tagName").toLowerCase()&&new RegExp(".("+d.fileExt+")$","i").test(a(b).attr("href"))},M=function(){d.close&&C.appendTo(K),d.showCounter&&o.length>1&&(F.appendTo(K),F.find(".sl-total").text(o.length)),d.nav&&E.appendTo(K),d.spinner&&D.appendTo(K)},N=function(b){b.trigger(a.Event("show.simplelightbox")),d.disableScroll&&(p=W("hide")),K.appendTo("body"),J.appendTo(K),d.overlay&&B.appendTo(a("body")),G=!0,H=o.index(b),j=a("<img/>").hide().attr("src",b.attr("href")),m.indexOf(b.attr("href"))==-1&&m.push(b.attr("href")),J.html("").attr("style",""),j.appendTo(J),R(),B.fadeIn("fast"),a(".sl-close").fadeIn("fast"),D.show(),E.fadeIn("fast"),a(".sl-wrapper .sl-counter .sl-current").text(H+1),F.fadeIn("fast"),O(),d.preloading&&T(),setTimeout(function(){b.trigger(a.Event("shown.simplelightbox"))},d.animationSpeed)},O=function(c){if(j.length){var e=new Image,f=a(b).width()*d.widthRatio,g=a(b).height()*d.heightRatio;e.src=j.attr("src"),a(e).bind("error",function(b){o.eq(H).trigger(a.Event("error.simplelightbox")),G=!1,l=!0,D.hide(),d.alertError&&alert(d.alertErrorMessage),U(1==c||c==-1?c:1)}),e.onload=function(){"undefined"!=typeof c&&o.eq(H).trigger(a.Event("changed.simplelightbox")).trigger(a.Event((1===c?"nextDone":"prevDone")+".simplelightbox")),d.history&&z(),m.indexOf(j.attr("src"))==-1&&m.push(j.attr("src"));var h=e.width,i=e.height;if(h>f||i>g){var k=h/i>f/g?h/f:i/g;h/=k,i/=k}a(".sl-image").css({top:(a(b).height()-i)/2+"px",left:(a(b).width()-h-p)/2+"px"}),D.hide(),j.css({width:h+"px",height:i+"px"}).fadeIn("fast"),l=!0;var r,n="self"==d.captionSelector?o.eq(H):o.eq(H).find(d.captionSelector);if(r="data"==d.captionType?n.data(d.captionsData):"text"==d.captionType?n.html():n.prop(d.captionsData),d.loop||(0===H&&a(".sl-prev").hide(),H>=o.length-1&&a(".sl-next").hide(),H>0&&a(".sl-prev").show(),H<o.length-1&&a(".sl-next").show()),1==o.length&&a(".sl-prev, .sl-next").hide(),1==c||c==-1){var s={opacity:1};d.animationSlide&&(q?(Q(0,100*c+"px"),setTimeout(function(){Q(d.animationSpeed/1e3,"0px"),50})):s.left=parseInt(a(".sl-image").css("left"))+100*c+"px"),a(".sl-image").animate(s,d.animationSpeed,function(){G=!1,P(r)})}else G=!1,P(r);d.additionalHtml&&0===a(".sl-additional-html").length&&a("<div>").html(d.additionalHtml).addClass("sl-additional-html").appendTo(a(".sl-image"))}}},P=function(b){""!==b&&"undefined"!=typeof b&&d.captions&&I.html(b).hide().appendTo(a(".sl-image")).delay(d.captionDelay).fadeIn("fast")},Q=function(b,c){var d={};d[k+"transform"]="translateX("+c+")",d[k+"transition"]=k+"transform "+b+"s linear",a(".sl-image").css(d)},R=function(){a(b).on("resize."+A,O),a(c).on("click."+A+" touchstart."+A,".sl-close",function(a){a.preventDefault(),l&&V()}),d.history&&setTimeout(function(){a(b).on("hashchange."+A,function(){if(l&&v()===w)return void V()})},40),E.on("click."+A,"button",function(b){b.preventDefault(),h=0,U(a(this).hasClass("sl-next")?1:-1)});var e=0,f=0,g=0,j=0,k=!1,m=0;J.on("touchstart."+A+" mousedown."+A,function(a){return!!k||(q&&(m=parseInt(J.css("left"))),k=!0,e=a.originalEvent.pageX||a.originalEvent.touches[0].pageX,g=a.originalEvent.pageY||a.originalEvent.touches[0].pageY,!1)}).on("touchmove."+A+" mousemove."+A+" pointermove MSPointerMove",function(a){return!k||(a.preventDefault(),f=a.originalEvent.pageX||a.originalEvent.touches[0].pageX,j=a.originalEvent.pageY||a.originalEvent.touches[0].pageY,h=e-f,i=g-j,void(d.animationSlide&&(q?Q(0,-h+"px"):J.css("left",m-h+"px"))))}).on("touchend."+A+" mouseup."+A+" touchcancel."+A+" mouseleave."+A+" pointerup pointercancel MSPointerUp MSPointerCancel",function(a){if(k){k=!1;var b=!0;d.loop||(0===H&&h<0&&(b=!1),H>=o.length-1&&h>0&&(b=!1)),Math.abs(h)>d.swipeTolerance&&b?U(h>0?1:-1):d.animationSlide&&(q?Q(d.animationSpeed/1e3,"0px"):J.animate({left:m+"px"},d.animationSpeed/2)),d.swipeClose&&Math.abs(i)>50&&Math.abs(h)<d.swipeTolerance&&V()}})},S=function(){E.off("click","button"),a(c).off("click."+A,".sl-close"),a(b).off("resize."+A),a(b).off("hashchange."+A)},T=function(){var b=H+1<0?o.length-1:H+1>=o.length-1?0:H+1,c=H-1<0?o.length-1:H-1>=o.length-1?0:H-1;a("<img />").attr("src",o.eq(b).attr("href")).on("load",function(){m.indexOf(a(this).attr("src"))==-1&&m.push(a(this).attr("src")),o.eq(H).trigger(a.Event("nextImageLoaded.simplelightbox"))}),a("<img />").attr("src",o.eq(c).attr("href")).on("load",function(){m.indexOf(a(this).attr("src"))==-1&&m.push(a(this).attr("src")),o.eq(H).trigger(a.Event("prevImageLoaded.simplelightbox"))})},U=function(b){o.eq(H).trigger(a.Event("change.simplelightbox")).trigger(a.Event((1===b?"next":"prev")+".simplelightbox"));var c=H+b;if(!(G||(c<0||c>=o.length)&&d.loop===!1)){H=c<0?o.length-1:c>o.length-1?0:c,a(".sl-wrapper .sl-counter .sl-current").text(H+1);var e={opacity:0};d.animationSlide&&(q?Q(d.animationSpeed/1e3,-100*b-h+"px"):e.left=parseInt(a(".sl-image").css("left"))+-100*b+"px"),a(".sl-image").animate(e,d.animationSpeed,function(){setTimeout(function(){var c=o.eq(H);j.attr("src",c.attr("href")),m.indexOf(c.attr("href"))==-1&&D.show(),a(".sl-caption").remove(),O(b),d.preloading&&T()},100)})}},V=function(){if(!G){var b=o.eq(H),c=!1;b.trigger(a.Event("close.simplelightbox")),d.history&&y(),a(".sl-image img, .sl-overlay, .sl-close, .sl-navigation, .sl-image .sl-caption, .sl-counter").fadeOut("fast",function(){d.disableScroll&&W("show"),a(".sl-wrapper, .sl-overlay").remove(),S(),c||b.trigger(a.Event("closed.simplelightbox")),c=!0}),j=a(),l=!1,G=!1}},W=function(d){var e=0;if("hide"==d){var f=b.innerWidth;if(!f){var g=c.documentElement.getBoundingClientRect();f=g.right-Math.abs(g.left)}if(c.body.clientWidth<f){var h=c.createElement("div"),i=parseInt(a("body").css("padding-right"),10);h.className="sl-scrollbar-measure",a("body").append(h),e=h.offsetWidth-h.clientWidth,a(c.body)[0].removeChild(h),a("body").data("padding",i),e>0&&a("body").addClass("hidden-scroll").css({"padding-right":i+e})}}else a("body").removeClass("hidden-scroll").css({"padding-right":a("body").data("padding")});return e};return M(),o.on("click."+A,function(b){if(L(this)){if(b.preventDefault(),G)return!1;N(a(this))}}),a(c).on("click."+A+" touchstart."+A,function(b){l&&d.docClose&&0===a(b.target).closest(".sl-image").length&&0===a(b.target).closest(".sl-navigation").length&&V()}),d.disableRightClick&&a(c).on("contextmenu",".sl-image img",function(a){return!1}),d.enableKeyboard&&a(c).on("keyup."+A,function(a){if(a.preventDefault(),h=0,l){var b=a.keyCode;27==b&&V(),37!=b&&39!=a.keyCode||U(39==a.keyCode?1:-1)}}),this.open=function(b){b=b||a(this[0]),N(b)},this.next=function(){U(1)},this.prev=function(){U(-1)},this.close=function(){V()},this.destroy=function(){a(c).unbind("click."+A).unbind("keyup."+A),V(),a(".sl-overlay, .sl-wrapper").remove(),this.off("click")},this.refresh=function(){this.destroy(),a(this.selector).simpleLightbox(d)},this}}(jQuery,window,document);
//END LIGHTBOX

// TOUCHSWIPE PLUGIN ///////////////////////////
(function(a){if(typeof define==="function"&&define.amd&&define.amd.jQuery){define(["jquery"],a)}else{a(jQuery)}}(function(f){var p="left",o="right",e="up",x="down",c="in",z="out",m="none",s="auto",l="swipe",t="pinch",A="tap",j="doubletap",b="longtap",y="hold",D="horizontal",u="vertical",i="all",r=10,g="start",k="move",h="end",q="cancel",a="ontouchstart" in window,v=window.navigator.msPointerEnabled&&!window.navigator.pointerEnabled,d=window.navigator.pointerEnabled||window.navigator.msPointerEnabled,B="TouchSwipe";var n={fingers:1,threshold:75,cancelThreshold:null,pinchThreshold:20,maxTimeThreshold:null,fingerReleaseThreshold:250,longTapThreshold:500,doubleTapThreshold:200,swipe:null,swipeLeft:null,swipeRight:null,swipeUp:null,swipeDown:null,swipeStatus:null,pinchIn:null,pinchOut:null,pinchStatus:null,click:null,tap:null,doubleTap:null,longTap:null,hold:null,triggerOnTouchEnd:true,triggerOnTouchLeave:false,allowPageScroll:"auto",fallbackToMouseEvents:true,excludedElements:"label, button, input, select, textarea, a, .noSwipe"};f.fn.swipe=function(G){var F=f(this),E=F.data(B);if(E&&typeof G==="string"){if(E[G]){return E[G].apply(this,Array.prototype.slice.call(arguments,1))}else{f.error("Method "+G+" does not exist on jQuery.swipe")}}else{if(!E&&(typeof G==="object"||!G)){return w.apply(this,arguments)}}return F};f.fn.swipe.defaults=n;f.fn.swipe.phases={PHASE_START:g,PHASE_MOVE:k,PHASE_END:h,PHASE_CANCEL:q};f.fn.swipe.directions={LEFT:p,RIGHT:o,UP:e,DOWN:x,IN:c,OUT:z};f.fn.swipe.pageScroll={NONE:m,HORIZONTAL:D,VERTICAL:u,AUTO:s};f.fn.swipe.fingers={ONE:1,TWO:2,THREE:3,ALL:i};function w(E){if(E&&(E.allowPageScroll===undefined&&(E.swipe!==undefined||E.swipeStatus!==undefined))){E.allowPageScroll=m}if(E.click!==undefined&&E.tap===undefined){E.tap=E.click}if(!E){E={}}E=f.extend({},f.fn.swipe.defaults,E);return this.each(function(){var G=f(this);var F=G.data(B);if(!F){F=new C(this,E);G.data(B,F)}})}function C(a4,av){var az=(a||d||!av.fallbackToMouseEvents),J=az?(d?(v?"MSPointerDown":"pointerdown"):"touchstart"):"mousedown",ay=az?(d?(v?"MSPointerMove":"pointermove"):"touchmove"):"mousemove",U=az?(d?(v?"MSPointerUp":"pointerup"):"touchend"):"mouseup",S=az?null:"mouseleave",aD=(d?(v?"MSPointerCancel":"pointercancel"):"touchcancel");var ag=0,aP=null,ab=0,a1=0,aZ=0,G=1,aq=0,aJ=0,M=null;var aR=f(a4);var Z="start";var W=0;var aQ=null;var T=0,a2=0,a5=0,ad=0,N=0;var aW=null,af=null;try{aR.bind(J,aN);aR.bind(aD,a9)}catch(ak){f.error("events not supported "+J+","+aD+" on jQuery.swipe")}this.enable=function(){aR.bind(J,aN);aR.bind(aD,a9);return aR};this.disable=function(){aK();return aR};this.destroy=function(){aK();aR.data(B,null);return aR};this.option=function(bc,bb){if(av[bc]!==undefined){if(bb===undefined){return av[bc]}else{av[bc]=bb}}else{f.error("Option "+bc+" does not exist on jQuery.swipe.options")}return null};function aN(bd){if(aB()){return}if(f(bd.target).closest(av.excludedElements,aR).length>0){return}var be=bd.originalEvent?bd.originalEvent:bd;var bc,bb=a?be.touches[0]:be;Z=g;if(a){W=be.touches.length}else{bd.preventDefault()}ag=0;aP=null;aJ=null;ab=0;a1=0;aZ=0;G=1;aq=0;aQ=aj();M=aa();R();if(!a||(W===av.fingers||av.fingers===i)||aX()){ai(0,bb);T=at();if(W==2){ai(1,be.touches[1]);a1=aZ=au(aQ[0].start,aQ[1].start)}if(av.swipeStatus||av.pinchStatus){bc=O(be,Z)}}else{bc=false}if(bc===false){Z=q;O(be,Z);return bc}else{if(av.hold){af=setTimeout(f.proxy(function(){aR.trigger("hold",[be.target]);if(av.hold){bc=av.hold.call(aR,be,be.target)}},this),av.longTapThreshold)}ao(true)}return null}function a3(be){var bh=be.originalEvent?be.originalEvent:be;if(Z===h||Z===q||am()){return}var bd,bc=a?bh.touches[0]:bh;var bf=aH(bc);a2=at();if(a){W=bh.touches.length}if(av.hold){clearTimeout(af)}Z=k;if(W==2){if(a1==0){ai(1,bh.touches[1]);a1=aZ=au(aQ[0].start,aQ[1].start)}else{aH(bh.touches[1]);aZ=au(aQ[0].end,aQ[1].end);aJ=ar(aQ[0].end,aQ[1].end)}G=a7(a1,aZ);aq=Math.abs(a1-aZ)}if((W===av.fingers||av.fingers===i)||!a||aX()){aP=aL(bf.start,bf.end);al(be,aP);ag=aS(bf.start,bf.end);ab=aM();aI(aP,ag);if(av.swipeStatus||av.pinchStatus){bd=O(bh,Z)}if(!av.triggerOnTouchEnd||av.triggerOnTouchLeave){var bb=true;if(av.triggerOnTouchLeave){var bg=aY(this);bb=E(bf.end,bg)}if(!av.triggerOnTouchEnd&&bb){Z=aC(k)}else{if(av.triggerOnTouchLeave&&!bb){Z=aC(h)}}if(Z==q||Z==h){O(bh,Z)}}}else{Z=q;O(bh,Z)}if(bd===false){Z=q;O(bh,Z)}}function L(bb){var bc=bb.originalEvent;if(a){if(bc.touches.length>0){F();return true}}if(am()){W=ad}a2=at();ab=aM();if(ba()||!an()){Z=q;O(bc,Z)}else{if(av.triggerOnTouchEnd||(av.triggerOnTouchEnd==false&&Z===k)){bb.preventDefault();Z=h;O(bc,Z)}else{if(!av.triggerOnTouchEnd&&a6()){Z=h;aF(bc,Z,A)}else{if(Z===k){Z=q;O(bc,Z)}}}}ao(false);return null}function a9(){W=0;a2=0;T=0;a1=0;aZ=0;G=1;R();ao(false)}function K(bb){var bc=bb.originalEvent;if(av.triggerOnTouchLeave){Z=aC(h);O(bc,Z)}}function aK(){aR.unbind(J,aN);aR.unbind(aD,a9);aR.unbind(ay,a3);aR.unbind(U,L);if(S){aR.unbind(S,K)}ao(false)}function aC(bf){var be=bf;var bd=aA();var bc=an();var bb=ba();if(!bd||bb){be=q}else{if(bc&&bf==k&&(!av.triggerOnTouchEnd||av.triggerOnTouchLeave)){be=h}else{if(!bc&&bf==h&&av.triggerOnTouchLeave){be=q}}}return be}function O(bd,bb){var bc=undefined;if(I()||V()){bc=aF(bd,bb,l)}else{if((P()||aX())&&bc!==false){bc=aF(bd,bb,t)}}if(aG()&&bc!==false){bc=aF(bd,bb,j)}else{if(ap()&&bc!==false){bc=aF(bd,bb,b)}else{if(ah()&&bc!==false){bc=aF(bd,bb,A)}}}if(bb===q){a9(bd)}if(bb===h){if(a){if(bd.touches.length==0){a9(bd)}}else{a9(bd)}}return bc}function aF(be,bb,bd){var bc=undefined;if(bd==l){aR.trigger("swipeStatus",[bb,aP||null,ag||0,ab||0,W,aQ]);if(av.swipeStatus){bc=av.swipeStatus.call(aR,be,bb,aP||null,ag||0,ab||0,W,aQ);if(bc===false){return false}}if(bb==h&&aV()){aR.trigger("swipe",[aP,ag,ab,W,aQ]);if(av.swipe){bc=av.swipe.call(aR,be,aP,ag,ab,W,aQ);if(bc===false){return false}}switch(aP){case p:aR.trigger("swipeLeft",[aP,ag,ab,W,aQ]);if(av.swipeLeft){bc=av.swipeLeft.call(aR,be,aP,ag,ab,W,aQ)}break;case o:aR.trigger("swipeRight",[aP,ag,ab,W,aQ]);if(av.swipeRight){bc=av.swipeRight.call(aR,be,aP,ag,ab,W,aQ)}break;case e:aR.trigger("swipeUp",[aP,ag,ab,W,aQ]);if(av.swipeUp){bc=av.swipeUp.call(aR,be,aP,ag,ab,W,aQ)}break;case x:aR.trigger("swipeDown",[aP,ag,ab,W,aQ]);if(av.swipeDown){bc=av.swipeDown.call(aR,be,aP,ag,ab,W,aQ)}break}}}if(bd==t){aR.trigger("pinchStatus",[bb,aJ||null,aq||0,ab||0,W,G,aQ]);if(av.pinchStatus){bc=av.pinchStatus.call(aR,be,bb,aJ||null,aq||0,ab||0,W,G,aQ);if(bc===false){return false}}if(bb==h&&a8()){switch(aJ){case c:aR.trigger("pinchIn",[aJ||null,aq||0,ab||0,W,G,aQ]);if(av.pinchIn){bc=av.pinchIn.call(aR,be,aJ||null,aq||0,ab||0,W,G,aQ)}break;case z:aR.trigger("pinchOut",[aJ||null,aq||0,ab||0,W,G,aQ]);if(av.pinchOut){bc=av.pinchOut.call(aR,be,aJ||null,aq||0,ab||0,W,G,aQ)}break}}}if(bd==A){if(bb===q||bb===h){clearTimeout(aW);clearTimeout(af);if(Y()&&!H()){N=at();aW=setTimeout(f.proxy(function(){N=null;aR.trigger("tap",[be.target]);if(av.tap){bc=av.tap.call(aR,be,be.target)}},this),av.doubleTapThreshold)}else{N=null;aR.trigger("tap",[be.target]);if(av.tap){bc=av.tap.call(aR,be,be.target)}}}}else{if(bd==j){if(bb===q||bb===h){clearTimeout(aW);N=null;aR.trigger("doubletap",[be.target]);if(av.doubleTap){bc=av.doubleTap.call(aR,be,be.target)}}}else{if(bd==b){if(bb===q||bb===h){clearTimeout(aW);N=null;aR.trigger("longtap",[be.target]);if(av.longTap){bc=av.longTap.call(aR,be,be.target)}}}}}return bc}function an(){var bb=true;if(av.threshold!==null){bb=ag>=av.threshold}return bb}function ba(){var bb=false;if(av.cancelThreshold!==null&&aP!==null){bb=(aT(aP)-ag)>=av.cancelThreshold}return bb}function ae(){if(av.pinchThreshold!==null){return aq>=av.pinchThreshold}return true}function aA(){var bb;if(av.maxTimeThreshold){if(ab>=av.maxTimeThreshold){bb=false}else{bb=true}}else{bb=true}return bb}function al(bb,bc){if(av.allowPageScroll===m||aX()){bb.preventDefault()}else{var bd=av.allowPageScroll===s;switch(bc){case p:if((av.swipeLeft&&bd)||(!bd&&av.allowPageScroll!=D)){bb.preventDefault()}break;case o:if((av.swipeRight&&bd)||(!bd&&av.allowPageScroll!=D)){bb.preventDefault()}break;case e:if((av.swipeUp&&bd)||(!bd&&av.allowPageScroll!=u)){bb.preventDefault()}break;case x:if((av.swipeDown&&bd)||(!bd&&av.allowPageScroll!=u)){bb.preventDefault()}break}}}function a8(){var bc=aO();var bb=X();var bd=ae();return bc&&bb&&bd}function aX(){return !!(av.pinchStatus||av.pinchIn||av.pinchOut)}function P(){return !!(a8()&&aX())}function aV(){var be=aA();var bg=an();var bd=aO();var bb=X();var bc=ba();var bf=!bc&&bb&&bd&&bg&&be;return bf}function V(){return !!(av.swipe||av.swipeStatus||av.swipeLeft||av.swipeRight||av.swipeUp||av.swipeDown)}function I(){return !!(aV()&&V())}function aO(){return((W===av.fingers||av.fingers===i)||!a)}function X(){return aQ[0].end.x!==0}function a6(){return !!(av.tap)}function Y(){return !!(av.doubleTap)}function aU(){return !!(av.longTap)}function Q(){if(N==null){return false}var bb=at();return(Y()&&((bb-N)<=av.doubleTapThreshold))}function H(){return Q()}function ax(){return((W===1||!a)&&(isNaN(ag)||ag<av.threshold))}function a0(){return((ab>av.longTapThreshold)&&(ag<r))}function ah(){return !!(ax()&&a6())}function aG(){return !!(Q()&&Y())}function ap(){return !!(a0()&&aU())}function F(){a5=at();ad=event.touches.length+1}function R(){a5=0;ad=0}function am(){var bb=false;if(a5){var bc=at()-a5;if(bc<=av.fingerReleaseThreshold){bb=true}}return bb}function aB(){return !!(aR.data(B+"_intouch")===true)}function ao(bb){if(bb===true){aR.bind(ay,a3);aR.bind(U,L);if(S){aR.bind(S,K)}}else{aR.unbind(ay,a3,false);aR.unbind(U,L,false);if(S){aR.unbind(S,K,false)}}aR.data(B+"_intouch",bb===true)}function ai(bc,bb){var bd=bb.identifier!==undefined?bb.identifier:0;aQ[bc].identifier=bd;aQ[bc].start.x=aQ[bc].end.x=bb.pageX||bb.clientX;aQ[bc].start.y=aQ[bc].end.y=bb.pageY||bb.clientY;return aQ[bc]}function aH(bb){var bd=bb.identifier!==undefined?bb.identifier:0;var bc=ac(bd);bc.end.x=bb.pageX||bb.clientX;bc.end.y=bb.pageY||bb.clientY;return bc}function ac(bc){for(var bb=0;bb<aQ.length;bb++){if(aQ[bb].identifier==bc){return aQ[bb]}}}function aj(){var bb=[];for(var bc=0;bc<=5;bc++){bb.push({start:{x:0,y:0},end:{x:0,y:0},identifier:0})}return bb}function aI(bb,bc){bc=Math.max(bc,aT(bb));M[bb].distance=bc}function aT(bb){if(M[bb]){return M[bb].distance}return undefined}function aa(){var bb={};bb[p]=aw(p);bb[o]=aw(o);bb[e]=aw(e);bb[x]=aw(x);return bb}function aw(bb){return{direction:bb,distance:0}}function aM(){return a2-T}function au(be,bd){var bc=Math.abs(be.x-bd.x);var bb=Math.abs(be.y-bd.y);return Math.round(Math.sqrt(bc*bc+bb*bb))}function a7(bb,bc){var bd=(bc/bb)*1;return bd.toFixed(2)}function ar(){if(G<1){return z}else{return c}}function aS(bc,bb){return Math.round(Math.sqrt(Math.pow(bb.x-bc.x,2)+Math.pow(bb.y-bc.y,2)))}function aE(be,bc){var bb=be.x-bc.x;var bg=bc.y-be.y;var bd=Math.atan2(bg,bb);var bf=Math.round(bd*180/Math.PI);if(bf<0){bf=360-Math.abs(bf)}return bf}function aL(bc,bb){var bd=aE(bc,bb);if((bd<=45)&&(bd>=0)){return p}else{if((bd<=360)&&(bd>=315)){return p}else{if((bd>=135)&&(bd<=225)){return o}else{if((bd>45)&&(bd<135)){return x}else{return e}}}}}function at(){var bb=new Date();return bb.getTime()}function aY(bb){bb=f(bb);var bd=bb.offset();var bc={left:bd.left,right:bd.left+bb.outerWidth(),top:bd.top,bottom:bd.top+bb.outerHeight()};return bc}function E(bb,bc){return(bb.x>bc.left&&bb.x<bc.right&&bb.y>bc.top&&bb.y<bc.bottom)}}}));

///WOW JS////////////////////////////////////
/*! WOW - v1.1.2 - 2015-04-07
* Copyright (c) 2015 Matthieu Aussaguel; Licensed MIT */
(function(){var a,b,c,d,e,f=function(a,b){return function(){return a.apply(b,arguments)}},g=[].indexOf||function(a){for(var b=0,c=this.length;c>b;b++)if(b in this&&this[b]===a)return b;return-1};b=function(){function a(){}return a.prototype.extend=function(a,b){var c,d;for(c in b)d=b[c],null==a[c]&&(a[c]=d);return a},a.prototype.isMobile=function(a){return/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(a)},a.prototype.createEvent=function(a,b,c,d){var e;return null==b&&(b=!1),null==c&&(c=!1),null==d&&(d=null),null!=document.createEvent?(e=document.createEvent("CustomEvent"),e.initCustomEvent(a,b,c,d)):null!=document.createEventObject?(e=document.createEventObject(),e.eventType=a):e.eventName=a,e},a.prototype.emitEvent=function(a,b){return null!=a.dispatchEvent?a.dispatchEvent(b):b in(null!=a)?a[b]():"on"+b in(null!=a)?a["on"+b]():void 0},a.prototype.addEvent=function(a,b,c){return null!=a.addEventListener?a.addEventListener(b,c,!1):null!=a.attachEvent?a.attachEvent("on"+b,c):a[b]=c},a.prototype.removeEvent=function(a,b,c){return null!=a.removeEventListener?a.removeEventListener(b,c,!1):null!=a.detachEvent?a.detachEvent("on"+b,c):delete a[b]},a.prototype.innerHeight=function(){return"innerHeight"in window?window.innerHeight:document.documentElement.clientHeight},a}(),c=this.WeakMap||this.MozWeakMap||(c=function(){function a(){this.keys=[],this.values=[]}return a.prototype.get=function(a){var b,c,d,e,f;for(f=this.keys,b=d=0,e=f.length;e>d;b=++d)if(c=f[b],c===a)return this.values[b]},a.prototype.set=function(a,b){var c,d,e,f,g;for(g=this.keys,c=e=0,f=g.length;f>e;c=++e)if(d=g[c],d===a)return void(this.values[c]=b);return this.keys.push(a),this.values.push(b)},a}()),a=this.MutationObserver||this.WebkitMutationObserver||this.MozMutationObserver||(a=function(){function a(){"undefined"!=typeof console&&null!==console&&console.warn("MutationObserver is not supported by your browser."),"undefined"!=typeof console&&null!==console&&console.warn("WOW.js cannot detect dom mutations, please call .sync() after loading new content.")}return a.notSupported=!0,a.prototype.observe=function(){},a}()),d=this.getComputedStyle||function(a){return this.getPropertyValue=function(b){var c;return"float"===b&&(b="styleFloat"),e.test(b)&&b.replace(e,function(a,b){return b.toUpperCase()}),(null!=(c=a.currentStyle)?c[b]:void 0)||null},this},e=/(\-([a-z]){1})/g,this.WOW=function(){function e(a){null==a&&(a={}),this.scrollCallback=f(this.scrollCallback,this),this.scrollHandler=f(this.scrollHandler,this),this.resetAnimation=f(this.resetAnimation,this),this.start=f(this.start,this),this.scrolled=!0,this.config=this.util().extend(a,this.defaults),this.animationNameCache=new c,this.wowEvent=this.util().createEvent(this.config.boxClass)}return e.prototype.defaults={boxClass:"wow",animateClass:"animated",offset:0,mobile:!0,live:!0,callback:null},e.prototype.init=function(){var a;return this.element=window.document.documentElement,"interactive"===(a=document.readyState)||"complete"===a?this.start():this.util().addEvent(document,"DOMContentLoaded",this.start),this.finished=[]},e.prototype.start=function(){var b,c,d,e;if(this.stopped=!1,this.boxes=function(){var a,c,d,e;for(d=this.element.querySelectorAll("."+this.config.boxClass),e=[],a=0,c=d.length;c>a;a++)b=d[a],e.push(b);return e}.call(this),this.all=function(){var a,c,d,e;for(d=this.boxes,e=[],a=0,c=d.length;c>a;a++)b=d[a],e.push(b);return e}.call(this),this.boxes.length)if(this.disabled())this.resetStyle();else for(e=this.boxes,c=0,d=e.length;d>c;c++)b=e[c],this.applyStyle(b,!0);return this.disabled()||(this.util().addEvent(window,"scroll",this.scrollHandler),this.util().addEvent(window,"resize",this.scrollHandler),this.interval=setInterval(this.scrollCallback,50)),this.config.live?new a(function(a){return function(b){var c,d,e,f,g;for(g=[],c=0,d=b.length;d>c;c++)f=b[c],g.push(function(){var a,b,c,d;for(c=f.addedNodes||[],d=[],a=0,b=c.length;b>a;a++)e=c[a],d.push(this.doSync(e));return d}.call(a));return g}}(this)).observe(document.body,{childList:!0,subtree:!0}):void 0},e.prototype.stop=function(){return this.stopped=!0,this.util().removeEvent(window,"scroll",this.scrollHandler),this.util().removeEvent(window,"resize",this.scrollHandler),null!=this.interval?clearInterval(this.interval):void 0},e.prototype.sync=function(){return a.notSupported?this.doSync(this.element):void 0},e.prototype.doSync=function(a){var b,c,d,e,f;if(null==a&&(a=this.element),1===a.nodeType){for(a=a.parentNode||a,e=a.querySelectorAll("."+this.config.boxClass),f=[],c=0,d=e.length;d>c;c++)b=e[c],g.call(this.all,b)<0?(this.boxes.push(b),this.all.push(b),this.stopped||this.disabled()?this.resetStyle():this.applyStyle(b,!0),f.push(this.scrolled=!0)):f.push(void 0);return f}},e.prototype.show=function(a){return this.applyStyle(a),a.className=a.className+" "+this.config.animateClass,null!=this.config.callback&&this.config.callback(a),this.util().emitEvent(a,this.wowEvent),this.util().addEvent(a,"animationend",this.resetAnimation),this.util().addEvent(a,"oanimationend",this.resetAnimation),this.util().addEvent(a,"webkitAnimationEnd",this.resetAnimation),this.util().addEvent(a,"MSAnimationEnd",this.resetAnimation),a},e.prototype.applyStyle=function(a,b){var c,d,e;return d=a.getAttribute("data-wow-duration"),c=a.getAttribute("data-wow-delay"),e=a.getAttribute("data-wow-iteration"),this.animate(function(f){return function(){return f.customStyle(a,b,d,c,e)}}(this))},e.prototype.animate=function(){return"requestAnimationFrame"in window?function(a){return window.requestAnimationFrame(a)}:function(a){return a()}}(),e.prototype.resetStyle=function(){var a,b,c,d,e;for(d=this.boxes,e=[],b=0,c=d.length;c>b;b++)a=d[b],e.push(a.style.visibility="visible");return e},e.prototype.resetAnimation=function(a){var b;return a.type.toLowerCase().indexOf("animationend")>=0?(b=a.target||a.srcElement,b.className=b.className.replace(this.config.animateClass,"").trim()):void 0},e.prototype.customStyle=function(a,b,c,d,e){return b&&this.cacheAnimationName(a),a.style.visibility=b?"hidden":"visible",c&&this.vendorSet(a.style,{animationDuration:c}),d&&this.vendorSet(a.style,{animationDelay:d}),e&&this.vendorSet(a.style,{animationIterationCount:e}),this.vendorSet(a.style,{animationName:b?"none":this.cachedAnimationName(a)}),a},e.prototype.vendors=["moz","webkit"],e.prototype.vendorSet=function(a,b){var c,d,e,f;d=[];for(c in b)e=b[c],a[""+c]=e,d.push(function(){var b,d,g,h;for(g=this.vendors,h=[],b=0,d=g.length;d>b;b++)f=g[b],h.push(a[""+f+c.charAt(0).toUpperCase()+c.substr(1)]=e);return h}.call(this));return d},e.prototype.vendorCSS=function(a,b){var c,e,f,g,h,i;for(h=d(a),g=h.getPropertyCSSValue(b),f=this.vendors,c=0,e=f.length;e>c;c++)i=f[c],g=g||h.getPropertyCSSValue("-"+i+"-"+b);return g},e.prototype.animationName=function(a){var b;try{b=this.vendorCSS(a,"animation-name").cssText}catch(c){b=d(a).getPropertyValue("animation-name")}return"none"===b?"":b},e.prototype.cacheAnimationName=function(a){return this.animationNameCache.set(a,this.animationName(a))},e.prototype.cachedAnimationName=function(a){return this.animationNameCache.get(a)},e.prototype.scrollHandler=function(){return this.scrolled=!0},e.prototype.scrollCallback=function(){var a;return!this.scrolled||(this.scrolled=!1,this.boxes=function(){var b,c,d,e;for(d=this.boxes,e=[],b=0,c=d.length;c>b;b++)a=d[b],a&&(this.isVisible(a)?this.show(a):e.push(a));return e}.call(this),this.boxes.length||this.config.live)?void 0:this.stop()},e.prototype.offsetTop=function(a){for(var b;void 0===a.offsetTop;)a=a.parentNode;for(b=a.offsetTop;a=a.offsetParent;)b+=a.offsetTop;return b},e.prototype.isVisible=function(a){var b,c,d,e,f;return c=a.getAttribute("data-wow-offset")||this.config.offset,f=window.pageYOffset,e=f+Math.min(this.element.clientHeight,this.util().innerHeight())-c,d=this.offsetTop(a),b=d+a.clientHeight,e>=d&&b>=f},e.prototype.util=function(){return null!=this._util?this._util:this._util=new b},e.prototype.disabled=function(){return!this.config.mobile&&this.util().isMobile(navigator.userAgent)},e}()}).call(this);


/////// END JS LIBS //////////////

////////////////////////////// BBE HELPERS //////////////////////////

(function ($) {
	
	"use strict";
 
	
	//ON DOCUMENT READY
	$(document).ready(function() {
		
		//IF you opt out Modernizer, we should remove a class to the body
		$("html").removeClass("no-js");
		
		
		// TOUCHSWIPE: ATTACH THE SWIPE TO BOOTSTRAP CAROUSEL  //// REQUIRES TOUCHSWIPE///
		if (!bbe_editor_active){
			$(".carousel-inner").swipe( {
			 //Generic swipe handler for all directions
			 swipeLeft:function(event, direction, distance, duration, fingerCount) {
			  $(this).parent().carousel('next'); 
			 },
			 swipeRight: function() {
			  $(this).parent().carousel('prev'); 
			 },
			 //Default is 75px, set to 0 for demo so any distance triggers swipe
			 threshold: 75
			});
		}
		/////////////////////////////
		
		///WOW JS: ///// INITIALIZE WOW.JS
		if (!bbe_editor_active){
			 if (0) $(".bbe-container-wrap").addClass("wow bounceInUp"); //automatic animation
			  var wow = new WOW(
					{
					  boxClass:     'wow',      // default
					  animateClass: 'animated', // default
					  offset:       70,          // default
					  mobile:       true,       // default
					  live:         false        // default
					}
				  )
			 wow.init();
		}
	   ///////////////////////////////
		
		
		//LIGHTBOX:: LAUNCH SIMPLELIGHTBOX //////////////////////////////////////////////////////////////
		if (!bbe_editor_active){
			
			/*
			var options = $.extend({ overlay: true,
            spinner: true, nav: true, navText: ['&lsaquo;', '&rsaquo;'],
            captions: true, captionDelay: 0, captionSelector: 'img',
            captionType: 'attr', captionsData: 'title', captionPosition:
            'bottom', close: true, closeText: '×', swipeClose: true,
            showCounter: true, fileExt: 'png|jpg|jpeg|gif', animationSlide:
            true, animationSpeed: 250, preloading: true, enableKeyboard: true,
            loop: true, rel: false, docClose: true, swipeTolerance: 50,
            className: 'simple-lightbox', widthRatio: 0.8, heightRatio: 0.9,
            disableRightClick: false, disableScroll: true, alertError: true,
            alertErrorMessage: 'Image not found, next image will be loaded',
            additionalHtml: false, history: true });

			*/
			
			var bbe_simplelightbox_gallery = $('.use-lightbox a').simpleLightbox({fileExt: '|png|jpg|jpeg|gif'});
			$("#bbe-magic-content").on("click",".use-lightbox span",function(e) {
				$(this).parent().find("a").click();    
			});
		}
		
		
		//BBE SCROLL HELPERS
		//SCROLL TO SECTION - EXAMPLE: <a class="btn btn-md btn-primary" data-bbe-scrollto="hOZTTFhqtM">next</a>
		$("#bbe-magic-content").on("click","[data-bbe-scrollto]",function(e) { 
												 
			e.preventDefault();
			var vert_offset=0;
			if ($("nav.navbar:first").hasClass("navbar-fixed-top") ) //if we are usingadminbar
			vert_offset+=$("nav.navbar:first").height();
			  
			  
			if ( $("body").hasClass("admin-bar")) //if we are usingadminbar
			vert_offset+=$("#wpadminbar").height();
			var theScrollToAttribute=$(this).attr("data-bbe-scrollto");
			if (theScrollToAttribute=="top" ) {	 $('html,body').animate({ 	scrollTop: 0}, 'slow'); return;}					
			if (theScrollToAttribute=="" || theScrollToAttribute=='next') 	var nextSection=$(this).closest(".bbe-container-wrap").next();
															else 	var nextSection=$("[data-wrapper-id="+theScrollToAttribute+"]");
														
			///if we are going to a carousel, reinitialize it at first slide 
			if (nextSection.find(".carousel").length) {nextSection.find('.carousel-indicators li:first').click();}
				
			//scroll the document 
			$('html,body').animate({ scrollTop: nextSection.offset().top-vert_offset}, 	'slow');
											
		});
	
							
		// AJAX LOAD OF SECTIONS - EXAMPLE : <a data-bbe-ajaxload='URL [sel]'>load in context</a>
		// MORE COMPLEX EXAMPLE: <a class="btn btn-md btn-primary" data-bbe-ajaxload="http://localhost/bbe-dev/parallax-demo/ [data-wrapper-id=2UY1VAFmPP]">Load</a>
		$("#bbe-magic-content").on("click","[data-bbe-ajaxload]",function(e) { 
												 
			e.preventDefault();
			
			var theLoadAttribute=$(this).attr("data-bbe-ajaxload");
			if (theLoadAttribute.indexOf(" ")==-1) loadFullSel=theLoadAttribute+" #bbe-magic-content > "; else loadFullSel=theLoadAttribute;
			//alert(loadFullSel);
			$("#bbe-ajax-load-div").remove();                                                                                                          
			var html_loader_simple="<div class='bbe-eliminate-on-saving' id='bbe-ajax-load-div'></div>";
			var customTarget=$(this).attr("data-bbe-ajaxload-target");
			if (customTarget===undefined) 	$(this).closest(".bbe-container-wrap").after(html_loader_simple);
				 else $(customTarget).html(html_loader_simple);
					
			$("#bbe-ajax-load-div").hide().load(loadFullSel,function(){
				$("#bbe-ajax-load-div").slideDown(1000);
				//scroll to loaded section when custom taraget div not defined
				if (customTarget===undefined)  $('html,body').animate({ scrollTop: 	$("#bbe-ajax-load-div").offset().top}, 	'slow');
			});//end loaded
												
		});//end func									 					   
										 
															
		// AJAX LOAD IN MODALS - EXAMPLE : <a data-bbe-ajaxload-modal='URL [sel]'>load in context</a> 
		// MORE COMPLEX EXAMPLE: <a class="btn btn-md btn-primary" data-bbe-ajaxload-modal="http://localhost/bbe-dev/parallax-demo/ [data-wrapper-id=2UY1VAFmPP]">Load</a>
		$("#bbe-magic-content").on("click","[data-bbe-ajaxload-modal]",function(e) { 
									 
			e.preventDefault();
			var modalTitle=$(this).attr("data-modal-title");
			if (modalTitle===undefined) modalTitle="Read More...";
			var theLoadAttribute=$(this).attr("data-bbe-ajaxload-modal");
			if (theLoadAttribute.indexOf(" ")==-1) loadFullSel=theLoadAttribute+" #bbe-magic-content  "; else loadFullSel=theLoadAttribute;
			//alert(loadFullSel);
			$("#bbe-ajax-load-div").remove();   
			$("#bbe-fmodal-window").remove();                                                                                                          
			bbe_modal_html = ''+   // //'   <!-- Modal -->' +
				'   <div class="modal fade bbe-eliminate-on-saving bbe-ajax-modal-window" id="bbe-fmodal-window" tabindex="-1" role="dialog" aria-labelledby="bbe-fmodal-windowLabel" aria-hidden="true">' +
				'     <div class="modal-dialog modal-lg">' +
				'       <div class="modal-content">' +
				'         <div class="modal-header">' +
				'           <button type="button" id="bbe-dismiss-modal" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' +
				'           <h4 class="modal-title">'+modalTitle+'</h4>' +
				'         </div>' +
				'         <div class="bbe-fmodal-body modal-body">' +
				'           <div id="bbe-ajax-load-div"></div>' +
				'         </div>' +
				'         <div class="modal-footer">' +
				'           <button type="button" class="btn  btn-primary" data-dismiss="modal">Done</button>' +
				'         </div>' +
				'       </div>' +
				'     </div>' +
				'   </div>';
						  
			$("body").append(bbe_modal_html);
								
			$("#bbe-ajax-load-div").load(loadFullSel,function(){
				$("#bbe-ajax-load-div").find(".container").removeClass("container");
				$("#bbe-ajax-load-div").find(".container-fluid").removeClass("container-fluid");
				$('#bbe-fmodal-window').modal('show');
			}); //end loaded 
							 
								
		}); //END FUNCTION
		
		
		// IFRAME EXTERNAL LOAD IN MODALS - EXAMPLE : <a data-bbe-external-modal='URL'>load in context</a>
		$("#bbe-magic-content").on("click","[data-bbe-external-modal]",function(e) { 
												 
			e.preventDefault();
			var frameSrc=$(this).attr("data-bbe-external-modal");
		   
			var modalTitle=$(this).attr("data-modal-title");
			if (modalTitle===undefined) modalTitle=frameSrc;
			
			
			$("#bbe-fmodal-window").remove();                                                                                                          
			bbe_modal_html = ''+   // //'   <!-- Modal -->' + 
				'   <div class="modal fade bbe-eliminate-on-saving bbe-external-modal-window" id="bbe-fmodal-window" tabindex="-1" role="dialog" aria-labelledby="bbe-fmodal-windowLabel" aria-hidden="true">' +
				'     <div class="modal-dialog modal-lg">' +
				'       <div class="modal-content">' +
				'         <div class="modal-header">' +
				'           <button type="button" id="bbe-dismiss-modal" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' +
				'           <h4 class="modal-title">'+modalTitle+'</h4>' +
				'         </div>' +
				'         <div class="bbe-fmodal-body modal-body">' +
				'            <iframe src="'+frameSrc+'"  frameborder="0"></iframe>' +
				'         </div>' +
				'         <div class="modal-footer">' +
				'           <button type="button" class="btn  btn-primary" data-dismiss="modal">Done</button>' +
				'         </div>' +
				'       </div>' +
				'     </div>' +
				'   </div>';
								  
			$("body").append(bbe_modal_html);
			$('#bbe-fmodal-window').modal('show');						 
											
		}); //END FUNCTION
		
		
		//FOR G MAPS EMBED - Allow clicking internal tools
		if (!bbe_editor_active)
			$('body').on("click",".bbe-gmapembed",function(e){
				//map has been clicked
				$(this).find("iframe").css("pointer-events","all");
				});
		
		
		
		//AUTO TOC MODULE
		//usage: just add a <div id='bbe-auto-toc'></div>
		//custom headings : <div id='bbe-auto-toc' data-headings='h3'></div>
		if (!bbe_editor_active && $("#bbe-auto-toc").length) {
			//INIT AND GENERATE TOC
			var toc_headings_selector=$("#bbe-auto-toc").attr("data-headings");
			if (toc_headings_selector===undefined) var toc_headings_selector="h2";
			 
			var html_content="";
			$(toc_headings_selector).each(function(index,el)
				{
				html_content=html_content+ "<li><a href='#' >"+$(this).html()+"</a> </li>";
				});//end each
							
			$("#bbe-auto-toc").html('<ul>'+html_content+'</ul>');
							
			//DEFINE JUMP FUNCTION for TOC elements
			$("#bbe-auto-toc li a").click(function(e){
					e.preventDefault();
					var clicked_text=$(this).html(); // console.log(target)
					$(".bbe-scroll-target").removeClass("bbe-scroll-target");
					
					//each loop
					$(toc_headings_selector).each(function(index,el){
					   if($(this).html() ==clicked_text) $(this).addClass("bbe-scroll-target");
					});//end each
					
					$('html, body').animate({ scrollTop: $(".bbe-scroll-target").offset().top-200  }, 2000);	  }); 
				 
			}  
		//END AUTO TOC MODULE
		
		///////////////////////// END HELPERS ////////////////////////////////////////////////////////////////////////////////////////////////////
		
		/////////////// BBE THEME FUNCTIONS ///////////////////
		
		function bbe_adjust_to_resize(){
									
			// ADJUST_BODY_TO_MENU HEIGHT
			var mainNavbar=$("nav#main-nav");
			
			var navbar_height=mainNavbar.height();
			
			if (mainNavbar.hasClass("navbar-fixed-top")) //if we are using a fixed top menu
															{  $("body").css("padding-top",navbar_height); }
															
			if (mainNavbar.hasClass("navbar-fixed-bottom")) //if we are using a fixed bottom menu
															{  $("body").css("padding-bottom",navbar_height); }
															
			if (mainNavbar.hasClass("navbar-fixed-top") && $("body").hasClass("admin-bar")) //if we are usingadminbar
															{  mainNavbar.css("top",$("#wpadminbar").height()); }	
			
			
			//ADJUST ALIGNED IMAGES: remove the aligned classes on contents when we're on mobile
			if ($("#bbe-magic-content").length) return; //EXIT FROM THE FUNCTION HERE IF WE ARE ON A BBE TEMPLATE
			//FOR SINGLE POSTS, PAGES, ARCHIVES: Control aligned image widths
			var aligned_images_selectors=".alignleft, .alignleft-removed, .alignright, .alignright-removed";
			var container_element_width=$("#content").width();
			$(aligned_images_selectors).each(function(index,el){
				//LOOP EACH ALIGNED IMAGE
				var image_element_width=$(el).width();
				var width_difference=container_element_width-image_element_width;
				
				if (width_difference<250) 	{
					//WE have too little space, better not align!
					if ($(el).hasClass("alignleft")) $(el).removeClass("alignleft").addClass("alignleft-removed");
					if ($(el).hasClass("alignright")) $(el).removeClass("alignright").addClass("alignright-removed");
					}
					else {
						//we have space, let's restore alignment if we removed it!
						if ($(el).hasClass("alignleft-removed")) $(el).addClass("alignleft").removeClass("alignleft-removed");
						if ($(el).hasClass("alignright-removed"))  $(el).addClass("alignright").removeClass("alignright-removed");
					}
				//END IF 
				
				}); //END LOOP EACH
	
		} //end bbe_adjust_to_resize function
		
		
		////END BBE THEME FUNCTIONS
		
		////BBE THEME SMALL TWEAKS //////////////////////////
		// Comments
		$(".commentlist li").addClass("panel panel-default");
		$(".comment-reply-link").addClass("btn btn-default");
		
		// Forms
		$('select, input[type=text], input[type=email], input[type=password], textarea').addClass('form-control');
		$('input[type=submit]').addClass('btn btn-primary');
		
		
		//Set body padding to navbar height and more calling the utility function
		bbe_adjust_to_resize();
		$(window).on('resize', function(){ bbe_adjust_to_resize(); });
		
		
		//Enable auto-lightbox to all links to images - in posts and pages (not bbe editable)....
		var lightbox_sel='a[href$=".jpg"], a[href$=".jpeg"], a[href$=".png"], a[href$=".gif"]';
		if (!$("body").hasClass("disable-autolightbox") && !$('#bbe-magic-content').length) $("#content").find(lightbox_sel).simpleLightbox();
		
		//ft link
		$('#bbe-site-credits').hide();
		$("#bbe-show-credits").click(function(e){
			e.preventDefault();
			$(this).hide();
			$('#bbe-site-credits').show();
			});
		
		//lend a small help to prevent junky comments 
		setTimeout(function(){$("form#commentform").append("<input type='hidden' name='e-nable-daf-orm' value='yes' >");}, 1000);

		//add more here
		
		
	}); //END DOCUMENT READY

}(jQuery));
