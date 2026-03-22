<template>
	<AdminLayout>

		<Head title="Site Settings" />

		<form class="space-y-8" @submit.prevent="save">
			<section class="grid gap-6 xl:grid-cols-2">
				<div class="rounded-[2rem] border border-white/10 bg-white/5 p-6">
					<div class="text-xs uppercase tracking-[0.3em] text-slate-500">Brand</div>
					<h2 class="mt-2 text-xl font-semibold text-white">Identity and copy</h2>

					<div class="mt-6 space-y-5">
						<div>
							<label class="mb-2 block text-sm font-medium text-slate-300">Owner name</label>
							<input v-model="form.owner_name" type="text" placeholder="Your full name" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20" />
							<p v-if="form.errors.owner_name" class="mt-2 text-sm text-rose-300">{{ form.errors.owner_name }}</p>
						</div>

						<div>
							<label class="mb-2 block text-sm font-medium text-slate-300">Headline</label>
							<input v-model="form.headline" type="text" placeholder="Short intro headline" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20" />
						</div>

						<div>
							<label class="mb-2 block text-sm font-medium text-slate-300">Description</label>
							<textarea v-model="form.description" rows="6" placeholder="Describe who you are and what you do." class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20"></textarea>
						</div>

						<div>
							<label class="mb-2 block text-sm font-medium text-slate-300">Footer</label>
							<textarea v-model="form.footer" rows="3" placeholder="Short footer text shown on the site." class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20"></textarea>
						</div>
					</div>
				</div>

				<div class="rounded-[2rem] border border-white/10 bg-white/5 p-6">
					<div class="text-xs uppercase tracking-[0.3em] text-slate-500">Contact</div>
					<h2 class="mt-2 text-xl font-semibold text-white">Visibility and contact data</h2>

					<div class="mt-6 space-y-5">
						<ToggleSwitch v-model="form.show_blog" label="Show blog section" :error="form.errors.show_blog" />

						<ToggleSwitch v-model="form.show_profile_picture" label="Show profile picture" :error="form.errors.show_profile_picture" />

						<div>
							<label class="mb-2 block text-sm font-medium text-slate-300">Contact phone</label>
							<input v-model="form.contact_phone" type="text" placeholder="+62 812 3456 7890" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20" />
						</div>

						<div>
							<label class="mb-2 block text-sm font-medium text-slate-300">Contact email</label>
							<input v-model="form.contact_email" type="email" placeholder="hello@example.com" class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20" />
						</div>

						<FileUploadField label="Profile picture" accept="image/*" :existing-url="settings.profile_picture_url" button-label="Upload profile picture" helper-text="PNG, JPG, or WEBP recommended. Best displayed as a square image." :error="form.errors.profile_picture" @change="file => handleFile(file, 'profile_picture')" />

						<FileUploadField label="Favicon" accept="image/*,.ico,.svg" :existing-url="settings.favicon_url" button-label="Upload favicon" helper-text="ICO, PNG, SVG, or WEBP. Keep it square for best results." :error="form.errors.favicon" @change="file => handleFile(file, 'favicon')" />

						<FileUploadField label="Resume file" :existing-url="settings.resume_file_url" button-label="Upload resume file" helper-text="PDF or document file for download by visitors." :error="form.errors.resume_file" @change="file => handleFile(file, 'resume_file')" />
					</div>
				</div>
			</section>

			<section class="grid gap-6 xl:grid-cols-2">
				<div class="rounded-[2rem] border border-white/10 bg-white/5 p-6">
					<div class="text-xs uppercase tracking-[0.3em] text-slate-500">Social</div>
					<h2 class="mt-2 text-xl font-semibold text-white">Social links JSON</h2>
					<p class="mt-3 text-sm text-slate-400">Keep this as a JSON array of objects with platform, url, and svg fields.</p>

					<textarea v-model="form.social_links_json" rows="14" placeholder='[{"platform":"GitHub","url":"https://github.com/username","svg":"..."}]' class="mt-5 w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 font-mono text-sm text-white outline-none focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20"></textarea>
					<p v-if="form.errors.social_links_json" class="mt-2 text-sm text-rose-300">{{ form.errors.social_links_json }}</p>
				</div>

				<div class="rounded-[2rem] border border-white/10 bg-white/5 p-6">
					<div class="text-xs uppercase tracking-[0.3em] text-slate-500">Preview</div>
					<h2 class="mt-2 text-xl font-semibold text-white">What gets saved</h2>

					<dl class="mt-6 space-y-4 text-sm">
						<div class="flex items-center justify-between gap-4 border-b border-white/5 pb-3">
							<dt class="text-slate-400">Owner name</dt>
							<dd class="font-medium text-white">{{ form.owner_name || '—' }}</dd>
						</div>
						<div class="flex items-center justify-between gap-4 border-b border-white/5 pb-3">
							<dt class="text-slate-400">Headline</dt>
							<dd class="font-medium text-white">{{ form.headline || '—' }}</dd>
						</div>
						<div class="flex items-center justify-between gap-4 border-b border-white/5 pb-3">
							<dt class="text-slate-400">Blog</dt>
							<dd :class="form.show_blog ? 'text-emerald-300' : 'text-slate-500'">{{ form.show_blog ? 'Enabled' : 'Disabled' }}</dd>
						</div>
						<div class="flex items-center justify-between gap-4 border-b border-white/5 pb-3">
							<dt class="text-slate-400">Profile picture</dt>
							<dd :class="form.show_profile_picture ? 'text-emerald-300' : 'text-slate-500'">{{ form.show_profile_picture ? 'Visible' : 'Hidden' }}</dd>
						</div>
					</dl>

					<button type="submit" class="mt-6 inline-flex items-center justify-center gap-2 rounded-2xl bg-amber-400 px-5 py-3 font-semibold text-slate-950 transition hover:bg-amber-300 disabled:cursor-not-allowed disabled:opacity-60" :disabled="form.processing">
						<IconDeviceFloppy class="h-4 w-4" />
						{{ form.processing ? 'Saving...' : 'Save settings' }}
					</button>
				</div>
			</section>
		</form>
	</AdminLayout>
</template>

<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import ToggleSwitch from '@/Components/Form/ToggleSwitch.vue';
import FileUploadField from '@/Components/Form/FileUploadField.vue';
import { IconDeviceFloppy } from '@tabler/icons-vue';

const { settings } = defineProps({
	settings: {
		type: Object,
		required: true,
	},
});

const form = useForm({
	owner_name: settings.owner_name ?? '',
	headline: settings.headline ?? '',
	description: settings.description ?? '',
	footer: settings.footer ?? '',
	contact_phone: settings.contact_phone ?? '',
	contact_email: settings.contact_email ?? '',
	show_blog: !!settings.show_blog,
	show_profile_picture: !!settings.show_profile_picture,
	profile_picture: null,
	favicon: null,
	resume_file: null,
	social_links_json: settings.social_links_json ?? '[]',
});

function handleFile(file, field) {
	form[field] = file;
}

function save() {
	form.post('/admin/settings', {
		preserveScroll: true,
		forceFormData: true,
	});
}
</script>