<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

// Data Dummy untuk Card Informasi
const opportunities = ref([
    {
        id: 1,
        category: 'Beasiswa',
        title: 'Beasiswa Prestasi Unggulan 2026',
        desc: 'Kesempatan bagi mahasiswa semester 3 ke atas untuk mendapatkan bantuan biaya pendidikan penuh.',
        image: 'https://images.unsplash.com/photo-1523240715181-01489a943ee2?auto=format&fit=crop&q=80&w=400',
        color: 'text-green-600 bg-green-100'
    },
    {
        id: 2,
        category: 'Magang',
        title: 'Program Magang Tech Giant Indonesia',
        desc: 'Bergabunglah dalam proyek inovatif berskala nasional. Terbuka untuk prodi Sistem Informasi & TI.',
        image: 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&q=80&w=400',
        color: 'text-blue-600 bg-blue-100'
    },
    {
        id: 3,
        category: 'Event',
        title: 'Seminar Nasional: AI for Education',
        desc: 'Menghadirkan pakar teknologi internasional untuk membahas masa depan pendidikan berbasis AI.',
        image: 'https://images.unsplash.com/photo-1591115765373-520b7a217287?auto=format&fit=crop&q=80&w=400',
        color: 'text-orange-600 bg-orange-100'
    }
]);

// Data Dummy untuk Sidebar Deadline
const deadlines = ref([
    { title: 'Beasiswa Prestasi 2026', days: '2 Hari Lagi', color: 'bg-red-500' },
    { title: 'Submit Jurnal Internasional', days: '3 Hari Lagi', color: 'bg-orange-500' },
    { title: 'Pendaftaran Lomba Debat', days: '5 Hari Lagi', color: 'bg-yellow-500' },
]);
</script>

<template>
    <Head title="Beranda - KampusInfo" />

    <div class="min-h-screen bg-gray-50 flex flex-col font-sans text-gray-900">
        <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex items-center gap-8">
                        <div class="flex items-center gap-2">
                            <div class="bg-blue-700 p-1.5 rounded-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </div>
                            <span class="text-xl font-black text-blue-900 tracking-tight">KampusInfo</span>
                        </div>

                        <div class="hidden md:flex items-center gap-6 font-bold text-sm text-gray-500">
                            <Link href="#" class="text-blue-700 border-b-2 border-blue-700 pb-5 mt-5">Beranda</Link>
                            <Link href="#" class="hover:text-blue-700 transition">Eksplorasi</Link>
                            <Link href="#" class="hover:text-blue-700 transition">Aktivitas Saya</Link>
                            <Link href="#" class="hover:text-blue-700 transition">Favorit</Link>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <button class="p-2 text-gray-400 hover:text-blue-600 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        </button>
                        <div class="h-9 w-9 rounded-full bg-blue-100 border-2 border-blue-200 flex items-center justify-center text-blue-700 font-bold cursor-pointer">
                            LK
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <header class="py-12 bg-white border-b border-gray-100">
            <div class="max-w-4xl mx-auto px-4 text-center">
                <h1 class="text-4xl font-black text-gray-900 mb-4 tracking-tight">Temukan Peluang Kampusmu Hari Ini</h1>
                <p class="text-gray-500 font-medium mb-8">Pusat informasi terpadu untuk beasiswa, event, magang, dan berita akademik terkini.</p>
                
                <div class="relative max-w-2xl mx-auto group">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 group-focus-within:text-blue-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" placeholder="Cari beasiswa, magang, atau kompetisi..." class="w-full pl-12 pr-4 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 focus:bg-white outline-none transition-all shadow-sm font-medium">
                </div>
            </div>
        </header>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex flex-col lg:flex-row gap-8">
            
            <div class="lg:w-2/3 space-y-6">
                <div class="flex justify-between items-center mb-2">
                    <h2 class="text-xl font-bold flex items-center gap-2">
                        <span class="w-2 h-8 bg-blue-700 rounded-full"></span>
                        Informasi Terbaru
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div v-for="item in opportunities" :key="item.id" class="bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl transition-all group flex flex-col">
                        <div class="relative overflow-hidden h-48">
                            <img :src="item.image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <span :class="item.color" class="absolute top-4 left-4 px-3 py-1 rounded-lg text-xs font-black uppercase tracking-wider shadow-sm">
                                {{ item.category }}
                            </span>
                        </div>
                        <div class="p-5 flex-grow flex flex-col">
                            <h3 class="font-bold text-lg leading-tight mb-3 group-hover:text-blue-700 transition-colors">{{ item.title }}</h3>
                            <p class="text-gray-500 text-sm leading-relaxed mb-6 flex-grow line-clamp-3">{{ item.desc }}</p>
                            
                            <Link href="#" class="w-full py-3 bg-white border-2 border-blue-50 text-blue-700 font-bold rounded-xl text-center hover:bg-blue-600 hover:text-white hover:border-blue-600 transition-all text-sm">
                                Lihat Detail
                            </Link>
                        </div>
                    </div>
                </div>
            </div>

            <aside class="lg:w-1/3 space-y-6">
                <div class="bg-white rounded-2xl border border-gray-200 p-6 shadow-sm">
                    <h3 class="font-bold text-lg mb-5 flex items-center gap-2 text-red-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Mendekati Deadline
                    </h3>
                    <div class="space-y-4">
                        <div v-for="(dl, index) in deadlines" :key="index" class="flex items-center gap-4 p-3 rounded-xl hover:bg-gray-50 transition border border-transparent hover:border-gray-100 group">
                            <div :class="dl.color" class="w-2 h-10 rounded-full"></div>
                            <div class="flex-grow">
                                <h4 class="text-sm font-bold leading-tight group-hover:text-blue-800">{{ dl.title }}</h4>
                                <p class="text-xs font-black text-red-600 mt-1 uppercase">{{ dl.days }}</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-300 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                    <button class="w-full mt-6 text-sm font-bold text-blue-700 hover:underline">Lihat Semua Deadline →</button>
                </div>

                <div class="bg-blue-700 rounded-2xl p-6 text-white relative overflow-hidden shadow-lg shadow-blue-200">
                    <div class="relative z-10">
                        <h3 class="font-bold mb-2">Tips Hari Ini</h3>
                        <p class="text-sm text-blue-100 leading-relaxed italic">"Pastikan dokumen scan KTP dan KTM mu selalu siap dalam format PDF untuk pendaftaran cepat."</p>
                    </div>
                    <svg class="absolute -right-4 -bottom-4 w-24 h-24 text-blue-600 opacity-50" fill="currentColor" viewBox="0 0 20 20"><path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1a1 1 0 112 0v1a1 1 0 11-2 0zM13.243 14.657a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM14.657 5.05l-.707.707a1 1 0 101.414 1.414l.707-.707a1 1 0 00-1.414-1.414z"></path></svg>
                </div>
            </aside>
        </main>

        <footer class="mt-auto bg-white border-t border-gray-200 py-12 px-4">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-8">
                <div class="flex items-center gap-2">
                    <span class="text-xl font-black text-blue-900">KampusInfo</span>
                    <span class="text-gray-300">|</span>
                    <p class="text-gray-500 text-sm">© 2026 Universitas Brawijaya</p>
                </div>
                <div class="flex gap-8 text-sm font-bold text-gray-500">
                    <a href="#" class="hover:text-blue-700 transition">Tentang Kami</a>
                    <a href="#" class="hover:text-blue-700 transition">Panduan</a>
                    <a href="#" class="hover:text-blue-700 transition">Privasi</a>
                    <a href="#" class="hover:text-blue-700 transition">Hubungi Kami</a>
                </div>
            </div>
        </footer>

        <button class="fixed bottom-8 right-8 bg-blue-700 text-white p-4 rounded-2xl shadow-2xl hover:bg-blue-800 transition active:scale-95 z-50">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
        </button>
    </div>
</template>

<style scoped>
/* Menghaluskan transisi hover */
.group:hover .line-clamp-3 {
    -webkit-line-clamp: initial;
    display: block;
}
</style>