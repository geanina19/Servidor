<hr>

<br><br>
<table>
    <tr>
        <td>id:</td>
        <td><input type="number" name="id" value="<?= $cli->id ?>" readonly> </td>
        <td rowspan="7" style="text-align: center;">
            <label>Bandera :</label>
            <img src="<?= $imageBandera ?>" alt="Imagen de una bandera de un pais" style="width: 144px; height: 108px;">
            <br><br>
            <label>Cliente :</label>
            <img src="<?= $imageUrl ?>" alt="Imagen del cliente" style="width: 150px; height: 150px;">
        </td>
    </tr>
    <tr>
        <td>first_name:</td>
        <td><input type="text" name="first_name" value="<?= $cli->first_name ?>" readonly> </td>
    </tr>
    
    <tr>
        <td>last_name:</td>
        <td><input type="text" name="last_name" value="<?= $cli->last_name ?>" readonly></td>
    </tr>

    <tr>
        <td>email:</td>
        <td><input type="email" name="email" value="<?= $cli->email ?>" readonly></td>
    </tr>

    <tr>
        <td>gender:</td>
        <td><input type="text" name="gender" value="<?= $cli->gender ?>" readonly></td>
    </tr>

    <tr>
        <td>ip_address:</td>
        <td><input type="text" name="ip_address" value="<?= $cli->ip_address ?>" readonly></td>
    </tr>

    <tr>
        <td>telefono:</td>
        <td><input type="tel" name="telefono" value="<?= $cli->telefono ?>" readonly></td>
    </tr>



</table>


<!-- Como no hay metodo se envia por get -->
<form>
    <input type="hidden" name="id" value="<?= $cli->id ?>">
    <button type="submit" name="nav-detalles" value="Anterior" style="background-color: burlywood;">Anterior</button>
    <button onclick="location.href='./'" style="background-color: green;"> Volver </button>
    <button type="submit" name="nav-detalles" value="pdf" style="background-color: pink;">Imprimir PDF</button>
    <button type="submit" name="nav-detalles" value="Siguiente" style="background-color: burlywood;">Siguiente</button>
</form>