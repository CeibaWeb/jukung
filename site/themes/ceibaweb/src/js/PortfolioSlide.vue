<template>
    <div :class="slideClasses" :style="slideStyles">
        <span @click="slideBack()" class="absolute pin-l ml-8 text-white font-bold text-4xl antialiased cursor-pointer">&lt;</span>
            <h1 class="font-mono text-white uppercase">{{ slide.title }}</h1>
        <span @click="slideForward()" class="absolute pin-r mr-8 text-white font-bold text-4xl antialiased cursor-pointer">&gt;</span>
    </div>    
</template>

<script>
export default {
  props: ["slide", "slideForward", "slideBack"],
  computed: {
    slideClasses() {
      return {
        "h-full w-full relative flex flex-col items-center justify-around bg-cover bg-center": true
      };
    },
    slideStyles() {
      return {
        backgroundImage: `url('${this.slide.intro_image}')`
      };
    }
  }
};
</script>

<style>
</style>
