(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2d0d6b8d"],{7482:function(i,t,n){"use strict";n.r(t);var a=function(){var i=this,t=i.$createElement,n=i._self._c||t;return n("div",{ref:"container",staticClass:"sign-record"},[n("div",{staticClass:"list"},i._l(i.signList,function(t,a){return n("div",{key:a,staticClass:"item"},[n("div",{staticClass:"data"},[i._v(i._s(t.month))]),n("div",{staticClass:"listn"},i._l(t.list,function(t,a){return n("div",{key:a,staticClass:"itemn acea-row row-between-wrapper"},[n("div",[n("div",{staticClass:"name line1"},[i._v(i._s(t.title))]),n("div",[i._v(i._s(t.add_time))])]),n("div",{staticClass:"num font-color-red"},[i._v("+"+i._s(t.number))])])}),0)])}),0),n("Loading",{attrs:{loaded:i.loadend,loading:i.loading}})],1)},s=[],e=n("c24f"),d=n("3a5e"),l={name:"SignRecord",components:{Loading:d["a"]},props:{},data:function(){return{page:1,limit:3,signList:[],loading:!1,loadend:!1,active:!1}},mounted:function(){var i=this;this.signListTap(),this.$scroll(this.$refs.container,function(){!i.loading&&i.signListTap()})},methods:{signListTap:function(){var i=this;i.loading||i.loadend||(i.loading=!0,Object(e["y"])(i.page,i.limit).then(function(t){i.loading=!1,i.signList.push.apply(i.signList,t.data),i.loadend=t.data.length<i.limit,i.page=i.page+1}))}}},o=l,c=n("2877"),r=Object(c["a"])(o,a,s,!1,null,null,null);t["default"]=r.exports}}]);
//# sourceMappingURL=chunk-2d0d6b8d.0e88b2e6.js.map