<h4 class="d-flex justify-content-between align-items-center mb-3">
    <span class="text-white">Pagos en línea</span>
</h4>
<div class="card text-center border-secondary">
    <div class="card-header">
        Datos personales
    </div>
    <form class="needs-validation p-3" validate id="form" method="POST" action="<?php echo getUrl("Invoice","Invoice","createInvoice",false,"fecth") ?>">
        <div class="row g-3">
            <div class="col-sm-6">
                <label for="firstName" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="firstName" name="name" placeholder="" value="<?php echo $_SESSION['nombre'] ?>" required="" readonly>
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
            </div>

            <div class="col-sm-6">
                <label for="lastName" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="lastName" name="last_name" placeholder="" value="<?php echo $_SESSION['apellido'] ?>" required="" readonly>
                <div class="invalid-feedback">
                    Valid last name is required.
                </div>
            </div>

            <div class="col-6">
                <label for="email" class="form-label">Correo<span class="text-muted"></span></label>
                <input type="email" class="form-control" id="email" name="email" required="" value="<?php echo $_SESSION['email'] ?>" readonly>
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>

            <div class="col-6">
                <label for="tel" class="form-label">Telefono<span class="text-muted"></span></label>
                <input type="tel" class="form-control" id="tel" name="tel" required="" value="<?php echo $cus['cus_tel'] ?>">
                <div class="invalid-feedback">
                    Please enter a valid tel address for shipping updates.
                </div>
            </div>

            <div class="col-12">
                <label for="address" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="address" name="address" required="" value="<?php echo $cus['cus_address_sh'] ?>">
                <div class="invalid-feedback">
                    Please enter your shipping address.
                </div>
            </div>

            <div class="col-12">
                <label for="address2" class="form-label">Dirección 2 <span class="text-muted">(Optional)</span></label>
                <input type="text" class="form-control" name="address2" placeholder="Apartment or suite" value="<?php echo $cus['cus_address_sh_two'] ?>">
            </div>

            <div class="col-md-5">
                <label for="country" class="form-label">Departamento</label>
                <select class="form-select" id="depto" name="depto" required="" onchange="sd('City','depto','city')">
                    <option value="">Seleccione...</option>
                    <?php
                    foreach ($depto as $dep) {
                        if ($dep['dep_id'] == $cus['dep_id']) {
                            echo "<option value='" . $dep['dep_id'] . "' selected>" . $dep['dep_name'] . "</option>";

                        }else {
                            echo "<option value='" . $dep['dep_id'] . "'>" . $dep['dep_name'] . "</option>";

                        }
                    }
                    ?>
                </select>
                <div class="invalid-feedback">
                    Please select a valid country.
                </div>
            </div>

            <div class="col-md-4">
                <label for="state" class="form-label">Ciudad</label>
                <select class="form-select" id="city" name="city" required="">
                </select>
                <div class="invalid-feedback">
                    Please provide a valid state.
                </div>
            </div>

            <div class="col-md-3">
                <label for="zip" class="form-label">Barrio</label>
                <input type="text" class="form-control" name="barrio" placeholder="" required="" value="<?php echo $cus['cus_district'] ?>">
                <div class="invalid-feedback">
                    Zip code required.
                </div>
            </div>
        </div>

        <hr class="my-4">

        <h4 class="mb-3">Metodos De Pago</h4>

        <div class="my-3 row">
            <!-- <div class="col">
                <input id="credit" name="paymentMethod" type="radio" class="form-check-input link" checked="" required="">
                <img src="img/MediosDePago/mastercard-icon.png" alt="" width="66px" height="66px">
                <label class="form-check-label" for="credit">Master Card</label>
            </div> -->
            <div class="col">
                <input id="credit-card" name="pay" type="radio" class="form-check-input link" required="" onchange="payForm('form-card')" value="1">
                <img src="img/MediosDePago/tarjetaCredito.png" alt="" width="66px" height="66px">
                <label class="form-check-label" for="paypal">tarjeta De Credito</label>
            </div>
            <div class="col">
                <input id="paypal" name="pay" type="radio" class="form-check-input link" required="" onchange="payForm('form-pse')" value="2">
                <img src="img/MediosDePago/pse-icon.png" alt="" width="66px" height="66px">
                <label class="form-check-label" for="paypal">PSE</label>
            </div>
        </div>
        <div class="card" style="display: none;" id="form-card">
            
        </div>
        <div class="card" style="display: none;" id="form-pse"> 
            <div class="card-body">
                <span>Sera redirijido a la plataforma de PSE</span>
                <span>para completar el pago</span>
            </div>
        </div>
        <input type="hidden" name="total" value="" id="input-total">
        <hr class="">

        <button class="w-100 btn btn-success btn-lg" type="submit" onclick="verificarPay(this)">Verificar Pago</button>
    </form>
</div>