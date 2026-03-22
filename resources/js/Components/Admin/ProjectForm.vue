<template>
    <form class="space-y-8" @submit.prevent="submit">
        <section class="grid gap-6 xl:grid-cols-2">
            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6">
                <div class="text-xs uppercase tracking-[0.3em] text-slate-500">Project</div>
                <h2 class="mt-2 text-xl font-semibold text-white">Core details</h2>

                <div class="mt-6 space-y-5">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-300">Title</label>
                        <input v-model="form.title" type="text" placeholder="Project title" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20" />
                        <p v-if="form.errors.title" class="mt-2 text-sm text-rose-300">{{ form.errors.title }}</p>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-300">Slug</label>
                        <input v-model="form.slug" type="text" placeholder="project-title-slug" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20" />
                        <p v-if="form.errors.slug" class="mt-2 text-sm text-rose-300">{{ form.errors.slug }}</p>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-300">Year</label>
                            <input v-model="form.year" type="number" min="1900" max="2100" placeholder="2026" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20" />
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-300">Made at</label>
                            <input v-model="form.made_at" type="text" placeholder="Company, agency, or client" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20" />
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-300">Link</label>
                        <input v-model="form.link" type="url" placeholder="https://example.com" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20" />
                        <p v-if="form.errors.link" class="mt-2 text-sm text-rose-300">{{ form.errors.link }}</p>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-300">Status</label>
                        <select v-model="form.status" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20">
                            <option value="completed">completed</option>
                            <option value="ongoing">ongoing</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6">
                <div class="text-xs uppercase tracking-[0.3em] text-slate-500">Assets</div>
                <h2 class="mt-2 text-xl font-semibold text-white">Images and rich data</h2>

                <div class="mt-6 space-y-5">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-300">Thumbnail</label>
                        <input type="file" accept="image/*" class="w-full rounded-2xl border border-dashed border-white/15 bg-slate-950/70 px-4 py-3 text-sm text-slate-300" @change="event => handleFile(event, 'thumbnail')" />
                        <div class="mt-4 overflow-hidden rounded-2xl border border-white/10 bg-slate-950/50">
                            <div class="aspect-[16/9] bg-slate-900">
                                <img v-if="thumbnailPreview" :src="thumbnailPreview" :alt="`${project.title || 'Project'} thumbnail preview`" class="h-full w-full object-cover" />
                                <div v-else-if="project.thumbnail_url" class="flex h-full w-full items-center justify-center text-sm text-slate-500">Current thumbnail preview</div>
                                <div v-else class="flex h-full w-full items-center justify-center text-sm text-slate-500">No thumbnail selected</div>
                            </div>
                        </div>
                        <p class="mt-2 text-xs text-slate-500">Current file: <a v-if="project.thumbnail_url" :href="project.thumbnail_url" target="_blank" rel="noopener noreferrer" class="text-amber-300 hover:text-amber-200">open file</a><span v-else>none</span></p>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-300">Gallery images</label>
                        <input multiple type="file" accept="image/*" class="w-full rounded-2xl border border-dashed border-white/15 bg-slate-950/70 px-4 py-3 text-sm text-slate-300" @change="handleGalleryChange" />
                        <p class="mt-2 text-xs text-slate-500">Upload multiple images at once. New uploads will be added to the current gallery.</p>

                        <div v-if="existingGallery.length" class="mt-4 grid gap-3 sm:grid-cols-2">
                            <div v-for="(image, index) in existingGallery" :key="`${image}-${index}`" class="overflow-hidden rounded-2xl border border-white/10 bg-slate-950/50">
                                <div class="aspect-[4/3] bg-slate-900">
                                    <img :src="image" :alt="`${project.title} gallery ${index + 1}`" class="h-full w-full object-cover" />
                                </div>
                                <div class="px-3 py-2 text-xs text-slate-400">Current image {{ index + 1 }}</div>
                            </div>
                        </div>

                        <div v-if="selectedGalleryPreviews.length" class="mt-4 grid gap-3 sm:grid-cols-2 xl:grid-cols-3">
                            <div v-for="(item, index) in selectedGalleryPreviews" :key="`${item.file.name}-${index}`" class="overflow-hidden rounded-2xl border border-white/10 bg-slate-950/50">
                                <div class="aspect-[4/3] bg-slate-900">
                                    <img :src="item.previewUrl" :alt="item.file.name" class="h-full w-full object-cover" />
                                </div>
                                <div class="flex items-center justify-between gap-3 px-3 py-2 text-xs text-slate-400">
                                    <span class="truncate">{{ item.file.name }}</span>
                                    <button type="button" class="inline-flex items-center gap-1.5 text-rose-300 transition hover:text-rose-200" @click="removeGalleryFile(index)">
                                        <IconTrash class="h-3.5 w-3.5" />
                                        <span>Remove</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-300">Description</label>
                        <textarea v-model="form.description" rows="6" placeholder="Describe the project, goals, scope, and outcome." class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20"></textarea>
                    </div>

                    <MultiTextListInput v-model="form.technologies" label="Technologies" hint="Add one technology per row, such as Laravel, Vue, or Tailwind." placeholder="Technology name" add-label="Add technology" />

                    <MultiTextListInput v-model="form.features" label="Features" hint="Use this for feature bullets shown on the project detail page." placeholder="Feature text" add-label="Add feature" />

                    <MultiTextListInput v-model="form.results" label="Results" hint="Use this for outcome or impact bullets." placeholder="Result text" add-label="Add result" />
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
import { computed, onBeforeUnmount, ref } from 'vue';
import { useForm, Link } from '@inertiajs/vue3';
import MultiTextListInput from '@/Components/Admin/MultiTextListInput.vue';
import { IconArrowLeft, IconDeviceFloppy, IconTrash } from '@tabler/icons-vue';

const props = defineProps({
    project: { type: Object, required: true },
    submitUrl: { type: String, required: true },
    method: { type: String, default: 'post' },
    submitLabel: { type: String, default: 'Save project' },
    backUrl: { type: String, default: '/admin/projects' },
});

const form = useForm({
    title: props.project.title ?? '',
    slug: props.project.slug ?? '',
    year: props.project.year ?? '',
    made_at: props.project.made_at ?? '',
    description: props.project.description ?? '',
    link: props.project.link ?? '',
    status: props.project.status ?? 'completed',
    thumbnail: null,
    gallery_files: [],
    technologies: normalizeList(props.project.technologies ?? []),
    features: normalizeList(props.project.features ?? []),
    results: normalizeList(props.project.results ?? []),
});

const existingGallery = computed(() => props.project.gallery_urls ?? []);
const thumbnailPreview = ref(null);
const selectedGalleryPreviews = ref([]);

function handleFile(event, field) {
    const file = event.target.files && event.target.files[0] ? event.target.files[0] : null;

    if (field === 'thumbnail') {
        if (thumbnailPreview.value) {
            URL.revokeObjectURL(thumbnailPreview.value);
            thumbnailPreview.value = null;
        }

        form[field] = file;

        if (file) {
            thumbnailPreview.value = URL.createObjectURL(file);
        }

        return;
    }

    form[field] = file;
}

function handleGalleryChange(event) {
    const files = Array.from(event.target.files ?? []);

    if (!files.length) {
        return;
    }

    const previewItems = files.map((file) => ({
        file,
        previewUrl: URL.createObjectURL(file),
    }));

    form.gallery_files = [...form.gallery_files, ...files];
    selectedGalleryPreviews.value = [...selectedGalleryPreviews.value, ...previewItems];
    event.target.value = '';
}

function removeGalleryFile(index) {
    const [removed] = selectedGalleryPreviews.value.splice(index, 1);

    if (removed?.previewUrl) {
        URL.revokeObjectURL(removed.previewUrl);
    }

    const nextFiles = [...form.gallery_files];
    nextFiles.splice(index, 1);
    form.gallery_files = nextFiles;
}

onBeforeUnmount(() => {
    if (thumbnailPreview.value) {
        URL.revokeObjectURL(thumbnailPreview.value);
    }

    selectedGalleryPreviews.value.forEach((item) => {
        URL.revokeObjectURL(item.previewUrl);
    });
});

function normalizeList(values) {
    const items = Array.isArray(values) ? values : [];
    const normalized = items
        .map((value) => normalizeListItem(value))
        .filter((value) => value !== null && value !== '');

    return normalized.length ? normalized : [''];
}

function normalizeListItem(value) {
    if (typeof value === 'string' || typeof value === 'number') {
        const text = String(value).trim();

        return text !== '' ? text : null;
    }

    if (Array.isArray(value)) {
        for (const item of value) {
            const text = normalizeListItem(item);

            if (text) {
                return text;
            }
        }
    }

    if (value && typeof value === 'object') {
        for (const key of ['name', 'title', 'label', 'text', 'value']) {
            if (Object.prototype.hasOwnProperty.call(value, key)) {
                const text = normalizeListItem(value[key]);

                if (text) {
                    return text;
                }
            }
        }

        for (const item of Object.values(value)) {
            const text = normalizeListItem(item);

            if (text) {
                return text;
            }
        }
    }

    return null;
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