<template>
  <div>
    <ValidationObserver ref="formObserver">
      <form v-on:submit.prevent="onSubmit">
        <div>
          <ValidationProvider rules="name_required" v-slot="{ errors }">
            <input type="text" class="" v-model="name" v-bind:class="errors.length ? 'placeholder-red-500' : 'placeholder-blue-500'" :placeholder="errors.length ? errors[0] : 'Name*'">
          </ValidationProvider>
        </div>
        <div>
          <ValidationProvider rules="phone_required" v-slot="{ errors }">
            <input type="text" class="" v-model="phone" v-bind:class="errors.length ? 'placeholder-red-500' : 'placeholder-blue-500'" :placeholder="errors.length ? errors[0] : 'Phone*'">
          </ValidationProvider>
        </div>
        <div>
          <ValidationProvider rules="email_required|email_valid" v-slot="{ errors }">
            <input type="email" class="" v-model="email" v-bind:class="errors.length ? 'placeholder-red-500' : 'placeholder-blue-500'" :placeholder="errors.length ? errors[0] : 'Email*'">
          </ValidationProvider>
        </div>
        <div>
          <ValidationProvider v-slot="{ errors }">
            <textarea rows="6" class="" v-model="message" v-bind:class="errors.length ? 'placeholder-red-500' : 'placeholder-blue-500'" :placeholder="errors.length ? errors[0] : 'Type your message here'"></textarea>
          </ValidationProvider>
        </div>
          <div v-on:click="onSubmit" class="">
            <div>Submit</div>
            <svg v-if="loading" class="animate-spin ml-[5px] w-[20px] h-[20px] text-orewa-black-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
          </div>
      </form>
    </ValidationObserver>
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
      name: '',
      phone: '',
      email: '',
      message: '',
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
              this.name = this.phone = this.email = this.message = '';
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
</style>
