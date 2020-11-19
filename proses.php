<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>PROGRAM NILAI MAHASISWA</title>

	<link href="bootstrap.css" rel="stylesheet">
</head>

<body id="page-top" style="background:#1e90ff">
    <form action="hasil.php" method="post">

        <?php
            //memasukkan data ke array
            if (isset($_POST["kirimDataMhs"])) {
                $jumlahMhs = $_POST["jumlahMhs2"];
                for ($i=0 ; $i<$jumlahMhs ; $i++) {
                    $dataMhs[$i]["nama"] = $_POST["namaMhs$i"];
                    $dataMhs[$i]["nim"] = $_POST["nimMhs$i"];
                    $dataMhs[$i]["nilai"] = $_POST["nilaiMhs$i"];
                }
            }
        ?>

        <div id="wrapper" style="margin:0 250px;">
            <div id="content-wrapper" class="d-flex flex-column">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <h1 class="h3 mb-0 text-gray-800">Program Nilai Mahasiswa Informatika Udayana</h1>
                </nav>

                <div class="row" style="margin:0 100px">
                    <div class="col-xl-20 col-lg-15">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <input type="hidden" name="jumlahMhs" value="<?= $jumlahMhs ?>">
                                <input type="text" name="kkm" placeholder="Nilai KKM"> <button class="btn btn-facebook" type="submit" name="submitKKM">Kirim Data !</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="margin:0 100px">
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa (Unsorted)</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Nilai</th>
                                        </tr>
                                        <?php foreach ($dataMhs as $mhs) : ?>
                                            <tr>
                                                <td><?= $mhs["nama"] ?></td>
                                                <td><?= $mhs["nim"] ?></td>
                                                <td><?= $mhs["nilai"] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>

                            <?php
                            //pengecekan apakah sudah terurut
                            $urut = 0;
                            for ($i=0 ; $i<$jumlahMhs-1 ; $i++){
                                if ( $dataMhs[$i]["nilai"] < $dataMhs[$i+1]["nilai"]){
                                    $urut++;
                                }
                            }

                            //algoritma bubble sort
                            //jika belum terurut maka lakukan sorting
                            if ($urut < $jumlahMhs-1){
                                for($i=0 ; $i<$jumlahMhs-1 ; $i++){
                                    for($j=0 ; $j<$jumlahMhs-1 ; $j++){
                                        if($dataMhs[$j]["nilai"] > $dataMhs[$j+1]["nilai"]){
                                            //tukar nilai
                                            $temp = $dataMhs[$j]["nilai"];
                                            $dataMhs[$j]["nilai"] = $dataMhs[$j+1]["nilai"];
                                            $dataMhs[$j+1]["nilai"] = $temp;
                                            
                                            //tukar nama
                                            $temp2 = $dataMhs[$j]["nama"];
                                            $dataMhs[$j]["nama"] = $dataMhs[$j+1]["nama"];
                                            $dataMhs[$j+1]["nama"] = $temp2;

                                            $temp3 = $dataMhs[$j]["nim"];
                                            $dataMhs[$j]["nim"] = $dataMhs[$j+1]["nim"];
                                            $dataMhs[$j+1]["nim"] = $temp3;
                                        }
                                    }
                                }
                            }
                        ?>

                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa (Sorted)</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Nilai</th>
                                    </tr>
                                    <?php for ($i=0 ; $i<$jumlahMhs ; $i++) : ?>
                                        <tr>
                                            <td><?= $dataMhs[$i]["nama"] ?></td> <?php echo "<input type='hidden' name='namaMhs$i' value='".$dataMhs[$i]['nama']."'>"; ?>
                                            <td><?= $dataMhs[$i]["nim"] ?></td> <?php echo "<input type='hidden' name='nimMhs$i' value='".$dataMhs[$i]['nim']."'>"; ?>
                                            <td><?= $dataMhs[$i]["nilai"] ?></td> <?php echo "<input type='hidden' name='nilaiMhs$i' value='".$dataMhs[$i]['nilai']."'>"; ?>
                                        </tr>
                                    <?php endfor; ?>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </form>
        <footer class="sticky-footer bg-white" style="margin:0 250px;">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Hairul Lana 2020</span>
                </div>
            </div>
        </footer>
    </body>
</html>
