<template>
  <div class="index" v-cloak>
    <div
      class="follow acea-row row-between-wrapper"
      v-if="followHid && followUrl && !subscribe && isWeixin"
    >
      <div>点击“立即关注”即可关注公众号</div>
      <div class="acea-row row-middle">
        <div class="bnt" @click="followTap">立即关注</div>
        <span class="iconfont icon-guanbi" @click="closeFollow"></span>
      </div>
    </div>
    <div class="followCode" v-if="followCode">
      <div class="pictrue"><img :src="followUrl" /></div>
      <div class="mask" @click="closeFollowCode"></div>
    </div>
    <div class="header acea-row row-center-wrapper">
      <div class="logo"><img :src="logoUrl" /></div>
      <router-link :to="'/search'" class="search acea-row row-middle">
        <span class="iconfont icon-xiazai5"></span>搜索商品
      </router-link>
    </div>
    <div class="slider-banner banner">
      <swiper :options="swiperOption" v-if="banner.length > 0">
        <swiper-slide v-for="(item, index) in banner" :key="index">
          <router-link
            :to="item.wap_url ? item.wap_url : ''"
            class="search acea-row row-middle"
          >
            <img :src="item.pic" />
          </router-link>
        </swiper-slide>
        <div class="swiper-pagination paginationBanner" slot="pagination"></div>
      </swiper>
    </div>
    <div class="nav acea-row">
      <router-link
        :to="item.wap_url ? item.wap_url : ''"
        class="item"
        v-for="(item, index) in menus"
        :key="index"
      >
        <div class="pictrue"><img :src="item.pic" /></div>
        <div>{{ item.name }}</div>
      </router-link>
    </div>
    <div class="news acea-row row-between-wrapper">
      <div class="pictrue"><img src="@assets/images/news.png" /></div>
      <div class="swiper-no-swiping new-banner">
        <swiper
          class="swiper-wrapper"
          :options="swiperRoll"
          v-if="roll.length > 0"
        >
          <swiper-slide
            class="swiper-slide"
            v-for="(item, index) in roll"
            :key="index"
          >
            <router-link
              :to="item.wap_url ? item.wap_url : ''"
              class="acea-row row-between-wrapper"
            >
              <div class="text acea-row row-between-wrapper">
                <div class="label" v-if="item.show === '是'">最新</div>
                <div class="newsTitle line1">{{ item.info }}</div>
              </div>
              <div class="iconfont icon-xiangyou"></div>
            </router-link>
          </swiper-slide>
        </swiper>
      </div>
    </div>
    <div
      class="specialArea acea-row row-between-wrapper"
      v-if="activityOne.wap_link !== undefined || activity.length"
    >
      <router-link
        :to="activityOne.wap_link ? activityOne.wap_link : ''"
        v-if="activityOne.wap_link !== undefined"
        class="assemble"
      >
        <img :src="activityOne.pic" />
        <div class="text">
          <div class="name">{{ activityOne.title }}</div>
          <div class="infor">{{ activityOne.info }}</div>
        </div>
      </router-link>
      <div class="list acea-row row-column-between">
        <router-link
          :to="item.wap_link ? item.wap_link : ''"
          class="item"
          v-for="(item, index) in activity"
          :key="index"
        >
          <img :src="item.pic" />
          <div class="text">
            <div class="name">{{ item.title }}</div>
            <div class="infor">{{ item.info }}</div>
          </div>
        </router-link>
      </div>
    </div>

        <div class="wrapper" v-if="benefit.length > 0">
      <div class="title acea-row row-between-wrapper">
        <div class="text">
          <div class="name line1">促销单品</div>
          <div class="line1">{{ info.salesInfo }}</div>
        </div>
        <router-link :to="'/promotion'" class="more"
          >更多<span class="iconfont icon-jiantou"></span
        ></router-link>
      </div>
    </div>
    <Promotion-good :benefit="benefit"></Promotion-good>
    <Coupon-window
      :coupon-list="couponList"
      v-if="showCoupon"
      @checked="couponClose"
      @close="couponClose"
    ></Coupon-window>
    

    <div v-if="newGoodsBananr">
      <div class="adver">
        <img :src="newGoodsBananr" />
      </div>
    </div>
    <div class="wrapper" v-if="info.firstList.length > 0">
      <div class="title acea-row row-between-wrapper">
        <div class="text">
          <div class="name line1">
            首发新品<span class="new font-color-red">NEW~</span>
          </div>
          <div class="line1">{{ info.firstInfo }}</div>
        </div>
        <router-link :to="{ path: '/hot_new_goods/' + 3 }" class="more"
          >更多<span class="iconfont icon-jiantou"></span
        ></router-link>
      </div>
      <div class="newProducts">
        <swiper class="swiper-wrapper" :options="swiperProducts">
          <swiper-slide
            class="swiper-slide"
            v-for="(item, index) in info.firstList"
            :key="index"
          >
            <router-link :to="{ path: '/detail/' + item.id }">
              <div class="img-box">
                <img :src="item.image" />
              </div>
              <div class="pro-info line1">{{ item.store_name }}</div>
              <div class="money font-color-red">￥{{ item.price }}</div>
            </router-link>
          </swiper-slide>
        </swiper>
      </div>
    </div>

  </div>
</template>
<script>
import { swiper, swiperSlide } from "vue-awesome-swiper";
import "@assets/css/swiper.min.css";
import GoodList from "@components/GoodList";
import PromotionGood from "@components/PromotionGood";
import CouponWindow from "@components/CouponWindow";
import { getHomeData, getShare, follow } from "@api/public";
import cookie from "@utils/store/cookie";
import { openShareAll } from "@libs/wechat";
import { isWeixin } from "@utils/index";

const HAS_COUPON_WINDOW = "has_coupon_window";

export default {
  name: "Index",
  components: {
    swiper,
    swiperSlide,
    GoodList,
    PromotionGood,
    CouponWindow
  },
  props: {},
  data: function() {
    return {
      newGoodsBananr: "",
      isWeixin: isWeixin(),
      followUrl: "",
      subscribe: false,
      followHid: true,
      followCode: false,
      showCoupon: false,
      logoUrl: "",
      banner: [],
      menus: [],
      roll: [],
      activity: [],
      activityOne: {},
      info: {
        fastList: [],
        bastBanner: [],
        firstList: [],
        bastList: []
      },
      likeInfo: [],
      lovely: [],
      benefit: [],
      couponList: [],
      swiperOption: {
        pagination: {
          el: ".paginationBanner",
          clickable: true
        },
        autoplay: {
          disableOnInteraction: false,
          delay: 2000
        },
        loop: true,
        speed: 1000,
        observer: true,
        observeParents: true
      },
      swiperRoll: {
        direction: "vertical",
        autoplay: {
          disableOnInteraction: false,
          delay: 2000
        },
        loop: true,
        speed: 1000,
        observer: true,
        observeParents: true
      },
      swiperScroll: {
        freeMode: true,
        freeModeMomentum: false,
        slidesPerView: "auto",
        observer: true,
        observeParents: true
      },
      swiperBoutique: {
        pagination: {
          el: ".paginationBoutique",
          clickable: true
        },
        autoplay: {
          disableOnInteraction: false,
          delay: 2000
        },
        loop: true,
        speed: 1000,
        observer: true,
        observeParents: true
      },
      swiperProducts: {
        freeMode: true,
        freeModeMomentum: false,
        slidesPerView: "auto",
        observer: true,
        observeParents: true
      }
    };
  },
  mounted: function() {
    let that = this;
    getHomeData().then(res => {
      that.logoUrl = res.data.logoUrl;
      that.newGoodsBananr = res.data.newGoodsBananr;
      that.$set(that, "banner", res.data.banner);
      that.$set(that, "menus", res.data.menus);
      that.$set(that, "roll", res.data.roll);
      that.$set(that, "activity", res.data.activity);
      if (res.data.activity.length) {
        var activityOne = res.data.activity.shift();
        that.$set(that, "activityOne", activityOne);
      }
      that.$set(that, "info", res.data.info);
      that.$set(that, "likeInfo", res.data.likeInfo);
      that.$set(
        that,
        "lovely",
        res.data.lovely.length ? res.data.lovely[0] : {}
      );
      that.$set(that, "benefit", res.data.benefit);
      that.$set(that, "couponList", res.data.couponList);
      that.subscribe = res.data.subscribe;
      that.setOpenShare();
      this.showCoupon =
        !cookie.has(HAS_COUPON_WINDOW) &&
        res.data.couponList.some(coupon => coupon.is_use);
    });
    this.getFollow();
  },
  methods: {
    closeFollow() {
      this.followHid = false;
    },
    followTap() {
      this.followCode = true;
      this.followHid = false;
    },
    closeFollowCode() {
      this.followCode = false;
      this.followHid = true;
    },
    couponClose() {
      cookie.set(HAS_COUPON_WINDOW, 1);
    },
    getFollow() {
      follow()
        .then(res => {
          this.followUrl = res.data.path;
        })
        .catch(() => {});
    },
    setOpenShare() {
      if (isWeixin()) {
        getShare().then(res => {
          var data = res.data.data;
          var configAppMessage = {
            desc: data.synopsis,
            title: data.title,
            link: location.href,
            imgUrl: data.img
          };
          openShareAll(configAppMessage);
        });
      }
    }
  }
};
</script>
<style scoped>
.index {
  background-color: #fff;
}
.index .follow {
  z-index: 100000;
}
</style>
