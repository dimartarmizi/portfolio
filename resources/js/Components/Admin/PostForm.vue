<template>
    <form class="space-y-8" @submit.prevent="submit">
        <section class="grid gap-6 xl:grid-cols-2">
            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6">
                <div class="text-xs uppercase tracking-[0.3em] text-slate-500">Post</div>
                <h2 class="mt-2 text-xl font-semibold text-white">Core details</h2>

                <div class="mt-6 space-y-5">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-300">Title</label>
                        <input v-model="form.title" type="text" placeholder="Post title" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20" />
                        <p v-if="form.errors.title" class="mt-2 text-sm text-rose-300">{{ form.errors.title }}</p>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-300">Slug</label>
                        <input v-model="form.slug" type="text" placeholder="post-title-slug" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20" />
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-300">Type</label>
                            <input v-model="form.type" type="text" placeholder="tutorial, news, or opinion" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20" />
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-300">Status</label>
                            <select v-model="form.status" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20">
                                <option value="draft">draft</option>
                                <option value="published">published</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-300">Published at</label>
                        <input v-model="form.published_at" type="datetime-local" placeholder="2026-03-22 14:30" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20" />
                    </div>
                </div>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6">
                <div class="text-xs uppercase tracking-[0.3em] text-slate-500">Content</div>
                <h2 class="mt-2 text-xl font-semibold text-white">Body and cover image</h2>

                <div class="mt-6 space-y-5">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-300">Cover image</label>
                        <input type="file" accept="image/*" class="w-full rounded-2xl border border-dashed border-white/15 bg-slate-950/70 px-4 py-3 text-sm text-slate-300" @change="event => handleFile(event, 'cover_image')" />
                        <p class="mt-2 text-xs text-slate-500">Current file: <a v-if="post.cover_image_url" :href="post.cover_image_url" target="_blank" rel="noopener noreferrer" class="text-amber-300 hover:text-amber-200">open file</a><span v-else>none</span></p>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-300">Content</label>
                        <textarea v-model="form.content" rows="16" placeholder="Write the full article content here." class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20"></textarea>
                    </div>
                </div>
            </div>
        </section>

        <div class="flex flex-wrap items-center justify-between gap-4 rounded-[2rem] border border-white/10 bg-white/5 p-5">
            <Link :href="backUrl" class="inline-flex items-center gap-2 rounded-xl border border-white/10 px-4 py-2 text-sm text-slate-200 transition hover:bg-white/5">
                <IconArrowLeft class="h-4 w-4" />
                <span>Back</span>
            </Link>
            <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-amber-400 px-5 py-3 text-sm font-semibold text-slate-950 transition hover:bg-amber-300 disabled:cursor-not-allowed disabled:opacity-60" :disabled="form.processing">
                <IconDeviceFloppy class="h-4 w-4" />
                {{ form.processing ? 'Saving...' : submitLabel }}
            </button>
        </div>
    </form>
</template>

<script setup>
import { useForm, Link } from '@inertiajs/vue3';
import { IconArrowLeft, IconDeviceFloppy } from '@tabler/icons-vue';

const props = defineProps({
    post: { type: Object, required: true },
    submitUrl: { type: String, required: true },
    method: { type: String, default: 'post' },
    submitLabel: { type: String, default: 'Save post' },
    backUrl: { type: String, default: '/admin/posts' },
});

const form = useForm({
    title: props.post.title ?? '',
    slug: props.post.slug ?? '',
    content: props.post.content ?? '',
    type: props.post.type ?? 'post',
    status: props.post.status ?? 'draft',
    cover_image: null,
    published_at: props.post.published_at ?? '',
});

function handleFile(event, field) {
    form[field] = event.target.files && event.target.files[0] ? event.target.files[0] : null;
}

function submit() {
    const options = {
        preserveScroll: true,
        forceFormData: true,
    };

    if (props.method === 'put') {
        form.put(props.submitUrl, options);
        return;
    }

    form.post(props.submitUrl, options);
}
</script>