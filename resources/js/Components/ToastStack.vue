<template>
    <Teleport to="body">
        <div class="pointer-events-none" style="position: fixed; right: 1rem; bottom: 1rem; z-index: 9999; width: min(24rem, calc(100vw - 2rem));">
            <TransitionGroup
                enter-active-class="transition duration-300 ease-out"
                enter-from-class="translate-y-3 scale-95 opacity-0"
                enter-to-class="translate-y-0 scale-100 opacity-100"
                leave-active-class="transition duration-200 ease-in"
                leave-from-class="translate-y-0 scale-100 opacity-100"
                leave-to-class="translate-y-2 scale-95 opacity-0"
            >
                <div
                    v-for="toast in toasts"
                    :key="toast.id"
                    class="pointer-events-auto overflow-hidden rounded-2xl border bg-slate-950/95 shadow-2xl shadow-slate-950/40 backdrop-blur"
                    :class="toastClasses[toast.type]"
                >
                    <div class="flex items-start gap-3 px-4 py-3">
                        <div class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white/10">
                            <component :is="toastIcons[toast.type]" class="h-5 w-5" />
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="text-sm font-semibold text-white">
                                {{ toast.title }}
                            </div>
                            <div class="mt-1 text-sm leading-5 text-slate-200">
                                {{ toast.message }}
                            </div>
                        </div>
                        <button
                            type="button"
                            class="rounded-lg p-1 text-slate-300 transition hover:bg-white/10 hover:text-white"
                            @click="removeToast(toast.id)"
                        >
                            <IconX class="h-4 w-4" />
                        </button>
                    </div>
                    <div class="h-1 w-full bg-white/5">
                        <div
                            class="h-full origin-left animate-toast-progress"
                            :class="toastProgressClasses[toast.type]"
                            :style="{ animationDuration: `${toast.duration}ms` }"
                        ></div>
                    </div>
                </div>
            </TransitionGroup>
        </div>
    </Teleport>
</template>

<script setup>
import { computed, onBeforeUnmount, ref, watch } from 'vue';
import { usePage } from '@inertiajs/vue3';
import {
    IconCheck,
    IconExclamationCircle,
    IconInfoCircle,
    IconX,
} from '@tabler/icons-vue';

const page = usePage();
const toasts = ref([]);
const timers = new Map();
const lastSignature = ref('');
const lastErrorSignature = ref('');

const toastIcons = {
    success: IconCheck,
    error: IconExclamationCircle,
    warning: IconExclamationCircle,
    info: IconInfoCircle,
};

const toastClasses = {
    success: 'border-emerald-400/20',
    error: 'border-rose-400/20',
    warning: 'border-amber-400/20',
    info: 'border-cyan-400/20',
};

const toastProgressClasses = {
    success: 'bg-emerald-400',
    error: 'bg-rose-400',
    warning: 'bg-amber-400',
    info: 'bg-cyan-400',
};

const flash = computed(() => page.props.flash ?? {});
const validationErrors = computed(() => page.props.errors ?? {});

watch(
    flash,
    (value) => {
        const entries = Object.entries(value ?? {})
            .filter(([, message]) => typeof message === 'string' && message.trim().length > 0)
            .map(([type, message]) => ({ type, message: message.trim() }));

        if (!entries.length) {
            return;
        }

        const signature = JSON.stringify(entries);
        if (signature === lastSignature.value) {
            return;
        }

        lastSignature.value = signature;

        entries.forEach((entry) => pushToast(entry.type, entry.message));
    },
    { immediate: true, deep: true }
);

watch(
    validationErrors,
    (value) => {
        const entries = Object.entries(value ?? {})
            .filter(([, message]) => typeof message === 'string' && message.trim().length > 0)
            .map(([field, message]) => ({ field, message: message.trim() }));

        if (!entries.length) {
            return;
        }

        const signature = JSON.stringify(entries);
        if (signature === lastErrorSignature.value) {
            return;
        }

        lastErrorSignature.value = signature;
        pushToast('warning', 'Please check the form fields and try again.');
    },
    { immediate: true, deep: true }
);

function pushToast(type, message) {
    const id = `${Date.now()}-${Math.random().toString(36).slice(2, 9)}`;
    const normalizedType = ['success', 'error', 'warning', 'info'].includes(type) ? type : 'info';

    toasts.value.unshift({
        id,
        type: normalizedType,
        title: getTitle(normalizedType),
        message,
        duration: 5000,
    });

    if (toasts.value.length > 4) {
        const overflow = toasts.value.splice(4);
        overflow.forEach((toast) => clearToastTimer(toast.id));
    }

    timers.set(
        id,
        window.setTimeout(() => {
            removeToast(id);
        }, 5000)
    );
}

function removeToast(id) {
    clearToastTimer(id);
    toasts.value = toasts.value.filter((toast) => toast.id !== id);
}

function clearToastTimer(id) {
    const timer = timers.get(id);
    if (timer) {
        window.clearTimeout(timer);
        timers.delete(id);
    }
}

function getTitle(type) {
    if (type === 'success') {
        return 'Success';
    }

    if (type === 'error') {
        return 'Error';
    }

    if (type === 'warning') {
        return 'Warning';
    }

    return 'Info';
}

onBeforeUnmount(() => {
    timers.forEach((timer) => window.clearTimeout(timer));
    timers.clear();
});
</script>

<style scoped>
@keyframes toast-progress {
    from {
        transform: scaleX(1);
    }

    to {
        transform: scaleX(0);
    }
}

.animate-toast-progress {
    animation-name: toast-progress;
    animation-timing-function: linear;
    animation-fill-mode: forwards;
}
</style>