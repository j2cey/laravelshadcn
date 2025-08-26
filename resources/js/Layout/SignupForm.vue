<script setup>
import { cn } from "@/lib/utils";
import { Button } from '@/components/ui/button';
import {
  Card,
  CardContent,
  CardDescription,
  CardHeader,
  CardTitle,
} from '@/components/ui/card';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';

import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  class: { type: null, required: false },
});

const form = useForm({
  name: '',
  login: '',
  email: '',
  password: '',
  password_confirmation: '',
})

const errors = ref({})
const submit = () => {
    form.post('signup', {
        onError:(error) => {
            errors.value = error;
        }
    })
}
</script>

<template>
  <div :class="cn('flex flex-col gap-6', props.class)">
    <Card>
      <CardHeader class="text-center">
        <CardTitle class="text-xl"> Sign Up </CardTitle>
        <CardDescription>
          Create your Account
        </CardDescription>
      </CardHeader>
      <CardContent>
        <form @submit.prevent="submit">
          <div class="grid gap-6">
            <div class="grid gap-6">
              <div class="grid gap-3">
                <Label for="login">Login</Label>
                <Input id="login" :class="{'is-invalid': errors.login}" v-model="form.login" placeholder="User Login" required autocomplete="false" autofocus />
                <small><span v-if="errors.login">{{ errors.login }}</span></small>
              </div>
              <div class="grid gap-3">
                <Label for="login">User Name</Label>
                <Input id="name" :class="{'is-invalid': errors.name}" placeholder="Name" v-model="form.name" required />
                <small><span v-if="errors.name">{{ errors.name }}</span></small>
              </div>
              <div class="grid gap-3">
                <Label for="login">Email</Label>
                <Input id="email" type="email"  :class="{'is-invalid': errors.email}" placeholder="m@example.com"  v-model="form.email" required />
                <small><span v-if="errors.email">{{ errors.email }}</span></small>
              </div>
              <div class="grid gap-3">
                <div class="flex items-center"><Label for="password">Password</Label></div>
                <Input id="password" type="password" v-model="form.password" :class="{'is-invalid': errors.password}" />
                <small><span v-if="errors.password">{{ errors.password }}</span></small>
              </div>
              <div class="grid gap-3">
                <div class="flex items-center"><Label for="password_confirmation">Password Confirmation</Label></div>
                <Input id="password_confirmation" type="password" v-model="form.password_confirmation" :class="{'is-invalid': errors.password_confirmation}" />
                <small><span v-if="errors.password_confirmation">{{ errors.password_confirmation }}</span></small>
              </div>
              <Button type="submit" class="w-full"> Create an account </Button>
            </div>
            <div class="text-center text-sm">
              Already have an account?
              <Link href="/login" class="underline underline-offset-4"> Sign in </Link>
            </div>
          </div>
        </form>
      </CardContent>
    </Card>
    <div
      class="text-muted-foreground *:[a]:hover:text-primary text-center text-xs text-balance *:[a]:underline *:[a]:underline-offset-4"
    >
      By clicking continue, you agree to our
      <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.
    </div>
  </div>
</template>
