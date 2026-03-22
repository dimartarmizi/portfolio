<template>
    <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
        <div>
            <div v-if="eyebrow" class="text-xs uppercase tracking-[0.3em] text-slate-500">{{ eyebrow }}</div>
            <h2 class="mt-2 font-semibold text-slate-200" :class="compact ? 'text-lg' : 'text-xl'">{{ title }}</h2>
            <p v-if="description" class="mt-2 text-sm text-slate-400">{{ description }}</p>
        </div>

        <div v-if="$slots.actions" class="flex items-center gap-3">
            <slot name="actions" />
        </div>
    </div>
</template>

<script setup>
defineProps({
    eyebrow: {
        type: String,
        default: '',
    },
    title: {
        type: String,
        required: true,
    },
    description: {
        type: String,
        default: '',
    },
    compact: {
        type: Boolean,
        default: false,
    },
});
</script>