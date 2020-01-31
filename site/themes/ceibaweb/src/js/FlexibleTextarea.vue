<template>
    <div class="px-1 md:px-0 md:w-3/5 md:mx-auto">
      <textarea autofocus ref="input" v-model="comment" :rows="rows" @keyup.enter="onSubmit" @input="onUpdate" wrap="hard" class="w-full h-full border border-grey-lighter shadow-md rounded-lg px-2 py-2"></textarea>
    </div>
</template>

<script>
export default {
  data() {
    return {
      rows: 1,
      height: 0,
      comment: ""
    }
  },
  methods: {
    onUpdate(event) {
      this.maybeAddRows(event)

      this.$emit("update", this.comment)
    },

    onSubmit() {
      this.$emit("submit")
    },

    maybeAddRows(event) {
      const textarea = event.target
      if (textarea.clientHeight < textarea.scrollHeight) {
        this.rows++
      }
    },

    increaseHeight(event) {
      this.$refs.hello.height = this.$refs.hello.height++
      console.log(this.$refs.hello.height)
    }
  },
  mounted() {
    this.$refs.input.focus()
    this.height = this.$refs.input.scrollHeight
  }
}
</script>
