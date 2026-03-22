<template>
	<label class="group flex items-center justify-between gap-4 rounded-2xl border border-white/10 bg-slate-950/60 px-4 py-4 transition hover:border-amber-400/20 hover:bg-slate-950/80">
		<div class="min-w-0">
			<div class="text-sm font-medium text-slate-100">{{ label }}</div>
		</div>

		<span class="relative inline-flex h-8 w-14 shrink-0 items-center">
			<input v-model="model" type="checkbox" class="peer sr-only" :name="name" :disabled="disabled" />
			<span class="absolute inset-0 rounded-full border border-white/10 bg-slate-800/80 transition peer-checked:border-emerald-400/30 peer-checked:bg-emerald-400/25 peer-focus-visible:ring-2 peer-focus-visible:ring-amber-400/30"></span>
			<span class="absolute left-1 top-1 h-6 w-6 rounded-full bg-white shadow-lg shadow-black/30 transition duration-200 peer-checked:translate-x-6 peer-checked:bg-emerald-100"></span>
		</span>
		
		<p v-if="hint" class="mt-1 text-xs leading-5 text-slate-400">{{ hint }}</p>
	</label>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
	modelValue: {
		type: Boolean,
		default: false,
	},
	label: {
		type: String,
		required: true,
	},
	hint: {
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
});

const emit = defineEmits(['update:modelValue']);

const model = computed({
	get: () => props.modelValue,
	set: (value) => emit('update:modelValue', value),
});
</script>