<template>
    <div class="flex flex-col justify-center items-start w-full h-full pl-2">
        <transition name="fade-up" appear>
            <h1 v-if="show" class="text-15xl">hello! 🌳</h1>
        </transition>
        <transition name="fade-down" appear>
            <input v-if="show" ref="nameInput" v-model="name" @input="onUpdate" @keyup.enter="onSubmit" class="bg-transparent text-15xl w-full" type="text" placeholder="your name?">
        </transition>
    </div>
</template>

<script>
export default {
  props: { advance: Function },
  data() {
    return {
      name: "",
      show: true
    }
  },
  mounted() {
    this.$refs.nameInput.focus()
  },
  methods: {
    onUpdate() {
      this.$emit("update", this.name, "name")
    },
    onSubmit() {
      this.show = false

      setTimeout(this.advance, 400)
    }
  }
}
</script>

<style>
.fade-up-enter,
.fade-down-enter,
.fade-down-leave-to,
.fade-up-leave-to {
  opacity: 0;
}

.fade-down-enter-active,
.fade-up-enter-active {
  transition: transform 0.4s ease-in, opacity 0.3s ease-in;
}

.fade-down-leave-active,
.fade-up-leave-active {
  transition: all 0.3s;
}

.fade-down-enter,
.fade-down-leave-to {
  transform: translateY(10px);
}

.fade-up-enter,
.fade-up-leave-to {
  transform: translateY(-10px);
}
</style>
