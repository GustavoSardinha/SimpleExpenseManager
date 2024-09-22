
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flamengo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="/assets/img/mengo.png" >
</head>
<body>
    <?php
        include("views/share/layout.php");
        include("routes/routes.php");
        include("views/share/footer.php");
    ?>
</body>
<script src="assets/js/jquery.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="assets/js/eye.js"></script>
<script src="assets/js/ajax5.js"></script>
<script src="assets/js/confirm.js"></script>
<script src="assets/js/validar.js"></script>
<script>
  function criaMascara(mascaraInput) {
    const maximoInput = document.getElementById(`${mascaraInput}Input`).maxLength;
    let valorInput = document.getElementById(`${mascaraInput}Input`).value;
    let valorSemPonto = document.getElementById(`${mascaraInput}Input`).value.replace(/([^0-9])+/g, "");
    const mascaras = {
      CPF: valorInput.replace(/[^\d]/g, "").replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4")
    };

    valorInput.length === maximoInput ? document.getElementById(`${mascaraInput}Input`).value = mascaras[mascaraInput] : document.getElementById(`${mascaraInput}Input`).value = valorSemPonto;
  };
</script>
</html>