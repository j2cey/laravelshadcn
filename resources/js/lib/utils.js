import { clsx } from "clsx";
import { twMerge } from "tailwind-merge";
import { Updater } from '@tanstack/vue-table'
import { ClassValue } from 'clsx'

import { Ref } from 'vue'

export function cn(...inputs) {
  return twMerge(clsx(inputs));
}

export function valueUpdater(updaterOrValue, ref) {
  ref.value = typeof updaterOrValue === 'function'
    ? updaterOrValue(ref.value)
    : updaterOrValue
}