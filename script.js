document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector(".search-input");
    const searchButton = document.querySelector(".material-symbols-outlined");

    searchButton.addEventListener("click", function () {
        const query = searchInput.value.trim();
        if (query) {
            searchSurat(query);
        }
    });

    searchInput.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            searchButton.click();
        }
    });

    function searchSurat(query) {
        fetch("https://equran.id/api/surat")
            .then(response => response.json())
            .then(data => {
                const filteredSurat = data.filter(surat => 
                    surat.nama_latin.toLowerCase().includes(query.toLowerCase()) || 
                    surat.nama.toLowerCase().includes(query.toLowerCase())
                );

                if (filteredSurat.length > 0) {
                    displaySurat(filteredSurat);
                } else {
                    alert("Surah tidak ditemukan. Silakan coba lagi.");
                }
            })
            .catch(error => console.error("Error fetching surah data:", error));
    }

    function displaySurat(suratList) {
        let cardSurat = '';  

        suratList.forEach(surat => {
            cardSurat += 
            `<div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card mb-3 card-surat" data-bs-toggle="modal" data-bs-target="#surahModal" data-nomorsurat="${surat.nomor}">
                    <div class="card-body">
                        <h5 class="card-title">${surat.nomor}. ${surat.nama_latin}</h5>
                        <h3 class="card-subtitle mb-2 text-muted text-end">${surat.nama}</h3>
                        <p class="card-text text-end">${surat.arti}</p>
                    </div>
                </div>
            </div>`;
        });

        const searchResults = document.querySelector('.search-results');
        if (searchResults) {  
            searchResults.innerHTML = cardSurat; // Menampilkan hasil pencarian di search-results
        } else {
            console.error("Elemen .search-results tidak ditemukan.");
        }

        const listSurat = document.querySelector('.card-surat-list');
        if (listSurat) {  
            listSurat.innerHTML = ""; // Kosongkan daftar utama agar hasil hanya tampil di kiri
        } else {
            console.error("Elemen .card-surat-list tidak ditemukan.");
        }

        // Add event listener to each card to fetch and display Surah details in modal
        document.querySelectorAll('.card-surat').forEach(card => {
            card.addEventListener('click', function() {
                const nomorsurat = this.getAttribute('data-nomorsurat');
                fetchSurahDetails(nomorsurat);
            });
        });
    }
});
