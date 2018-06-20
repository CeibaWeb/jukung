<template>
    <div class="portfolio-slider h-full w-full">
        <portfolio-slide 
            v-for="(slide, key) in slides" 
            v-if="index == key" 
            :key="key" 
            :slide="slide"
            :slideForward="slideForward"
            :slideBack="slideBack">
        </portfolio-slide>
    </div>
</template>
<script>
import PortfolioSlide from "./PortfolioSlide.vue";

export default {
  data() {
    return {
      index: 0
    };
  },
  props: ["slides"],
  methods: {
      slideForward() {
          const forwardIndex = this.index + 1

          this.index = forwardIndex >= this.totalSlides ? forwardIndex % this.totalSlides : forwardIndex
      },
      slideBack() {
          const backIndex = this.index - 1

          this.index = backIndex < 0 ? this.totalSlides - 1 : backIndex
      }
  },
  computed: {
    totalSlides() {
      return this.slides.length;
    }
  },
  components: {
    PortfolioSlide
  }
};
</script>
