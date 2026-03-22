<template>
    <section class="rounded-[2rem] border border-white/10 bg-white/5 p-6">
        <div class="flex flex-wrap items-start justify-between gap-4 sm:items-center">
            <div>
                <div v-if="section" class="text-xs uppercase tracking-[0.3em] text-slate-500">{{ section }}</div>
                <h2 class="mt-2 text-xl font-semibold text-white">{{ title }}</h2>
                <p v-if="description" class="mt-2 text-sm text-slate-400">{{ description }}</p>
            </div>

            <div class="flex w-full flex-wrap gap-3 sm:w-auto sm:justify-end">
                <slot name="actions" />
            </div>
        </div>

        <div v-if="$slots.default" class="mt-6">
            <slot />
        </div>
    </section>
</template>

<script setup>
defineProps({
    section: {
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
});
</script>