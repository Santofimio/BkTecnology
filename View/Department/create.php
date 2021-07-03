<div class="container">
    <header class="mt-5 text-center">
        <h2>Registrar Departamento</h2>
    </header>
    <div class="row mt-5">
        <div class="col">
            <a href="<?php echo getUrl("Department", "Department", "consult") ?>">
                <button class="btn btn-success col-1" type="button">Volver</button>
            </a>
        </div>
    </div>
    <form action="<?php echo getUrl("Department", "Department", "create"); ?>" method="POST">
        <div class="row mt-5">
            <div class="col-4">
                <label>Nombre Del Departamento</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <input class="btn btn-primary col-1" type="submit" value="Crear">
            </div>
        </div>
    </form>
</div>