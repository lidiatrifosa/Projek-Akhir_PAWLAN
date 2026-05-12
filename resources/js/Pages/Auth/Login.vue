<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Masuk ke Akun" />

    <div class="flex min-h-screen bg-white">
        <div 
            class="hidden lg:flex lg:w-1/2 relative items-center px-12 bg-cover bg-center"
            style="background-image: url('/build/assets/LoginPage.jpg');"
        >
            <div class="absolute inset-0 bg-blue-950/20 transition-opacity"></div>

            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/95 via-blue-900/50 to-blue-900/10"></div>

            <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
            
            <div class="relative z-10 text-white">
                <div class="flex items-center gap-3 mb-10">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/bb/Logo_Universitas_Brawijaya.svg" alt="Logo UB" class="h-12 w-12 bg-white p-1 rounded shadow-2xl">
                    <span class="font-bold text-xl tracking-wider drop-shadow-lg uppercase">FILKOM UB</span>
                </div>
                
                <h1 class="text-5xl font-black leading-tight mb-6 drop-shadow-2xl">
                    Selamat Datang di website <br> <span class="text-blue-300">KampusInfo</span>
                </h1>
                
                <p class="text-lg text-blue-50 max-w-md leading-relaxed mb-24 drop-shadow-lg font-medium">
                    Gerbang digital untuk seluruh informasi akademis dan kemahasiswaan terpadu di Fakultas Ilmu Komputer.
                </p>

                <div class="flex items-center gap-2 text-sm text-blue-200 font-bold italic">
                    <svg class="w-5 h-5 drop-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    Sistem Terverifikasi Universitas Brawijaya
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center px-8 py-12 text-gray-900 bg-gray-50/30">
            <div class="w-full max-w-md bg-white p-8 lg:p-0 rounded-2xl lg:rounded-none shadow-xl lg:shadow-none">
                <h2 class="text-3xl font-extrabold mb-2 tracking-tight text-blue-950">Masuk ke Akun Anda</h2>
                <p class="text-gray-500 mb-8 font-medium">Masukkan kredensial institusi untuk melanjutkan akses.</p>

                <form @submit.prevent="submit" class="space-y-6">
                    <div>
                        <label class="block text-xs font-black text-gray-600 mb-2 uppercase tracking-widest">Email Institusi</label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 border-r pr-2 my-2 border-gray-200 transition-colors group-focus-within:text-blue-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </span>
                            <input v-model="form.email" type="email" required class="w-full pl-12 pr-4 py-3.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition-all shadow-sm" placeholder="nama@student.ub.ac.id">
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between mb-2">
                            <label class="text-xs font-black text-gray-600 uppercase tracking-widest">Kata Sandi</label>
                            <Link :href="route('password.request')" class="text-xs text-blue-700 font-black hover:text-blue-900 transition-colors">Lupa Password?</Link>
                        </div>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 border-r pr-2 my-2 border-gray-200 transition-colors group-focus-within:text-blue-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </span>
                            <input v-model="form.password" type="password" required class="w-full pl-12 pr-4 py-3.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition-all shadow-sm" placeholder="••••••••">
                        </div>
                    </div>

                    <button type="submit" :disabled="form.processing" class="w-full bg-blue-700 text-white font-black py-4 rounded-xl hover:bg-blue-800 transition shadow-lg active:scale-[0.97] flex items-center justify-center gap-2 transform group">
                        <span>Masuk Sekarang</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        </svg>
                    </button>

                    <div class="relative flex py-4 items-center">
                        <div class="flex-grow border-t border-gray-200"></div>
                        <span class="flex-shrink mx-4 text-gray-400 text-[10px] uppercase font-black tracking-widest">Atau</span>
                        <div class="flex-grow border-t border-gray-200"></div>
                    </div>

                    <p class="text-center text-sm mt-8 text-gray-600 font-medium">
                        Belum memiliki akun? <Link :href="route('register')" class="text-blue-700 font-black hover:underline">Daftar Sekarang</Link>
                    </p>
                </form>
            </div>
        </div>
    </div>
</template>