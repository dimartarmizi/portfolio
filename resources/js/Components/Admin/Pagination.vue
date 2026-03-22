<template>
    <nav v-if="links.length > 3" class="mt-6 flex flex-wrap items-center justify-between gap-3">
        <div class="text-sm text-slate-500">
            Showing pagination
        </div>

        <div class="flex flex-wrap gap-2">
            <template v-for="(link, index) in links" :key="`${index}-${link.label}`">
                <Link
                    v-if="link.url"
                    :href="link.url"
                    class="rounded-xl border px-3 py-2 text-sm transition"
                    :class="link.active ? 'border-amber-400/30 bg-amber-400/10 text-white' : 'border-white/10 text-slate-300 hover:bg-white/5 hover:text-white'"
                >
                    <span v-html="link.label"></span>
                </Link>
                <span
                    v-else
                    class="rounded-xl border border-white/10 px-3 py-2 text-sm text-slate-600"
                >
                    <span v-html="link.label"></span>
                </span>
            </template>
        </div>
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    links: {
        type: Array,
        default: () => [],
    },
});
</script>