<h4 class="d-flex justify-content-between align-items-center mb-3">
    <span class="text-white">Pagos en línea</span>
</h4>
<div class="card text-center border-secondary">
    <div class="card-header">
        Datos personales
    </div>
    <form class="needs-validation p-3" validate id="form">
        <div class="row g-3">
            <div class="col-sm-6">
                <label for="firstName" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="firstName" name="name" placeholder="" value="<?php echo $_SESSION['nombre']?>" required="" readonly> 
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
            </div>

            <div class="col-sm-6">
                <label for="lastName" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="lastName" name="last_name" placeholder="" value="<?php echo $_SESSION['apellido']?>" required="" readonly>
                <div class="invalid-feedback">
                    Valid last name is required.
                </div>
            </div>

            <div class="col-6">
                <label for="email" class="form-label">Correo<span class="text-muted"></span></label>
                <input type="email" class="form-control" id="email" name="email" required="" value="<?php echo $_SESSION['email']?>" readonly>
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>

            <div class="col-6">
                <label for="tel" class="form-label">Telefono<span class="text-muted"></span></label>
                <input type="tel" class="form-control" id="tel" name="tel" required="">
                <div class="invalid-feedback">
                    Please enter a valid tel address for shipping updates.
                </div>
            </div>

            <div class="col-12">
                <label for="address" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="address" name="address" required="">
                <div class="invalid-feedback">
                    Please enter your shipping address.
                </div>
            </div>

            <div class="col-12">
                <label for="address2" class="form-label">Dirección 2 <span class="text-muted">(Optional)</span></label>
                <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="col-md-5">
                <label for="country" class="form-label">Departamento</label>
                <select class="form-select" id="depto" name="depto" required="">
                    <option value="">Seleccione...</option>
                    <?php 
                    foreach ($depto as $dep) {
                        echo "<option value='".$dep['dep_id']."'>".$dep['dep_name']."</option>";
                    }
                    ?>
                </select>
                <div class="invalid-feedback">
                    Please select a valid country.
                </div>
            </div>

            <div class="col-md-4">
                <label for="state" class="form-label">Ciudad</label>
                <select class="form-select" id="ciudad" name="ciudad" required="">
                    <option value="">Seleccione...</option>
                </select>
                <div class="invalid-feedback">
                    Please provide a valid state.
                </div>
            </div>

            <div class="col-md-3">
                <label for="zip" class="form-label">Barrio</label>
                <input type="text" class="form-control" id="barrio" placeholder="" required="">
                <div class="invalid-feedback">
                    Zip code required.
                </div>
            </div>
        </div>

        <hr class="my-4">

        <h4 class="mb-3">Metodos De Pago</h4>

        <div class="my-3 row">
            <div class="col">
                <input id="credit" name="paymentMethod" type="radio" class="form-check-input link" checked="" required="">
                <img src="img/MediosDePago/mastercard-icon.png" alt="" width="66px" height="66px">
                <label class="form-check-label" for="credit">Master Card</label>
            </div>
            <div class="col">
                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input link" required="">
                <img src="img/MediosDePago/visa-Logo.png" alt="" width="66px" height="66px">
                <label class="form-check-label" for="paypal">Visa</label>
            </div>
            <div class="col">
                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input link" required="">
                <img src="img/MediosDePago/pse-icon.png" alt="" width="66px" height="66px">
                <label class="form-check-label" for="paypal">PSE</label>
            </div>
        </div>

        <div class="row gy-3" style="display: none;">
            <div class="col-md-6">
                <label for="cc-name" class="form-label">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                    Name on card is required
                </div>
            </div>

            <div class="col-md-6">
                <label for="cc-number" class="form-label">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                <div class="invalid-feedback">
                    Credit card number is required
                </div>
            </div>

            <div class="col-md-3">
                <label for="cc-expiration" class="form-label">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                <div class="invalid-feedback">
                    Expiration date required
                </div>
            </div>

            <div class="col-md-3">
                <label for="cc-cvv" class="form-label">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                <div class="invalid-feedback">
                    Security code required
                </div>
            </div>
        </div>

        <hr class="my-4">

        <button class="w-100 btn btn-success btn-lg" type="submit">Verificar Pago</button>
    </form>
</div>