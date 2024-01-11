<?php include '../components/top.php' ?>

<style>
  .card-kontak {
    background-color: #28a745;
    /* Warna Hijau */
    color: #ffffff;
    /* Warna Putih */
  }
</style>

<div class="container">
  <div class="row mt-5">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <!-- Kolom Kiri - Google Maps -->
            <div class="col-md-6">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.100516968048!2d107.45361667499282!3d-6.508959443483365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e690e5b4d76c349%3A0x8c171e80ac57eb8e!2sSekolah%20Tinggi%20Teknologi%20Wastukancana%20Purwakarta!5e0!3m2!1sid!2sid!4v1704704088589!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <!-- Kolom Kanan - List Kontak -->
            <div class="col-md-6">
              <h5 class="card-title">List Kontak</h5>
              <div class="row">
                <div class="col-md-12 mb-3">
                  <div class="card card-kontak">
                    <div class="card-body text-center">
                      <p>Purwakarta, STT. Wastukancana Jl Cikopak No 53 Sadang Purwakarta</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <div class="card card-kontak">
                    <div class="card-body text-center">
                      <p>mapa@gmail.com</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <div class="card card-kontak">
                    <div class="card-body text-center">
                      <p>Telp. (0264) 214952</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <div class="card card-kontak">
                    <div class="card-body text-center">
                      <p>Fax. (0264) 822 5153</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include '../components/bottom.php' ?>