<template>
	<div class="space-y-2">
		<div class="flex items-end justify-between gap-4">
			<div>
				<label class="block text-sm font-medium text-slate-300">{{ label }}</label>
			</div>

			<span v-if="badge" class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs font-medium text-slate-400">
				{{ badge }}
			</span>
		</div>

		<label class="group relative block">
			<select v-model="model" :name="name" :disabled="disabled" :class="selectClass">
				<slot />
			</select>

			<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400 transition group-focus-within:text-amber-300">
				<IconChevronDown class="h-4 w-4" />
			</div>
		</label>

		<p v-if="hint" class="mt-1 text-xs leading-5 text-slate-500">{{ hint }}</p>
		<p v-if="error" class="mt-1 text-sm text-rose-300">{{ error }}</p>
	</div>
</template>

<script setup>
import { computed } from 'vue';
import { IconChevronDown } from '@tabler/icons-vue';

const props = defineProps({
	modelValue: {
		required: true,
	},
	label: {
		type: String,
		required: true,
	},
	hint: {
		type: String,
		default: '',
	},
	badge: {
		type: String,
		default: '',
	},
	name: {
		type: String,
		default: '',
	},
	disabled: {
		type: Boolean,
		default: false,
	},
	error: {
		type: String,
		default: '',
	},
});

const emit = defineEmits(['update:modelValue']);

const model = computed({
	get: () => props.modelValue,
	set: (value) => emit('update:modelValue', value),
});

const selectClass = computed(() => [
	'w-full appearance-none rounded-2xl border bg-slate-950/80 px-4 py-3 pr-12 text-white outline-none transition disabled:cursor-not-allowed disabled:opacity-60',
	props.error
		? 'border-rose-400/40 focus:border-rose-400/60 focus:ring-2 focus:ring-rose-400/20'
		: 'border-white/10 focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20',
]);
</script>