<template>
    <AdminLayout>
        <Head title="Create Project" />

        <div class="mb-6 flex items-center justify-between gap-4 rounded-[2rem] border border-white/10 bg-white/5 p-5">
            <div>
                <div class="text-xs uppercase tracking-[0.3em] text-slate-500">Projects</div>
                <h2 class="mt-2 text-xl font-semibold text-white">Create project</h2>
            </div>
            <Link href="/admin/projects" class="rounded-xl border border-white/10 px-4 py-2 text-sm text-slate-200 transition hover:bg-white/5">Back to list</Link>
        </div>

        <ProjectForm :project="project" submit-url="/admin/projects" submit-label="Create project" />
    </AdminLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import ProjectForm from '@/Components/Admin/ProjectForm.vue';

defineProps({
    project: { type: Object, required: true },
});
</script>