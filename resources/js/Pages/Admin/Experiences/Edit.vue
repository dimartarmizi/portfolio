<template>
    <AdminLayout>
        <Head title="Edit Experience" />

        <div class="mb-6 flex items-center justify-between gap-4 rounded-[2rem] border border-white/10 bg-white/5 p-5">
            <div>
                <div class="text-xs uppercase tracking-[0.3em] text-slate-500">Experiences</div>
                <h2 class="mt-2 text-xl font-semibold text-white">Edit experience</h2>
            </div>
            <Link href="/admin/experiences" class="rounded-xl border border-white/10 px-4 py-2 text-sm text-slate-200 transition hover:bg-white/5">Back to list</Link>
        </div>

        <ExperienceForm :experience="experience" :submit-url="`/admin/experiences/${experience.id}`" method="put" submit-label="Update experience" />
    </AdminLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import ExperienceForm from '@/Components/Admin/ExperienceForm.vue';

defineProps({
    experience: { type: Object, required: true },
});
</script>