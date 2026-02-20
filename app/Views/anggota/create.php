<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="layout-container mx-auto max-w-2xl bg-card-dark border border-border-dark rounded-3xl p-8 shadow-xl">
    
    <div class="flex items-center gap-4 mb-8">
        <a href="/anggota" class="w-10 h-10 rounded-full border border-border-dark flex items-center justify-center text-white hover:bg-background-dark transition-colors">
            <span class="material-symbols-outlined">arrow_back</span>
        </a>
        <h2 class="text-2xl font-bold text-white">Tambah Anggota Baru</h2>
    </div>

    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="bg-primary/20 border border-primary text-primary px-4 py-3 rounded-xl mb-6 text-sm">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li>- <?= $error ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/anggota/store" method="post" enctype="multipart/form-data" class="flex flex-col gap-5">
        <?= csrf_field(); ?>
        
        <div>
            <label class="block text-white text-sm font-bold mb-2">Nama Lengkap</label>
            <input type="text" name="nama" value="<?= old('nama'); ?>" class="w-full h-12 px-4 rounded-xl bg-background-dark border border-border-dark text-white focus:outline-none focus:border-primary transition-colors" placeholder="Masukkan nama..." required>
        </div>

        <div>
            <label class="block text-white text-sm font-bold mb-2">Posisi</label>
            <select name="posisi" class="w-full h-12 px-4 rounded-xl bg-background-dark border border-border-dark text-white focus:outline-none focus:border-primary transition-colors" required>
                <option value="" disabled selected>Pilih posisi...</option>
                <option value="Pelatih">Pelatih</option>
                <option value="Atlet Tunggal">Atlet Tunggal</option>
                <option value="Atlet Ganda">Atlet Ganda</option>
            </select>
        </div>

        <div>
            <label class="block text-white text-sm font-bold mb-2">Foto Profil (Opsional)</label>
            <input type="file" name="foto" accept="image/png, image/jpeg, image/jpg" class="w-full block text-sm text-text-muted file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-primary file:text-white hover:file:bg-primary-dark transition-all">
            <p class="text-xs text-text-muted mt-2">*Format: JPG/PNG. Maksimal 2MB.</p>
        </div>

        <hr class="border-border-dark my-2">

        <button type="submit" class="h-14 w-full rounded-xl bg-primary hover:bg-primary-dark text-white font-bold text-lg transition-colors shadow-lg">
            Simpan Data Anggota
        </button>
    </form>
</div>

<?= $this->endSection(); ?>