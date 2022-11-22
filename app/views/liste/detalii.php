<?php require APPROOT . '/views/inc/header.php'; ?>
    <style>
            body {
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }
            .alb {
                width: 500px;
                height: 250px;
                padding: 5px;
            }
            .alb img {
                width: 100%;
                height: 100%;
            }
        </style>
    
<div class="card my-3 w-50">
    <div class="card-body text-center">
       <?php echo "ID=" . $data['masina']['id'] .  ", data: " .  $data['masina']['data_adaugarii'] . "<br>" . $data['masina']['marca'] . " " . $data['masina']['model'] . " " . $data['masina']['culoare']?>
    </div> 
</div>
<div class="alb">
    <img src="<?php echo URLROOT; ?>app/views/upload/<?php echo $data['masina']['imagine']?>" class="center">
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
