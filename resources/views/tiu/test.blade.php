<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIU Test</title>
    <style>
        /* CSS for modal overlay and content */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .modal-overlay.active {
            visibility: visible;
            opacity: 1;
        }
        .modal-content {
            background: #fff;
            padding: 20px;
            max-width: 800px;
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .modal-header {
            font-size: 1.2em;
            margin-bottom: 10px;
        }
        .modal-footer {
            margin-top: 20px;
        }
        .modal-footer button {
            padding: 10px 20px;
            margin: 0 5px;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: none;
            border-radius: 4px;
        }
        /* Styling for example image */
        .example-image {
            width: 100%;
            max-width: 300px;
            margin-top: 15px;
        }
        /* Hide the form initially */
        #testForm {
            display: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<!-- Modal 1: Konfirmasi Memulai Tes -->
<div id="startTestModal" class="modal-overlay">
    <div class="modal-content">
        <div class="modal-header">Anda yakin Memulai Tes ini?</div>
        <div class="modal-body">
            Tes Intelegensi Umum (Perhatikan lama waktu pengerjaan, setelah waktu habis maka soal akan tertutup dan jawaban tersimpan otomatis)
        </div>
        <div class="modal-footer">
            <button id="noButton" class="btn-secondary">No</button>
            <button id="yesButton" class="btn-primary">Yes</button>
        </div>
    </div>
</div>

<!-- Modal 2: Contoh Pengerjaan TIU -->
<div id="exampleModal" class="modal-overlay">
    <div class="modal-content">
        <h2>Contoh Pengerjaan TIU</h2>
        <div class="modal-body">
            Dihadapan anda terdapat soal-soal yang berbentuk gambar. Harap diperhatikan, pada bagian atas adalah soal dan di bagian bawahnya adalah pilihan jawaban.
            <br><br>
            Contoh 1: Bila gambar A dikecilkan, maka akan diperoleh gambar B. Sekarang, apabila gambar C dilakukan hal yang serupa, jadi C dikecilkan, maka akan diperoleh gambar…???? <br>
            Gambar 2, maka cara menjawabnya silahkan dilingkari gambar ke 2.
            <br>
            <img src="../images/tiu/contohtiu.png" alt="Contoh TIU" width="100%">
        </div>
        <div class="modal-footer">
            <button id="cancelButton" class="btn-secondary">Cancel</button>
            <button id="startTestButton" class="btn-primary">Mulai Test</button>
        </div>
    </div>
</div>

<!-- Form for TIU Test -->
<form id="testForm" action="{{ route('tiu.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="no_pendaftaran">No Pendaftaran</label>
        <input type="number" name="no_pendaftaran" class="form-control" required>
    </div>

    <!-- Tambahkan input untuk jwb1 - jwb30 -->
    @for ($i = 1; $i <= 30; $i++)
        <div class="form-group">
            <h3>Soal {{ $i }}</h3>
            
            <img src="../images/tiu/tiu{{ $i }}.png" alt="Contoh TIU" width="50%">
           <br>
            <div>
                <label><input type="radio" name="jwb{{ $i }}" value="1" required> 1</label>
                <label><input type="radio" name="jwb{{ $i }}" value="2"> 2</label>
                <label><input type="radio" name="jwb{{ $i }}" value="3"> 3</label>
                <label><input type="radio" name="jwb{{ $i }}" value="4"> 4</label>
                <label><input type="radio" name="jwb{{ $i }}" value="5"> 5</label>
            </div> 
            <hr>
            {{-- <textarea name="jwb{{ $i }}" class="form-control"></textarea> --}}
        </div>
    @endfor

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('tiu.index') }}" class="btn btn-secondary">Kembali</a>
</form>

<script>
    // Get elements for modal and buttons
    const startTestModal = document.getElementById('startTestModal');
    const exampleModal = document.getElementById('exampleModal');
    const testForm = document.getElementById('testForm');
    const yesButton = document.getElementById('yesButton');
    const noButton = document.getElementById('noButton');
    const cancelButton = document.getElementById('cancelButton');
    const startTestButton = document.getElementById('startTestButton');

    // Function to open a modal
    function openModal(modal) {
        modal.classList.add('active');
    }

    // Function to close a modal
    function closeModal(modal) {
        modal.classList.remove('active');
    }

    // Open the initial startTestModal on page load
    openModal(startTestModal);

    // Event listeners for buttons
    yesButton.addEventListener('click', function() {
        closeModal(startTestModal);  // Close the first modal
        openModal(exampleModal);     // Open the example modal
    });

    noButton.addEventListener('click', function() {
        closeModal(startTestModal);  // Close the modal and do nothing
    });

    cancelButton.addEventListener('click', function() {
        closeModal(exampleModal);    // Close the example modal
    });

    startTestButton.addEventListener('click', function() {
        closeModal(exampleModal);    // Close the modal and start the test
        testForm.style.display = 'block'; // Show the form
    });
</script>

</body>
</html>
