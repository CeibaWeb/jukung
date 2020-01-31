<template>
  <section :class="contactFormClasses" :style="contactFormStyles">
    <component 
    :is="currentPanel" 
    :firstName="firstName" 
    :choices="choices" 
    :advance="advance"
    @update="processUpdate"
    @submitForm="submitForm">
    </component>
  </section>
</template>

<script>
import NamePanel from "./NamePanel.vue"
import ChoicePanel from "./ChoicePanel.vue"
import CommentPanel from "./CommentPanel.vue"
import ContactPanel from "./ContactPanel.vue"
import ConfirmationPanel from "./ConfirmationPanel.vue"

export default {
  props: ["inputChoices"],
  data() {
    return {
      userData: {
        name: "",
        contact: "",
        selectedChoices: [],
        comment: ""
      },
      choices: ["Design", "Develop", "Content", "SEO"],
      panels: ["Name", "Choice", "Comment", "Contact", "Confirmation"],
      submitted: false,
      index: 0,
      contactFormStyles: {
        transition: 'background-color .5s ease-in;'
      }
    }
  },
  computed: {
    currentPanel() {
      return this.panels[this.index].toLowerCase() + "-panel"
    },

    firstName() {
      const name = this.userData.name,
        firstSpace = name.indexOf(" ")

      // slice/return first word if more than one word, return whole word if not
      return firstSpace > -1 ? name.slice(0, firstSpace) : name
    },

    contactFormClasses() {
      return {
        "contact-form w-full h-full font-mono": true,
        "bg-blue": this.submitted
      }
    },
  },
  methods: {
    processUpdate(value, key) {
      this.userData[key] = value
    },

    async submitForm() {
      const response = await axios.post('/!/Inquiry/process', this.userData)

      this.submitted = true

      this.advance()
    },

    advance() {
      this.index++
    }
  },
  components: {
    NamePanel,
    ChoicePanel,
    CommentPanel,
    ContactPanel,
    ConfirmationPanel
  }
}
</script>
wer