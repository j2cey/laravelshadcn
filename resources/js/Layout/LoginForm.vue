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

import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  class: { type: null, required: false },
});

const form = useForm({
  email: '',
  password: '',
})

const errors = ref({})
const submit = () => {
    form.post('login', {
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
        <CardTitle class="text-xl"> Welcome back </CardTitle>
        <CardDescription>
          Login with your Apple or Google account
        </CardDescription>
      </CardHeader>
      <CardContent>
        <form @submit.prevent="submit">
          <div class="grid gap-6">
            <div class="grid gap-6">
              <div class="grid gap-3">
                <Label for="email">Email</Label>
                <Input id="email" type="email"  :class="{ 'is-invalid': errors.email }" placeholder="m@example.com"  v-model="form.email" required />
                <small><span v-if="errors.email">{{ errors.email }}</span></small>
              </div>
              <div class="grid gap-3">
                <div class="flex items-center">
                  <Label for="password">Password</Label>
                  <a href="#" class="ml-auto text-sm underline-offset-4 hover:underline">
                    Forgot your password?
                  </a>
                </div>
                <Input id="password" type="password" v-model="form.password" :class="{'is-invalid': errors.password}" />
                <small><span v-if="errors.password">{{ errors.password }}</span></small>
              </div>
              <Button type="submit" class="w-full"> Sign in </Button>
            </div>
            <div class="text-center text-sm">
              Don't have an account?
              <Link href="/signup" class="underline underline-offset-4"> Sign up </Link>
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
