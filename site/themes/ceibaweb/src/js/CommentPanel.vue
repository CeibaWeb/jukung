<template>
  <section class="commentPanel relative h-full">
    <div class="h-thirty">
    </div>
    <transition name="fade-up" appear @afterEnter="showAfter = !showAfter">
      <div v-if="show" class="my-8 text-center">
        <h1 class="my-4 pb-4 font-mono text-4xl">tell your story</h1>
        <span class="w-full font-sans">
          <p>questions / concerns / collaborations -- all messages get a response</p>
        </span>
      </div>
    </transition>
    <transition name="fade-down">
      <div v-if="showAfter" class="content leading-normal font-sans text-base">
        <flexible-textarea @submit="onSubmit" @update="onUpdate"/>
        <p class="text-grey-darker w-full text-center text-sm md:pt-4">as much or as little as you like</p>
      </div>
    </transition>
    <button @click="onSubmit" class="absolute pin-b pin-r mr-6 mb-6 bg-red text-white antialiased rounded-lg">Advance</button>
  </section>
</template>

<script>
import FlexibleTextarea from "./FlexibleTextarea"

export default {
  props: { advance: Function },
  data() {
    return {
      image: true,
      show: true,
      showAfter: false,
    }
  },
  components: {
    FlexibleTextarea
  },
  watch: {
    show(newValue, oldValue) {
      this.showAfter = newValue === false ? newValue : this.showAfter
    }
  },
  methods: {
    onUpdate(comment) {
      this.$emit("update", comment, "comment")
    },
    onSubmit() {
      this.show = !this.show

      setTimeout(this.advance, 1000)
    }
  },
  mounted() {
    this.show = true
  }
}
</script>