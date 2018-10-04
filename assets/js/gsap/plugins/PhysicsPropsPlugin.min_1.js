/*!
 * VERSION: 0.1.0
 * DATE: 2013-03-27
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2013, GreenSock. All rights reserved.
 * PhysicsPropsPlugin is a Club GreenSock membership benefit; You must have a valid membership to use
 * this code without violating the terms of use. Visit http://www.greensock.com/club/ to sign up or get more details.
 * This work is subject to the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 */
(window._gsQueue||(window._gsQueue=[])).push(function(){"use strict";var t=function(t,e,i,s,r,n){this.p=e,this.f="function"==typeof t[e],this.start=this.value=this.f?t[e.indexOf("set")||"function"!=typeof t["get"+e.substr(3)]?e:"get"+e.substr(3)]():parseFloat(t[e]),this.velocity=i||0,this.v=this.velocity/n,s||0==s?(this.acceleration=s,this.a=this.acceleration/(n*n)):this.acceleration=this.a=0,this.friction=1-(r||0)},e=Math.random(),i=window._gsDefine.globals.com.greensock.core.Animation._rootFramesTimeline,s=window._gsDefine.plugin({propName:"physicsProps",API:2,init:function(e,s,r){this._target=e,this._tween=r,this._runBackwards=r.vars.runBackwards===!0,this._step=0;for(var n,a,o=r._timeline,l=0;o._timeline;)o=o._timeline;this._stepsPerTimeUnit=o===i?1:30,this._props=[];for(n in s)a=s[n],(a.velocity||a.acceleration)&&(this._props[l++]=new t(e,n,a.velocity,a.acceleration,a.friction,this._stepsPerTimeUnit),this._overwriteProps[l]=n,a.friction&&(this._hasFriction=!0));return!0},set:function(){var t,e,i,s,r,n,a=this._props.length,o=this._tween._time,l=this._target;if(this._runBackwards&&(o=this._tween._duration-o),this._hasFriction){if(o*=this._stepsPerTimeUnit,i=(0|o)-this._step,s=o%1,i>=0)for(;--a>-1;){for(t=this._props[a],r=i;--r>-1;)t.v+=t.a,t.v*=t.friction,t.value+=t.v;e=t.value+t.v*s,t.r&&(e=0|e+(0>e?-.5:.5)),t.f?l[t.p](e):l[t.p]=e}else for(;--a>-1;){for(t=this._props[a],r=-i;--r>-1;)t.value-=t.v,t.v/=t.friction,t.v-=t.a;e=t.value+t.v*s,t.r&&(e=0|e+(0>e?-.5:.5)),t.f?l[t.p](e):l[t.p]=e}this._step+=i}else for(n=.5*o*o;--a>-1;)t=this._props[a],e=t.start+(t.velocity*o+t.acceleration*n),t.r&&(e=0|e+(0>e?-.5:.5)),t.f?l[t.p](e):l[t.p]=e}}),r=s.prototype;r._kill=function(t){for(var e=this._props.length;--e>-1;)this._props[e].p in t&&this._props.splice(e,1);return this._super._kill(t)},r._roundProps=function(t,e){for(var i=this._props.length;--i>-1;)("physicsProps"in t||this._props[i].p in t)&&(this._props[i].r=e)},s._autoCSS=!0,s._cssRegister=function(){var t=window._gsDefine.globals.CSSPlugin;if(t){var i=t._internals,r=i._parseToProxy,n=i._setPluginRatio,a=i.CSSPropTween;i._registerComplexSpecialProp("physicsProps",{parser:function(t,i,o,l,h,u){u=new s;var _,p,f={};i.scale&&(i.scaleX=i.scaleY=i.scale,delete i.scale);for(_ in i)f[_]=e++;return p=r(t,f,l,h,u),h=new a(t,"physicsProps",0,0,p.pt,2),h.data=p,h.plugin=u,h.setRatio=n,u._onInitTween(p.proxy,i,l._tween),h}})}}}),window._gsDefine&&window._gsQueue.pop()();