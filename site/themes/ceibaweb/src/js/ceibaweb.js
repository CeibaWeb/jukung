import Vue from "vue";
import PortfolioSlider from "./PortfolioSlider.vue"
import NavBar from "./NavBar.vue"
import Axios from "axios"

(function () {
  window.axios = Axios;

  axios.defaults.headers.common['X-CSRF-TOKEN'] = window.csrf_token
})()

const sliderEl = document.getElementById('portfolio-slider')
const navBar = document.getElementById('nav-bar')
const navPanel = document.getElementById('nav-panel')

if (!!sliderEl) {
  new Vue({
    el: '#portfolio-slider',
    components: {
      PortfolioSlider
    }
  });
}

Vue.component('nav-bar', {
  data() {
    return {
      show: false,
    }
  },
  methods: {
    onToggle() {
      this.show = !this.show
    }
  }
})

if (!!navBar) {
  new Vue({ el: '#nav-bar' })
}

if (!!navPanel) {
  new Vue({ el: '#nav-panel' })
}