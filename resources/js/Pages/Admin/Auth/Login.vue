<template>
    <div class="min-h-screen bg-slate-950 text-slate-100">
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="absolute left-1/4 top-0 h-96 w-96 rounded-full bg-amber-400/10 blur-3xl"></div>
            <div class="absolute right-0 top-1/2 h-96 w-96 rounded-full bg-cyan-400/10 blur-3xl"></div>
        </div>

        <Head title="Admin Login" />

        <div class="relative mx-auto flex min-h-screen max-w-7xl items-center px-4 py-10 sm:px-6 lg:px-8">
            <div class="grid w-full gap-8 lg:grid-cols-[1.1fr_0.9fr]">
                <section class="rounded-[2rem] border border-white/10 bg-white/5 p-8 backdrop-blur-xl">
                    <div class="max-w-xl">
                        <div class="text-xs uppercase tracking-[0.35em] text-slate-400">Admin Access</div>
                        <h1 class="mt-5 text-4xl font-semibold tracking-tight text-white sm:text-5xl">Masuk ke panel admin baru</h1>
                        <p class="mt-5 text-base leading-7 text-slate-300">
                            Panel ini dibuat ulang tanpa Filament. Semua pengelolaan konten dan pengaturan situs dipusatkan di sini dengan Inertia, Vue, dan Tailwind terbaru.
                        </p>

                        <div class="mt-8 grid gap-4 sm:grid-cols-3">
                            <div class="rounded-2xl border border-white/10 bg-slate-950/60 p-4">
                                <div class="text-2xl font-semibold text-amber-300">3</div>
                                <div class="mt-1 text-sm text-slate-400">Sections</div>
                            </div>
                            <div class="rounded-2xl border border-white/10 bg-slate-950/60 p-4">
                                <div class="text-2xl font-semibold text-cyan-300">Vue 3</div>
                                <div class="mt-1 text-sm text-slate-400">Frontend</div>
                            </div>
                            <div class="rounded-2xl border border-white/10 bg-slate-950/60 p-4">
                                <div class="text-2xl font-semibold text-emerald-300">v4</div>
                                <div class="mt-1 text-sm text-slate-400">Tailwind</div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="rounded-[2rem] border border-white/10 bg-slate-900/80 p-8 shadow-2xl shadow-black/30 backdrop-blur-xl">
                    <div class="mb-8">
                        <div class="text-sm uppercase tracking-[0.35em] text-slate-500">Sign in</div>
                        <h2 class="mt-3 text-2xl font-semibold text-white">Use your account credentials</h2>
                    </div>

                    <form class="space-y-5" @submit.prevent="submit">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-300" for="login">Email atau username</label>
                            <input
                                id="login"
                                v-model="form.login"
                                type="text"
                                autocomplete="username"
                                class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none transition placeholder:text-slate-500 focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20"
                                placeholder="email@example.com atau username"
                            />
                            <p v-if="form.errors.login" class="mt-2 text-sm text-rose-300">{{ form.errors.login }}</p>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-300" for="password">Password</label>
                            <input
                                id="password"
                                v-model="form.password"
                                type="password"
                                autocomplete="current-password"
                                class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none transition placeholder:text-slate-500 focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20"
                                placeholder="••••••••"
                            />
                            <p v-if="form.errors.password" class="mt-2 text-sm text-rose-300">{{ form.errors.password }}</p>
                        </div>

                        <ToggleSwitch v-model="form.remember" label="Remember me" hint="Keep me signed in on this device." />

                        <button
                            type="submit"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-amber-400 px-4 py-3 font-semibold text-slate-950 transition hover:bg-amber-300 disabled:cursor-not-allowed disabled:opacity-60"
                            :disabled="form.processing"
                        >
                            <IconLogin2 class="h-4 w-4" />
                            {{ form.processing ? 'Signing in...' : 'Enter dashboard' }}
                        </button>

                        <div class="flex items-center justify-between text-sm text-slate-400">
                            <Link href="/" class="inline-flex items-center gap-2 transition hover:text-white">
                                <IconArrowLeft class="h-4 w-4" />
                                <span>Back to site</span>
                            </Link>
                            <span>Protected admin area</span>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { IconArrowLeft, IconLogin2 } from '@tabler/icons-vue';
import ToggleSwitch from '@/Components/Form/ToggleSwitch.vue';

const form = useForm({
    login: '',
    password: '',
    remember: true,
});

function submit() {
    form.post('/admin/login', {
        preserveScroll: true,
    });
}
</script>