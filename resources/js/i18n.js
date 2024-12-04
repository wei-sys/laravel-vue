import { createI18n } from 'vue-i18n';
import common_en from '../lang/en/common'
import common_zh from '../lang/zh/common'

const messages = {
  en: common_en,
  zh: common_zh,
};

const i18n = createI18n({
  locale: 'en',
  messages,
});

export default i18n;