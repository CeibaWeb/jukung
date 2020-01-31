<template>
    <div :class="choiceBoxWrapperClasses" style="transition: all .3s;" @click="toggleSelection">
        <div class="flex justify-center items-center select-none">
            <h4 style="transition: color .1s">{{ number }}</h4>
        </div>
        <label @click.prevent :for="choice" class="select-none mt-4 text-center self-start w-full" style="transition: color .1s">{{ choice }}</label>
        <div class="w-full flex justify-center items-center self-stretch">
            <input ref="input" type="checkbox" :id="choice" name="choice" :value="choice" :checked="isSelected" @click.stop="toggleSelection">
        </div>
    </div>
</template>

<script>
export default {
  props: ["choice", "selectedChoices", "index"],
  computed: {
    choiceBoxWrapperClasses() {
      return {
        "w-1/4 h-48 flex flex-wrap justify-center mx-2": true,
        "bg-blue shadow-lg": this.isSelected,
        "shadow hover:shadow-md border border-1": !this.isSelected
      };
    },
    isSelected() {
      return this.selectedChoices.indexOf(this.choice) > -1;
    },
    number() {
      return this.index + 1;
    }
  },
  methods: {
    toggleSelection() {
      this.$emit("update", this.choice);
    }
  },
  mounted() {
    document.addEventListener("keyup", e => {
      if (e.which == this.number.toString().codePointAt()) {
        this.toggleSelection();
      }
    });
  }
};
</script>

<style>
.bg-blue label,
.bg-blue h4 {
  color: white;
}
</style>
