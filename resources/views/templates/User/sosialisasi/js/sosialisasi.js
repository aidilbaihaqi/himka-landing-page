const list = [
      {src:"img/1.jpg", caption:"Latihan stretching di ruang olahraga."},
      {src:"img/2.jpg", caption:"Mahalini, anggota Himpunan Mahasiswa Kimia UMRAH mengikuti pertandingan sepak bola tingkat Nasional di Stadion Gelora Bung Karno, Jakarta, Indonesia."},
      {src:"img/3.jpg", caption:"Atlet bersiap melakukan sprint."},
      {src:"img/4.jpg", caption:"Atlet karate sedang bertanding."},
      {src:"img/5.jpg", caption:"Siswa berlari di jalur jogging kampus."},
      {src:"img/6.jpg", caption:"Senam massal mahasiswa."},
      {src:"img/7.jpg", caption:"Atlet badminton melakukan serve."},
      {src:"img/8.jpg", caption:"Pertandingan sepak bola antar fakultas."}
];

let index = new URLSearchParams(location.search).get("foto") || 0;
index = parseInt(index);

function render(){
    document.getElementById("mainImg").src = list[index].src;
    document.getElementById("caption").textContent = list[index].caption;
}

function nextImg(){ index = (index + 1) % list.length; render(); }
function prevImg(){ index = (index - 1 + list.length) % list.length; render(); }

render();