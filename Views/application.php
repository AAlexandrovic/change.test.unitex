<?php

namespace applicatinton;

use controller\Applications;

include '../api/ApplicationsController.php';

$data = (new Applications)->getApplications();

//Выводим ошибку если не создана таблица applications
if (!is_array($data)) {
    echo $data;
} else {
?>
    <?php foreach ($data as $value) { ?>
        <div class="row align-items-center block">
            <div class="col-1 d-none d-md-block  rectangle" style="padding-top:10px;">
                <div class="d-flex justify-content-center align-items-center">
                    <span><text>№<?= $value['id'] ?></text>
                        <p style="padding-top: 10px;"><?= $value['date'] ?></p>
                    </span>
                </div>
            </div>
            <div class="col-9 col-md-9 col-sm-9 d-md-none justify-content-start sm-rectangle">
                <span><text style="padding-left: 15px">№<?= $value['id'] ?></text><text style="padding-left: 15px"><?= $value['date'] ?></text></span>
            </div>
            <div class=" col-3 col-md-3 col-sm-3 d-flex align-items-center justify-content-end d-md-none rectangle">
                <form id="myForm">
                    <input type="hidden" name="id" value="<?= $value['id'] ?>">
                    <input type="hidden" name="delete">
                    <button type="submit" id="firstForm" style="border: none;"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.420848 0.420873C0.715242 0.126473 1.19255 0.126473 1.48694 0.420873L19.5792 18.5134C19.8736 18.8078 19.8736 19.2852 19.5792 19.5796C19.2848 19.874 18.8075 19.874 18.5131 19.5796L0.420848 1.48699C0.126454 1.19259 0.126454 0.715273 0.420848 0.420873Z" fill="#666666" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M19.5791 0.420873C19.2847 0.126473 18.8074 0.126473 18.513 0.420873L0.420746 18.5134C0.126353 18.8078 0.126353 19.2852 0.420747 19.5796C0.71514 19.874 1.19245 19.874 1.48684 19.5796L19.5791 1.48699C19.8735 1.19259 19.8735 0.715273 19.5791 0.420873Z" fill="#666666" />
                        </svg></button>
                </form>
            </div>
            <div class="col-md-4 col-sm-12 ">
                <div class="col justify-content-start contact"><span>Контактное лицо:</span><br class="d-md-none"><text style="padding-left: 10px;"><?= $value['name'] ?></text></div>
                <div class="col justify-content-start city"><span>Город:</span><br class="d-md-none"><text><?= $value['city'] ?></text></div>
            </div>
            <div class="col-md-4 col-sm-12 ">
                <div class="col justify-content-start number"><span>Номер телефона:</span><br class="d-md-none"><text><?= $value['number'] ?></text></div>
                <div class=" col justify-content-start mail"><span>E-mail:</span><br class="d-md-none"><text><?= $value['mail'] ?></text></div>
            </div>
            <div class="col-md-3 d-none d-md-block">
                <div class="row justify-content-end">
                    <form id="myForm" style="padding-right: 10px;">
                        <input type="hidden" name="id" value="<?= $value['id'] ?>">
                        <input type="hidden" name="delete">
                        <button type="submit" style="border:none; background-color: #FFFFFF;"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.420848 0.420873C0.715242 0.126473 1.19255 0.126473 1.48694 0.420873L19.5792 18.5134C19.8736 18.8078 19.8736 19.2852 19.5792 19.5796C19.2848 19.874 18.8075 19.874 18.5131 19.5796L0.420848 1.48699C0.126454 1.19259 0.126454 0.715273 0.420848 0.420873Z" fill="#666666" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M19.5791 0.420873C19.2847 0.126473 18.8074 0.126473 18.513 0.420873L0.420746 18.5134C0.126353 18.8078 0.126353 19.2852 0.420747 19.5796C0.71514 19.874 1.19245 19.874 1.48684 19.5796L19.5791 1.48699C19.8735 1.19259 19.8735 0.715273 19.5791 0.420873Z" fill="#666666" />
                            </svg></button>
                    </form>
                </div>
            </div>
        </div>
<?php }
} ?>
<?php
