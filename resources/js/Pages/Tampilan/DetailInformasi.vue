<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';

// Animasi muncul (Fade In)
const isLoaded = ref(false);
onMounted(() => {
    isLoaded.value = true;
});

const detail = ref({
    category: 'Beasiswa',
    title: 'Beasiswa Prestasi Unggulan 2026',
    publisher: 'Kemendikbud Ristek',
    posted_at: '12 Mei 2026',
    deadline: '15 Juni 2026',
    views: '1.2k',
    image: 'https://images.unsplash.com/photo-1523240715181-01489a943ee2?auto=format&fit=crop&q=80&w=800',
    description: `
        <p class="text-lg">Beasiswa Prestasi Unggulan adalah program bantuan biaya pendidikan penuh yang diberikan kepada mahasiswa aktif <strong>Universitas Brawijaya</strong> yang memiliki prestasi akademik maupun non-akademik yang luar biasa.</p>
        <br/>
        <div class="bg-blue-50 p-6 rounded-2xl border-l-4 border-blue-600 mb-6">
             <h4 class="font-bold text-blue-900 mb-2 italic">📢 Catatan Penting:</h4>
             <p class="text-sm text-blue-800">Pastikan seluruh dokumen dalam format PDF dengan ukuran maksimal 2MB per file.</p>
        </div>
        <h4 class="text-xl font-bold text-gray-900 mb-4">💎 Cakupan Beasiswa:</h4>
        <ul class="space-y-3 mb-6">
            <li class="flex items-center gap-3">
                <span class="w-6 h-6 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-xs">✓</span>
                Biaya UKT penuh hingga lulus (maks. 8 semester).
            </li>
            <li class="flex items-center gap-3">
                <span class="w-6 h-6 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-xs">✓</span>
                Uang saku bulanan sebesar Rp 1.500.000.
            </li>
            <li class="flex items-center gap-3">
                <span class="w-6 h-6 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-xs">✓</span>
                Pelatihan kepemimpinan dan networking internasional.
            </li>
        </ul>
        <h4 class="text-xl font-bold text-gray-900 mb-4">📋 Persyaratan Umum:</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-4 border border-gray-100 rounded-xl hover:border-blue-200 transition">
                <p class="text-xs text-gray-400 font-bold uppercase">Akademik</p>
                <p class="font-bold">IPK Minimal 3.50</p>
            </div>
            <div class="p-4 border border-gray-100 rounded-xl hover:border-blue-200 transition">
                <p class="text-xs text-gray-400 font-bold uppercase">Status</p>
                <p class="font-bold">Mahasiswa Aktif S1</p>
            </div>
        </div>
    `,
    color: 'text-blue-600 bg-blue-50 border-blue-100'
});
</script>

<template>
    <Head :title="detail.title + ' - KampusInfo'" />

    <div class="min-h-screen bg-[#F8FAFC] flex flex-col font-sans text-gray-900">
        <nav class="bg-white/80 backdrop-blur-md border-b border-gray-100 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <Link href="/dashboard" class="flex items-center gap-2 group">
                        <div class="bg-gradient-to-br from-blue-600 to-blue-800 p-2 rounded-xl shadow-lg shadow-blue-200 group-hover:scale-110 transition">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <span class="text-xl font-black text-blue-950 tracking-tighter">Kampus<span class="text-blue-600">Info</span></span>
                    </Link>
                    <div class="flex items-center gap-4">
                        <div class="flex flex-col items-end mr-2 hidden sm:block">
                            <p class="text-xs font-bold text-gray-900">Lisha Khaerunniswah</p>
                            <p class="text-[10px] text-gray-400">Teknologi Informasi</p>
                        </div>
                        <div class="h-10 w-10 rounded-2xl bg-gradient-to-tr from-blue-100 to-blue-50 border border-blue-200 flex items-center justify-center text-blue-700 font-black cursor-pointer hover:rotate-6 transition">LK</div>
                    </div>
                </div>
            </div>
        </nav>

        <main :class="{'opacity-100 translate-y-0': isLoaded, 'opacity-0 translate-y-4': !isLoaded}" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 transition-all duration-700">
            
            <div class="flex items-center gap-2 text-xs font-bold text-gray-400 mb-6 uppercase tracking-widest">
                <Link href="/dashboard" class="hover:text-blue-600 transition">Beranda</Link>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="3"></path></svg>
                <span class="text-blue-600">{{ detail.category }}</span>
            </div>

            <div class="flex flex-col lg:flex-row gap-10">
                
                <div class="lg:w-2/3">
                    <div class="bg-white rounded-[2rem] overflow-hidden shadow-xl shadow-blue-900/5 border border-white">
                        <div class="relative h-[26rem] group">
                            <img :src="detail.image" class="w-full h-full object-cover group-hover:scale-105 transition duration-1000">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                            <div class="absolute bottom-6 left-8">
                                <span class="px-4 py-2 bg-blue-600 text-white rounded-xl text-xs font-black uppercase tracking-tighter shadow-lg mb-3 inline-block">
                                    {{ detail.category }}
                                </span>
                                <h1 class="text-4xl font-black text-white leading-tight drop-shadow-md">
                                    {{ detail.title }}
                                </h1>
                            </div>
                        </div>
                        
                        <div class="p-10">
                            <div class="flex flex-wrap items-center justify-between gap-6 mb-10 p-6 bg-gray-50 rounded-2xl border border-gray-100">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-white rounded-lg shadow-sm">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" stroke-width="2"></path></svg>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-black text-gray-400 uppercase">Penyelenggara</p>
                                        <p class="text-sm font-bold text-gray-800">{{ detail.publisher }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-white rounded-lg shadow-sm">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2"></path><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke-width="2"></path></svg>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-black text-gray-400 uppercase">Dilihat</p>
                                        <p class="text-sm font-bold text-gray-800">{{ detail.views }} kali</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-white rounded-lg shadow-sm">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="2"></path></svg>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-black text-gray-400 uppercase">Rilis</p>
                                        <p class="text-sm font-bold text-gray-800">{{ detail.posted_at }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="prose prose-lg prose-blue max-w-none text-gray-600 leading-relaxed" v-html="detail.description">
                            </div>
                        </div>
                    </div>
                </div>

                <aside class="lg:w-1/3">
                    <div class="sticky top-24 space-y-6">
                        <div class="bg-white rounded-[2rem] p-8 shadow-xl shadow-red-900/5 border border-red-50 relative overflow-hidden group">
                            <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:rotate-12 transition duration-500">
                                <svg class="w-24 h-24 text-red-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M13 7h-2v6h6v-2h-4z"></path></svg>
                            </div>
                            
                            <p class="text-xs font-black text-red-400 uppercase mb-2 tracking-widest">Sisa Waktu Pendaftaran</p>
                            <h3 class="text-3xl font-black text-red-600 mb-1 italic leading-none">{{ detail.deadline }}</h3>
                            <p class="text-[10px] font-bold text-gray-400 italic">*Jangan sampai terlewat!</p>

                            <div class="mt-8 space-y-4 relative z-10">
                                <button class="w-full py-5 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-black rounded-2xl shadow-xl shadow-blue-200 hover:shadow-blue-300 hover:-translate-y-1 transition active:scale-95 flex items-center justify-center gap-3">
                                    DAFTAR SEKARANG
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 7l5 5m0 0l-5 5m5-5H6" stroke-width="3"></path></svg>
                                </button>
                                
                                <button class="w-full py-4 bg-white border-2 border-gray-100 text-gray-700 font-bold rounded-2xl hover:bg-gray-50 hover:border-blue-200 transition flex items-center justify-center gap-2 group/btn">
                                    <svg class="w-5 h-5 text-gray-400 group-hover/btn:text-blue-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" stroke-width="2.5"></path></svg>
                                    Simpan ke Favorit
                                </button>
                            </div>
                        </div>

                        <div class="bg-blue-900 rounded-[2rem] p-8 text-white relative overflow-hidden">
                            <div class="relative z-10">
                                <h4 class="font-black text-lg mb-2">Bantu Temanmu! 🤝</h4>
                                <p class="text-sm text-blue-200 mb-6 leading-relaxed">Bagikan peluang luar biasa ini ke grup angkatan atau sahabatmu.</p>
                                <div class="flex gap-3">
                                    <button class="flex-1 py-3 bg-white/10 hover:bg-white/20 rounded-xl transition text-xs font-bold backdrop-blur-sm">Copy Link</button>
                                    <button class="flex-1 py-3 bg-green-500 hover:bg-green-600 rounded-xl transition text-xs font-bold shadow-lg shadow-green-900/20">WhatsApp</button>
                                </div>
                            </div>
                            <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-blue-500 rounded-full opacity-20 blur-2xl"></div>
                        </div>
                    </div>
                </aside>

            </div>
        </main>
        
        <footer class="mt-20 py-10 border-t border-gray-100 text-center">
            <p class="text-sm font-bold text-gray-300 uppercase tracking-[0.3em]">KampusInfo © 2026</p>
        </footer>
    </div>
</template>

<style scoped>
/* Custom prose style untuk v-html */
:deep(.prose) {
    color: #4B5563;
}
:deep(.prose h4) {
    color: #111827;
    margin-top: 1.5rem;
}
</style>