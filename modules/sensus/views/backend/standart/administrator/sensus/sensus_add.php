<!-- <script src="<?= BASE_ASSET ?>admin-lte/plugins/jQuery/jquery-3.7.1.min.js"></script> -->

<!-- load file audio -->
<!-- <audio id="tingtung" src="<?php echo base_url(); ?>assets/audio/tingtung.mp3"></audio> -->
<!-- <audio id="buzzer" src="<?= BASE_ASSET ?>/sound/aset ditemukan.mp3"></audio> -->
<!-- <audio id="buzzer" src="<?= BASE_ASSET ?>/sound/shop-scanner-beeps.wav"></audio> -->
<!-- <audio id="buzzer" src="<?= BASE_ASSET ?>/sound/clock-countdown-bleeps.wav"></audio> -->
<!-- <audio id="buzzer" src="<?= BASE_ASSET ?>/sound/comp_beep.wav"></audio> -->
<audio id="buzzer" src="<?= BASE_ASSET ?>/sound/comp_beep.mp3"></audio>
<!-- <audio id="buzzer" src="<?= BASE_ASSET ?>/sound/fast_dialing_cordless_phone.wav"></audio> -->
<script src="https://code.responsivevoice.org/responsivevoice.js?key=jQZ2zcdq"></script>

<style>
    #containerChart {
        display: block;
    }

    #containerHasilPencarian {
        display: block;
    }

    #containerHasilPencarianBulk {
        display: block;
    }

    /* #containerHeaderPilihAset {
        display: block;
    } */

    #containerHeaderPilihAsetAnomali {
        display: block;
    }

    /* #containerPilihAset {
        display: block;
    } */

    /* #containerPilihAsetFooter {
        display: block;
    } */

    #containerChartResult {
        display: block;
    }

    #container_total_rfid_tag {
        display: block;
    }

    .fa-trash-o {
        color: #ff0000;
        /* Warna default merah terang */
        font-size: 22px;
        /* Ukuran font tetap seperti yang diminta */
        cursor: pointer;
        /* Memastikan kursor pointer */
    }

    .fa-trash-o:hover {
        color: #ff4500;
        /* Warna saat di-hover (lebih cerah atau kontras) */
    }
</style>

<script src="<?= BASE_ASSET; ?>js/loadingoverlay.min.js"></script>

<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> -->

<script type="text/javascript">

    var is_wss_on = false;
    var dataArrayAset = [];
    var dataArrayAsetForBulk = [];
    var dataHasilSensusAnomali = [];

    var tidCountForBulk = {}; // Objek untuk menghitung frekuensi pembacaan TID
    var tidCountWrongRoom = {}; // Objek untuk menghitung frekuensi pembacaan TID
    var tidCountForeignTag = {}; // Objek untuk menghitung frekuensi pembacaan TID

    var tidCountForPartial = {}; // Objek untuk menghitung frekuensi pembacaan TID

    var chart_aset_real = 0;
    var chart_aset_found = 0;
    var chart_aset_not_found = 0;

    // for bulk

    var chart_aset_real_bulk = 0;
    var chart_aset_found_bulk = 0;
    var chart_aset_not_found_bulk = 0;

    var chart_aset_wrong_room = 0;
    var chart_aset_foreign_tag = 0;

    function prepareHasilSensusAnomali() {

        var flag_sensus_anomali = $('#flag_sensus_anomali').val();

        $("#your_table_id_bulk tbody tr").each(function (index, tr) {

            let cell = $(tr).find('td:eq(6)');
            let hasilPencarianAnomali = cell.text().trim();

            if (hasilPencarianAnomali === "Wrong Room Tag") {

                var id_aset = cell.attr('data-id');
                var nama_aset = cell.attr('data-nama-aset');
                var kode_aset = cell.attr('data-kode-aset');
                var nup = cell.attr('data-nup');
                var kode_tid = cell.attr('data-tid');

                var asset_condition_dropdown = $(tr).find('td:eq(8) select').val();

                // console.log('Data Aset Anomali: ', id_aset, nama_aset, kode_aset, nup, kode_tid, asset_condition_dropdown);

                dataHasilSensusAnomali.push({
                    id: id_aset,
                    kode_aset: kode_aset,
                    nup: nup,
                    nama_aset: nama_aset,
                    kode_tid: kode_tid,
                    is_found: 1,
                    kondisi_aset: asset_condition_dropdown,
                    flag_sensus: flag_sensus_anomali
                });

            }
        
        });

    }

    function checkAsetNotAvailable(){

        $("#your_table_id tbody tr").each(function (index, tr) {

            let cell = $(tr).find('td:eq(6)');
            let cellText = cell.text().trim();
            let flag_moving_in = $('#flag_moving_in').val();

            var tid = $(tr).find('td:eq(5)').text().trim();

            let cellSensus = $(tr).find('td:eq(9)');

            if (cellText === "Not Available") {

                cellSensus.html(`<input type="checkbox" value="1" id="flag_sensus_check_${tid}" style="margin-right: 5px;" checked disabled>Sudah`);
                cellSensus.css('background-color', 'rgb(144, 238, 144)');
                
                $.ajax({
                    url: ADMIN_BASE_URL + '/sensus/ajax_check_aset_not_available/',
                    type: 'GET',
                    data: {
                        tid: tid,
                        flag_moving_in: flag_moving_in
                    },
                    dataType: 'JSON',
                })
                .done(function(res) {

                    if (res.check > 0) {

                        let status = res.data.status;
                        let nama_lokasi_terakhir = res.data.nama_lokasi_terakhir;
                        let nama_aset = res.data.nama_aset;

                        let cell_settlement = $(tr).find('td:eq(7)');

                        console.log('Aset dengan TID: ' + tid + ', nama aset: ' + nama_aset + ', status: ' + status + ', lokasi terakhir: ' + nama_lokasi_terakhir);
                        cell_settlement.text('Status:' + status + ', Lokasi Terakhir: ' + nama_lokasi_terakhir).css('background-color', 'rgb(144, 238, 144)');

                    } else {
                        console.log('Aset dengan TID: ' + tid + ' tidak ditemukan di master aset');
                    }

                })
                .fail(function() {
                    console.log('Error saat check Aset dengan TID: ' + tid);
                });

            }

        });

    }

    function hitungDataPencarian() {
        
        // Menghitung jumlah "Available" dan "Not Available"
        let availableCount = 0;
        let notAvailableCount = 0;

        let metode_pencarian = $('#metode_pencarian').val();

        if (metode_pencarian == 'partial') {

            $("#your_table_id tbody tr").each(function (index, tr) {
                let cell = $(tr).find('td:eq(6)');
                let cellText = cell.text().trim();
                if (cellText === "Available") {
                    availableCount++;
                } else if (cellText === "Not Available") {
                    notAvailableCount++;
                }
            });
            
            chart_aset_found = availableCount;
            chart_aset_not_found = notAvailableCount;

        } else if (metode_pencarian == 'bulk') {
            chart_aset_found_bulk = availableCount;
            chart_aset_not_found_bulk = notAvailableCount;
        }

        // Tampilkan hasilnya
        console.log("Available:", availableCount);
        console.log("Not Available:", notAvailableCount);
        console.log("Total:", availableCount + notAvailableCount);

    }

    function setDropdownValue(idDropdown, storageKey) {
        let value = localStorage.getItem(storageKey);
        if (value) {
            // console.log(`${storageKey} tersimpan:`, value);

            // Cek apakah opsi sudah tersedia
            let interval = setInterval(function() {
                let $dropdown = $('#' + idDropdown);
                if ($dropdown.find(`option[value="${value}"]`).length) {
                    $dropdown.val(value).trigger('change');
                    $dropdown.trigger('chosen:updated'); // Update Chosen
                    // console.log(`${storageKey} berhasil di trigger dan diupdate`);
                    clearInterval(interval); // Stop interval setelah berhasil
                }
            }, 200); // Cek setiap 200ms
        }
    }

    async function confirmCancelSearch(metode_pencarian) {

        let isi_text = '';

        if (metode_pencarian == 'partial') {
            // jangan di reset dah kasian
            isi_text = "";
        } else {
            isi_text = "Jika ya maka pencarian akan dihentikan, semua data akan direset.";
        }
               
        const result = await Swal.fire({
          title: 'Apakah Anda yakin ingin membatalkan pencarian aset secara ' + metode_pencarian + '?',
          text: isi_text,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Ya, batalkan!',
          cancelButtonText: 'Batal',
          allowOutsideClick: false  // Blok klik di luar alert
        });

        // Kembalikan true jika pengguna memilih 'Ya'
        if (result.isConfirmed) {
            return true;
        }

        // Kembalikan false jika klik batal atau tutup popup
        return false;
    }

    async function confirmSearch() {

        const result = await Swal.fire({
            title: 'Apakah Anda yakin ingin mulai pencarian ulang?',
            text: "Jika ya maka pencarian akan dimulai dari awal, semua data akan direset.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, mulai ulang!',
            cancelButtonText: 'Batal',
            allowOutsideClick: false  // Blok klik di luar alert
        });

        // Kembalikan true jika pengguna memilih 'Ya'
        if (result.isConfirmed) {
            return true;
        }
                
        // Kembalikan false jika klik batal atau tutup popup
        return false;
    }

    function playTtsPencarian(free_text_tts) {

        try {
            responsiveVoice.speak(free_text_tts, "Indonesian Female", {
                rate: 0.9,
                pitch: 1,
                volume: 1,
                onend: function() {
                    console.log('speaking:', free_text_tts + 'selesai di speak');
                }

            });

            console.log('speaking:', free_text_tts);

        } catch (error) {
            console.error('Error saat memutar suara:', error);
        }

    }

    // function playBuzzerPencarian() {
    //     var bell = document.getElementById('buzzer');
    //     bell.currentTime = 0;
    //     bell.play();
    //     setTimeout(function(){
    //         bell.pause();
    //     }, 2000);
    // }

    function playBuzzerPencarian() { 
        var bell = document.getElementById('buzzer');
        
        // Hentikan dulu jika sedang diputar, lalu putar ulang
        if (!bell.paused) {
            bell.pause();
            bell.currentTime = 0;  // Restart dari awal
        }
        
        bell.play().catch(error => console.log("Audio error: ", error));
    }

    function removeAllRow() {

        var rowCount = $('#your_table_id tbody tr').length;

        if (rowCount == 0) {
            return false;
        }

        $('#your_table_id tbody').empty();
        fixingNumbering('partial');
        $('#total_rfid_tag').html(0);
        $('#total_aset_checklist').html(0);
        $('#string_id').val('');
        $('#data_array_aset').val('');

        // sebelum data di delete

        console.log('before delete all row : ' + Object.keys(tidCountForPartial).length);

        dataArrayAset = [];
        tidCountForPartial = {};

        console.log('after delete all row : ' + Object.keys(tidCountForPartial).length);

        chart_aset_real = 0;
        chart_aset_found = 0;
        chart_aset_not_found = 0;

        $('#chart_aset_real').html(0);
        $('#chart_aset_found').html(0);
        $('#chart_aset_not_found').html(0);

        // $('#help_text').html(JSON.stringify(dataArrayAset));

    }

    function removeAllRowBulk() {

        var rowCount = $('#your_table_id_bulk tbody tr').length;

        if (rowCount == 0) {
            return false;
        }

        $('#your_table_id_bulk tbody').empty();
        fixingNumbering('bulk');

        $('#total_rfid_tag').html(0);
        $('#total_aset_checklist').html(0);
        $('#string_id').val('');
        $('#data_array_aset').val('');

        // sebelum data di delete

        console.log('before delete all row : ' + Object.keys(tidCountForBulk).length);

        dataArrayAsetForBulk = [];
        tidCountForBulk = {};
        tidCountWrongRoom = {};
        tidCountForeignTag = {};

        console.log('after delete all row : ' + Object.keys(tidCountForBulk).length);

        chart_aset_real_bulk = 0;
        chart_aset_found_bulk = 0;
        chart_aset_not_found_bulk = 0;

        $('#chart_aset_real').html(0);
        $('#chart_aset_found').html(0);
        $('#chart_aset_not_found').html(0);

        // $('#help_text').html(JSON.stringify(dataArrayAsetForBulk));

        // another tag

        chart_aset_wrong_room = 0;
        chart_aset_foreign_tag = 0;

        $('#chart_aset_wrong_room').html(0);
        $('#chart_aset_foreign_tag').html(0);

    }

    function removeRow(row, tid) {

        var index = dataArrayAset.findIndex(x => x.kode_tid === tid);
        if (index > -1) {
            dataArrayAset.splice(index, 1);
        }

        var rowCount = $('#your_table_id tbody tr').length;
        $(row).closest('tr').remove();
        fixingNumbering('partial');

        if (tidCountForPartial[tid]) {
            console.log('Hapus data TID: ' + tid + ' berhasil');
            delete tidCountForPartial[tid];
        }

        // Menghitung jumlah "Available" dan "Not Available"
        let availableCount = 0;
        let notAvailableCount = 0;

        $("#your_table_id tbody tr").each(function(index, tr) {
            let cell = $(tr).find('td:eq(6)'); // Ambil td dengan index 5
            let cellText = cell.text().trim(); // Ambil teks dan hapus spasi
            if (cellText === "Available") {
                availableCount++;
            } else if (cellText === "Not Available") {
                notAvailableCount++;
            }
        });

        // Tampilkan hasilnya
        console.log("Available:", availableCount);
        console.log("Not Available:", notAvailableCount);

        $('#total_rfid_tag').html(rowCount - 1);
        $('#total_aset_checklist').html(rowCount - 1);

        // chart_aset_real = rowCount-1;
        chart_aset_real = dataArrayAset.length-1;
        chart_aset_found = availableCount;
        chart_aset_not_found = notAvailableCount;

        $('#chart_aset_real').html(chart_aset_real);
        $('#chart_aset_found').html(chart_aset_found);
        $('#chart_aset_not_found').html(chart_aset_not_found);

        // $('#help_text').html(JSON.stringify(dataArrayAset));

    }

    function removeRowBulk(row, tid) {

        // var index = dataArrayAset.findIndex(x => x.kode_tid === tid);
        // if (index > -1) {
        //     dataArrayAset.splice(index, 1);
        // }

        var rowCount = $('#your_table_id_bulk tbody tr').length;
        $(row).closest('tr').remove();
        fixingNumbering('bulk');

        if (tidCountForBulk[tid]){
            console.log('Hapus data TID: ' + tid + ' berhasil');
            delete tidCountForBulk[tid];
        }

        if (tidCountWrongRoom[tid]) {
            console.log('Hapus data TID Wrong Room: ' + tid + ' berhasil');
            delete tidCountWrongRoom[tid];
        }

        if (tidCountForeignTag[tid]) {
            console.log('Hapus data TID Unidentified TAG: ' + tid + ' berhasil');
            delete tidCountForeignTag[tid];
        }

        chart_aset_wrong_room = Object.keys(tidCountWrongRoom).length;
        chart_aset_foreign_tag = Object.keys(tidCountForeignTag).length;

        $('#chart_aset_wrong_room').html(chart_aset_wrong_room);
        $('#chart_aset_foreign_tag').html(chart_aset_foreign_tag);

        // $('#help_text').html(JSON.stringify(dataArrayAset));

    }

    function fixingNumbering(metode_pencarian) {

        if (metode_pencarian == "partial") {
            $('#your_table_id tbody tr').each(function(index) {
                $(this).find('td#numbering').text(index + 1);
            });
        } else {
            $('#your_table_id_bulk tbody tr').each(function(index) {
                $(this).find('td#numbering').text(index + 1);
            });
        }

    }

    //get value from checkbox table
    async function get_datatables_checked() {
        var table = $('#asetTable').DataTable();
        var rowcollection = table.$(".cekbok:checked", {
            "page": "all"
        });
        var string_id = "";
        var no = 1;
        var rowCount = $('#your_table_id tbody tr').length;

        // $('#your_table_id tbody').empty();

        for (let i = 0; i < rowcollection.length; i++) {
            let elem = rowcollection[i];

            var id = $(elem).val();
            var nama_aset = $(elem).data("nama-aset");
            var kode_aset = $(elem).data("kode-aset");
            var nup = $(elem).data("nup");
            var kode_tid = $(elem).data("kode-tid");

            // Cek apakah kode_tid sudah ada di dataArrayAset
            var tidExists = dataArrayAset.some(function(item) {
                return item.kode_tid === kode_tid;
            });

            // Hanya tambahkan jika kode_tid belum ada
            if (!tidExists) {

                dataArrayAset.push({
                    id: id,
                    kode_aset: kode_aset,
                    nup: nup,
                    nama_aset: nama_aset,
                    kode_tid: kode_tid
                });

                let rows = $("#your_table_id tbody tr");
                let found = false;

                for (let j = 0; j < rows.length; j++) {
                    // Cari kolom dengan id yang sama dengan tid
                    var hasilPencarianCell = $(rows[j]).find("td[id='" + kode_tid + "']");
                    
                    // Jika ditemukan kolom dengan id yang sesuai
                    if (hasilPencarianCell.length > 0) {
                        console.log('Data dengan TID ' + kode_tid + ' sudah ada');
                        found = true;
                        break;
                    }
                }

                if (!found) {
                    
                    // tampilkan data di table hasil pencarian
                    await new Promise(resolve => {        
                        $('#your_table_id tbody').append(`
                            <tr>    
                                <td id="numbering" style="text-align: center">${no}</td>
                                <td id="asset_id" style="text-align: center">${id}</td>
                                <td id="asset_name" style="text-align: left">${nama_aset}</td>
                                <td id="asset_code" style="text-align: left">${kode_aset}</td>
                                <td id="asset_nup" style="text-align: center">${nup}</td>
                                <td id="asset_tid_${kode_tid}" style="text-align: center">${kode_tid}</td>
                                <td id="${kode_tid}" style="text-align: center; background-color: #FF0000">Not Available</td>
                                <td style="text-align: center">
                                    <i class="ui-tooltip fa fa-trash-o" title="Hapus Data" style="font-size: 22px; cursor:pointer;" data-original-title="Hapus Semua Data" onclick="removeRow(this, '${kode_tid}')"></i>
                                </td>
                            </tr>
                        `);
                        resolve();
                    });

                    no = no + 1;
                }

            }

            string_id = string_id + "~" + id;
            console.log(string_id);

            // if (tidExists) {
                
            //     $("#your_table_id tbody tr").each(function () {
                                    
            //         // Cari kolom dengan id yang sama dengan tid
            //         var hasilPencarianCell = $(this).find("td[id='" + kode_tid + "']");
                                        
            //         // Jika ditemukan kolom dengan id yang sesuai
            //         if (hasilPencarianCell.length > 0) {

            //             hasilPencarianCell.text('Not Available').css('background-color', '#FF0000');
            //             console.log('Data dengan TID ' + kode_tid + ' ditemukan');

            //         } else {
            //             console.log('Data dengan TID ' + kode_tid + ' tidak ditemukan');
            //         }

            //     });

            // }
            
        }

        if (string_id == "") {

            await new Promise(resolve => {
                Swal.fire({
                    title: "Perhatian !",
                    text: "Pilih / Ceklis dulu data yang ingin di cari !!",
                    icon: 'warning',
                    allowOutsideClick: false
                });
                resolve();
            });

            return false;

        } else {

            // let jumlah_aset_with_tag = $('#your_table_id tbody tr').length;
            let jumlah_aset_with_tag = dataArrayAset.length;

            $('#total_rfid_tag').html(jumlah_aset_with_tag);
            $('#total_aset_checklist').html(jumlah_aset_with_tag);
            $('#string_id').val(string_id);
            // $('#data_array_aset').val(JSON.stringify(dataArrayAset)); // Menyimpan array data ke hidden input

            fixingNumbering('partial');

            $('#chart_aset_real').html(jumlah_aset_with_tag);
            // $('#chart_aset_found').html('0');
            // $('#chart_aset_not_found').html(jumlah_aset_with_tag);

            chart_aset_real = jumlah_aset_with_tag;
            // chart_aset_found = 0;
            // chart_aset_not_found = jumlah_aset_with_tag;

            return true;
        }
    }

    async function getAllAset() {

        var rowCount = $('#your_table_id tbody tr').length;
        var no = rowCount + 1;
        var string_id = "";

        try {
            const response = await $.ajax({
                url: ADMIN_BASE_URL + '/pencarian_aset/get_all_aset',
                type: 'GET',
                dataType: 'json',
                data: {
                    id_area: $('#id_area').val(),
                    id_gedung: $('#id_gedung').val(),
                    id_ruangan: $('#id_ruangan').val(),
                    metode_pencarian: $('#metode_pencarian').val()
                }
            });

            if (response.success) {

                if (response.data.length == 0) {

                    await new Promise(resolve => {
                        Swal.fire({
                            title: "Perhatian !",
                            text: "Data aset kosong !!",
                            icon: 'warning',
                            allowOutsideClick: false
                        });
                        resolve();
                    });
                    
                    return false;

                }

                for (const item of response.data) {

                    // Cek apakah kode_tid sudah ada dalam array
                    let tidExists = dataArrayAset.some(data => data.kode_tid === item.kode_tid);

                    if (!tidExists) {

                        // Menambahkan data ke array jika kode_tid belum ada
                        dataArrayAset.push({
                            id: item.id_aset,
                            kode_aset: item.kode_aset,
                            nup: item.nup,
                            nama_aset: item.nama_aset,
                            kode_tid: item.kode_tid
                        });

                        let rows = $("#your_table_id tbody tr");
                        let found = false;

                        for (let j = 0; j < rows.length; j++) {
                            // Cari kolom dengan id yang sama dengan tid
                            var hasilPencarianCell = $(rows[j]).find("td[id='" + item.kode_tid + "']");
                            
                            // Jika ditemukan kolom dengan id yang sesuai
                            if (hasilPencarianCell.length > 0) {
                                console.log('Data dengan TID ' + item.kode_tid + ' sudah ada');
                                found = true;
                                break;
                            }
                        }

                        if (!found) {
                            // tampilkan data di table hasil pencarian
                            await new Promise(resolve => {
                                $('#your_table_id tbody').append(`
                                    <tr>    
                                        <td id="numbering" style="text-align: center">${no}</td>
                                        <td id="asset_id" style="text-align: center">${item.id_aset}</td>
                                        <td id="asset_name" style="text-align: left">${item.nama_aset}</td>
                                        <td id="asset_code" style="text-align: left">${item.kode_aset}</td>
                                        <td id="asset_nup" style="text-align: center">${item.nup}</td>
                                        <td id="asset_tid_${item.kode_tid}" style="text-align: center">${item.kode_tid}</td>
                                        <td id="${item.kode_tid}" style="text-align: center; background-color: #FF0000">Not Available</td>
                                        <td style="text-align: center">
                                            <i class="ui-tooltip fa fa-trash-o" title="Hapus Data" style="font-size: 22px; cursor:pointer;" data-original-title="Hapus Semua Data" onclick="removeRow(this, '${item.kode_tid}')"></i>
                                        </td>
                                    </tr>
                                `);
                                resolve();
                            });

                            no = no + 1;
                        }

                    }

                    string_id = string_id + "~" + item.id_aset;
                    console.log(string_id);
                    
                    // if (found) {

                    //     $("#your_table_id tbody tr").each(function () {
                                    
                    //         // Cari kolom dengan id yang sama dengan tid
                    //         var hasilPencarianCell = $(this).find("td[id='" + item.kode_tid + "']");
                                    
                    //         // Jika ditemukan kolom dengan id yang sesuai
                    //         if (hasilPencarianCell.length > 0) {

                    //             hasilPencarianCell.text('Not Available').css('background-color', '#FF0000');
                    //             console.log('Data dengan TID ' + item.kode_tid + ' ditemukan');

                    //         } else {
                    //             console.log('Data dengan TID ' + item.kode_tid + ' tidak ditemukan');
                    //         }

                    //     });

                    // }

                }

                // let jumlah_aset_with_tag = $('#your_table_id tbody tr').length;
                let jumlah_aset_with_tag = dataArrayAset.length;

                $('#total_rfid_tag').html(jumlah_aset_with_tag);
                $('#total_aset_checklist').html(jumlah_aset_with_tag);
                $('#string_id').val(string_id);
                $('#data_array_aset').val(JSON.stringify(dataArrayAset));

                fixingNumbering('partial');

                $('#chart_aset_real').html(jumlah_aset_with_tag);
                // $('#chart_aset_found').html('0');
                // $('#chart_aset_not_found').html(jumlah_aset_with_tag);

                chart_aset_real = jumlah_aset_with_tag;
                // chart_aset_found = 0;
                // chart_aset_not_found = jumlah_aset_with_tag;

                return true;
            }

        } catch (error) {
            console.error(error);
        }
    }

    function get_check_unique_data(uniqueDataArray) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: ADMIN_BASE_URL + '/pencarian_aset/check_unique_data',
                type: 'GET',
                dataType: 'json',
                data: {
                    uniqueData: JSON.stringify(uniqueDataArray)
                },
                success: function(response) {
                    resolve(response);
                },
                error: function(xhr, status, error) {
                    reject(error);
                }
            });
        });
    }

    function get_check_unique_single_tag(tid) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: ADMIN_BASE_URL + '/sensus/check_unique_single_tag',
                type: 'GET',
                dataType: 'json',
                data: {
                    tid: tid
                },
                success: function(response) {
                    resolve(response);
                },
                error: function(xhr, status, error) {
                    reject(error);
                }
            });
        });
    }

    async function getAllAsetForBulk() {

        document.getElementById('myChartPencarian').getContext('2d').clearRect(0, 0, chart.canvas.width, chart.canvas.height);
        chart.data.datasets[0].data = [0, 0, 0];
        chart.update();

        var string_id = "";
        var jumlah_aset_with_tag = 0;

        var rowCount = $('#your_table_id tbody tr').length;
        var no = rowCount + 1;

        try {

            const response = await $.ajax({
                url: ADMIN_BASE_URL + '/sensus/get_all_aset',
                type: 'GET',
                dataType: 'json',
                data: {
                    id_area: $('#id_area').val(),
                    id_gedung: $('#id_gedung').val(),
                    id_ruangan: $('#id_ruangan').val(),
                    metode_pencarian: 'bulk'
                }
            });

            if (!response.success) {
                await Swal.fire({
                    title: 'Perhatian!',
                    text: response.message,
                    icon: 'error',
                    allowOutsideClick: false
                });
                return;
            }

            if (response.success) {

                if (response.data.length === 0) {
                    await Swal.fire({
                        title: 'Perhatian!',
                        text: 'Data tidak ditemukan!',
                        icon: 'warning',
                        allowOutsideClick: false
                    });
                    return;
                }

                for (const item of response.data) {
                    // count++;

                    // Cek apakah kode_tid sudah ada dalam array
                    let tidExists = dataArrayAsetForBulk.some(data => data.kode_tid === item.kode_tid);

                    if (!tidExists) {

                        // Menambahkan data ke array jika kode_tid belum ada
                        dataArrayAsetForBulk.push({
                            id: item.id_aset,
                            kode_aset: item.kode_aset,
                            nup: item.nup,
                            nama_aset: item.nama_aset,
                            kode_tid: item.kode_tid,
                            is_found: flag_status_not_available,
                            kondisi_aset: flag_kondisi_baik,
                            flag_sensus: flag_status_available
                        });

                    }

                    string_id = string_id + "~" + item.id_aset;

                    let rows = $("#your_table_id tbody tr");
                    let found = false;

                    for (let j = 0; j < rows.length; j++) {
                        // Cari kolom dengan id yang sama dengan tid
                        var hasilPencarianCell = $(rows[j]).find("td[id='" + item.kode_tid + "']");
                            
                        // Jika ditemukan kolom dengan id yang sesuai
                        if (hasilPencarianCell.length > 0) {
                            console.log('Data dengan TID ' + item.kode_tid + ' sudah ada');
                            found = true;
                            break;
                        }
                    }

                    if (!found) {
                        // tampilkan data di table hasil pencarian
                        await new Promise(resolve => {
                            $('#your_table_id tbody').append(`
                                <tr>    
                                    <td id="numbering" style="text-align: center">${no}</td>
                                    <td id="asset_id" style="text-align: center">${item.id_aset}</td>
                                    <td id="asset_name" style="text-align: left">${item.nama_aset}</td>
                                    <td id="asset_code" style="text-align: left">${item.kode_aset}</td>
                                    <td id="asset_nup" style="text-align: center">${item.nup}</td>
                                    <td id="asset_tid_${item.kode_tid}" style="text-align: center">${item.kode_tid}</td>
                                    <td id="${item.kode_tid}" style="text-align: center; background-color: #FF0000">Not Available</td>

                                    <td id="settlement_${item.kode_tid}" style="text-align: center;">-</td>
                                    
                                    <td id="asset_condition_${item.kode_tid}" style="text-align: center;">
                                        <select id="asset_condition_dropdown_${item.kode_tid}" style="margin: 0 auto;">
                                            <option value="1">Baik</option>
                                            <option value="2">Rusak Ringan</option>
                                            <option value="3">Rusak Berat</option>
                                            <option value="4">Belum Tahu</option>
                                        </select>
                                    </td>
                                    
                                    <td id="flag_sensus_${item.kode_tid}" style="text-align: center; background-color: #FF0000">
                                        <input type="checkbox" value="0" id="flag_sensus_check_${item.kode_tid}" style="margin-right: 5px;">
                                        Belum
                                    </td>

                                    <td style="text-align: center">
                                        <i class="ui-tooltip fa fa-trash-o" title="Hapus Data" style="font-size: 22px; cursor:pointer;" data-original-title="Hapus Semua Data" onclick="removeRow(this, '${item.kode_tid}')"></i>
                                    </td>
                                </tr>
                            `);
                            resolve();
                        });

                        no = no + 1;
                    }

                } // end for

                jumlah_aset_with_tag = response.data.length;

                $('#chart_aset_real').html(jumlah_aset_with_tag);
                $('#chart_aset_found').html('0');
                $('#chart_aset_not_found').html(jumlah_aset_with_tag);

                chart.data.datasets[0].data = [jumlah_aset_with_tag, 0, jumlah_aset_with_tag];
                chart.update();

                $('#total_rfid_tag').html('0');
                // $('#total_aset_checklist').html(count+rowCount);
                $('#string_id').val(string_id);
                $('#data_array_aset').val(JSON.stringify(dataArrayAsetForBulk));

                chart_aset_real_bulk = jumlah_aset_with_tag;
                chart_aset_found_bulk = 0;
                chart_aset_not_found_bulk = jumlah_aset_with_tag;

                fixingNumbering('partial');

                // $('#help_text').html(JSON.stringify(dataArrayAsetForBulk));

            }

        } catch (error) {
            console.error(error);
        }
    }
</script>

<section class="content-header">
    <h1>
        Sensus Aset<small><?= cclang('new', ['Sensus Aset']); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/sensus'); ?>">Sensus Aset</a></li>
        <li class="active"><?= cclang('new'); ?></li>
    </ol>
</section>

<section class="content">

    <!-- Insert New Data box -->
    <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title">Isi data pada form dengan lengkap dan benar</h3>
            <div class="box-tools pull-right">
                <!-- <button type="button" onClick="window.location='<?php echo site_url(); ?>aset';" class="btn btn-default"><i class="fa fa-undo"></i> Cancel</button> -->
            </div>
        </div>

        <div class="box-body" id="add_new">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <?= form_open('', [
                    'name' => 'form_sensus_add',
                    // 'class' => 'form-horizontal form-step',
                    // 'class' => 'form-step',
                    'id' => 'form_sensus_add',
                    'enctype' => 'multipart/form-data',
                    'method' => 'POST',
                    'autocomplete' => 'off',
                    'class' => 'form form-horizontal'
                ]);
                ?>

                <?php
                $user_groups = $this->model_group->get_user_group_ids();
                ?>

                <h3 style="text-decoration: underline;">Form Sensus</h3>
                <!-- <hr> -->

                <!-- <section> -->
                <fieldset>

                    <!-- <div class="form-group group-tipe_transaksi ">
                            <label for="tipe_transaksi" class="col-sm-2 control-label">Tipe Transaksi<i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="tipe_transaksi" id="tipe_transaksi" data-placeholder="Select Tipe Transaksi">
                                    <option value=""></option>
                                    <?php
                                    $conditions = [];
                                    ?>

                                    <?php foreach (db_get_all_data('tb_master_type_transaksi', $conditions) as $row): ?>
                                    <option value="<?= $row->id ?>"><?= $row->tipe_transaksi; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div> -->

                    <input type="hidden" name="ip_address_server" id="ip_address_server" value="<?= $pengaturan_sistem->ip_address_server; ?>">
                    <input type="hidden" name="port_ws_server" id="port_ws_server" value="<?= $pengaturan_sistem->port_ws_server; ?>">

                    <input type="hidden" name="flag_status_available" id="flag_status_available" value="<?= $pengaturan_sistem->flag_status_available; ?>">
                    <input type="hidden" name="flag_status_not_available" id="flag_status_not_available" value="<?= $pengaturan_sistem->flag_status_not_available; ?>">
                    <input type="hidden" name="flag_kondisi_baik" id="flag_kondisi_baik" value="<?= $pengaturan_sistem->flag_kondisi_baik; ?>">
                    <input type="hidden" name="flag_sensus_normal" id="flag_sensus_normal" value="<?= $pengaturan_sistem->flag_sensus_normal; ?>">
                    <input type="hidden" name="flag_sensus_anomali" id="flag_sensus_anomali" value="<?= $pengaturan_sistem->flag_sensus_anomali; ?>">

                    <input type="hidden" name="tipe_transaksi" id="tipe_transaksi" value="3">
                    <input type="hidden" name="status_transaksi" id="status_transaksi" value="1">
                    <input type="hidden" name="id_pegawai_input" id="id_pegawai_input" value="0">
                    <input type="hidden" name="nama_pegawai_input" id="nama_pegawai_input" value="0">
                    <input type="hidden" name="id_pegawai" id="id_pegawai" value="0">
                    <input type="hidden" name="nama_pegawai" id="nama_pegawai" value="0">

                    <!-- <div class="form-group group-status_transaksi ">
                            <label for="status_transaksi" class="col-sm-2 control-label">Status Transaksi<i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="status_transaksi" id="status_transaksi" placeholder="Status Transaksi" value="<?= set_value('status_transaksi'); ?>">
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div> -->

                    <div class="form-group group-tgl_awal_transaksi ">
                        <label for="tgl_awal_transaksi" class="col-sm-2 control-label">Tgl Awal Transaksi<i class="required">*</i>
                        </label>
                        <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                                <input type="text" class="form-control pull-right datepicker" name="tgl_awal_transaksi" placeholder="Tgl Awal Transaksi" id="tgl_awal_transaksi">
                            </div>
                            <small class="info help-block">
                            </small>
                        </div>
                    </div>

                    <div class="form-group group-ket_transaksi ">
                        <label for="ket_transaksi" class="col-sm-2 control-label">Ket Transaksi<i class="required">*</i>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="ket_transaksi" id="ket_transaksi" placeholder="Ket Transaksi" value="<?= set_value('ket_transaksi'); ?>">
                            <small class="info help-block">
                                <b>Input Ket Transaksi</b> Max Length : 500.</small>
                        </div>
                    </div>

                    <!-- <div class="form-group group-id_pegawai_input ">
                            <label for="id_pegawai_input" class="col-sm-2 control-label">Id Pegawai Input</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="id_pegawai_input" id="id_pegawai_input" placeholder="Id Pegawai Input" value="<?= set_value('id_pegawai_input'); ?>">
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>

                        <div class="form-group group-nama_pegawai_input ">
                            <label for="nama_pegawai_input" class="col-sm-2 control-label">Nama Pegawai Input</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_pegawai_input" id="nama_pegawai_input" placeholder="Nama Pegawai Input" value="<?= set_value('nama_pegawai_input'); ?>">
                                <small class="info help-block">
                                    <b>Input Nama Pegawai Input</b> Max Length : 100.</small>
                            </div>
                        </div> -->

                </fieldset>
                <!-- </section> -->

                <h3 style="text-decoration: underline;">Pilih Area</h3>

                <!-- <section> -->
                <fieldset>

                    <div class="form-group group-id_area ">
                        <label for="id_area" class="col-sm-2 control-label">Area<i class="required">*</i></label>
                        <div class="col-sm-8">
                            <select class="form-control chosen chosen-select-deselect" name="id_area" id="id_area" data-placeholder="Pilih Area">
                                <option value=""></option>
                                <?php foreach (db_get_all_data('tb_master_area') as $row): ?>
                                    <option value="<?= $row->id ?>"><?= $row->area; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="info help-block">
                            </small>
                        </div>
                    </div>

                    <div class="form-group group-id_gedung ">
                        <label for="id_gedung" class="col-sm-2 control-label">Gedung<i class="required">*</i></label>
                        <div class="col-sm-8">
                            <select class="form-control chosen chosen-select-deselect" name="id_gedung" id="id_gedung" data-placeholder="Pilih Gedung">
                                <option value=""></option>
                            </select>
                            <small class="info help-block">
                            </small>
                        </div>
                    </div>

                    <div class="form-group group-id_ruangan ">
                        <label for="id_ruangan" class="col-sm-2 control-label">Ruangan<i class="required">*</i></label>
                        <div class="col-sm-8">
                            <select class="form-control chosen chosen-select-deselect" name="id_ruangan" id="id_ruangan" data-placeholder="Pilih Ruangan">
                                <option value=""></option>
                            </select>
                            <small class="info help-block">
                            </small>
                        </div>
                    </div>

                    <!-- <div class="form-group group-metode_pencarian">
                        <label for="metode_pencarian" class="col-sm-2 control-label">Metode Pencarian</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="metode_pencarian_terakhir" id="metode_pencarian_terakhir" value="partial">
                            <select class="form-control" name="metode_pencarian" id="metode_pencarian">
                                <option value="partial" selected>Parsial</option>
                                <option value="bulk">Bulk</option>
                            </select>
                            <small class="info help-block"></small>
                        </div>
                    </div> -->

                    <!-- </section> -->
                </fieldset>

                <h3 style="text-decoration: underline;">Pengaturan Handheld</h3>

                <!-- <div id="containerHeaderPilihAset">
                    <h3 style="text-decoration: underline;">Pilih Aset</h3>
                </div> -->
                <!-- <hr> -->

                <!-- <fieldset id="containerPilihAset">

                    <div class="row" style="margin-top: 10px; margin-bottom: 20px">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="asetTable">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center" class="check"><input type="checkbox" id="checkall" value="" /></th>
                                            <th style="text-align: center">No.</th>
                                            <th style="text-align: center">ID Aset</th>
                                            <th style="text-align: center">Nama Aset</th>
                                            <th style="text-align: center">Kode Aset</th>
                                            <th style="text-align: center">Kode NUP</th>
                                            <th style="text-align: center">Kode Tag</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </fieldset> -->

                <!-- <fieldset id="containerPilihAsetFooter">

                    <div class="row" style="margin-top: 10px; margin-bottom: 20px">

                        <div class="col-md-3"></div>

                        <div class="col-md-6">
                            <input type="hidden" name="data_array_aset" id="data_array_aset" value="0">
                            <input type="hidden" name="string_id" id="string_id" value="0">

                            <a class="btn btn-flat btn-success btn_search btn_action btn_search_back btn-block" id="btn_pilih_aset" data-stype='back' title="Search">
                                <i class="ion ion-ios-list-outline"></i> Pilih Aset
                            </a>

                            <small class="info help-block"><b>Total aset:</b>
                                <div id="total_aset_checklist"></div>
                            </small>
                        </div>

                        <div class="col-md-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="select_all" value="0"> Pilih Semua
                                </label>
                            </div>
                        </div>

                    </div>

                </fieldset> -->

                <!-- <h3 style="text-decoration: underline;">Hasil Pencarian</h3> -->

                <fieldset>

                    <div class="row">

                        <div class="col-md-3"></div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">IP Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ip_address" name="ip_address" placeholder="IP Address">
                                </div>
                            </div>

                        </div>

                        <div class="col-md-3"></div>

                    </div>

                </fieldset>

                <!-- <fieldset>

                        <div class="row">

                            <div class="col-md-3"></div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Single RFID Tag</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="single_rfid_tag" name="single_rfid_tag" placeholder="Single RFID Tag">
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-flat btn-primary btn_search btn_action btn_search_back btn-block" id="btn_search_single_tag" data-stype='back' title="Search">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-3"></div>
                            
                        </div>

                        <div class="row">

                            <div class="col-md-3"></div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kode EPC</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="single_kode_epc" name="single_kode_epc" placeholder="Kode EPC">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-3"></div>
                            
                        </div>

                    </fieldset> -->

                <div class="row">

                    <div class="col-md-3">
                        <input type="hidden" name="array_tag_code" id="array_tag_code" value="0">
                        <input type="hidden" name="is_web_play_buzzer" id="is_web_play_buzzer" value="<?php echo $pengaturan_sistem->is_web_play_buzzer ?>">
                        <input type="hidden" name="ip_address_server" id="ip_address_server" value="<?php echo $pengaturan_sistem->ip_address_server ?>">
                        <input type="hidden" name="protocol_ws_server" id="protocol_ws_server" value="<?php echo $pengaturan_sistem->protocol_ws_server ?>">
                        <input type="hidden" name="port_ws_server" id="port_ws_server" value="<?php echo $pengaturan_sistem->port_ws_server ?>">
                        
                        <input type="hidden" name="flag_moving_in" id="flag_moving_in" value="<?php echo $pengaturan_sistem->flag_moving_in ?>">
                        <input type="hidden" name="flag_moving_out" id="flag_moving_out" value="<?php echo $pengaturan_sistem->flag_moving_out ?>">                        
                    </div>

                    <div class="col-md-6">

                        <div class="d-flex justify-content-center">

                            <a class="btn btn-flat btn-info btn_search btn_action btn_search_back btn-block" id="btn_search" data-stype='back' title="Search">
                                <i class="fa fa-search"></i>&nbsp;Search
                            </a>

                        </div>

                        <small class="info help-block"><b>Status:</b>
                            <div id="status"></div>
                        </small>&nbsp;&nbsp;

                        <div class="form-group">
                            <label>Power Handheld</label>
                            <input type="range" class="form-control-range" id="power_handheld" name="power_handheld" min="0" max="30" value="15">
                            <small class="info help-block">
                                <b>Power:</b> <span id="power_handheld_info">15</span>
                            </small>
                        </div>

                        <div id="container_total_rfid_tag">
                            <small class="info help-block"><b>Total RFID Tag:</b>
                                <div id="total_rfid_tag">0</div>
                            </small>
                        </div>

                    </div>

                    <div class="col-md-3"></div>

                </div>

                <div id="containerChartResult">

                    <div class="row">
                        <div class="col-md-3"></div>

                        <!-- <div class="col-md-2 text-center">
                                <small class="info help-block"><b>Metode Pencarian:</b> <div id="info_metode_pencarian"><b>Bulk</b></div></small>
                            </div> -->

                        <div class="col-md-2 text-center">
                            <small class="info help-block"><b>Total Aset Real:</b>
                                <div id="chart_aset_real"><b>0</b></div>
                            </small>
                        </div>

                        <div class="col-md-2 text-center">
                            <small class="info help-block"><b>Total Aset Found:</b>
                                <div id="chart_aset_found"><b>0</b></div>
                            </small>
                        </div>
                        <div class="col-md-2 text-center">
                            <small class="info help-block"><b>Total Aset Not Found:</b>
                                <div id="chart_aset_not_found"><b>0</b></div>
                            </small>
                        </div>

                        <!-- <div class="col-md-2 text-center">
                                <small class="info help-block"><b>Total Aset Read:</b> <div id="chart_aset_read"><b>0</b></div></small>
                            </div>
                            <div class="col-md-2 text-center">
                                <small class="info help-block"><b>Total Aset Wrong Room:</b> <div id="chart_aset_wrong_room"><b>0</b></div></small>
                            </div> -->

                        <div class="col-md-3"></div>
                    </div>

                </div>

                <h3 style="text-decoration: underline;">Hasil Sensus</h3>

                <fieldset id="containerChart">

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <canvas id="myChartPencarian"></canvas>
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                </fieldset>
                <!-- /.containerChart -->

                <h3 style="text-decoration: underline;">List Normal Sensus</h3>

                <div id="containerHasilPencarian" class="row" style="margin-top: 10px; margin-bottom: 20px">
                    <div class="col-md-12">

                        <div class="table-responsive">

                            <br>
                            <table class="table table-bordered table-striped dataTable" id="your_table_id">
                                <thead>
                                    <tr class="">
                                        <th style="text-align: center">No.</th>
                                        <th style="text-align: center" data-field="id_aset" data-sort="1" data-primary-key="0"> <?= cclang('ID Aset') ?></th>
                                        <th style="text-align: center" data-field="nama_aset" data-sort="1" data-primary-key="0"> <?= cclang('Nama Aset') ?></th>
                                        <th style="text-align: center" data-field="kode_aset" data-sort="1" data-primary-key="0"> <?= cclang('Kode Aset') ?></th>
                                        <th style="text-align: center" data-field="nup" data-sort="1" data-primary-key="0"> <?= cclang('Kode NUP') ?></th>
                                        <th style="text-align: center" data-field="kode_tid" data-sort="1" data-primary-key="0"> <?= cclang('Kode Tag') ?></th>
                                        <th style="text-align: center" data-field="hasil_pencarian" data-sort="1" data-primary-key="0"> <?= cclang('Hasil Pencarian') ?></th>
                                        
                                        <th style="text-align: center" data-field="settlement" data-sort="1" data-primary-key="0"> <?= cclang('Status') ?></th>

                                        <th style="text-align: center" data-field="kondisi_aset" data-sort="1" data-primary-key="0"> <?= cclang('Kondisi Aset') ?></th>
                                        <th style="text-align: center" data-field="flag_sensus" data-sort="1" data-primary-key="0"> <?= cclang('Sensus') ?></th>

                                        <th style="text-align: center; vertical-align: middle;">
                                            <div style="display: flex; justify-content: center; align-items: center; height: 100%;">
                                                <i class="ui-tooltip fa fa-trash-o"
                                                    title="Hapus Semua"
                                                    style="font-size: 22px; cursor: pointer;"
                                                    data-original-title="Hapus Semua"
                                                    onclick="removeAllRow(this)">
                                                </i>
                                            </div>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>

                <div id="containerHeaderPilihAsetAnomali">
                    <h3 style="text-decoration: underline;">List Anomali Sensus</h3>
                </div>

                <fieldset id="containerHasilPencarianBulk">

                    <div class="row" style="margin-top: 10px; margin-bottom: 20px">
                        <div class="col-md-12">

                            <div class="table-responsive">

                                <br>
                                <table class="table table-bordered table-striped dataTable" id="your_table_id_bulk">
                                    <thead>
                                        <tr class="">
                                            <th style="text-align: center">No.</th>
                                            <th style="text-align: center" data-field="id_aset" data-sort="1" data-primary-key="0"> <?= cclang('ID Aset') ?></th>
                                            <th style="text-align: center" data-field="nama_aset" data-sort="1" data-primary-key="0"> <?= cclang('Nama Aset') ?></th>
                                            <th style="text-align: center" data-field="kode_aset" data-sort="1" data-primary-key="0"> <?= cclang('Kode Aset') ?></th>
                                            <th style="text-align: center" data-field="nup" data-sort="1" data-primary-key="0"> <?= cclang('Kode NUP') ?></th>
                                            <th style="text-align: center" data-field="kode_tid" data-sort="1" data-primary-key="0"> <?= cclang('Kode Tag') ?></th>
                                            <th style="text-align: center" data-field="hasil_pencarian" data-sort="1" data-primary-key="0"> <?= cclang('Hasil Pencarian') ?></th>
                                            <th style="text-align: center" data-field="posisi_seharusnya" data-sort="1" data-primary-key="0"> <?= cclang('Posisi Seharusnya') ?></th>

                                            <th style="text-align: center" data-field="kondisi_aset" data-sort="1" data-primary-key="0"> <?= cclang('Kondisi Aset') ?></th>
                                            <th style="text-align: center" data-field="flag_sensus" data-sort="1" data-primary-key="0"> <?= cclang('Sensus') ?></th>

                                            <th style="text-align: center; vertical-align: middle;">
                                                <div style="display: flex; justify-content: center; align-items: center; height: 100%;">
                                                    <i class="ui-tooltip fa fa-trash-o"
                                                        title="Hapus Semua"
                                                        style="font-size: 22px; cursor: pointer;"
                                                        data-original-title="Hapus Semua"
                                                        onclick="removeAllRowBulk(this)">
                                                    </i>
                                                </div>
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- DataTable will populate the rows automatically -->
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <td colspan="6" style="text-align: right"><b>Total aset salah ruangan</b></td>
                                            <td id="chart_aset_wrong_room" style="text-align: center; background-color:rgb(0, 255, 85)"><b>0</b></td>
                                            <td colspan="4" style="text-align: center"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="text-align: right"><b>Total aset tidak terdaftar</b></td>
                                            <td id="chart_aset_foreign_tag" style="text-align: center; background-color:rgb(0, 255, 85)"><b>0</b></td>
                                            <td colspan="4" style="text-align: center"></td>
                                        </tr>
                                    </tfoot>

                                </table>

                            </div>

                        </div>
                    </div>

                </fieldset>

                <div class="row" style="margin-top: 20px">
                    <div class="col-md-12">
                        <div class="form-group text-center">

                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                                <i class="fa fa-save"></i> <?= cclang('save_button'); ?>
                            </button>

                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                                <i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>

                            <!-- Cancel Button -->
                            <div class="custom-button-wrapper"></div>

                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                                <i class="fa fa-undo"></i> <?= cclang('cancel_button'); ?>
                            </a>

                            <!-- Loading Indicator -->
                            <span class="loading loading-hide" style="display: inline-block; margin-left: 15px;">
                                <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg" alt="Loading">
                                <i id="data_processing"></i>
                            </span>

                        </div>

                        <!-- <h3 style="text-decoration: underline;">Query Standing Awal, hasilnya insert semua ke array: dataArrayAsetForBulk</h3> -->

                        <!-- Help Text -->
                        <div class="text-center">
                            <p class="help-block">(*) Mandatory</p>
                            <!-- <p class="help-block" style="display: block !important;" id="help_text"></p> -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.row -->

            <div class="message"></div>

            <?= form_close(); ?>

        </div>
        <!-- /.col-xs-12 -->

    </div>
    <!-- /.box-body -->

    </div>
    <!-- /.box -->

    <!-- <div id="loading" class="loading-overlay" style="display: none;">
        <div class="loading-spinner"></div>
    </div> -->

    <div id="loading" class="loading-overlay" style="display: none;">
        <img src="<?= BASE_ASSET; ?>loading/rfid.gif" alt="Loading..." class="loading-image">
        <!-- <img src="<?= BASE_ASSET; ?>loading/loading.gif" alt="Loading..." class="loading-image"> -->
        <!-- <img src="<?= BASE_ASSET; ?>loading/giphy.gif" alt="Loading..." class="loading-image"> -->
    </div>

</section>

<!-- <style>
.loading-overlay {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
}

.loading-spinner {
    border: 8px solid rgba(255, 255, 255, 0); /* Ubah transparansi menjadi 0.8 */
    border-top: 8px solid #3498db; /* Warna biru untuk bagian atas */
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style> -->

<style>
    .loading-overlay {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .loading-image {
        width: 60px; /* Sesuaikan ukuran gambar */
        height: 60px; /* Sesuaikan ukuran gambar */
        background-color: rgba(255, 255, 255, 0.8); /* Tambahkan latar belakang putih semi-transparan */
        border-radius: 50%; /* Membuat sudut membulat */
        padding: 5px; /* Memberikan sedikit ruang di sekitar gambar */
    }
</style>

<style>
    .table thead th {
        border-bottom: 1px solid #dee2e6 !important;
        /* Pakai !important agar override */
        border-top: none !important;
        /* Hilangkan border atas */
    }

    .table tbody td {
        border-top: 1px solid #dee2e6 !important;
        /* Pakai !important di baris data */
    }

    .table tfoot td {
        border-top: 1px solid #dee2e6 !important;
        /* Pakai !important di footer */
        border-bottom: none !important;
        /* Hilangkan border bawah */
    }

    .table tfoot td {
        border-bottom: none !important;
        /* Hilangkan border bawah */
    }

    /* #asetTable tbody td {
        border-bottom: none !important;
        /* Hilangkan border bawah */
    } */
</style>

    <script src="<?php echo base_url(); ?>asset/js/socket.io.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript">

        // Menampilkan loading
        function showLoading() {
            document.getElementById('loading').style.display = 'flex';
        }

        // Menyembunyikan loading
        function hideLoading() {
            document.getElementById('loading').style.display = 'none';
        }

        var socket;  // Deklarasikan socket secara global

        var stored_ip_address = localStorage.getItem('ip_address');
        // localStorage.setItem('ip_address', ip_address);

        if (stored_ip_address) {                
            $('#ip_address').val(stored_ip_address);
            console.log('IP Address yang tersimpan: ', stored_ip_address);
        } else {
            console.log('Tidak ada IP Address yang tersimpan, set default');
            $('#ip_address').val('192.168.1.195');
            localStorage.setItem('ip_address', '192.168.1.195');
        }

        function connectWss(ip_address) {

            var port_ws_server = $('#port_ws_server').val();
            var protocol_ws_server = $('#protocol_ws_server').val();
            document.getElementById('status').innerHTML = 'Connecting...';
            setTimeout(function(){}, 500);
            document.getElementById('data_processing').innerHTML = '';
                
            // $('#btn_search').trigger('click');

            socket = new WebSocket(protocol_ws_server + '://' + ip_address + ':' + port_ws_server);
            console.log('ee', socket);

            socket.onopen = function(event) {
                is_wss_on = true;
                console.log('WebSocket connection is open');
                socket.send('{"event": "get-rfid-power"}');
                console.log('post get-rfid-power');
                document.getElementById('status').innerHTML = 'Connected to Server';
                document.getElementById('data_processing').innerHTML = '';
            };

            socket.onclose = function(event) {

                // if (event.wasClean) {
                //     console.log('WebSocket connection closed');
                // } else {
                //     console.log('WebSocket connection died');
                // }

                $('#status').html('Not Connected to Server');
                $('#data_processing').html('');

                console.log('Socket is closed. Reconnect will be attempted in 1 second.', event.reason);

                // setTimeout(function() {
                //     location.reload();
                // }, 5000);

            };

            socket.onerror = function(err) {
                console.error('Socket encountered error: ', err.message, 'Closing socket');
                socket.close();
            };    

            socket.onmessage = function (event) {

                var parsedData = JSON.parse(event.data);
                var event_name = parsedData.event;
                var is_web_play_buzzer = $('#is_web_play_buzzer').val();

                if (event_name == 'scan-rfid-result') {

                    var row_count = $('#your_table_id tbody tr').length;
                    console.log('row_count: ', row_count);

                    if (row_count === 0) {

                        Swal.fire({
                            title: "Perhatian !",
                            text: "Data Aset kosong !!",
                            icon: "warning",
                            showCancelButton: false,
                            confirmButtonText: "OK",
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                console.log('OK');
                            }
                        });

                        return;

                    }

                    try {
                        console.log('trying to start sensus...');
                            
                        var tid = parsedData.data_tid;
                        var epc = parsedData.data;
                        var alias_antenna = 'handheld';
                        var status_tag = 'OK';
                        var description = 'OK';

                        // alert('jumlah dataArrayAsetForBulk: ' + dataArrayAsetForBulk.length);
                        // Cek apakah array dataArrayAsetForBulk kosong
                        if (dataArrayAsetForBulk.length === 0) {

                            Swal.fire({
                                title: "Perhatian !",
                                text: "Data Aset kosong / pilih dulu filter data pencarian !!",
                                icon: "warning",
                                showCancelButton: false,
                                confirmButtonText: "OK",
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    console.log('OK');
                                }
                            });

                            return;
                        }

                        // Cek apakah data dengan TID dan alias_antenna tersebut sudah ada
                        var isExisting = dataArrayAsetForBulk.some(data => data.kode_tid === tid);

                        // blok ini untuk hitung yang ketemu
                        if (isExisting) {

                            dataArrayAsetForBulk.forEach(data => {
                                if (data.kode_tid === tid) {
                                    data.is_found = flag_status_available; // Ubah nilai is_found menjadi 1
                                    data.kondisi_aset = flag_kondisi_baik;
                                    data.flag_sensus = flag_sensus_normal;
                                }
                            });

                            // Tambahkan TID ke counter
                            if (!tidCountForBulk[tid]) {

                                tidCountForBulk[tid] = {
                                    count: 1,
                                };

                                // ijoin data yang ketemu
                                $("#your_table_id tbody tr").each(function () {

                                    // ijoin data yang ketemu
                                    var hasilPencarianCell = $(this).find("td[id='" + tid + "']");
                                        
                                    // Jika ditemukan kolom dengan id yang sesuai
                                    if (hasilPencarianCell.length > 0) {

                                        hasilPencarianCell.text('Available').css('background-color', '#90EE90').attr('data-status', '1').attr('data-kondisi', '1').attr('data-flag-transaksi', '1');
                                        // console.log('Data dengan TID ' + tid + ' ditemukan');

                                    } else {
                                        console.log('Data dengan TID ' + tid + ' tidak ditemukan');
                                    }

                                    // ceklis data yang ketemu
                                    var hasilPencarianCell = $(this).find("td[id='flag_sensus_" + tid + "']");
                                        
                                    // Jika ditemukan kolom dengan id yang sesuai
                                    if (hasilPencarianCell.length > 0) {

                                        hasilPencarianCell.html('<input type="checkbox" id="flag_sensus_check_' + tid + '" name="flag_sensus_check_' + tid + '" value="1" style="margin-right: 5px;" checked disabled> Sudah').css('background-color', '#90EE90');
                                        // console.log('Data dengan TID ' + tid + ' ditemukan');

                                    } else {
                                        console.log('Data dengan TID ' + tid + ' tidak ditemukan');
                                    }

                                });

                            } else {
                                tidCountForBulk[tid].count += 1;
                            }
                                                
                            // console.log(`TID: ${tid} telah terbaca ${tidCount[tid].count} kali`);

                            if (is_web_play_buzzer == 1){
                                playBuzzerPencarian();
                            } else {
                                if (navigator.userAgent.match(/Android/i)) {
                                    playBuzzerPencarian();        
                                }
                            }
                                
                        } else {

                            // console.log('Data dengan TID ' + tid + ' tidak ada');
                            // kalo ngga ada ya berarti kemungkinannya tidak ada di dataArrayAsetForBulk / salah ruangan / bukan rfid tag milik kita

                            get_check_unique_single_tag(tid).then(async function(response) {

                                is_unique_single_tag = response.check;
                                data_aset = response.data_aset;
                                status_tag = response.status_tag;

                                if (is_unique_single_tag != 0) {

                                    let id = data_aset.id_aset;
                                    let kode_aset = data_aset.kode_aset;
                                    let nup = data_aset.nup;
                                    let nama_aset = data_aset.nama_aset;
                                    let kode_tid = data_aset.kode_tid;
                                    let area = data_aset.area;
                                    let gedung = data_aset.gedung;
                                    let ruangan = data_aset.ruangan;
                                    let posisi_seharusnya = `Area: ${area}, Gedung: ${gedung}, Ruangan: ${ruangan}`;

                                    if (!(kode_tid in tidCountWrongRoom)) {

                                        let jmlNoUrutBulk = $('#your_table_id_bulk tbody tr').length;
                                                    
                                        tidCountWrongRoom[kode_tid] = 1;
                                        noUrutBulk = jmlNoUrutBulk+1;

                                        id = (status_tag == 'N') ? id : '-';
                                        nama_aset = (status_tag == 'N') ? nama_aset : '-';
                                        kode_aset = (status_tag == 'N') ? kode_aset : '-';
                                        nup = (status_tag == 'N') ? nup : '-';
                                        kode_tid = (status_tag == 'N') ? kode_tid : tid;
                                        posisi_seharusnya = (status_tag == 'N') ? posisi_seharusnya : '-';
                                        hasil_pencarian = (status_tag == 'N') ? 'Wrong Room Tag' : 'Tag Not Used';
                                        ceklis_sensus = (status_tag == 'N') ? 'Sudah' : '';
                                        td_asset_condition = '';

                                        if (status_tag == 'N') {

                                            td_asset_condition = `<td id="asset_condition_${kode_tid}" style="text-align: center;">                                                     
                                                                    <select id="asset_condition_dropdown_${kode_tid}" style="margin: 0 auto;">                                                         
                                                                        <option value="1">Baik</option>                                                         
                                                                        <option value="2">Rusak Ringan</option>                                                         
                                                                        <option value="3">Rusak Berat</option>                                                     
                                                                        <option value="4">Belum Tahu</option>                                                     
                                                                    </select>                                                 
                                                                </td>`;
                                            
                                        } else {

                                            td_asset_condition = `<td id="asset_condition_${tid}" style="text-align: center;">-</td>`;
                                            
                                        }

                                        await new Promise(resolve => {
                                            $('#your_table_id_bulk tbody').append(`
                                                <tr>    
                                                    <td id="numbering" style="text-align: center">${noUrutBulk}</td>
                                                    <td id="asset_id" style="text-align: center">${id}</td>
                                                    <td id="asset_name" style="text-align: left">${nama_aset}</td>
                                                    <td id="asset_code" style="text-align: left">${kode_aset}</td>
                                                    <td id="asset_nup" style="text-align: center">${nup}</td>
                                                    <td id="asset_tid_${kode_tid}" style="text-align: center">${kode_tid}</td>
                                                    
                                                    <td id="asset_tid_wrong_room_${kode_tid}" style="text-align: center; background-color:rgb(234, 255, 0)" data-id="${id}" data-nama-aset="${nama_aset}" data-kode-aset="${kode_aset}" data-nup="${nup}" data-tid="${kode_tid}">${hasil_pencarian}</td>

                                                    <td id="asset_ruangan" style="text-align: center">${posisi_seharusnya}</td>` +
                                                    td_asset_condition + `
                                                    <td id="flag_sensus_${kode_tid}" style="text-align: center; background-color: #90EE90">
                                                        <input type="checkbox" id="flag_sensus_check_${kode_tid}" name="flag_sensus_check_${kode_tid}" value="1" style="margin-right: 5px;" checked disabled>` + ceklis_sensus + `
                                                    </td>
                                                    <td style="text-align: center">
                                                        <i class="ui-tooltip fa fa-trash-o" title="Hapus Data" style="font-size: 22px; cursor:pointer;" data-original-title="Hapus Data" onclick="removeRowBulk(this, '${kode_tid}')"></i>
                                                        <!--<i class="ui-tooltip fa fa-info-circle" title="Lihat Informasi Ruangan" style="font-size: 22px; cursor:pointer;" onclick="showRoomInfoModal('${tid}')"></i>-->
                                                    </td>
                                                </tr>
                                            `);
                                            resolve();
                                        });

                                    } else {
                                        tidCountWrongRoom[kode_tid] += 1;
                                    }
                                                
                                } // end if registered tag 
                                else { // else if unregistered tag

                                    console.log('tid: ', tid, 'unidentified tag...');

                                    if (!(tid in tidCountForeignTag)) {

                                        let jmlNoUrutBulk = $('#your_table_id_bulk tbody tr').length;
                                        tidCountForeignTag[tid] = 1;
                                        noUrutBulk = jmlNoUrutBulk+1;
                                                    
                                        await new Promise(resolve => {
                                            $('#your_table_id_bulk tbody').append(`
                                                <tr>    
                                                    <td id="numbering" style="text-align: center">${noUrutBulk}</td>
                                                    <td id="asset_id" style="text-align: center">-</td>
                                                    <td id="asset_name" style="text-align: left">-</td>
                                                    <td id="asset_code" style="text-align: left">-</td>
                                                    <td id="asset_nup" style="text-align: center">-</td>
                                                    <td id="asset_tid_${tid}" style="text-align: center">${tid}</td>
                                                    <td id="asset_foreign_tag_${noUrutBulk}" style="text-align: center; background-color: #FF0000">Unidentified Tag</td>
                                                    <td id="${noUrutBulk}" style="text-align: center">-</td>
                                                    <td id="asset_condition_${tid}" style="text-align: center">-</td>
                                                    <td id="flag_sensus_${tid}" style="text-align: center; background-color: #90EE90">
                                                        <input type="checkbox" id="flag_sensus_check_${tid}" name="flag_sensus_check_${tid}" value="1" style="margin-right: 5px;" checked disabled>`+`
                                                    </td>
                                                    <td style="text-align: center">
                                                        <i class="ui-tooltip fa fa-trash-o" title="Hapus Data" style="font-size: 22px; cursor:pointer;" data-original-title="Hapus Data" onclick="removeRowBulk(this, '${tid}')"></i>
                                                    </td>
                                                </tr>
                                            `);
                                            resolve();
                                        });

                                    } else {
                                        tidCountForeignTag[tid] += 1;
                                    }

                                }

                            }); // end get_check_unique_single_tag

                        }

                        chart_aset_found_bulk = Object.keys(tidCountForBulk).length;

                        chart_aset_not_found_bulk = dataArrayAsetForBulk.length - chart_aset_found_bulk;
                        console.log('selisih: ', '(' + dataArrayAsetForBulk.length + ' - ' + chart_aset_found_bulk + ') = ' + chart_aset_not_found_bulk);

                        // labels: ["Aset Real", "Aset Ditemukan", "Aset Tidak Ditemukan"],
                        chart.data.datasets[0].data = [dataArrayAsetForBulk.length, chart_aset_found_bulk, chart_aset_not_found_bulk];
                        chart.update();

                        // $('#chart_aset_real').html(chart_aset_real);
                        $('#chart_aset_found').html(chart_aset_found_bulk);
                        $('#chart_aset_not_found').html(chart_aset_not_found_bulk);

                        // another tag

                        chart_aset_wrong_room = Object.keys(tidCountWrongRoom).length;
                        chart_aset_foreign_tag = Object.keys(tidCountForeignTag).length;

                        $('#chart_aset_wrong_room').html(chart_aset_wrong_room);
                        $('#chart_aset_foreign_tag').html(chart_aset_foreign_tag);

                    } catch (error) {
                        console.error('Error parsing JSON data:', error);
                    }

                } else if (event_name == 'response-scan-rfid-on') {

                    // $('.loading').show();
                    $('#data_processing').html('Searching RFID Tag...');

                    showLoading();

                    // let metode_pencarian = $('#metode_pencarian').val();
                    // var free_text_tts = 'Memulai pencarian ' + metode_pencarian;

                    // if (is_web_play_buzzer == 1){
                    //     playTtsPencarian(free_text_tts);
                    // } else {

                    //     if (navigator.userAgent.match(/Android/i)) {
                    //         playTtsPencarian(free_text_tts);
                    //     }

                    // }

                } else if (event_name == 'response-scan-rfid-off') {

                    // $('.loading').hide();
                    hideLoading();
                    checkAsetNotAvailable();
                    // let metode_pencarian = $('#metode_pencarian').val();

                    // var bell = document.getElementById('buzzer');
                    // bell.pause();
                    // bell.currentTime = 0;

                    // let selisih = 0;

                    // if (chart_aset_real == chart_aset_not_found) {
                    //     selisih = chart_aset_not_found;
                    // } else if (chart_aset_real == chart_aset_found) {
                    //     selisih = 0;
                    // } else {
                    //     selisih = chart_aset_not_found;
                    // }

                    // if (metode_pencarian == 'partial') {
                    //     var free_text_tts = 'Pencarian selesai, ' + chart_aset_found + ' Aset ditemukan, ' + selisih + ' Aset tidak ditemukan';
                    // } else {
                    //     var free_text_tts = 'Pencarian selesai, ' + chart_aset_found + ' Aset ditemukan, ' + selisih + ' Aset tidak ditemukan, ' + chart_aset_wrong_room + ' Aset salah ruangan, ' + chart_aset_foreign_tag + ' Aset tidak terdaftar';
                    // }

                    // if (is_web_play_buzzer == 1){

                    //     if (navigator.userAgent.match(/Android/i)) {
                    //         playTtsPencarian(free_text_tts);
                    //     } else {
                    //         playTtsPencarian(free_text_tts);
                    //     }

                    // } else {

                    //     if (navigator.userAgent.match(/Android/i)) {
                    //         playTtsPencarian(free_text_tts);
                    //     }
                    // }

                } else if (event_name == 'response-get-rfid-power') {
                        
                    // var parsedData = JSON.parse(event.data);
                    // var event_name = parsedData.event;
                    var value = parsedData.value;
                    console.log('response-get-rfid-power: ' + value);

                    $('#power_handheld').val(value);
                    $('#power_handheld_info').html(value);

                }

            };

        }

        connectWss(stored_ip_address);
    </script>

<script>
    var ctx = document.getElementById('myChartPencarian').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Aset Real", "Aset Ditemukan", "Aset Tidak Ditemukan"],
            // labels: ["Aset Tidak Ditemukan", "Aset Ditemukan", "Aset Real"],                          
            datasets: [{

                label: "Data Aset",
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                ],
                data: [0, 0, 0],

            }]
        },
        options: {
            legend: {
                display: false
            }
        }
    });
</script>

<script type="text/javascript">
    var module_name = "pencarian_aset"
    var use_ajax_crud = false
</script>

<script type="text/javascript">

    var flag_status_not_available = $('#flag_status_not_available').val();
    var flag_kondisi_baik = $('#flag_kondisi_baik').val();
    var flag_sensus_normal = $('#flag_sensus_normal').val();
    var flag_status_available = $('#flag_status_available').val();
    var flag_sensus_anomali = $('#flag_sensus_anomali').val();

    $(document).ready(function() {

        setTimeout(() => {
            if (is_wss_on == true) {
                document.getElementById('status').innerHTML = 'Connected to Server';
                // $('#status').html('Connected to Server');
            }
        }, 1000);

        // var bell = document.getElementById('buzzer');
        // var startTime = new Date().getTime();
        // var endTime = startTime + 60000; // 1 menit

        // function playBell() {
        //     // mainkan suara bell antrian
        //     // bell.src = bell.src + "?v=" + Math.random(); // Add a random query parameter to the URL to ensure the browser treats it as a new resource
        //     bell.type = "audio/mp3"; // Set the correct "Content-Type" response header for the audio file
        //     bell.pause();
        //     bell.currentTime = 0;
        //     bell.play();
        //     if (new Date().getTime() < endTime) {
        //         setTimeout(playBell, 3000); // loop every 3 seconds
        //     }
        // }

        // playBell();

        // if (localStorage.getItem('id_area')) {   
        //     console.log('ID Area tersimpan:', localStorage.getItem('id_area'));
        //     let id_area = $('#id_area').val(localStorage.getItem('id_area'));
        //     $('#id_area').val(localStorage.getItem('id_area')).trigger('change');
        //     console.log('id_area berhasil di trigger');
        // }

        // if (localStorage.getItem('id_gedung')) {   
        //     console.log('ID Gedung tersimpan:', localStorage.getItem('id_gedung'));
        //     let id_gedung = $('#id_gedung').val(localStorage.getItem('id_gedung'));
        //     $('#id_gedung').val(localStorage.getItem('id_gedung')).trigger('change');
        //     console.log('id_gedung berhasil di trigger');
        // }

        // if (localStorage.getItem('id_ruangan')) {   
        //     console.log('ID Ruangan tersimpan:', localStorage.getItem('id_ruangan'));
        //     let id_ruangan = $('#id_ruangan').val(localStorage.getItem('id_ruangan'));
        //     $('#id_ruangan').val(localStorage.getItem('id_ruangan')).trigger('change');
        // }

        $('#metode_pencarian').val('bulk');
        $('#metode_pencarian_terakhir').val('bulk');

        setDropdownValue('id_area', 'id_area');
        setDropdownValue('id_gedung', 'id_gedung');
        setDropdownValue('id_ruangan', 'id_ruangan');

        $('#containerChart').show();
        $('#containerChartResult').show();
        $('#container_total_rfid_tag').hide();
        $('#containerHasilPencarianBulk').show();
        $('#containerHeaderPilihAsetAnomali').show();

        $('.loading').hide();
        $('#total_aset_checklist').html('0');
        $('#total_rfid_tag').html('0');
        $('#status').html('Disconnected');
        $('#ip_address').attr('placeholder', 'Masukkan IP Address');
        // $('#ip_address').val('');

        "use strict";
        window.event_submit_and_action = '';
        $('.container-button-bottom').hide();

        // var table;
        // var url = BASE_URL + ADMIN_NAMESPACE_URL + '/' + module_name + '/serverSideData';

        // table = $('#asetTable').DataTable({
        //     "processing": true,
        //     "serverSide": true,
        //     "ajax": {
        //         url: url,
        //         type: "POST",
        //         data: function(d) {
        //             d.id_area = $('#id_area').val();
        //             d.id_gedung = $('#id_gedung').val();
        //             d.id_ruangan = $('#id_ruangan').val();
        //             d.select_all = $('#select_all').val();
        //         }
        //     },
        //     "order": [
        //         [3, 'asc']
        //     ],
        //     columns: [{
        //             "data": "checkbox_id_master_aset",
        //             "className": "dt-center",
        //             "orderable": false,
        //             "searchable": false
        //         },
        //         {
        //             "data": "auto_number",
        //             "className": "dt-center",
        //             "orderable": false,
        //             "searchable": false
        //         },
        //         {
        //             data: "id",
        //             className: "dt-center",
        //             orderable: true,
        //             searchable: true
        //         },
        //         {
        //             data: "nama_aset",
        //             className: "dt-left",
        //             orderable: true,
        //             searchable: true
        //         },
        //         {
        //             data: "kode_aset",
        //             className: "dt-left",
        //             orderable: true,
        //             searchable: true
        //         },
        //         {
        //             data: "nup",
        //             className: "dt-center",
        //             orderable: true,
        //             searchable: true
        //         },
        //         {
        //             data: "kode_tid",
        //             className: "dt-center",
        //             orderable: true,
        //             searchable: true
        //         },
        //     ],
        //     "createdRow": function(row, data, dataIndex) {
        //         // Paksa semua kolom angka menjadi rata tengah
        //         $('td', row).eq(1).css('text-align', 'center');
        //         $('td', row).eq(2).css('text-align', 'center');
        //         $('td', row).eq(5).css('text-align', 'center');
        //     }

        // });

        // function reload_datatables() {
        //     table.ajax.reload();
        //     // table.ajax.reload(null,false); //reload datatable ajax 
        // }

        $('#your_table_id').on('change', 'select[id^="asset_condition_dropdown_"]', function() {
            
            var selectedValue = $(this).val();
            var assetId = $(this).closest('tr').find('#asset_id').text();
            var tid = $(this).closest('tr').find('td:eq(5)').text();
            var nama_aset = $(this).closest('tr').find('td:eq(2)').text();

            console.log('Dropdown changed for Asset ID: ' + assetId + ', TID: ' + tid + ', Nama Aset: ' + nama_aset + ', Selected Value: ' + selectedValue);
            
            // update deh dataArrayAsetForBulk

            dataArrayAsetForBulk.forEach(data => {
                if (data.kode_tid === tid) {
                    data.kondisi_aset = selectedValue;
                }
            });

        });

        $('#id_ruangan').change(function() {
            // console.log('ID Ruangan:', $(this).val());
            localStorage.setItem('id_ruangan', $(this).val());
            // reload_datatables();
            // $('#btn_search').trigger('click');
        });

        $('#power_handheld').on('input change', function() {

            var power_handheld = $(this).val();
            localStorage.setItem('power_handheld', power_handheld);
            $('#power_handheld_info').text(power_handheld); // Update teks span

            socket.send(JSON.stringify({
                event: "set-rfid-power",
                value: power_handheld
            }));
            console.log('post set-rfid-power: ' + power_handheld);

        });

        $('#metode_pencarian').change(async function() {

            var metode_pencarian = $(this).val();

            if (metode_pencarian === 'bulk') {

                var metode_pencarian_terakhir = $('#metode_pencarian_terakhir').val();
                let rowCount = $('#your_table_id tbody tr').length;

                if (rowCount > 0) {

                    const isConfirmed = await confirmCancelSearch('partial');  // Tunggu hasil konfirmasi

                    if (!isConfirmed) {
                        $('#metode_pencarian_terakhir').val('partial');
                        $('#metode_pencarian').val('partial');
                        return false;
                    } else {
                        $('#btn_search').trigger('click');  // Memicu klik tombol lain
                        // removeAllRow();
                        removeAllRowBulk();
                        $('#metode_pencarian_terakhir').val('bulk');
                    }

                } else {

                    $('#btn_search').trigger('click');  // Memicu klik tombol lain
                    removeAllRowBulk();
                    $('#metode_pencarian_terakhir').val('bulk');
                    // $('#metode_pencarian').val('bulk').trigger('change');
                }


                // Tampilkan elemen
                $('#containerHasilPencarianBulk').show();
                $('#containerHasilPencarian').hide();
                // $('#containerHeaderPilihAset').hide();
                $('#containerHeaderPilihAsetAnomali').show();
                // $('#containerPilihAset').hide();
                $('#containerChart').show();
                // $('#containerPilihAsetFooter').hide();
                // $('#containerChartResult').show();
                // $('#container_total_rfid_tag').hide();

            } else { // metode_pencarian === 'partial'

                let rowCount = $('#your_table_id_bulk tbody tr').length;

                if (chart_aset_found_bulk > 0 || rowCount > 0) {

                    const isConfirmed = await confirmCancelSearch('bulk'); // Tunggu hasil konfirmasi

                    if (!isConfirmed) {
                        console.log("Proses dihentikan oleh pengguna.");
                        $('#metode_pencarian_terakhir').val('bulk');
                        $('#metode_pencarian').val('bulk');
                        return false;
                    } else {

                        $('#select_all').prop('checked', true);
                        $('#select_all').val('1');
                        console.log('checkbox select all...');

                        // $('#btn_pilih_aset').trigger('click');

                        // $("#your_table_id tbody tr").each(function() {
                        //     var targetCell = $(this).find("td").eq(6);
                        //     targetCell.text('Not Available').css('background-color', '#FF0000');
                        // });

                        // reload_datatables();
                        // $('#btn_search').trigger('click');
                        hitungDataPencarian();

                        $('#chart_aset_found').text(chart_aset_found);
                        $('#chart_aset_not_found').text(chart_aset_not_found);

                    }

                } else {
                    hitungDataPencarian();
                    $('#chart_aset_found').text(chart_aset_found);
                    $('#chart_aset_not_found').text(chart_aset_not_found);
                }

                // Sembunyikan elemen
                $('#containerHasilPencarianBulk').hide();
                $('#containerHasilPencarian').show();
                // $('#containerHeaderPilihAset').show();
                $('#containerHeaderPilihAsetAnomali').hide();
                // $('#containerPilihAset').show();
                $('#containerChart').hide();
                // $('#containerPilihAsetFooter').show();
                // $('#containerChartResult').hide();
                // $('#container_total_rfid_tag').show();

            }
        });

        $('#select_all').change(function() {

            var id_area = $('#id_area').val();
            var id_gedung = $('#id_gedung').val();
            var id_ruangan = $('#id_ruangan').val();

            if ($(this).is(':checked')) {

                if (id_area == '') {
                    swal({
                        title: "Error",
                        text: "Area tidak boleh kosong!",
                        type: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Okay!",
                        closeOnConfirm: true
                    });
                    $(this).prop('checked', false);
                    $(this).val('0');
                    return false;
                }

                if (id_gedung == '') {
                    swal({
                        title: "Error",
                        text: "Gedung tidak boleh kosong!",
                        type: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Okay!",
                        closeOnConfirm: true
                    });
                    $(this).prop('checked', false);
                    $(this).val('0');
                    return false;
                }

                // if (id_ruangan == '') {
                //     swal({
                //         title: "Error",
                //         text: "Ruangan tidak boleh kosong!",
                //         type: "error",
                //         showCancelButton: false,
                //         confirmButtonColor: "#DD6B55",
                //         confirmButtonText: "Okay!",
                //         closeOnConfirm: true
                //     });
                //     $(this).prop('checked', false);
                //     $(this).val('0');
                //     return false;
                // }

                $('#asetTable').find('input[type="checkbox"]').prop('checked', false);
                $('#asetTable').find('input[type="checkbox"]').prop('disabled', true);
                $(this).val('1');

            } else {
                $('#asetTable').find('input[type="checkbox"]').prop('disabled', false);
                $(this).val('0');
            }

        });

        $('#btn_search').click(async function() {

            var ip_address = $('#ip_address').val();

            if (ip_address === '') {
                await Swal.fire({
                    title: "Error",
                    text: "IP Address tidak boleh kosong!",
                    icon: "error",
                    confirmButtonText: "Okay!"
                });
                return false;
            }

            localStorage.setItem('ip_address', ip_address);  

            let id_area = $('#id_area').val();
            let id_gedung = $('#id_gedung').val();
            let id_ruangan = $('#id_ruangan').val();

            if (id_area == '') {
                swal({
                    title: "Error",
                    text: "Area tidak boleh kosong!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });
                return false;
            }

            if (id_gedung == '') {
                swal({
                    title: "Error",
                    text: "Gedung tidak boleh kosong!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });
                return false;
            }

            if (id_ruangan == '') {
                swal({
                    title: "Error",
                    text: "Ruangan tidak boleh kosong!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });
                return false;
            }

            let jml_keranjang_anomali = $('#your_table_id_bulk tbody tr').length;

            if (chart_aset_found_bulk > 0 || jml_keranjang_anomali > 0) {
                    
                const isConfirmed = await confirmSearch();  // Tunggu hasil konfirmasi

                if (!isConfirmed) {
                    console.log("Proses dihentikan oleh pengguna.");
                    return;  // Hentikan eksekusi jika pengguna membatalkan
                }

                var noUrutBulk = 0;
                removeAllRowBulk();
                    
            }

            getAllAsetForBulk();

        connectWss(ip_address);
        });

        $('#checkall').change(function() {

            var cells = $('#asetTable').find('tbody > tr > td:nth-child(1)');
            $(cells).find(':checkbox').prop('checked', $(this).is(':checked'));

            $('#select_all').prop('checked', false).removeAttr('checked');

        });

        $('.form-step').steps({
            headerTag: 'h3',
            bodyTag: 'section',
            autoFocus: true,
            enableAllSteps: true,
            onFinishing: function() {
                $('.btn_save_back').trigger('click')
            },
            labels: {
                finish: 'save'
            }
        });

        $('.custom-button-wrapper').appendTo('.actions')

        $(document).on('click', '#refresh', function(event) {
            event.preventDefault();
            // reload_datatables();
            return false;
        });

        $('#btn_pilih_aset').click(async function(e) {

            e.preventDefault();

            let id_area = $('#id_area').val();
            let id_gedung = $('#id_gedung').val();
            let id_ruangan = $('#id_ruangan').val();

            if ($('#select_all').val() == '1') {

                if (id_area == '') {

                    await new Promise((resolve) => {

                        swal({
                            title: "Error",
                            text: "Area tidak boleh kosong!",
                            type: "error",
                            showCancelButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Okay!",
                            closeOnConfirm: true
                        }, function() {
                            resolve();
                        });

                    });

                    return false;

                }

                if (id_gedung == '') {

                    await new Promise((resolve) => {

                        swal({
                            title: "Error",
                            text: "Gedung tidak boleh kosong!",
                            type: "error",
                            showCancelButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Okay!",
                            closeOnConfirm: true
                        }, function() {
                            resolve();
                        });

                    });

                    return false;

                }

                // arrayDataAset = [];
                await getAllAset();

            } else {
                await get_datatables_checked();
            }

            $('#asetTable').find('input[type="checkbox"]').prop('checked', false);
            $('#select_all').prop('checked', false).removeAttr('checked');
            // $('#help_text').html(JSON.stringify(dataArrayAset));

            hitungDataPencarian();

            // $('#chart_aset_real').html(chart_aset_real);
            $('#chart_aset_found').html(chart_aset_found);
            $('#chart_aset_not_found').html(chart_aset_not_found);

            let jml_aset_dikeranjang = $('#your_table_id tbody tr').length;

            if (chart_aset_found > 0) {
                console.log('Tambah data pencarian...');
            } else if (jml_aset_dikeranjang == 0) {
                $('#btn_search').trigger('click');
            } else if (jml_aset_dikeranjang > 0) {
                $('#btn_search').trigger('click');
            }

        });

        $('#btn_cancel').click(function() {

            swal({
                    title: "<?= cclang('are_you_sure'); ?>",
                    text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes!",
                    cancelButtonText: "No!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm) {
                    if (isConfirm) {
                        window.location.href = ADMIN_BASE_URL + '/pencarian_aset';
                    }
                });

            return false;
        }); /*end btn cancel*/

        $('#id_area').change(function(event) {

            var val = $(this).val();
            $.LoadingOverlay('show');
            localStorage.setItem('id_area', val);

            $.ajax({
                    url: ADMIN_BASE_URL + '/pencarian_aset/ajax_id_gedung/' + val,
                    dataType: 'JSON',
                })
                .done(function(res) {
                    var html = '<option value=""></option>';
                    $.each(res, function(index, val) {
                        html += '<option value="' + val.id + '">' + val.gedung + '</option>'
                    });
                    $('#id_gedung').html(html);
                    $('#id_gedung').trigger('chosen:updated');
                    // reload_datatables();
                })
                .fail(function() {
                    toastr['error']('Error', 'Getting data fail')
                })
                .always(function() {
                    $.LoadingOverlay('hide')
                });

        });

        $('#id_gedung').change(function(event) {
            var val = $(this).val();
            $.LoadingOverlay('show');
            localStorage.setItem('id_gedung', val);
            // console.log('id_gedung', val);
            $.ajax({
                    url: ADMIN_BASE_URL + '/pencarian_aset/ajax_id_ruangan/' + val,
                    dataType: 'JSON',
                })
                .done(function(res) {
                    var html = '<option value=""></option>';
                    $.each(res, function(index, val) {
                        html += '<option value="' + val.id + '">' + val.ruangan + '</option>'
                    });
                    $('#id_ruangan').html(html);
                    $('#id_ruangan').trigger('chosen:updated');
                    // reload_datatables();
                })
                .fail(function() {
                    toastr['error']('Error', 'Getting data fail')
                })
                .always(function() {
                    $.LoadingOverlay('hide')
                });

        });

        // simpan deh datanya

        $('.btn_save').click(async function(e) {

            e.preventDefault();
            $('.message').fadeOut();
            $('#data_processing').html('');

            if (chart_aset_real_bulk == 0) {

                const isConfirmed = await Swal.fire({
                    title: "Error",
                    text: "Data aset kosong!",
                    icon: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    allowOutsideClick: false
                });

                if (!isConfirmed.isConfirmed) {
                    return false;
                }

            }

            if (chart_aset_found_bulk == 0) {

                const isConfirmed = await Swal.fire({
                    title: "Error",
                    text: "Hasil sensus kosong!",
                    icon: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    allowOutsideClick: false
                });

                if (!isConfirmed.isConfirmed) {
                    return false;
                }

            }

            var form_sensus = $('#form_sensus_add');
            var data_post = form_sensus.serializeArray();
            var save_type = $(this).attr('data-stype');

            data_post.push({
                name: 'save_type',
                value: save_type
            });

            data_post.push({
                name: 'event_submit_and_action',
                value: window.event_submit_and_action
            });

            data_post.push({
                name: 'hasil_sensus_normal',
                value: JSON.stringify(dataArrayAsetForBulk)
            });

            prepareHasilSensusAnomali();

            data_post.push({
                name: 'hasil_sensus_anomali',
                value: JSON.stringify(dataHasilSensusAnomali)
            });

            $('#data_processing').html('Saving data...');
            $('.loading').show();

            $.ajax({
                    url: ADMIN_BASE_URL + '/sensus/add_save',
                    type: 'POST',
                    dataType: 'json',
                    data: data_post,
                })
                .done(function(res) {

                    $('form').find('.form-group').removeClass('has-error');
                    $('.steps li').removeClass('error');
                    $('form').find('.error-input').remove();

                    if (res.success) {

                        $('#data_processing').html('');

                        if (save_type == 'back') {
                            window.location.href = res.redirect;
                            return;
                        }

                        if (use_ajax_crud) {
                            toastr['success'](res.message)
                        } else {

                            $('.message').printMessage({
                                message: res.message
                            });
                            $('.message').fadeIn();

                        }

                        $('#data_processing').html('');
                        $('.chosen option').prop('selected', false).trigger('chosen:updated');

                        return false;

                    } else {

                        // list table hasil sensus anomali wajib di clear datanya

                        dataHasilSensusAnomali = [];

                        $('#data_processing').html('');

                        if (res.errors) {

                            $.each(res.errors, function(index, val) {
                                $('form #' + index).parents('.form-group').addClass('has-error');
                                $('form #' + index).parents('.form-group').find('small').prepend(`<div class="error-input">` + val + `</div>`);
                            });

                            $('.steps li').removeClass('error');
                            $('.content section').each(function(index, el) {
                                if ($(this).find('.has-error').length) {
                                    $('.steps li:eq(' + index + ')').addClass('error').find('a').trigger('click');
                                }
                            });
                        }

                        $('.message').printMessage({
                            message: res.message,
                            type: 'warning'
                        });

                    }

                    if (use_ajax_crud == true) {
                        var url = BASE_URL + ADMIN_NAMESPACE_URL + '/sensus/index/?ajax=1'
                        // reloadDataTable(url);
                    }

                })
                .fail(function() {
                    $('.message').printMessage({
                        message: 'Error save data',
                        type: 'warning'
                    });
                })
                .always(function() {
                    $('.loading').hide();
                    $('html, body').animate({
                        scrollTop: $(document).height()
                    }, 2000);
                });

            return false;
        }); /*end btn save*/

    }); /*end doc ready*/
</script>