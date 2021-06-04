<template>
  <div class="container px-[15px] py-[120px] mx-auto">
    <div class="pattern-1 font-primary text-[30px] text-cape-palliser">{{ enquiry_title }}</div>
    <div class="pb-[40px]"></div>
    <div class="font-secondary font-light text-[14px] text-white pb-[70px]" v-html="enquiry_content"></div>
    <div class="bg-mine-shaft p-[30px] xl:py-[70px] xl:px-[110px]">
      <ValidationObserver ref="formObserver">
        <form v-on:submit.prevent="onSubmit">
          <div class="grid grid-cols-2 gap-y-[40px] xl:gap-[40px]">
            <div class="col-span-2 xl:col-span-1 order-0 xl:order-0">
              <ValidationProvider rules="name_required" v-slot="{ errors }">
                <div class="flex">
                  <label for="name" class="font-secondary text-[16px] text-white pr-[15px] pb-[5px]">{{
                      enquiry_label_1
                    }}
                    *</label>
                  <small v-if="errors.length" class="text-cape-palliser">{{ errors[0] }}</small>
                </div>
                <input type="text" class="font-secondary bg-white bg-opacity-[80%] w-full h-[45px] px-[15px] rounded-[5px]" v-bind:class="errors.length ? 'border-[2px] border-cape-palliser' : ''" v-model="name" id="name">
              </ValidationProvider>
            </div>
            <div class="col-span-2 xl:col-span-1 order-3 row-span-1 xl:row-span-3 xl:order-1">
              <ValidationProvider rules="message_required" v-slot="{ errors }">
                <div class="flex">
                  <label for="message" class="font-secondary text-[16px] text-white pr-[15px] pb-[5px]">{{
                      enquiry_label_4
                    }}
                    *</label>
                  <small v-if="errors.length" class="text-cape-palliser">{{ errors[0] }}</small>
                </div>
                <textarea rows="10" class="font-secondary bg-white bg-opacity-[80%] w-full p-[15px] rounded-[5px]" v-bind:class="errors.length ? 'border-[2px] border-cape-palliser' : ''" v-model="message" id="message"></textarea>
              </ValidationProvider>
            </div>
            <div class="col-span-2 xl:col-span-1 order-1 xl:order-2">
              <ValidationProvider rules="phone_required" v-slot="{ errors }">
                <div class="flex">
                  <label for="phone" class="font-secondary text-[16px] text-white pr-[15px] pb-[5px]">{{
                      enquiry_label_2
                    }}
                    *</label>
                  <small v-if="errors.length" class="text-cape-palliser">{{ errors[0] }}</small>
                </div>
                <input type="text" class="font-secondary bg-white bg-opacity-[80%] w-full h-[45px] px-[15px] rounded-[5px]" v-bind:class="errors.length ? 'border-[2px] border-cape-palliser' : ''" v-model="phone" id="phone">
              </ValidationProvider>
            </div>
            <div class="col-span-2 xl:col-span-1 order-2 xl:order-3">
              <ValidationProvider rules="email_required|email_valid" v-slot="{ errors }">
                <div class="flex">
                  <label for="email" class="font-secondary text-[16px] text-white pr-[15px] pb-[5px]">{{
                      enquiry_label_3
                    }}
                    *</label>
                  <small v-if="errors.length" class="text-cape-palliser">{{ errors[0] }}</small>
                </div>
                <input type="email" class="font-secondary bg-white bg-opacity-[80%] w-full h-[45px] px-[15px] rounded-[5px]" v-bind:class="errors.length ? 'border-[2px] border-cape-palliser' : ''" v-model="email" id="email">
              </ValidationProvider>
            </div>
            <div class="col-span-2 flex flex-wrap items-center justify-end order-4 xl:order-4">
              <div class="xl:pr-[30px]">
                <ValidationProvider rules="tnc_required" v-slot="{ errors }">
                  <label for="tnc" class="checkbox-wrapper">
                    <input type="checkbox" class="checkbox-input" v-model="tnc" id="tnc">
                    <div class="checkbox-control"></div>
                    <div class="checkbox-label pr-[15px]">{{ enquiry_tnc_content_1a }} <a class="checkbox-label text-cape-palliser" v-bind:href="enquiry_tnc_content_1_page" target="_blank">{{ enquiry_tnc_content_1b }}</a> {{ enquiry_tnc_content_1c }}</div>
                    <small v-if="errors.length" class="text-cape-palliser">{{ errors[0] }}</small>
                  </label>
                </ValidationProvider>
              </div>
              <div v-on:click="onSubmit" class="flex items-center">
                <div class="inline-block font-secondary text-white text-[16px] px-[30px] py-[5px] border-[1px] border-white rounded-[30px] mr-[5px] cursor-pointer transition-all ease-in-out duration-300 hover:text-black hover:bg-cape-palliser hover:border-cape-palliser">
                  {{ enquiry_label_5 }}
                </div>
                <div class="w-[20px] h-[20px]">
                  <svg v-if="loading" class="animate-spin ml-[5px] w-full h-full text-cape-palliser-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </form>
      </ValidationObserver>
    </div>
  </div>
</template>
<script>
import { extend, ValidationProvider, ValidationObserver } from 'vee-validate';
import { required, email } from 'vee-validate/dist/rules';
import axios from 'axios';

extend('name_required', {
  ...required,
  message: 'Please enter your name'
});

extend('phone_required', {
  ...required,
  message: 'Please enter your phone number'
});

extend('email_required', {
  ...required,
  message: 'Please enter your email address'
});

extend('email_valid', {
  ...email,
  message: 'Please enter a valid email address'
});

extend('message_required', {
  ...required,
  message: 'Please enter your message'
});

extend('tnc_required', {
  ...required,
  message: 'Please accept the terms and conditions'
});

export default {
  name: 'ContactForm',
  components: {
    ValidationProvider,
    ValidationObserver,
  },
  data () {
    return {
      wp_ajax: window.contact_script_data.wp_ajax,
      wp_nonce: window.contact_script_data.wp_nonce,
      enquiry_title: window.contact_script_data.enquiry_title,
      enquiry_content: window.contact_script_data.enquiry_content,
      enquiry_label_1: window.contact_script_data.enquiry_label_1,
      enquiry_label_2: window.contact_script_data.enquiry_label_2,
      enquiry_label_3: window.contact_script_data.enquiry_label_3,
      enquiry_label_4: window.contact_script_data.enquiry_label_4,
      enquiry_label_5: window.contact_script_data.enquiry_label_5,
      enquiry_tnc_content_1a: window.contact_script_data.enquiry_tnc_content_1a,
      enquiry_tnc_content_1b: window.contact_script_data.enquiry_tnc_content_1b,
      enquiry_tnc_content_1c: window.contact_script_data.enquiry_tnc_content_1c,
      enquiry_tnc_content_1_page: window.contact_script_data.enquiry_tnc_content_1_page,
      name: '',
      phone: '',
      email: '',
      message: '',
      tnc: '',
      recaptcha_token: '',
      loading: false,
    };
  },
  methods: {
    async onSubmit () {
      await this.$recaptchaLoaded();
      this.recaptcha_token = await this.$recaptcha('submit_contact_form');
      this.$refs.formObserver.validate().then(success => {
        if (success) {
          this.loading = true;
          let formData = new FormData();
          formData.append('wp_nonce', this.wp_nonce);
          formData.append('action', 'submit_contact_form');
          formData.append('name', this.name);
          formData.append('phone', this.phone);
          formData.append('email', this.email);
          formData.append('message', this.message);
          formData.append('tnc', this.tnc);
          formData.append('recaptcha_token', this.recaptcha_token);
          axios({
            method: 'POST',
            url: this.wp_ajax,
            headers: {
              'Content-Type': 'multipart/form-data'
            },
            data: formData,
          }).then(response => {
            if (response.data.status === 1) {
              this.$swal('Sent', response.data.message, 'success');
              this.name = this.phone = this.email = this.message = this.tnc = '';
              this.$nextTick(() => {
                this.$refs.formObserver.reset();
              });
            } else {
              this.$swal('Error', response.data.message, 'error');
            }
            this.loading = false;
          });
        }
      });
      this.loading = false;
    },
  },
};
</script>
<style scoped lang="scss">
.checkbox-wrapper {
  @apply inline-flex items-center justify-start cursor-pointer relative overflow-x-hidden;

  .checkbox-control {
    @apply bg-white bg-opacity-[80%] rounded-[5px] w-[20px] h-[20px] mr-[15px];
  }

  .checkbox-input {
    @apply bg-transparent w-[20px] h-[20px] opacity-0 cursor-pointer absolute;

    &:checked {
      + .checkbox-control {
        &:before {
          content: "";
          @apply bg-cape-palliser w-[15px] h-[15px] rounded-[5px] absolute transform translate-y-[2.5px] translate-x-[2.5px];
        }
      }
    }
  }

  .checkbox-label {
    font-family: roboto, sans-serif;
    @apply font-light text-[14px] text-gallery;
  }
}
</style>
