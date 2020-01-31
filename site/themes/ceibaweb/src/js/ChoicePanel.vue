<template>
    <section class="choice-panel relative flex flex-col justify-center items-center h-full">
      <transition name="fade-up" appear>
        <div v-if="show" class="flex flex-col justify-center items-center mb-6">
          <h1 class="mb-4">hello {{ firstName }}!</h1>
          <p class="font-sans">which of these comes <strong>closest</strong> to describing your inner desire?</p>
        </div>
      </transition>
      <transition name="fade-down" appear>
        <section v-if="show" class="flex min-w-eighty">
            <choice-box v-for="(choice, key) in choices" :key="key" :index="key" :choice="choice" :selectedChoices="selectedChoices" @update="onUpdate"/>
        </section>
      </transition>
      <div class="w-full absolute pin-b pin-l pin-r flex justify-center h-quarter">
        <transition name="fade-down" appear>
          <button v-show="selectedChoices.length > 0" @click="onUpdate" class="text-red h-8">Next</button>
        </transition>
       </div>
    </section>
</template>

<script>
import ChoiceBox from "./ChoiceBox.vue";

export default {
  data() {
    return {
      selectedChoices: [],
      show: true
    };
  },
  props: { 
    advance: Function,
    firstName: String,
    choices: Array  
  },
  methods: {

    isSelected(choice) {
      return this.selectedChoices.indexOf(choice) > -1;
    },

    onUpdate(choice) {
      if (this.isSelected(choice)) {
        this.selectedChoices.splice(this.selectedChoices.indexOf(choice), 1);
        return;
      }

      this.selectedChoices.push(choice);

      this.$emit("update", this.selectedChoices, "selectedChoices");
    },

    onSubmit() {
      this.show = false;

      setTimeout(this.advance, 400);
    },

    listenForEnterKeyPress(event) {
      if (event.which === 13) {
        this.onSubmit();
      }
    }

  },
  components: {
    ChoiceBox
  },
  mounted() {
    document.addEventListener("keyup", this.listenForEnterKeyPress);
  },
  destroyed() {
    document.removeEventListener("keyup", this.listenForEnterKeyPress);
  }
};
</script>

<style>
.fade-up-enter,
.fade-down-enter,
.fade-down-leave-to,
.fade-up-leave-to {
  opacity: 0;
}

.fade-down-enter-active,
.fade-up-enter-active,
.fade-down-leave-active,
.fade-up-leave-active {
  transition: all 0.4s;
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
