<template>
    <div class="flex flex-col justify-center items-start w-full h-full pl-2 relative">
      <transition name="fade-up" appear>
          <h1 v-if="show" class="pb-8 text-5xl">last thing - your:</h1>
      </transition>
      <transition name="fade-down" appear>
        <input v-if="show" v-model="contact" ref="input" @keyup.enter="onSubmitForm" class="bg-transparent text-5xl w-full pb-8" type="text" placeholder="email/phone/handle/something">
      </transition>
      <transition name="fade-down" appear>
        <span v-if="contact">
          <label class="text-blue" for="consent">send me new content and other cool things</label>
          <input type="checkbox" name="consent" id="consent">
        </span>
      </transition>
      <button @click="onSubmitForm" class="bg-blue-green text-white antialiased shadow-md px-3 py-1 uppercase absolute pin-r pin-b mb-8 mr-8">Submit</button>
    </div>
</template>


<script>
export default {
  props: { advance: Function },
  data() {
    return {
      show: true,
      contact: ""
    }
  },
  methods: {
    onUpdate() {},
    onSubmitForm() {
      this.$emit("update", this.contact, "contact")

      this.$emit("submitForm")
    }
  },
  mounted() {
    this.$refs.input.focus()
  }
}
</script>

<style>
</style>
