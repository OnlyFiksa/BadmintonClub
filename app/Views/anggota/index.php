<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="layout-container mx-auto max-w-[1280px]">
    
    <div class="flex flex-col md:flex-row items-center justify-between mb-12 gap-4">
        <div class="text-center md:text-left">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-2">Daftar Anggota</h2>
            <p class="text-text-muted">Kelola data pemain dan pelatih klub.</p>
        </div>
        <div>
            <a href="/anggota/create" class="flex h-12 px-8 items-center justify-center rounded-full bg-primary hover:bg-primary-dark text-white font-bold shadow-[0_0_15px_rgba(236,19,55,0.4)] transition-all gap-2">
                <span class="material-symbols-outlined">add</span> Tambah Anggota
            </a>
        </div>
    </div>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="bg-green-500/20 border border-green-500 text-green-400 px-4 py-3 rounded-xl mb-6">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach ($anggota as $a) : ?>
            <div class="flex flex-col bg-card-dark border border-border-dark rounded-3xl p-4 hover:-translate-y-1 transition-transform duration-300">
                <div class="relative w-full aspect-square mb-4 rounded-2xl overflow-hidden bg-background-dark flex items-center justify-center">
                    <?php if($a['foto'] == 'default.jpg'): ?>
                        <span class="material-symbols-outlined text-6xl text-text-muted">person</span>
                    <?php else: ?>
                        <img alt="<?= $a['nama']; ?>" class="w-full h-full object-cover" src="/uploads/<?= $a['foto']; ?>"/>
                    <?php endif; ?>
                </div>
                
                <h3 class="text-lg font-bold text-white"><?= $a['nama']; ?></h3>
                <p class="text-primary text-sm font-medium mb-4"><?= $a['posisi']; ?></p>
                
                <div class="mt-auto flex items-center justify-between gap-2">
                    <a href="/anggota/edit/<?= $a['id']; ?>" class="flex-1 text-center py-2 rounded-full bg-border-dark text-white text-xs font-bold hover:bg-slate-600 transition-colors">Edit</a>
                    
                    <form action="/anggota/delete/<?= $a['id']; ?>" method="post" class="flex-1">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus anggota ini?')" class="w-full text-center py-2 rounded-full bg-background-dark border border-primary text-primary text-xs font-bold hover:bg-primary hover:text-white transition-colors">Hapus</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<?= $this->endSection(); ?>