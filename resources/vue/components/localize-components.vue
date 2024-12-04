<template>
    <ButtonGroupComponents :content="buttons" @select="onLanguageChange" />
</template>

<script>
import ButtonGroupComponents from './button/group-components.vue';

export default {
  components: {
    ButtonGroupComponents,
  },
  data() {
    return {
      buttons: [
        { label: 'En', value: 'en' },
        { label: '中', value: 'zh' },
      ],
    };
  },
  methods: {
    onLanguageChange(lang) {
      this.$i18n.locale = lang;
    },
  },
};
</script>