<template>
    <div>
        <div class="mb-2 flex items-center justify-between gap-4">
            <label class="block text-sm font-medium text-slate-300">{{ label }}</label>
            <button type="button" class="inline-flex items-center gap-1.5 text-xs font-medium text-amber-300 transition hover:text-amber-200" @click="addItem">
                <IconPlus class="h-3.5 w-3.5" />
                <span>{{ addLabel }}</span>
            </button>
        </div>

        <p v-if="hint" class="mb-3 text-xs text-slate-500">{{ hint }}</p>

        <div class="space-y-3">
            <div v-for="(item, index) in items" :key="`${label}-${index}`" class="flex gap-3">
                <input
                    :value="item"
                    type="text"
                    class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none transition placeholder:text-slate-500 focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20"
                    :placeholder="placeholder"
                    @input="updateItem(index, $event.target.value)"
                />
                <button
                    v-if="items.length > 1"
                    type="button"
                    class="inline-flex items-center gap-2 rounded-2xl border border-white/10 px-4 py-3 text-sm text-slate-300 transition hover:bg-white/5 hover:text-white"
                    @click="removeItem(index)"
                >
                    <IconMinus class="h-4 w-4" />
                    <span>Remove</span>
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue';
import { IconMinus, IconPlus } from '@tabler/icons-vue';

const props = defineProps({
    modelValue: {
        type: Array,
        default: () => [],
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
        default: 'Enter item',
    },
    addLabel: {
        type: String,
        default: 'Add item',
    },
});

const emit = defineEmits(['update:modelValue']);

const items = computed(() => (props.modelValue.length > 0 ? props.modelValue : ['']));

function updateItem(index, value) {
    const nextItems = [...props.modelValue];
    nextItems[index] = value;
    emit('update:modelValue', nextItems);
}

function addItem() {
    emit('update:modelValue', [...props.modelValue, '']);
}

function removeItem(index) {
    const nextItems = [...props.modelValue];
    nextItems.splice(index, 1);
    emit('update:modelValue', nextItems.length > 0 ? nextItems : ['']);
}
</script>