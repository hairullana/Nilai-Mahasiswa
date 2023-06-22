<?php
    //algoritma binary search
    if (isset($_POST["submitKKM"])){
        $first = 0;
        $jumlahMhs = $_POST["jumlahMhs"];
        $last = $jumlahMhs-1;
        $kkm = $_POST["kkm"];
        
        //memasukkan data ke array
        for ($i=0 ; $i<$jumlahMhs ; $i++) {
            $dataMhs[$i]["nama"] = $_POST["namaMhs$i"];
            $dataMhs[$i]["nim"] = $_POST["nimMhs$i"];
            $dataMhs[$i]["nilai"] = $_POST["nilaiMhs$i"];
        }
        
        //proses pencarian nilai
        while($first <= $last){
            $mid = round (($first+$last)/2);
    
            if($kkm == $dataMhs[$mid]["nilai"]){
                break;
            }else{
                if($kkm > $dataMhs[$mid]["nilai"]) $first=$mid+1;  
                else $last=$mid-1;
            }
        }
         //posisi remidi
        $posisi = $mid;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>PROGRAM NILAI MAHASISWA</title>

        <link href="bootstrap.css" rel="stylesheet">
    </head>

    <body id="page-top" style="background:#1e90ff">
        <div id="wrapper" style="margin:0 250px;">
            <div id="content-wrapper" class="d-flex flex-column">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <h1 class="h3 mb-0 text-gray-800">Program Nilai Mahasiswa Informatika Udayana</h1>
                </nav>
                
                <div style="margin:0 100px">
                    <div class="col-xl-20 col-lg-15">
                        <div class="card shadow mb-4">

                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">List Mahasiswa Remidi</h6>
                            </div>
                            
                            <div class="card-body">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Nilai</th>
                                        </tr>
                                        <?php for ($i=0 ; $i<$posisi ; $i++) : ?>
                                            <tr>
                                                <td><?= $dataMhs[$i]["nama"] ?></td>
                                                <td><?= $dataMhs[$i]["nim"] ?></td>
                                                <td><?= $dataMhs[$i]["nilai"] ?></td>
                                            </tr>
                                        <?php endfor;  ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="sticky-footer bg-white" style="margin:0 250px;">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Hairul Lana 2020</span>
                </div>
            </div>
        </footer>
    </body>
</html>
