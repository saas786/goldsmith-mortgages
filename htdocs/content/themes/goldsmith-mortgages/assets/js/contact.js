import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import { VueReCaptcha } from 'vue-recaptcha-v3';
import ContactForm from './components/ContactForm';
import VueI18n from 'vue-i18n';

Vue.config.devtools = true;
Vue.config.silent = false;
Vue.use(VueSweetalert2);

let vue_recaptcha_options = {
  siteKey: window.contact_script_data.google_recaptcha_site_key,
  loaderOptions: {
    autoHideBadge: false,
    explicitRenderParameters: {
      badge: 'bottomleft',
      size: 'invisible',
    }
  }
};

Vue.use(VueReCaptcha, vue_recaptcha_options);

Vue.use(VueI18n);

const messages = {
  'en_NZ': {
    message: {
      error_1: 'Please enter your name',
      error_2: 'Please enter your phone number',
      error_3: 'Please enter your email address',
      error_4: 'Please enter a valid email address',
      error_5: 'Please enter your message',
      error_6: 'Please accept the terms and conditions',
    }
  },
  'zh_CN': {
    message: {
      error_1: '请输入你的名字',
      error_2: '请输入您的电话号码',
      error_3: '请输入您的电子邮件地址',
      error_4: '请输入有效的电子邮件地址',
      error_5: '请输入您的留言',
      error_6: '请接受条款和条件',
    }
  }
};

const i18n = new VueI18n({
  locale: 'zh_CN',
  messages,
});

new Vue({
  el: '#enquiry',
  render: h => h(ContactForm),
  i18n,
});

i18n.locale = window.contact_script_data.locale;
