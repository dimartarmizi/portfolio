<template>
	<div class="space-y-3">
		<div class="flex items-end justify-between gap-4">
			<div>
				<label class="block text-sm font-medium text-slate-300">{{ label }}</label>
			</div>
		</div>

		<label class="group block cursor-pointer rounded-3xl border border-dashed border-white/15 bg-gradient-to-br from-slate-950/90 to-slate-900/70 p-4 transition hover:border-amber-400/30 hover:bg-slate-900/90">
			<input ref="inputRef" type="file" class="sr-only" :accept="accept" :multiple="multiple" :disabled="disabled" @change="handleChange" />

			<div class="flex items-center gap-4">
				<div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl border border-white/10 bg-white/5 text-amber-300 transition group-hover:border-amber-400/30 group-hover:bg-amber-400/10">
					<IconUpload class="h-5 w-5" />
				</div>

				<div class="min-w-0 flex-1">
					<div class="text-sm font-semibold text-white">{{ buttonLabel }}</div>
					<div class="mt-1 text-xs leading-5 text-slate-400">{{ helperText }}</div>
				</div>

				<div class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs font-medium text-slate-300">
					Browse
				</div>
			</div>
		</label>

		<p v-if="hint" class="mt-1 text-xs leading-5 text-slate-500">{{ hint }}</p>

		<div v-if="previewItems.length" class="grid gap-3 sm:grid-cols-2">
			<div v-for="item in previewItems" :key="item.id" class="group relative overflow-hidden rounded-2xl border border-white/10 bg-slate-950/55 transition" :class="item.previewUrl ? 'hover:border-amber-400/30 hover:bg-slate-900/70' : ''">
				<component :is="item.previewUrl ? 'a' : 'div'" class="block h-full" :href="item.previewUrl || undefined" :target="item.previewUrl ? '_blank' : undefined" :rel="item.previewUrl ? 'noopener noreferrer' : undefined">
					<div class="aspect-[4/3] bg-slate-900">
						<img v-if="item.isImage" :src="item.previewUrl" :alt="item.name" class="h-full w-full object-cover" />
						<div v-else class="flex h-full w-full items-center justify-center p-4">
							<div class="flex flex-col items-center gap-3 text-center">
								<div class="flex h-16 w-16 items-center justify-center rounded-2xl border border-white/10 bg-white/5 text-amber-300">
									<IconFile class="h-8 w-8" />
								</div>
								<div class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-slate-200">
									{{ item.extension }}
								</div>
								<div class="text-xs leading-5 text-slate-400">{{ item.name }}</div>
							</div>
						</div>
					</div>
					<div class="flex items-center justify-between gap-3 px-3 py-2 text-xs text-slate-400">
						<span class="truncate">{{ item.name }}</span>
						<span v-if="item.isImage" class="rounded-full border border-emerald-400/20 bg-emerald-400/10 px-2 py-1 font-medium text-emerald-300">image</span>
						<span v-else class="rounded-full border border-white/10 bg-white/5 px-2 py-1 font-medium text-slate-300">{{ item.extension }}</span>
					</div>
				</component>

				<button v-if="item.removable" type="button" class="absolute right-2 top-2 inline-flex h-8 w-8 items-center justify-center rounded-full border border-rose-400/20 bg-slate-950/90 text-rose-200 transition hover:border-rose-400/40 hover:bg-rose-400/10" aria-label="Remove selected file" @click.stop="removeItem(item.id)">
					<IconX class="h-4 w-4" />
				</button>
			</div>
		</div>
	</div>
</template>

<script setup>
import { computed, onBeforeUnmount, ref } from 'vue';
import { IconFile, IconUpload, IconX } from '@tabler/icons-vue';

const props = defineProps({
	label: {
		type: String,
		required: true,
	},
	hint: {
		type: String,
		default: '',
	},
	accept: {
		type: String,
		default: '',
	},
	multiple: {
		type: Boolean,
		default: false,
	},
	disabled: {
		type: Boolean,
		default: false,
	},
	existingUrl: {
		type: String,
		default: '',
	},
	existingName: {
		type: String,
		default: '',
	},
	existingMimeType: {
		type: String,
		default: '',
	},
	existingItems: {
		type: Array,
		default: () => [],
	},
	allowExistingRemoval: {
		type: Boolean,
		default: false,
	},
	buttonLabel: {
		type: String,
		default: 'Choose file',
	},
	helperText: {
		type: String,
		default: 'Drop files here or click to browse.',
	},
});

const emit = defineEmits(['change', 'existing-remove']);

const inputRef = ref(null);
const selectedItems = ref([]);
const removedExistingIds = ref([]);

const previewItems = computed(() => {
	const existingItems = resolveExistingItems();

	if (selectedItems.value.length && !props.multiple) {
		return selectedItems.value;
	}

	if (selectedItems.value.length && props.multiple) {
		return [...existingItems, ...selectedItems.value];
	}

	return existingItems;
});

function handleChange(event) {
	const files = Array.from(event.target.files ?? []);

	if (!files.length) {
		if (inputRef.value) {
			inputRef.value.value = '';
		}

		return;
	}

	if (!props.multiple) {
		clearSelectedFiles();
	}

	const nextItems = files.map((file, index) => {
		const isImage = file.type.startsWith('image/');

		return {
			id: `${file.name}-${file.size}-${file.lastModified}-${index}`,
			file,
			name: file.name,
			extension: getExtension(file.name),
			isImage,
			previewUrl: isImage ? URL.createObjectURL(file) : null,
			removable: true,
		};
	});

	selectedItems.value = props.multiple ? [...selectedItems.value, ...nextItems] : nextItems;
	emit('change', props.multiple ? selectedItems.value.map((item) => item.file) : (selectedItems.value[0]?.file ?? null));

	if (inputRef.value) {
		inputRef.value.value = '';
	}
}

function removeItem(id) {
	const existingItem = resolveExistingItems().find((item) => item.id === id);

	if (existingItem) {
		removedExistingIds.value = [...removedExistingIds.value, id];
		emit('existing-remove', existingItem);
		return;
	}

	const index = selectedItems.value.findIndex((item) => item.id === id);

	if (index === -1) {
		return;
	}

	const [removedItem] = selectedItems.value.splice(index, 1);

	if (removedItem?.previewUrl) {
		URL.revokeObjectURL(removedItem.previewUrl);
	}

	emit('change', props.multiple ? selectedItems.value.map((item) => item.file) : (selectedItems.value[0]?.file ?? null));

	if (inputRef.value) {
		inputRef.value.value = '';
	}
}

function resolveExistingItems() {
	const explicitItems = Array.isArray(props.existingItems) ? props.existingItems : [];

	if (explicitItems.length) {
		return explicitItems
			.map((item, index) => resolveExistingItem(item, index))
			.filter((item) => item && !removedExistingIds.value.includes(item.id));
	}

	if (!props.existingUrl) {
		return [];
	}

	const existingName = props.existingName || inferNameFromUrl(props.existingUrl);
	const existingMimeType = props.existingMimeType || inferMimeType(existingName);
	const id = `existing-${existingName}-${props.existingUrl}`;

	if (removedExistingIds.value.includes(id)) {
		return [];
	}

	return [{
		id,
		name: existingName,
		extension: getExtension(existingName),
		isImage: existingMimeType.startsWith('image/') || isImageFile(existingName),
		previewUrl: props.existingUrl,
		removable: props.allowExistingRemoval,
	}];
}

function resolveExistingItem(item, index) {
	if (!item) {
		return null;
	}

	const previewUrl = item.previewUrl || item.url || item.href || '';
	const name = item.name || inferNameFromUrl(previewUrl) || `file-${index + 1}`;
	const mimeType = item.mimeType || inferMimeType(name);
	const id = String(item.id || item.path || previewUrl || `${name}-${index}`);

	return {
		id,
		name,
		extension: item.extension || getExtension(name),
		isImage: item.isImage ?? (mimeType.startsWith('image/') || isImageFile(name)),
		previewUrl,
		removable: item.removable ?? props.allowExistingRemoval,
		path: item.path || item.id || id,
	};
}

function getExtension(filename) {
	const parts = String(filename).split('.');
	if (parts.length <= 1) {
		return 'FILE';
	}

	return parts.pop().toUpperCase();
}

function inferNameFromUrl(url) {
	const path = String(url).split('?')[0];
	const parts = path.split('/').filter(Boolean);
	return parts.length ? parts.pop() : 'file';
}

function inferMimeType(filename) {
	if (isImageFile(filename)) {
		return 'image/*';
	}

	return '';
}

function isImageFile(filename) {
	return /\.(png|jpe?g|gif|webp|bmp|svg|avif)$/i.test(String(filename));
}

function clearSelectedFiles() {
	selectedItems.value.forEach((item) => {
		if (item.previewUrl) {
			URL.revokeObjectURL(item.previewUrl);
		}
	});
	selectedItems.value = [];
}

onBeforeUnmount(() => {
	clearSelectedFiles();
});
</script>