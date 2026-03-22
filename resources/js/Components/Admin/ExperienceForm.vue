<template>
    <form class="space-y-8" @submit.prevent="submit">
        <section class="grid gap-6 xl:grid-cols-2">
            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6">
                <div class="text-xs uppercase tracking-[0.3em] text-slate-500">Experience</div>
                <h2 class="mt-2 text-xl font-semibold text-white">Core details</h2>

                <div class="mt-6 space-y-5">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-300">Position</label>
                        <input v-model="form.position" type="text" placeholder="Frontend Developer" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20" />
                        <p v-if="form.errors.position" class="mt-2 text-sm text-rose-300">{{ form.errors.position }}</p>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-300">Company</label>
                        <input v-model="form.company" type="text" placeholder="Company name" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20" />
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-300">Company link</label>
                        <input v-model="form.company_link" type="url" placeholder="https://company.com" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20" />
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-300">Location</label>
                            <input v-model="form.location" type="text" placeholder="City, country, or remote" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20" />
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-300">Employment type</label>
                            <select v-model="form.employment_type" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20">
                                <option value="Full-time">Full-time</option>
                                <option value="Part-time">Part-time</option>
                                <option value="Contract">Contract</option>
                                <option value="Internship">Internship</option>
                                <option value="Freelance">Freelance</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-300">Start date</label>
                            <input v-model="form.start_date" type="date" placeholder="YYYY-MM-DD" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20" />
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-300">End date</label>
                            <input v-model="form.end_date" type="date" placeholder="YYYY-MM-DD" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6">
                <div class="text-xs uppercase tracking-[0.3em] text-slate-500">Details</div>
                <h2 class="mt-2 text-xl font-semibold text-white">Description and JSON lists</h2>

                <div class="mt-6 space-y-5">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-300">Description</label>
                        <textarea v-model="form.description" rows="6" placeholder="Summarize your responsibilities and achievements." class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20"></textarea>
                    </div>

                    <MultiTextListInput v-model="form.highlights" label="Highlights" hint="Add one achievement or responsibility per line." placeholder="Highlight text" add-label="Add highlight" />

                    <MultiTextListInput v-model="form.tech_stack" label="Tech stack" hint="Add one stack item per line, such as Laravel, Vue, or Tailwind." placeholder="Stack item" add-label="Add stack item" />
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
import MultiTextListInput from '@/Components/Admin/MultiTextListInput.vue';
import { IconArrowLeft, IconDeviceFloppy } from '@tabler/icons-vue';

const props = defineProps({
    experience: { type: Object, required: true },
    submitUrl: { type: String, required: true },
    method: { type: String, default: 'post' },
    submitLabel: { type: String, default: 'Save experience' },
    backUrl: { type: String, default: '/admin/experiences' },
});

const form = useForm({
    position: props.experience.position ?? '',
    company: props.experience.company ?? '',
    company_link: props.experience.company_link ?? '',
    location: props.experience.location ?? '',
    start_date: props.experience.start_date ?? '',
    end_date: props.experience.end_date ?? '',
    employment_type: props.experience.employment_type ?? 'Full-time',
    description: props.experience.description ?? '',
    highlights: normalizeList(props.experience.highlights ?? []),
    tech_stack: normalizeList(props.experience.tech_stack ?? []),
});

function normalizeList(values) {
    const items = Array.isArray(values) ? values : [];
    const normalized = items
        .map((value) => (typeof value === 'string' ? value : String(value ?? '')).trim())
        .filter((value) => value !== '');

    return normalized.length ? normalized : [''];
}

function submit() {
    const options = {
        preserveScroll: true,
    };

    if (props.method === 'put') {
        form.put(props.submitUrl, options);
        return;
    }

    form.post(props.submitUrl, options);
}
</script>