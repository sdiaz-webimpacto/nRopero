<?php
?>
<script>
let r = confirm("Vas a cobrar los pagos domiciliados. ¿Estás segur@?");
if(r == false) {
  window.location.replace("admin.php");
} else {
  window.location.replace("domiciliacionesOk.php");
}
</script>