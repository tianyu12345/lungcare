<template>
  <div v-if="posterImageStatus" class="poster-first">
    <div class="poster-pop" v-show="!canvasStatus">
      <img
        src="@assets/images/poster-close.png"
        class="close"
        @click="posterImageClose"
      />
      <div class="canvas" ref="poster">
        <img class="image" :src="posterData.image" alt="商品图片" />
        <div class="text black"><span v-text="posterData.title"></span></div>
        <div class="text rad">
          <span v-text="'￥' + posterData.price"></span>
        </div>
        <div class="code acea-row row-between-wrapper">
          <div class="code-img">
            <img :src="posterData.code" alt="二维码" />
          </div>
          <div class="code-text"><span>长按识别二维码 立即购买</span></div>
        </div>
      </div>
    </div>
    <div class="poster-pop" v-show="canvasStatus">
      <img
        src="@assets/images/poster-close.png"
        class="close"
        @click="posterImageClose"
      />
      <img :src="posterImage" alt="tp" class="poster-image" />
      <div class="keep">长按图片可以保存到手机</div>
    </div>
    <div class="mask"></div>
  </div>
</template>
<style scoped>
.poster-first {
  overscroll-behavior: contain;
}
.poster-pop {
  width: 4.8rem;
  position: fixed;
  left: 50%;
  transform: translateY(-50%);
  -webkit-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  z-index: 99;
  top: 50%;
  margin-left: -2.4rem;
}
.poster-pop .canvas {
  background-color: #ffffff;
  width: 100%;
}
.poster-pop .poster-image {
  width: 100%;
  display: block;
}
.poster-pop .canvas .image {
  width: 100%;
  height: 4.5rem;
  display: block;
}
.poster-pop .canvas .text {
  text-align: center;
  margin-top: 0.32rem;
}
.poster-pop .canvas .text.black {
  padding: 0 0.1rem;
  color: #000;
}
.poster-pop .canvas .text.rad {
  color: #ff0000;
}
.poster-pop .canvas .code {
  padding: 0 0.1rem 0.2rem 0.1rem;
}
.poster-pop .canvas .code .code-img {
  width: 1.7rem;
  height: 1.7rem;
}
.poster-pop .canvas .code .code-img img {
  width: 100%;
  height: 100%;
}
.poster-pop .canvas .code .code-text {
  width: 2.8rem;
  font-size: 0.24rem;
}
.poster-pop .close {
  width: 0.46rem;
  height: 0.75rem;
  position: fixed;
  right: 0;
  top: -0.73rem;
  display: block;
}
.poster-pop .keep {
  color: #fff;
  text-align: center;
  font-size: 0.25rem;
  margin-top: 0.1rem;
}
.mask {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.6);
  z-index: 9;
}
</style>
<script>
import html2canvas from "html2canvas";
export default {
  name: "StorePoster",
  props: {
    posterImageStatus: Boolean,
    posterData: Object
  },
  data: function() {
    return {
      canvasStatus: false
    };
  },
  watch: {
    posterImageStatus: function() {
      var that = this;
      if (that.posterImageStatus === true) {
        that.$nextTick(function() {
          that.savePosterPath();
        });
      }
    }
  },
  mounted: function() {},
  methods: {
    posterImageClose: function() {
      this.posterImageStatus = false;
      this.canvasStatus = false;
      this.$emit("setPosterImageStatus");
    },
    savePosterPath: function() {
      this.$dialog.loading.open();
      this.setHtml2Canvas();
    },
    setHtml2Canvas: function() {
      let that = this;
      const canvas = document.createElement("canvas");
      let canvasBox = that.$refs.poster;
      const width = parseInt(window.getComputedStyle(canvasBox).width);
      const height = parseInt(window.getComputedStyle(canvasBox).height);
      canvas.width = width * 2;
      canvas.height = height * 2;
      canvas.style.width = width + "px";
      canvas.style.height = height + "px";
      const context = canvas.getContext("2d");
      context.scale(2, 2);
      const options = {
        backgroundColor: null,
        canvas,
        useCORS: true
      };
      setTimeout(function() {
        html2canvas(canvasBox, options).then(function(canvas) {
          that.posterImage = canvas.toDataURL();
          that.canvasStatus = true;
          that.$dialog.loading.close();
        });
      }, 500);
    }
  }
};
</script>
