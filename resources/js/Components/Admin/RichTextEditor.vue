<template>
	<div class="space-y-3">
		<div class="flex items-end justify-between gap-4">
			<div>
				<label class="block text-sm font-medium text-slate-300">{{ label }}</label>
				<p v-if="hint" class="mt-1 text-xs leading-5 text-slate-500">{{ hint }}</p>
			</div>
		</div>

		<div class="quill-shell overflow-hidden rounded-2xl border border-white/10 bg-slate-950/80">
			<QuillEditor
				v-model:content="content"
				content-type="html"
				theme="snow"
				:placeholder="placeholder"
				:toolbar="toolbar"
				class="quill-editor"
			/>
		</div>

		<p v-if="error" class="text-sm text-rose-300">{{ error }}</p>
	</div>
</template>

<script setup>
import { computed } from 'vue';
import { QuillEditor } from '@vueup/vue-quill';
import '@vueup/vue-quill/dist/vue-quill.snow.css';

const props = defineProps({
	modelValue: {
		type: String,
		default: '',
	},
	label: {
		type: String,
		required: true,
	},
	hint: {
		type: String,
		default: '',
	},
	placeholder: {
		type: String,
		default: 'Write your content here.',
	},
	error: {
		type: String,
		default: '',
	},
});

const emit = defineEmits(['update:modelValue']);

const content = computed({
	get: () => props.modelValue || '',
	set: (value) => {
		emit('update:modelValue', normalizeHtml(value));
	},
});

const toolbar = [
	[{ header: [2, 3, false] }],
	['bold', 'italic', 'underline', 'link'],
	[{ list: 'ordered' }, { list: 'bullet' }],
	['clean'],
];

function normalizeHtml(value) {
	const html = String(value ?? '').trim();

	if (!html || html === '<p><br></p>' || html === '<div><br></div>') {
		return '';
	}

	return html;
}
</script>

<style scoped>
.quill-shell :deep(.ql-toolbar.ql-snow) {
	border: 0;
	border-bottom: 1px solid rgba(255, 255, 255, 0.1);
	background: rgba(255, 255, 255, 0.04);
	padding: 0.75rem;
}

.quill-shell :deep(.ql-container.ql-snow) {
	border: 0;
	font-family: inherit;
	color: #e2e8f0;
	background: rgba(2, 6, 23, 0.75);
	min-height: 24rem;
}

.quill-shell :deep(.ql-editor) {
	min-height: 24rem;
	padding: 1rem 1rem 1.25rem;
	font-size: 0.95rem;
	line-height: 1.85;
	color: #e2e8f0;
}

.quill-shell :deep(.ql-editor.ql-blank::before) {
	color: #64748b;
	font-style: normal;
	left: 1rem;
}

.quill-shell :deep(.ql-snow.ql-toolbar button:hover),
.quill-shell :deep(.ql-snow .ql-toolbar button:hover),
.quill-shell :deep(.ql-snow.ql-toolbar button:focus),
.quill-shell :deep(.ql-snow .ql-toolbar button:focus) {
	color: #fef3c7;
}

.quill-shell :deep(.ql-snow .ql-picker) {
	color: #cbd5e1;
}

.quill-shell :deep(.ql-snow .ql-stroke) {
	stroke: #cbd5e1;
}

.quill-shell :deep(.ql-snow .ql-fill) {
	fill: #cbd5e1;
}

.quill-shell :deep(.ql-snow .ql-picker-options) {
	background: #0f172a;
	border-color: rgba(255, 255, 255, 0.12);
}

.quill-shell :deep(.ql-editor h2),
.quill-shell :deep(.ql-editor h3) {
	font-weight: 700;
	color: #ffffff;
	margin-top: 1rem;
	margin-bottom: 0.5rem;
}

.quill-shell :deep(.ql-editor h2) {
	font-size: 1.5rem;
	line-height: 2rem;
}

.quill-shell :deep(.ql-editor h3) {
	font-size: 1.25rem;
	line-height: 1.75rem;
}

.quill-shell :deep(.ql-editor p) {
	margin-bottom: 0.75rem;
}

.quill-shell :deep(.ql-editor ul),
.quill-shell :deep(.ql-editor ol) {
	padding-left: 1.5rem;
	margin: 0.75rem 0;
}

.quill-shell :deep(.ql-editor li) {
	margin: 0.35rem 0;
}

.quill-shell :deep(.ql-editor a) {
	color: #fbbf24;
	text-decoration: underline;
	text-underline-offset: 0.18em;
}
</style>