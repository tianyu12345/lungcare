(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2d230838"],{ed36:function(t,i,s){"use strict";s.r(i);var a=function(){var t=this,i=t.$createElement,s=t._self._c||i;return s("div",{ref:"container",staticClass:"group-list"},[s("div",{staticClass:"header"}),s("div",{staticClass:"list"},[t._l(t.combinationList,function(i,a){return s("div",{key:a,staticClass:"item acea-row row-between-wrapper",on:{click:function(s){return t.link(i.id)}}},[s("div",{staticClass:"pictrue"},[s("img",{attrs:{src:i.image}})]),s("div",{staticClass:"text"},[s("div",{staticClass:"line1",domProps:{textContent:t._s(i.title)}}),s("div",{staticClass:"acea-row"},[s("div",{staticClass:"team acea-row row-middle cart-color"},[s("div",{staticClass:"iconfont icon-pintuan"}),s("div",{staticClass:"num",domProps:{textContent:t._s(i.people+"人团")}})])]),s("div",{staticClass:"bottom acea-row row-between-wrapper"},[s("div",{staticClass:"money"},[t._v("\n            ￥"),s("span",{staticClass:"num",domProps:{textContent:t._s(i.price)}}),s("span",{staticClass:"y-money",domProps:{textContent:t._s("￥"+i.product_price)}})]),t._m(0,!0)])])])}),s("Loading",{attrs:{loaded:t.status,loading:t.loadingList}})],2)])},n=[function(){var t=this,i=t.$createElement,s=t._self._c||i;return s("div",{staticClass:"groupBnt bg-color-red"},[t._v("\n            去拼团"),s("span",{staticClass:"iconfont icon-jiantou"})])}],o=s("ca41"),e=s("3a5e"),c={name:"GoodsGroup",components:{Loading:e["a"]},props:{},data:function(){return{combinationList:[],status:!1,loading:!1,page:1,limit:20,loadingList:!1}},mounted:function(){var t=this;this.getCombinationList(),this.$scroll(this.$refs.container,function(){!t.loadingList&&t.getCombinationList()})},methods:{getCombinationList:function(){var t=this;t.loading||t.status||Object(o["n"])({page:t.page,limit:t.limit}).then(function(i){t.status=i.data.length<t.limit,t.combinationList.push.apply(t.combinationList,i.data),t.page++,t.loading=!1})},link:function(t){this.$router.push({path:"/activity/group_detail/"+t})}}},r=c,l=s("2877"),d=Object(l["a"])(r,a,n,!1,null,null,null);i["default"]=d.exports}}]);
//# sourceMappingURL=chunk-2d230838.eeb4507c.js.map