<style>

      p{
        opacity: 0.5; 
        font-family: "Poppins", sans-serif;
    }

    .btn{
        width: 20%;
        margin: 15px;
        background-color: #0C1740;
        color: white;
        border-radius: 8px;
    }

    .btn:hover{
        opacity: 0.9;
        color: white;
    }
    .card-header{
        background-color: #0C1740;
        color: white;}
        .card{
        box-shadow: 5px 5px 10px 0 rgba(0, 0, 0, 0.3);
        width: 70%;
    }

    .card-body{
        display: flex;
        gap: 100px;
        
    }


</style>


<div class="body p-5" style="height: 95vh;">
<div class="header mb-3">
<img src="<?=BASEURL;?>img/logo bg putih.svg" alt="logo" />
</div>
<div style="display: flex;  gap:50px; width:100%;">

<div class="justify-content-center d-flex" style="width: 100%;">
<div class="card">
  <div class="card-header">
    Informasi pribadi
  </div>
  <div class="card-body p-5">
  <div class="foto" style=" width:80%; display: flex;  justify-content: center;
">
<?php
                    $data['id_user'] = $_SESSION['id_user'];
                    $profile_data = $this->model("User_model")->profile($data);

                    if (isset($profile_data['foto'])) {
                        $foto_profil = $profile_data['foto'];
                        echo '<img src="' . BASEURL . $foto_profil . '" alt="profile" style="border-radius: 50%; height: 200px; width: 200px; object-fit:cover;">';
                    } else {
                        echo '<img src="' . BASEURL . 'img/PersonCircle.png" alt="profile" style="width: 200px; height: 200px; border-radius:50%;">';
                        }
                        
               echo '<div class="detail-data-profil">';
               if (isset($profile_data['nama_user']) && isset($profile_data['role'])) {
                $nama = $profile_data['nama_user'];
                $role = $profile_data['role'];
                echo '<h3 style=" font-weight: 600; margin-bottom:0; font-size: 25px;">' . $nama . '</h3>
                <h3 style=" white; font-size: 15px;">' . $role . '</h3></div>';
            }
            
            ?>
</div>
<div style="width: 100%;">
    <span>          
        
        <h6>Nama Lengkap</h6>
        <p><?= $profile_data['nama_user']; ?></p>
    </span>
 <span>
   <h6>No Hp</h6>
   <p><?=$profile_data['no_hp_user'];?></p>
</span>
<span>
    <h6>Email</h6>
    <p><?=$profile_data['email'];?></p>
</span>
<span>
    <h6>Jenis Kelamin</h6>
    <p><?=$profile_data['jenis_kelamin']?></p>
</span>
<span>
    <h6>Alamat</h6>
    <p><?=$profile_data['alamat']?></p>
</span>
</div>
</div>
<a href="<?=BASEURL;?>Beranda" class="btn"><i class="fa-solid fa-arrow-left" style="color: #ffffff; margin-right: 10px;"></i>Kembali</a>
</div>
</div>
</div>
</div>


