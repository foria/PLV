!function(a){"use strict";function b(){var b=h.clientHeight,c=a.innerHeight;return c>b?c:b}function c(){return a.pageYOffset||h.scrollTop}function d(a){var b=0,c=0;do isNaN(a.offsetTop)||(b+=a.offsetTop),isNaN(a.offsetLeft)||(c+=a.offsetLeft);while(null!==(a=a.offsetParent));return{top:b,left:c}}function e(a,e){var f=a.offsetHeight,g=c(),h=g+b(),i=d(a).top,j=i+f,k=e||0;return h>=i+f*k&&j>=g}function f(a,b){for(var c in b)b.hasOwnProperty(c)&&(a[c]=b[c]);return a}function g(a,b){this.el=a,this.options=f(this.defaults,b),this._init()}var h=a.document.documentElement;g.prototype={defaults:{viewportFactor:.4},_init:function(){if(!Modernizr.touch){this.sections=Array.prototype.slice.call(this.el.querySelectorAll(".cbp-so-section")),this.didScroll=!1;var b=this;this.sections.forEach(function(a){e(a)||classie.add(a,"cbp-so-init")});var c=function(){b.didScroll||(b.didScroll=!0,setTimeout(function(){b._scrollPage()},60))},d=function(){function a(){b._scrollPage(),b.resizeTimeout=null}b.resizeTimeout&&clearTimeout(b.resizeTimeout),b.resizeTimeout=setTimeout(a,200)};a.addEventListener("scroll",c,!1),a.addEventListener("resize",d,!1)}},_scrollPage:function(){var a=this;this.sections.forEach(function(b){e(b,a.options.viewportFactor)?classie.add(b,"cbp-so-animate"):(classie.add(b,"cbp-so-init"),classie.remove(b,"cbp-so-animate"))}),this.didScroll=!1}},a.cbpScroller=g}(window);