<?php require APPROOT . '/views/inc/header.php'; ?>
<h2>Adaugare masini</h2>
    <form method="POST" action="<?php echo URLROOT; ?>masini/register" 
      class="mt-4 w-75" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="marca" class="form-label">Marca</label>
        <input type="text" class="form-control <?php echo !$data['marca_err'] ?:
          "is-invalid"; ?>" id="marca" name="marca" placeholder="Introduceti marca" value="<?php echo $data['marca']; ?>">
          <div class="invalid-feedback">
            <?php echo $data['marca_err']; ?>
          </div>
      </div>
      <div class="mb-3">
        <label for="model" class="form-label">Model</label>
        <input type="text" class="form-control <?php echo !$data['model_err'] ?:
          "is-invalid"; ?>" id="model" name="model" placeholder="Introduceti modelul" value="<?php echo $data['model']; ?>">
          <div class="invalid-feedback">
            <?php echo $data['model_err']; ?>
          </div>
      </div>
      <div class="mb-3">
        <label for="culoare" class="form-label">Culoare</label>
        <input type="text" class="form-control <?php echo !$data['culoare_err'] ?:
          "is-invalid"; ?>" id="culoare" name="culoare" placeholder="Introduceti culoarea" value="<?php echo $data['culoare']; ?>">
          <div class="invalid-feedback">
            <?php echo $data['culoare_err']; ?>
          </div>
      </div>
      <div class="mb-3">
        <label for="imagine" class="form-label">Imagine</label>
        <input type="file" class="form-control <?php echo $_FILES['imagine']['error']!=0 ? "is-invalid"
        : null ?>" id="imagine" name="imagine" >
        <div class="invalid-feedback">
            <?php echo $data['imagine_err']; ?>
          </div>
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Submit " class="btn btn-dark w-100">
      </div>
    </form>

<?php require APPROOT . '/views/inc/footer.php'; ?>