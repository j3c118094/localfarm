
<?php

    if ($hasFilled){
        echo "<script> 
        $( document ).ready(function() {
            $('input').prop('disabled', true); 
            $('textarea').prop('disabled', true); 
            $('#kues').css({'opacity': '0.3'});

            alert('Terima kasih telah mengisi kuesioner ini :)');
        });        
        </script>";
        echo "
        <div class='text-center my-3 font-weigth-bold'>Anda telah mengisi kuesioner ini sebelumnya</div>";
    }


?>

<section id="kues" class="container my-5">
    <div class="text-center bg-green w-100 rounded-border-full">
        <h2 class="font-weight-bold text-white py-1">KUESIONER</h2>
    </div> 

    <!-- Pertanyaan-->
    <form id="kuesioner" action="<?php echo site_url('Kuesioner/response'); ?>" method="POST" class="text-green mt-5-custom">
        <!-- NO 1 -->
        <div class="mb-3">
            <h4 for="" class="font-weight-bold text-justify font-kuis">
                1. Seberapa tahu anda tentang diversifikasi pangan?
            </h4>
            <label>
            <input type="radio" name="no_1" value="Sangat Tahu" class="mr-2">
            Sangat Tahu</label><br>
            <label>
            <input type="radio" name="no_1" value="Cukup Tahu" class="mr-2">
            Cukup Tahu</label><br>
            <label>
            <input type="radio" name="no_1" value="Tidak Tahu" class="mr-2">
            Tidak Tahu</label><br>
        </div>
        <!-- NO 2 -->
        <div class="mb-3">
            <h4 for="" class="font-weight-bold text-justify font-kuis">
                2. Apa saja yang termasuk pangan lokal menurut Anda?
            </h4>
            <textarea name="no_2" class="text-input-area" placeholder="Tuliskan jawaban Anda disini..."></textarea>
        </div>
        <!-- NO 3 -->
        <div class="mb-3">
            <h4 for="" class="font-weight-bold text-justify font-kuis">
                3. Seberapa sering Anda mengkonsumsi makanan lokal tersebut?
            </h4>
            <label>
            <input type="radio" name="no_3" value="Sangat Sering" class="mr-2">
            Sangat Sering</label><br>
            <label>
            <input type="radio" name="no_3" value="Sedang" class="mr-2">
            Sedang</label><br>
            <label>
            <input type="radio" name="no_3" value="Pernah" class="mr-2">
            Pernah</label><br>
            <label>
            <input type="radio" name="no_3" value="Tidak Pernah" class="mr-2">
            Tidak Pernah</label><br>
        </div>
        <!-- NO 4 -->
        <div class="mb-3">
            <h4 for="" class="font-weight-bold text-justify font-kuis">
                4. Menurut Anda apakah website kami sudah cukup membantu untuk informasi diversifikasi pangan?
            </h4>
            <label>
            <input type="radio" name="no_4" value="Sangat Membantu" class="mr-2">
            Sangat Membantu</label><br>
            <label>
            <input type="radio" name="no_4" value="Cukup Membantu" class="mr-2">
            Cukup Membantu</label><br>
            <label>
            <input type="radio" name="no_4" value="Tidak Membantu" class="mr-2">
            Tidak Membantu</label><br>
        </div>
        <!-- NO 5 -->
        <div class="mb-2">
            <h4 for="" class="font-weight-bold text-justify font-kuis">
                5. Kritik dan saran mengenai diversifikasi pangan?
            </h4>
            <textarea name="no_5" class="text-input-area" placeholder="Tuliskan kritik dan saran Anda disini..."></textarea>
        </div>

        <button class="btn btn-info px-4">Kirim</button>
    </form>
</section>