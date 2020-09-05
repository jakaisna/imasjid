<?php	
	include('PrayTime.php');
	include('retrieve.php'); 		
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>iMasjid</title>
</head>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css"> 
<!-- FontAwesome -->
<link rel="stylesheet" href="./assets/vendor/fontawesome/css/fontawesome.css"> 
<link rel="stylesheet" href="./assets/vendor/fontawesome/css/regular.css">
<link rel="stylesheet" href="./assets/vendor/fontawesome/css/solid.css">
<!-- Ionicons -->
<link href="./assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="./assets/css/style.css" rel="stylesheet">

<!-- Jquery -->
<script src="./assets/js/jquery-3.5.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="./assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Hijri Calendar JS -->
<script type="text/javascript" src="./assets/js/hijricalendar.js"></script>
<!-- Template Main JS File -->
<script src="./assets/js/main.js"></script>

<script>
  $(document).ready(function() {   
    $("#aboutBtn").click(function(){
      $("#aboutModal").modal();
    }); 
    
    $("#editBtn").click(function(){
      $("#editModal").modal();       
    }); 
    
    $("#simpan").click(function(){

    	var nama_masjid = $("#nama_masjid").val();
    	var alamat_masjid = $("#alamat_masjid").val();
    	var running_teks = $("#running_teks").val();
    	var kecepatan_teks = $("#kecepatan_teks").val();
    	var koreksi_hijriah = $("#koreksi_hijriah").val();
    	var durasi_adzan = $("#durasi_adzan").val();
    	var iqomah_shubuh = $("#iqomah_shubuh").val();
    	var iqomah_dzuhur = $("#iqomah_dzuhur").val();
    	var iqomah_ashar = $("#iqomah_ashar").val();
    	var iqomah_maghrib = $("#iqomah_maghrib").val();
    	var iqomah_isya = $("#iqomah_isya").val();
    	var garis_lintang = $("#garis_lintang").val();
    	var garis_bujur = $("#garis_bujur").val();
    	var zona_waktu = $("#zona_waktu").val();
    	var metode_perhitungan = $("#metode_perhitungan").val();    	
    	
    	$.ajax({
                url:'update.php',
                type:'POST',
                data:{
                	nama_masjid:nama_masjid,
                	alamat_masjid:alamat_masjid,
                	running_teks:running_teks,
                	kecepatan_teks:kecepatan_teks,
                	koreksi_hijriah:koreksi_hijriah,
                	durasi_adzan:durasi_adzan,
                	iqomah_shubuh:iqomah_shubuh,
                	iqomah_dzuhur:iqomah_dzuhur,
                	iqomah_ashar:iqomah_ashar,
                	iqomah_maghrib:iqomah_maghrib,
                	iqomah_isya:iqomah_isya,
                	garis_lintang:garis_lintang,
                	garis_bujur:garis_bujur,
                	zona_waktu:zona_waktu,
                	metode_perhitungan:metode_perhitungan
                },
                	success:function(data){
                		alert(data);
                		$("#NamaMasjid").text('' + nama_masjid);
                		$("#AlamatMasjid").text('' + alamat_masjid);
                		$("#RunningTeks").text('' + running_teks);
                		$("#KoreksiHijriah").text('' + koreksi_hijriah);   
                	
                		$('#editModal').modal('hide');
                }
        });    

    });
    

  });
</script>

<?php
	$day1 = date('Y');	
	
	if (!isset($method) || !isset($year) )
		list($method, $year, $latitude, $longitude, $timeZone) = array($metode_perhitungan, $day1, $garis_lintang, $garis_bujur, $zona_waktu);

		$prayTime = new PrayTime($method);	
		$day = date('d M Y');
		$date = strtotime($year);
		$times = $prayTime->getPrayerTimes($date, $latitude, $longitude, $timeZone);	
?>


<script type="text/javascript">
	//----------------------- Copyright Block ----------------------
	// http://w3schools.com/js/tryit.asp?filename=tryjs_timing_clock
	function startTime() {
  		var today = new Date();
  		// Variable untuk dynamic time
  		var h = today.getHours();
  		var m = today.getMinutes();
  		var s = today.getSeconds();
  		// Variable untuk bulan masehi
		var tahun = today.getFullYear();
		var bulan = today.getMonth();
		var month = today.getMonth();
		var tanggal = today.getDate();
		var hari = today.getDay();      	
		// Variable to add zero in front of numbers < 10
  		h = checkTime(h);
  		m = checkTime(m);
  		s = checkTime(s);
 		

  //----------------------- Copyright Block ----------------------
  // By: Hendra Dwi Putra

      // Convert nama hari ke Indonesia
       	switch(hari) {
        	case 0: hari = "Minggu"; break;
        	case 1: hari = "Senin"; break;
        	case 2: hari = "Selasa"; break;
        	case 3: hari = "Rabu"; break;
        	case 4: hari = "Kamis"; break;
        	case 5: hari = "Jum'at"; break;
        	case 6: hari = "Sabtu"; break;
      	}     

      	// Convert nama bulan ke Indonesia
      	switch(bulan) {
        	case 0: bulan = "Januari"; break;
        	case 1: bulan = "Februari"; break;
        	case 2: bulan = "Maret"; break;
        	case 3: bulan = "April"; break;
        	case 4: bulan = "Mei"; break;
        	case 5: bulan = "Juni"; break;
        	case 6: bulan = "Juli"; break;
        	case 7: bulan = "Agustus"; break;
        	case 8: bulan = "September"; break;
        	case 9: bulan = "Oktober"; break;
        	case 10: bulan = "November"; break;
        	case 11: bulan = "Desember"; break;
      	}

      	// Convert nama bulan ke English
      	switch(month) {
        	case 0: month = "Jan"; break;
        	case 1: month = "Feb"; break;
        	case 2: month = "Mar"; break;
        	case 3: month = "Apr"; break;
        	case 4: month = "May"; break;
        	case 5: month = "Jun"; break;
        	case 6: month = "Jul"; break;
        	case 7: month = "Aug"; break;
        	case 8: month = "Sep"; break;
        	case 9: month = "Oct"; break;
        	case 10: month = "Nov"; break;
        	case 11: month = "Dec"; break;
      	}

      //----------------------- Copyright Block ----------------------
  		// By: Hendra Dwi Putra
    	  
		// Variable nama solat
		var solatShubuh = "SHUBUH";
		var solatSyuruq = "SYURUQ";
		var solatDzuhur = "DZUHUR";
		var solatAshar = "ASHAR";
		var solatMaghrib = "MAGHRIB";
		var solatIsya = "ISYA";
		document.getElementById('prayer1').innerHTML = solatShubuh;
		document.getElementById('prayer2').innerHTML = solatSyuruq;
		document.getElementById('prayer3').innerHTML = solatDzuhur;
		document.getElementById('prayer4').innerHTML = solatAshar;
		document.getElementById('prayer5').innerHTML = solatMaghrib;
		document.getElementById('prayer6').innerHTML = solatIsya;  
		
		// Ambil 2 digit pertama jam solat dan dikonversi ke dalam menit 
  		var hr0 = '<?php echo substr($times[0],0,2)*60; ?>';
  		var hr1 = '<?php echo substr($times[1],0,2)*60; ?>';
  		var hr2 = '<?php echo substr($times[2],0,2)*60; ?>';
  		var hr3 = '<?php echo substr($times[3],0,2)*60; ?>';
  		var hr5 = '<?php echo substr($times[5],0,2)*60; ?>';
  		var hr6 = '<?php echo substr($times[6],0,2)*60; ?>';
		
  		// Ambil 2 digit terakhir menit solat
		var min0 = '<?php echo substr($times[0],3,4); ?>'; // Waktu shubuh dalam menit
		var min1 = '<?php echo substr($times[1],3,4); ?>'; // Waktu syuruq dalam menit 
		var min2 = '<?php echo substr($times[2],3,4); ?>'; // Waktu dzuhur dalam menit  
		var min3 = '<?php echo substr($times[3],3,4); ?>'; // Waktu ashar dalam menit  
		var min5 = '<?php echo substr($times[5],3,4); ?>'; // Waktu maghrib dalam menit 
		var min6 = '<?php echo substr($times[6],3,4); ?>'; // Waktu isya dalam menit
		
		// Menjumlah 2 digit Jam yang sudah dikonversi ke menit dan menambahkan nya dengan 2 digit Menit untuk menentukan waktu solat
  		var waktushubuh = Number(hr0) + Number(min0);
  		var waktusyuruq = Number(hr1) + Number(min1);
  		var waktudzuhur = Number(hr2) + Number(min2);
  		var waktuashar = Number(hr3)  + Number(min3);
  		var waktumaghrib = Number(hr5) + Number(min5);
  		var waktuisya = Number(hr6)  + Number(min6);	
		
  		// Mengambil waktu solat dari file PrayTime.php
  		var shubuh = '<?php echo $times[0]; ?>';
  		var syuruq = '<?php echo $times[1]; ?>';
  		var dzuhur = '<?php echo $times[2]; ?>';
  		var ashar = '<?php echo $times[3]; ?>';
  		var maghrib = '<?php echo $times[5]; ?>';
  		var isya = '<?php echo $times[6]; ?>'; 
		
		// Menampilkan waktu solat ke html
		document.getElementById("shubuh").innerHTML = shubuh;
		document.getElementById("syuruq").innerHTML = syuruq;
		document.getElementById("dzuhur").innerHTML = dzuhur;
		document.getElementById("ashar").innerHTML = ashar;
		document.getElementById("maghrib").innerHTML = maghrib;
		document.getElementById("isya").innerHTML = isya;      
      
  		// Penambahan waktu solat dalam bilangan menit,digunakan untuk timer sholat yang sudah masuk
  		var timershubuh = 30;
  		var timersyuruq = 20;
  		var timerdzuhur = 30;
  		var timerashar = 30;
  		var timermaghrib = 30;
  		var timerisya = 30;
		
  		// Menentukan batas waktu solat ke solat yang lain nya  		
  		var batasshubuh = Number(waktushubuh) + Number(timershubuh);
  		var batassyuruq = Number(waktusyuruq) + Number(timersyuruq);
  		var batasdzuhur = Number(waktudzuhur) + Number(timerdzuhur);
  		var batasashar = Number(waktuashar) + Number(timerashar);
  		var batasmaghrib = Number(waktumaghrib) + Number(timermaghrib);
  		var batasisya = Number(waktuisya) + Number(timerisya);
  		
  		// Konversi Jam dan menit ke menit
  		var currentminute = (h * 60) + Number(m);  
  		// Durasi adzan dalam hitungan menit	  
		var durasiadzan = <?php echo $durasi_adzan; ?>;	
		// Deklarasi variabel CSS
		var selected = "class='selected'";

  		if (currentminute <= waktushubuh) {
			var nextprayer = "Shubuh";
			var nextcounter = shubuh;  
			var starttime = waktushubuh;
			var endtime = batasshubuh;  
			var durasiiqomah = <?php echo $iqomah_shubuh; ?>;
			var nextdate = tanggal;
			var label = "ADZAN " + nextprayer;
			var hr = '<?php echo substr($times[0],0,2); ?>';
			var min = '<?php echo substr($times[0],3,4); ?>';        
			document.getElementById('prayer1').innerHTML = "<h3 " + selected + ">" + solatShubuh + "</h3>";
			document.getElementById('shubuh').innerHTML = "<h3 " + selected + ">" + shubuh + "</h3>";
			
        
		} else if (batasshubuh >= currentminute) {
  			var nextprayer = "Shubuh";
  			var nextcounter = shubuh;
  			var starttime = waktushubuh;
			var endtime = batasshubuh; 
			var durasiiqomah = <?php echo $iqomah_shubuh; ?>;    
			var nextdate = tanggal;
			var label = "ADZAN " + nextprayer;
			var hr = '<?php echo substr($times[0],0,2); ?>';
			var min = '<?php echo substr($times[0],3,4); ?>';
			document.getElementById('prayer1').innerHTML = "<h3 " + selected + ">" + solatShubuh + "</h3>";
			document.getElementById('shubuh').innerHTML = "<h3 " + selected + ">" + shubuh + "</h3>";
			
        
  		} else if (currentminute <= waktusyuruq) {
  			var nextprayer = "Syuruq";
  			var nextcounter = syuruq;  
  			var starttime = waktusyuruq;
			var endtime = batassyuruq;  
			var durasiadzan = 0;
			var durasiiqomah = 0;  
			var nextdate = tanggal;
			document.getElementById('prayer2').innerHTML = "<h3 " + selected + ">" + solatSyuruq + "</h3>";
			document.getElementById('syuruq').innerHTML = "<h3 " + selected + ">" + syuruq + "</h3>";
			
       
		} else if (batassyuruq >= currentminute) {
			var nextprayer = "Syuruq";
			var nextcounter = syuruq;    
			var starttime = waktusyuruq;
			var endtime = batassyuruq;  
			var durasiadzan = 0;	
			var durasiiqomah = 0;  
			var nextdate = tanggal;
			document.getElementById('prayer2').innerHTML = "<h3 " + selected + ">" + solatSyuruq + "</h3>";
			document.getElementById('syuruq').innerHTML = "<h3 " + selected + ">" + syuruq + "</h3>";	
			
        
		} else if (currentminute <= waktudzuhur) {
			if (hari == "Jum'at") { var nextprayer = "Jum'at"; var durasiiqomah = 0; var label = "WAKTU " + nextprayer;} else { var nextprayer = "Dzuhur"; var durasiiqomah = <?php echo $iqomah_dzuhur; ?>; var label = "ADZAN " + nextprayer;}  		
  			var nextcounter = dzuhur;  	
  			var starttime = waktudzuhur;
			var endtime = batasdzuhur;			 
			var nextdate = tanggal;			
			var hr = '<?php echo substr($times[2],0,2); ?>';
			var min = '<?php echo substr($times[2],3,4); ?>';        
			document.getElementById('prayer3').innerHTML = "<h3 " + selected + ">" + solatDzuhur + "</h3>";
			document.getElementById('dzuhur').innerHTML = "<h3 " + selected + ">" + dzuhur + "</h3>";
			
        
  		} else if (batasdzuhur >= currentminute) {
			if (hari == "Jum'at") { var nextprayer = "Jum'at"; var durasiiqomah = 0; var label = "WAKTU " + nextprayer;} else { var nextprayer = "Dzuhur"; var durasiiqomah = <?php echo $iqomah_dzuhur; ?>; var label = "ADZAN " + nextprayer;} 
			var nextcounter = dzuhur;    
			var starttime = waktudzuhur;
			var endtime = batasdzuhur; 
			var nextdate = tanggal;			
			var hr = '<?php echo substr($times[2],0,2); ?>';
			var min = '<?php echo substr($times[2],3,4); ?>';        
			document.getElementById('prayer3').innerHTML = "<h3 " + selected + ">" + solatDzuhur + "</h3>";
			document.getElementById('dzuhur').innerHTML = "<h3 " + selected + ">" + dzuhur + "</h3>";

        
		} else if (currentminute <= waktuashar) {
  			var nextprayer = "Ashar";
  			var nextcounter = ashar;  	
  			var starttime = waktuashar;
			var endtime = batasashar; 	
			var durasiiqomah = <?php echo $iqomah_ashar; ?>;
			var nextdate = tanggal;
			var label = "ADZAN " + nextprayer;
			var hr = '<?php echo substr($times[3],0,2); ?>';
			var min = '<?php echo substr($times[3],3,4); ?>';
			document.getElementById('prayer4').innerHTML = "<h3 " + selected + ">" + solatAshar + "</h3>";
			document.getElementById('ashar').innerHTML = "<h3 " + selected + ">" + ashar + "</h3>";
		
        	
  		} else if (batasashar >= currentminute) {
			var nextprayer = "Ashar";
			var nextcounter = ashar;    
			var starttime = waktuashar;
			var endtime = batasashar; 
			var durasiiqomah = <?php echo $iqomah_ashar; ?>;
			var nextdate = tanggal;
			var label = "ADZAN " + nextprayer;
			var hr = '<?php echo substr($times[3],0,2); ?>';
			var min = '<?php echo substr($times[3],3,4); ?>';
			document.getElementById('prayer4').innerHTML = "<h3 " + selected + ">" + solatAshar + "</h3>";
			document.getElementById('ashar').innerHTML = "<h3 " + selected + ">" + ashar + "</h3>";
			
       
		} else if (currentminute <= waktumaghrib) {
  			var nextprayer = "Maghrib";
  			var nextcounter = maghrib; 
  			var starttime = waktumaghrib;
			var endtime = batasmaghrib;   
			var durasiiqomah = <?php echo $iqomah_maghrib; ?>; 
			var nextdate = tanggal;
			var label = "ADZAN " + nextprayer;
			var hr = '<?php echo substr($times[5],0,2); ?>';
			var min = '<?php echo substr($times[5],3,4); ?>';
			document.getElementById('prayer5').innerHTML = "<h3 " + selected + ">" + solatMaghrib + "</h3>";
			document.getElementById('maghrib').innerHTML = "<h3 " + selected + ">" + maghrib + "</h3>";
			
        		
  		} else if (batasmaghrib >= currentminute) {
			var nextprayer = "Maghrib";
			var nextcounter = maghrib;    
			var starttime = waktumaghrib;
			var endtime = batasmaghrib; 
			var durasiiqomah = <?php echo $iqomah_maghrib; ?>;
			var nextdate = tanggal;
			var label = "ADZAN " + nextprayer;
			var hr = '<?php echo substr($times[5],0,2); ?>';
			var min = '<?php echo substr($times[5],3,4); ?>';
			document.getElementById('prayer5').innerHTML = "<h3 " + selected + ">" + solatMaghrib + "</h3>";
			document.getElementById('maghrib').innerHTML = "<h3 " + selected + ">" + maghrib + "</h3>";
			
        
		} else if (currentminute <= waktuisya) {
  			var nextprayer = "Isya";
  			var nextcounter = isya; 
  			var starttime = waktuisya;
			var endtime = batasisya;   
			var durasiiqomah = <?php echo $iqomah_isya; ?>;  	
			var nextdate = tanggal;
			var label = "ADZAN " + nextprayer;
			var hr = '<?php echo substr($times[6],0,2); ?>';
			var min = '<?php echo substr($times[6],3,4); ?>';
			document.getElementById('prayer6').innerHTML = "<h3 " + selected + ">" + solatIsya + "</h3>";
			document.getElementById('isya').innerHTML = "<h3 " + selected + ">" + isya + "</h3>";
			
        		
  		} else if (batasisya >= currentminute) {
			var nextprayer = "Isya";
			var nextcounter = isya;    
			var starttime = waktuisya;
			var endtime = batasisya; 
			var durasiiqomah = <?php echo $iqomah_isya; ?>; 
			var nextdate = tanggal;
			var label = "ADZAN " + nextprayer;
			var hr = '<?php echo substr($times[6],0,2); ?>';
			var min = '<?php echo substr($times[6],3,4); ?>';
			document.getElementById('prayer6').innerHTML = "<h3 " + selected + ">" + solatIsya + "</h3>";
			document.getElementById('isya').innerHTML = "<h3 " + selected + ">" + isya + "</h3>";
			
       
		} else if (batasisya <= currentminute) {
			var nextprayer = "Shubuh";
			var nextcounter = shubuh;
			var nextdate = tanggal + 1;
			var label = "ADZAN " + nextprayer;
			document.getElementById('prayer1').innerHTML = "<h3 " + selected + ">" + solatShubuh + "</h3>";
			document.getElementById('shubuh').innerHTML = "<h3 " + selected + ">" + shubuh + "</h3>";			
        
		} 

		// Pengaturan waktu iqomah dan awal solat berjamaah.
		var adzan_to_iqomah = Number(starttime) + Number(durasiadzan);
		var iqomah_to_solat = Number(adzan_to_iqomah) + Number(durasiiqomah);

  		// Kombinasi kalender masehi dah hijriah  		
		document.getElementById('penanggalan').innerHTML = hari + ", " + tanggal + " " + bulan + " " + tahun + " <i class='far fa-calendar-alt'></i> " + writeIslamicDate(<?php echo $koreksi_hijriah; ?>) + "H";

		// Output Dynamic time
		document.getElementById('jam').innerHTML = h + ":" + m + ":" + s;
		var t = setTimeout(startTime, 500);

		//----------------------- Copyright Block ----------------------
		// https://www.geeksforgeeks.org/create-countdown-timer-using-javascript/		
		// Countdown Timer	  
		var countDownDate = new Date(month + " " + nextdate + "," + tahun + " " + nextcounter + ":00").getTime();   
				  
		// Update the count down every 1 second
		var x = setInterval(function() {

  			// Get today's date and time
  			var now = new Date().getTime();  			
  	
  			// Find the distance between now and the count down date
  			var distance = countDownDate - now;

  			// Time calculations for hours, minutes and seconds
			var days = Math.floor(distance / (1000 * 60 * 60 * 24)); 
  			var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  			var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  			hours = checkTime(hours);
  			minutes = checkTime(minutes);
  			seconds = checkTime(seconds);

  			// Hitung mundur waktu solat berikut nya  
  			if (hours == 0) {
  				document.getElementById("timer").innerHTML = nextprayer.toUpperCase() + " - " + minutes + "<small>min</small>" + seconds + "<small>sec</small>"; 
  			} else {
  				document.getElementById("timer").innerHTML = nextprayer.toUpperCase() + " - " + hours + ":" + minutes + ":" + seconds; 
  			}	
  			
        	
        	//----------------------- Copyright Block ----------------------	
			// By: Hendra Dwi Putra			
			// Mengganti Nama Solat Berikut nya dengan Label Adzan
        	if (distance < 0) {
          		clearInterval(x); 
          		if (durasiadzan == 0 ) { // command ini untuk mengabaikan perintah adzan untuk solat syuruq
          			document.getElementById("timer").innerHTML = "WAKTU " + nextprayer.toUpperCase(); 
          		} else {
          			document.getElementById("timer").innerHTML = label; 
          		}          		
        	}  
        }, 1000);		
			
		// Mengganti label adzan dengan iqomah		
		if (currentminute >= adzan_to_iqomah) {

			if (durasiiqomah == 0) { // command ini untuk mengabaikan waktu iqomah untuk solat syuruq dan jum'at
            		document.getElementById("timer").innerHTML = "WAKTU " + nextprayer.toUpperCase(); 
            	
            } else {

            	var time = hr + ":" + (Number(min) + Number(durasiadzan) + Number(durasiiqomah));
            	//var deadline = new Date("Aug 21, 2020 11:25:00").getTime();           
            	var deadline = new Date(month + " " + nextdate + "," + tahun + " " + time + ":00").getTime();  

            	var y = setInterval(function() { 

					var now = new Date().getTime(); 
					var t = deadline - now; 
					var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
					var seconds = Math.floor((t % (1000 * 60)) / 1000); 
          
					minutes = checkTime(minutes);
					seconds = checkTime(seconds);            	         	

            		var label = "IQOMAH - " + minutes + ":" + seconds;
					document.getElementById("timer").innerHTML = label; 

            		if (t < 0) {
						clearInterval(y); 
						var label = "WAKTU " + nextprayer.toUpperCase(); 
						document.getElementById("timer").innerHTML = label;
					}    								
            	}, 1000); 			 
            }		
		}	
		
        var create_date = "2020";
		if (create_date == tahun) {
			var copyright_years = create_date;
		} else {
			var copyright_years = create_date + " - " + tahun;
		}
		
		document.getElementById("copyright").innerHTML = " " + "<i class='fas fa-info'></i><strong>Masjid<small><strong> 1.0</strong></small> " + "<i class='far fa-copyright'></i>" + " " +'<?php echo $nama_masjid; ?>' + " " + copyright_years + "</strong>";
		
	   }

	   //----------------------- Copyright Block ----------------------
	   // http://w3schools.com/js/tryit.asp?filename=tryjs_timing_clock
	   // Add zero in front of numbers < 10
	   function checkTime(i) {
  		  if (i < 10) {i = "0" + i}; 
  		  return i;
	   }    

	   
	
</script>
<body onload="startTime()">
	
