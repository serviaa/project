<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kristen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=search" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
<div class="container-fluid">
        <header class="navbar d-flex jusrify-content-end">
            <nav>
                <ul>
                    <li><a href="index.html#home">Home</a></li>
                    <li><a href="index.html#section">Section</a></li>
                    <li><a href="index.html#contact">Contact Us</a></li>
                </ul>
            </nav>
            <form>
                <div class="search">
                    <span class="material-symbols-outlined">search</span>
                    <input class="search-input" type="search" placeholder="search">
                </div>
            </form>    
        </header>
    </div>

    <div class="search-results"></div>
    
        <!-- Form untuk memilih kitab, pasal, dan ayat -->
        <form id="verse-form">
            <label for="book">Kitab:</label>
            <select id="book" name="book" required>
                <option value="Pilih">Pilih Kitab</option>
                <option value="Kejadian">Kejadian</option>
                <option value="Keluaran">Keluaran</option>
                <option value="Imamat">Imamat</option>
                <option value="Bilangan">Bilangan</option>
                <option value="Ulangan">Ulangan</option>
                <option value="Yosua">Yosua</option>
                <option value="Hakim-hakim">Hakim-hakim</option>
                <option value="Rut">Rut</option>
                <option value="1+Samuel">1 Samuel</option>
                <option value="2+Samuel">2 Samuel</option>
                <option value="1+Raja-raja">1 Raja-raja</option>
                <option value="2+Raja-raja">2 Raja-raja</option>
                <option value="1+Tawarikh">1 Tawarikh</option>
                <option value="2+Tawarikh">2 Tawarikh</option>
                <option value="Ezra">Ezra</option>
                <option value="Nehemia">Nehemia</option>
                <option value="Ester">Ester</option>
                <option value="Ayub">Ayub</option>
                <option value="Mazmur">Mazmur</option>
                <option value="Amsal">Amsal</option>
                <option value="Pengkhotbah">Pengkhotbah</option>
                <option value="Kidung+Agung">Kidung Agung</option>
                <option value="Yesaya">Yesaya</option>
                <option value="Yeremia">Yeremia</option>
                <option value="Ratapan">Ratapan</option>
                <option value="Yehezkiel">Yehezkiel</option>
                <option value="Daniel">Daniel</option>
                <option value="Hosea">Hosea</option>
                <option value="Yoel">Yoel</option>
                <option value="Amos">Amos</option>
                <option value="Obaja">Obaja</option>
                <option value="Yunus">Yunus</option>
                <option value="Mikha">Mikha</option>
                <option value="Nahum">Nahum</option>
                <option value="Habakuk">Habakuk</option>
                <option value="Zefanya">Zefanya</option>
                <option value="Hagai">Hagai</option>
                <option value="Zakharia">Zakharia</option>
                <option value="Maleakhi">Maleakhi</option>
                <option value="Matius">Matius</option>
                <option value="Markus">Markus</option>
                <option value="Lukas">Lukas</option>
                <option value="Yohanes">Yohanes</option>
                <option value="Kisah+Para+Rasul">Kisah Para Rasul</option>
                <option value="Roma">Roma</option>
                <option value="1+Korintus">1 Korintus</option>
                <option value="2+Korintus">2 Korintus</option>
                <option value="Galatia">Galatia</option>
                <option value="Efesus">Efesus</option>
                <option value="Filipi">Filipi</option>
                <option value="Kolose">Kolose</option>
                <option value="1+Tessalonika">1 Tessalonika</option>
                <option value="2+Tessalonika">2 Tessalonika</option>
                <option value="1+Timotius">1 Timotius</option>
                <option value="2+Timotius">2 Timotius</option>
                <option value="Titus">Titus</option>
                <option value="Filemon">Filemon</option>
                <option value="Ibrani">Ibrani</option>
                <option value="Yakobus">Yakobus</option>
                <option value="1+Petrus">1 Petrus</option>
                <option value="2+Petrus">2 Petrus</option>
                <option value="1+Yohanes">1 Yohanes</option>
                <option value="2+Yohanes">2 Yohanes</option>
                <option value="3+Yohanes">3 Yohanes</option>
                <option value="Yudas">Yudas</option>
                <option value="Wahyu">Wahyu</option>
            </select>
            <label for="chapter">Pasal:</label>
            <select id="chapter" name="chapter" required>
                <!-- Daftar pasal akan diisi melalui JavaScript -->
            </select>
            <button type="submit">Tampilkan Ayat</button>
        </form>
    
        <!-- Kontainer untuk menampilkan teks Alkitab -->
        <div id="verse-container"></div>
    
        <script>
            // Daftar pasal untuk setiap kitab (sesuai dengan versi TB LAI)
            var chapters = {
                'Kejadian': 50,
                'Keluaran': 40,
                'Imamat': 27,
                'Bilangan': 36,
                'Ulangan': 34,
                'Yosua': 24,
                'Hakim-hakim': 21,
                'Rut': 4,
                '1 Samuel': 31,
                '2 Samuel': 24,
                '1 Raja-raja': 22,
                '2 Raja-raja': 25,
                '1 Tawarikh': 29,
                '2 Tawarikh': 36,
                'Ezra': 10,
                'Nehemia': 13,
                'Ester': 10,
                'Ayub': 42,
                'Mazmur': 150,
                'Amsal': 31,
                'Pengkhotbah': 12,
                'Kidung Agung': 8,
                'Yesaya': 66,
                'Yeremia': 52,
                'Ratapan': 5,
                'Yehezkiel': 48,
                'Daniel': 12,
                'Hosea': 14,
                'Yoel': 3,
                'Amos': 9,
                'Obaja': 1,
                'Yunus': 4,
                'Mikha': 7,
                'Nahum': 3,
                'Habakuk': 3,
                'Zefanya': 3,
                'Hagai': 2,
                'Zakharia': 14,
                'Maleakhi': 4,
                'Matius': 28,
                'Markus': 16,
                'Lukas': 24,
                'Yohanes': 21,
                'Kisah Para Rasul': 28,
                'Roma': 16,
                '1 Korintus': 16,
                '2 Korintus': 13,
                'Galatia': 6,
                'Efesus': 6,
                'Filipi': 4,
                'Kolose': 4,
                '1 Tessalonika': 5,
                '2 Tessalonika': 3,
                '1 Timotius': 6,
                '2 Timotius': 4,
                'Titus': 3,
                'Filemon': 1,
                'Ibrani': 13,
                'Yakobus': 5,
                '1 Petrus': 5,
                '2 Petrus': 3,
                '1 Yohanes': 5,
                '2 Yohanes': 1,
                '3 Yohanes': 1,
                'Yudas': 1,
                'Wahyu': 22
            };
    
            // Fungsi untuk mengisi opsi pasal berdasarkan kitab yang dipilih
            function populateChapters() {
                var selectedBook = $('#book').val();
                var numChapters = chapters[selectedBook];
    
                $('#chapter').empty(); // Kosongkan dropdown pasal
                for (var i = 1; i <= numChapters; i++) {
                    $('#chapter').append('<option value="' + i + '">' + i + '</option>');
                }
            }
    
            // Fungsi untuk mengisi opsi ayat berdasarkan kitab dan pasal yang dipilih
            function populateVerses() {
                var selectedChapter = $('#chapter').val();
                var numVerses = 30; // Misalnya, setiap pasal memiliki 30 ayat (sesuaikan dengan kebutuhan)
    
                $('#verse').empty(); // Kosongkan dropdown ayat
                for (var i = 1; i <= numVerses; i++) {
                    $('#verse').append('<option value="' + i + '">' + i + '</option>');
                }
            }
    
            // Mengisi opsi pasal saat kitab dipilih
            $('#book').change(function() {
                populateChapters();
                populateVerses();
            });
    
            // Mengisi opsi ayat saat pasal dipilih
            $('#chapter').change(function() {
                populateVerses();
            });
    
            // Menggunakan AJAX untuk mengambil data dari server PHP saat formulir disubmit
            $('#verse-form').submit(function(event) {
                event.preventDefault();
    
                // Mengambil nilai kitab, pasal, dan ayat dari formulir
                var book = $('#book').val();
                var chapter = $('#chapter').val();
    
                // Mengirim permintaan ke server PHP dengan kitab, pasal, dan ayat yang dipilih
                $.ajax({
                    url: 'kristen.php',
                    type: 'GET',
                    data: { book: book, chapter: chapter },
                    success: function(response) {
                        console.log(response); 
                        // Menampilkan teks Alkitab di dalam div dengan id 'verse-container'
                        $('#verse-container').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.log("Error: " + error);
                    }
                });
            });
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="kitab_kris.js"></script>
    <script src="script.js"></script>
</body>
</html>