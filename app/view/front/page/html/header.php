<style>
.navbar {
  overflow: hidden;
  background-color: #e64946;
  font-family: oswald;
}

/* Links inside the navbar */
.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* The dropdown container */
.dropdown {
  float: left;
  overflow: hidden;
}

/* Dropdown button */
.dropdown .dropbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit; /* Important for vertical align on mobile phones */
  margin: 0; /* Important for vertical align on mobile phones */
}

/* Add a red background color to navbar links on hover */
.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: #ADADAD;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

/* Add a grey background color to dropdown links on hover */
.dropdown-content a:hover {
  background-color: #ddd;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}
</style>

<div class="navbar">
  <a href="#home">BERANDA</a>
  <div class="dropdown">
    <button class="dropbtn">LOGIN
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Administrator</a>
      <a href="#">Layanan Mandiri</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">PEMERINTAHAN DESA
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Visi Dan Misi</a>
      <a href="#">Pemerintah desa</a>
    </div>
  </div>
  <a href="#home">LEMBAGA MASYARAKAT</a>
  <div class="dropdown">
    <button class="dropbtn">DATA DESA
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Data Wilayah Administratif</a>
      <a href="#">Data Pendidikan Dalam KK</a>
      <a href="#">Data Pendidikan Di Tempuh</a>
      <a href="#">Data Pekerjaan</a>
      <a href="#">Data Agama</a>
      <a href="#">Data Jenis Kelamin</a>
      <a href="#">Data Warga Negara</a>
      <a href="#">BLT DD</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">REGULASI
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Produk Hukum</a>
      <a href="#">Informasi Publik</a>
    </div>
  </div>
  <a href="#home">PETA</a>
  <a href="#home">IDM</a>
  <a href="#home">ANALISIS</a>
  <a href="#home">PEMILIH</a>
  <a href="#home">SS</a>
</div>
