<template>
    <div class="min-h-screen bg-slate-950 text-slate-100">
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="absolute left-1/4 top-0 h-96 w-96 rounded-full bg-amber-400/10 blur-3xl"></div>
            <div class="absolute right-0 top-1/2 h-96 w-96 rounded-full bg-cyan-400/10 blur-3xl"></div>
        </div>

        <Head title="Admin Login" />

        <div class="relative mx-auto flex min-h-screen max-w-7xl items-center px-4 py-10 sm:px-6 lg:px-8">
            <div class="mx-auto w-full max-w-md">
                <section class="rounded-[2rem] border border-white/10 bg-slate-900/80 p-8 shadow-2xl shadow-black/30 backdrop-blur-xl">
                    <div class="mb-8 text-center">
                        <div class="text-sm uppercase tracking-[0.35em] text-slate-500">Sign in</div>
                        <h2 class="mt-3 text-2xl font-semibold text-white">Use your account credentials</h2>
                    </div>

                    <form class="space-y-5" @submit.prevent="submit">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-300" for="login">Email or username</label>
                            <input
                                id="login"
                                v-model="form.login"
                                type="text"
                                autocomplete="username"
                                class="w-full rounded-2xl border border-white/10 bg-slate-950/80 px-4 py-3 text-white outline-none transition placeholder:text-slate-500 focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20"
                                placeholder="email@example.com or username"
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

                        <div class="flex items-center gap-3">
                            <div class="relative flex items-center">
                                <input
                                    id="remember"
                                    v-model="form.remember"
                                    type="checkbox"
                                    class="peer h-5 w-5 cursor-pointer appearance-none rounded-md border border-white/20 bg-slate-950/80 checked:border-amber-400 checked:bg-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-400/20 focus:ring-offset-1 focus:ring-offset-slate-900 transition-all"
                                />
                                <svg class="absolute left-1/2 top-1/2 pointer-events-none h-3.5 w-3.5 -translate-x-1/2 -translate-y-1/2 text-slate-950 opacity-0 peer-checked:opacity-100 transition-opacity" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <label class="block text-sm font-medium text-slate-300 cursor-pointer select-none" for="remember">
                                Remember me
                            </label>
                        </div>

                        <button
                            type="submit"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-amber-400 px-4 py-3 font-semibold text-slate-950 transition hover:bg-amber-300 disabled:cursor-not-allowed disabled:opacity-60"
                            :disabled="form.processing"
                        >
                            <IconLogin2 class="h-4 w-4" />
                            {{ form.processing ? 'Signing in...' : 'Enter dashboard' }}
                        </button>

                        <div class="flex items-center justify-center text-sm text-slate-400">
                            <Link href="/" class="inline-flex items-center gap-2 transition hover:text-white">
                                <IconArrowLeft class="h-4 w-4" />
                                <span>Back to site</span>
                            </Link>
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