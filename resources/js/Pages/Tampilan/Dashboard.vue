<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

// Data dummy untuk kartu informasi (sesuai gambar yang kamu kirim)
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

const categories = ['Semua', 'Beasiswa', 'Event', 'Magang', 'Akademik'];

const deadlines = ref([
    { title: 'Beasiswa Prestasi 2024', days: '2 Hari Lagi', color: 'bg-red-500' },
    { title: 'Submit Jurnal Internasional', days: '3 Hari Lagi', color: 'bg-red-500' },
    { title: 'Pendaftaran Lomba Debat', days: '5 Hari Lagi', color: 'bg-orange-500' },
    { title: 'Open Recruitment BEM', days: '6 Hari Lagi', color: 'bg-orange-500' },
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
                            <span class="text-xl font-black text-blue-900 tracking-tight">KampusInfo</span>
                        </div>
                        <div class="hidden md:flex items-center gap-6 font-bold text-sm text-gray-500">
                            <Link href="/dashboard" class="text-blue-700 border-b-2 border-blue-700 pb-5 mt-5">Home</Link>
                            <Link href="#" class="hover:text-blue-700 transition">Explore</Link>
                            <Link href="#" class="hover:text-blue-700 transition">Profile</Link>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <button class="p-2 text-gray-400 hover:text-blue-600 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        </button>
                        <div class="h-9 w-9 rounded-full bg-blue-100 border-2 border-blue-200 flex items-center justify-center text-blue-700 font-bold cursor-pointer">LK</div>
                    </div>
                </div>
            </div>
        </nav>

        <header class="py-10 bg-white">
            <div class="max-w-4xl mx-auto px-4 text-center">
                <h1 class="text-3xl font-black text-gray-900 mb-2">Temukan Peluang Kampusmu Hari Ini</h1>
                <p class="text-gray-500 text-sm mb-8">Pusat informasi terpadu untuk beasiswa, event, magang, dan berita akademik terkini.</p>
                
                <div class="relative max-w-xl mx-auto mb-8">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" placeholder="Cari beasiswa, magang, atau kompetisi..." class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all">
                </div>

                <div class="flex flex-wrap justify-center gap-3">
                    <button v-for="cat in categories" :key="cat" :class="cat === 'Semua' ? 'bg-blue-800 text-white' : 'bg-blue-50 text-blue-700 hover:bg-blue-100'" class="px-6 py-2 rounded-full text-sm font-bold transition-all">
                        {{ cat }}
                    </button>
                </div>
            </div>
        </header>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col lg:flex-row gap-8">
            <div class="lg:w-3/4">
                <h2 class="text-xl font-bold mb-6 flex items-center gap-2">
                    <span class="w-1.5 h-6 bg-blue-700 rounded-full"></span>
                    Informasi Terbaru
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div v-for="item in opportunities" :key="item.id" class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-all flex flex-col relative">
                        <button class="absolute top-3 right-3 p-1.5 bg-white/80 backdrop-blur rounded-lg text-gray-500 hover:text-blue-600 z-10">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" stroke-width="2"></path></svg>
                        </button>
                        
                        <div class="h-44 overflow-hidden">
                            <img :src="item.image" class="w-full h-full object-cover">
                        </div>
                        
                        <div class="p-5 flex-grow">
                            <span :class="item.color" class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider mb-3 inline-block">
                                {{ item.category }}
                            </span>
                            <h3 class="font-bold text-base leading-tight mb-2">{{ item.title }}</h3>
                            <p class="text-gray-500 text-xs leading-relaxed line-clamp-2 mb-6">{{ item.desc }}</p>
                            
                            <a href="/detail-informasi" class="w-full py-2.5 bg-white border border-blue-200 text-blue-700 font-bold rounded-lg text-center block text-sm hover:bg-blue-700 hover:text-white transition-all">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <aside class="lg:w-1/4 space-y-6">
                <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
                    <h3 class="font-bold text-sm mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2"></path></svg>
                        Mendekati Deadline
                    </h3>
                    <div class="space-y-4">
                        <div v-for="(dl, index) in deadlines" :key="index" class="flex items-center justify-between border-l-4 p-2 pl-3 hover:bg-gray-50 transition" :class="dl.color.replace('bg-', 'border-')">
                            <div>
                                <h4 class="text-xs font-bold">{{ dl.title }}</h4>
                                <p class="text-[10px] font-black text-red-600 uppercase mt-0.5">{{ dl.days }}</p>
                            </div>
                            <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="3"></path></svg>
                        </div>
                    </div>
                    <button class="w-full mt-5 text-[11px] font-bold text-blue-700 hover:underline">Lihat Semua Deadline →</button>
                </div>

                <div class="bg-blue-600 rounded-xl p-5 text-white shadow-lg shadow-blue-100 relative overflow-hidden">
                    <div class="relative z-10">
                        <h4 class="font-bold text-sm mb-2">Tips Hari Ini</h4>
                        <p class="text-[11px] leading-relaxed italic opacity-90 font-medium">"Pastikan dokumen scan KTP dan KTM mu selalu siap dalam format PDF untuk pendaftaran cepat."</p>
                    </div>
                    <div class="absolute -bottom-4 -right-4 w-20 h-20 bg-blue-500 rounded-full opacity-20"></div>
                </div>
            </aside>
        </main>
    </div>
</template>