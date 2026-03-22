<template>
	<AdminLayout>

		<Head title="Experiences" />

		<SectionHeader section="Experiences" title="Career timeline records" description="Manage work history shown on the public portfolio.">
			<template #actions>
					<Link href="/admin/content" class="inline-flex items-center gap-2 rounded-xl border border-white/10 px-4 py-2 text-sm text-slate-200 transition hover:bg-white/5">
						<IconArrowLeft class="h-4 w-4" />
						<span>Content hub</span>
					</Link>
					<Link href="/admin/experiences/create" class="inline-flex items-center gap-2 rounded-xl bg-amber-400 px-4 py-2 text-sm font-semibold text-slate-950 transition hover:bg-amber-300">
						<IconPlus class="h-4 w-4" />
						<span>New experience</span>
					</Link>
			</template>

			<form class="mt-6 grid gap-4 xl:grid-cols-[2fr_1fr_auto]" @submit.prevent="applyFilters">
				<div>
					<label class="mb-2 block text-sm font-medium text-slate-300">Search</label>
					<input v-model="filters.search" type="search" placeholder="Position, company, location, or description" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20" />
				</div>

				<SelectField v-model="filters.employment_type" label="Employment type">
					<option value="all">All types</option>
					<option v-for="type in filterOptions.employment_types" :key="type" :value="type">{{ type }}</option>
				</SelectField>

				<div class="flex items-end gap-2">
					<button type="submit" class="inline-flex items-center gap-2 rounded-2xl bg-amber-400 px-4 py-3 text-sm font-semibold text-slate-950 transition hover:bg-amber-300">
						<IconSearch class="h-4 w-4" />
						<span>Apply</span>
					</button>
					<button type="button" class="inline-flex items-center gap-2 rounded-2xl border border-white/10 px-4 py-3 text-sm text-slate-200 transition hover:bg-white/5" @click="resetFilters">
						<IconRefresh class="h-4 w-4" />
						<span>Reset</span>
					</button>
				</div>
			</form>

			<div class="mt-6 overflow-x-auto rounded-2xl border border-white/10">
				<table class="min-w-[820px] w-full text-left text-sm">
					<thead class="bg-slate-900/80 text-slate-400">
						<tr>
							<th class="px-4 py-3 font-medium">Position</th>
							<th class="px-4 py-3 font-medium">Company</th>
							<th class="px-4 py-3 font-medium">Type</th>
							<th class="px-4 py-3 font-medium">Start</th>
							<th class="px-4 py-3 font-medium">End</th>
							<th class="px-4 py-3 font-medium text-right">Actions</th>
						</tr>
					</thead>
					<tbody class="divide-y divide-white/5 bg-slate-950/50">
						<tr v-for="experience in experiences" :key="experience.id">
							<td class="px-4 py-3 text-white">{{ experience.position }}</td>
							<td class="px-4 py-3 text-slate-300">{{ experience.company }}</td>
							<td class="px-4 py-3 text-slate-300">{{ experience.employment_type }}</td>
							<td class="px-4 py-3 text-slate-500">{{ experience.start_date || '—' }}</td>
							<td class="px-4 py-3 text-slate-500">{{ experience.end_date || 'Present' }}</td>
							<td class="px-4 py-3">
								<div class="flex justify-end gap-2">
									<Link :href="`/admin/experiences/${experience.id}/edit`" class="inline-flex items-center gap-2 rounded-lg border border-white/10 px-3 py-2 text-xs text-slate-200 transition hover:bg-white/5">
										<IconEdit class="h-3.5 w-3.5" />
										<span>Edit</span>
									</Link>
									<button type="button" class="inline-flex items-center gap-2 rounded-lg border border-rose-400/20 px-3 py-2 text-xs text-rose-200 transition hover:bg-rose-400/10" @click="destroyExperience(experience.id)">
										<IconTrash class="h-3.5 w-3.5" />
										<span>Delete</span>
									</button>
								</div>
							</td>
						</tr>
						<tr v-if="!experiences.length">
							<td colspan="6" class="px-4 py-8 text-center text-sm text-slate-400">No experiences found.</td>
						</tr>
					</tbody>
				</table>
			</div>

			<Pagination :links="experiencesMeta.links ?? []" />
		</SectionHeader>
	</AdminLayout>
</template>

<script setup>
import { computed, reactive } from 'vue';
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import SectionHeader from '@/Components/Admin/SectionHeader.vue';
import Pagination from '@/Components/Admin/Pagination.vue';
import SelectField from '@/Components/Form/SelectField.vue';
import { IconArrowLeft, IconEdit, IconPlus, IconRefresh, IconSearch, IconTrash } from '@tabler/icons-vue';

const page = usePage();
const experiencesMeta = computed(() => page.props.experiences ?? { data: [], links: [] });
const experiences = computed(() => experiencesMeta.value.data ?? []);
const filterOptions = computed(() => page.props.filterOptions ?? { employment_types: ['all'] });
const initialFilters = page.props.filters ?? { search: '', employment_type: 'all' };

const filters = reactive({
	search: initialFilters.search ?? '',
	employment_type: initialFilters.employment_type ?? 'all',
});

function applyFilters() {
	router.get('/admin/experiences', { ...filters }, {
		preserveScroll: true,
		preserveState: true,
		replace: true,
	});
}

function resetFilters() {
	filters.search = '';
	filters.employment_type = 'all';
	applyFilters();
}

function destroyExperience(id) {
	if (!window.confirm('Delete this experience?')) {
		return;
	}

	router.delete(`/admin/experiences/${id}`, {
		preserveScroll: true,
	});
}
</script>