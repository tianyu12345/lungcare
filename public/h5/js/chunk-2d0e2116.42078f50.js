(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2d0e2116"],{"7cb6":function(t,e,n){"use strict";n.r(e);var s=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{ref:"container",staticClass:"pos-order-list"},[n("div",{staticClass:"nav acea-row row-around row-middle"},[n("div",{staticClass:"item",class:0==t.where.status?"on":"",on:{click:function(e){return t.changeStatus(0)}}},[t._v("\n      待付款\n    ")]),n("div",{staticClass:"item",class:1==t.where.status?"on":"",on:{click:function(e){return t.changeStatus(1)}}},[t._v("\n      待发货\n    ")]),n("div",{staticClass:"item",class:2==t.where.status?"on":"",on:{click:function(e){return t.changeStatus(2)}}},[t._v("\n      待收货\n    ")]),n("div",{staticClass:"item",class:3==t.where.status?"on":"",on:{click:function(e){return t.changeStatus(3)}}},[t._v("\n      待评价\n    ")]),n("div",{staticClass:"item",class:4==t.where.status?"on":"",on:{click:function(e){return t.changeStatus(4)}}},[t._v("\n      已完成\n    ")]),n("div",{staticClass:"item",class:-3==t.where.status?"on":"",on:{click:function(e){return t.changeStatus(-3)}}},[t._v("\n      退款\n    ")])]),n("div",{staticClass:"list"},t._l(t.list,function(e,s){return n("div",{key:s,staticClass:"item"},[n("div",{staticClass:"order-num acea-row row-middle",on:{click:function(n){return t.toDetail(e)}}},[t._v("\n        订单号："+t._s(e.order_id)+"\n        "),n("span",{staticClass:"time"},[t._v("下单时间："+t._s(e.add_time))])]),t._l(e._info,function(s,a){return n("div",{key:a,staticClass:"pos-order-goods"},[n("div",{staticClass:"goods acea-row row-between-wrapper",on:{click:function(n){return t.toDetail(e)}}},[n("div",{staticClass:"picTxt acea-row row-between-wrapper"},[n("div",{staticClass:"pictrue"},[n("img",{attrs:{src:s.cart_info.productInfo.image}})]),n("div",{staticClass:"text acea-row row-between row-column"},[n("div",{staticClass:"info line2"},[t._v("\n                "+t._s(s.cart_info.productInfo.store_name)+"\n              ")]),s.cart_info.productInfo.suk?n("div",{staticClass:"attr"},[t._v("\n                "+t._s(s.cart_info.productInfo.suk)+"\n              ")]):t._e()])]),n("div",{staticClass:"money"},[n("div",{staticClass:"x-money"},[t._v("￥"+t._s(s.cart_info.productInfo.price))]),n("div",{staticClass:"num"},[t._v("x"+t._s(s.cart_info.cart_num))]),n("div",{staticClass:"y-money"},[t._v("\n              ￥"+t._s(s.cart_info.productInfo.ot_price)+"\n            ")])])])])}),n("div",{staticClass:"public-total"},[t._v("\n        共"+t._s(e.total_num)+"件商品，应支付\n        "),n("span",{staticClass:"money"},[t._v("￥"+t._s(e.pay_price))]),t._v(" ( 邮费 ¥"+t._s(e.total_postage)+"\n        )\n      ")]),n("div",{staticClass:"operation acea-row row-between-wrapper"},[n("div",{staticClass:"more"}),n("div",{staticClass:"acea-row row-middle"},[0==t.where.status?n("div",{staticClass:"bnt",on:{click:function(n){return t.modify(e,0)}}},[t._v("\n            一键改价\n          ")]):t._e(),n("div",{staticClass:"bnt",on:{click:function(n){return t.modify(e,1)}}},[t._v("订单备注")]),-3==t.where.status&&1===e.refund_status?n("div",{staticClass:"bnt",on:{click:function(n){return t.modify(e,0)}}},[t._v("\n            立即退款\n          ")]):t._e(),"offline"===e.pay_type&&0===e.paid?n("div",{staticClass:"bnt cancel",on:{click:function(n){return t.offlinePay(e)}}},[t._v("\n            确认付款\n          ")]):t._e(),1==t.where.status?n("router-link",{staticClass:"bnt",attrs:{to:"/customer/delivery/"+e.order_id}},[t._v("去发货\n          ")]):t._e()],1)])],2)}),0),n("Loading",{attrs:{loaded:t.loaded,loading:t.loading}}),n("PriceChange",{attrs:{change:t.change,orderInfo:t.orderInfo,status:t.status},on:{closechange:function(e){return t.changeclose(e)},savePrice:t.savePrice}})],1)},a=[],i=(n("96cf"),n("3b8d")),r=n("de46"),c=n("3a5e"),o=n("50fc"),u=n("61f7"),d=n("cba2"),l={name:"AdminOrderList",components:{PriceChange:r["a"],Loading:c["a"]},props:{},data:function(){return{current:"",change:!1,types:0,where:{page:1,limit:5,status:0},list:[],loaded:!1,loading:!1,orderInfo:{},status:""}},watch:{"$route.params.types":function(t){var e=this;void 0!=t&&(e.where.status=t,e.init())},types:function(){this.getIndex()}},mounted:function(){var t=this;t.where.status=t.$route.params.types,t.current="",t.getIndex(),t.$scroll(t.$refs.container,function(){!t.loading&&t.getIndex()})},methods:{more:function(t){this.current===t?this.current="":this.current=t},modify:function(t,e){this.change=!0,this.orderInfo=t,this.status=e},changeclose:function(t){this.change=t},savePrice:function(){var t=Object(i["a"])(regeneratorRuntime.mark(function t(e){var n,s,a,i,r,c;return regeneratorRuntime.wrap(function(t){while(1)switch(t.prev=t.next){case 0:if(n=this,s={},a=e.price,i=e.refund_price,r=n.orderInfo.refund_status,c=e.remark,s.order_id=n.orderInfo.order_id,0!=n.status||0!==r){t.next=15;break}return t.prev=3,t.next=6,this.$validator({price:[Object(u["e"])(u["e"].message("金额")),Object(u["d"])(u["d"].message("金额"))]}).validate({price:a});case 6:t.next=11;break;case 8:return t.prev=8,t.t0=t["catch"](3),t.abrupt("return",Object(d["b"])(t.t0));case 11:s.price=a,Object(o["h"])(s).then(function(){n.change=!1,n.$dialog.success("改价成功"),n.init()},function(){n.change=!1,n.$dialog.error("改价失败")}),t.next=39;break;case 15:if(0!=n.status||1!==r){t.next=29;break}return t.prev=16,t.next=19,this.$validator({refund_price:[Object(u["e"])(u["e"].message("金额")),Object(u["d"])(u["d"].message("金额"))]}).validate({refund_price:i});case 19:t.next=24;break;case 21:return t.prev=21,t.t1=t["catch"](16),t.abrupt("return",Object(d["b"])(t.t1));case 24:s.price=i,s.type=e.type,Object(o["k"])(s).then(function(t){n.change=!1,n.$dialog.success(t.msg),n.init()},function(t){n.change=!1,n.$dialog.error(t.msg)}),t.next=39;break;case 29:return t.prev=29,t.next=32,this.$validator({remark:[Object(u["e"])(u["e"].message("备注"))]}).validate({remark:c});case 32:t.next=37;break;case 34:return t.prev=34,t.t2=t["catch"](29),t.abrupt("return",Object(d["b"])(t.t2));case 37:s.remark=c,Object(o["i"])(s).then(function(t){n.change=!1,n.$dialog.success(t.msg),n.init()},function(t){n.change=!1,n.$dialog.error(t.msg)});case 39:case"end":return t.stop()}},t,this,[[3,8],[16,21],[29,34]])}));function e(e){return t.apply(this,arguments)}return e}(),init:function(){this.list=[],this.where.page=1,this.loaded=!1,this.loading=!1,this.getIndex(),this.current=""},getIndex:function(){var t=this;t.loading||t.loaded||(t.loading=!0,Object(o["c"])(t.where).then(function(e){t.loading=!1,t.loaded=e.data.length<t.where.limit,t.list.push.apply(t.list,e.data),t.where.page=t.where.page+1},function(e){t.$dialog.error(e.msg)}))},changeStatus:function(t){this.where.status!=t&&(this.where.status=t,this.init())},toDetail:function(t){this.$router.push({path:"/customer/orderdetail/"+t.order_id})},offlinePay:function(t){var e=this;console.log(t),Object(o["j"])({order_id:t.order_id}).then(function(t){e.$dialog.success(t.msg),e.init()},function(t){e.$dialog.error(t.msg)})}}},h=l,f=n("2877"),v=Object(f["a"])(h,s,a,!1,null,null,null);e["default"]=v.exports}}]);
//# sourceMappingURL=chunk-2d0e2116.42078f50.js.map