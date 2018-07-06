<?php require ('header.php'); ?>

        <div class="container mt-5 mb-5">
            <div class="row row-inputs">
                <div class="col-12 text-center mb-5">
                    <h3 class="main-title">T.C Kimlik No Doğrulama</h3>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="input-a">AD</label>
                        <input type="text" class="form-control" id="input-a" prm="a">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="input-b">SOYAD</label>
                        <input type="text" class="form-control" id="input-b" prm="b">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="input-c">TC Kimlik Numarası</label>
                        <input type="text" class="form-control" id="input-c" prm="c">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="input-d">Doğum Yılı</label>
                        <input type="text" class="form-control" id="input-d" prm="d">
                    </div>
                </div>
                <div class="col-12">
                    <button type="button" class="btn btn-success float-right" id="btn-check">Bilgileri Doğrula</button>
                </div>
            </div>
        </div>
<?php require ('footer.php'); ?>