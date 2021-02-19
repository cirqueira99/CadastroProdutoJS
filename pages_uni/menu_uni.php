<?php $paginaLink = basename($_SERVER['SCRIPT_NAME']); ?>

<div class="  wrap-login101 p-l-28 p-r-28 p-t-30 p-b-30" >
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a href="../main.php" <?php if($paginaLink == 'main.php') {echo 'class="nav-link active"';}else{echo 'class="nav-link"';} ?> ><i class="fas fa-home m-r-4"></i>Home</a>
        <a href="../client.php"  <?php if($paginaLink == 'client_uni.php') {echo 'class="nav-link active"';}else{echo 'class="nav-link"';} ?> ><i class="fas fa-user-tag m-r-4"></i>Clientes</a>
        <a href="../products.php" <?php if($paginaLink == 'products_uni.php') {echo 'class="nav-link active"';}else{echo 'class="nav-link"';} ?> ><i class="fas fa-boxes m-r-4"></i>Produtos</a>
        <a href="../purchases.php" <?php if($paginaLink == 'purchases_uni.php') {echo 'class="nav-link active"';}else{echo 'class="nav-link"';} ?> ><i class="fas fa-shopping-cart m-r-4"></i>Compras</a>
        <a href="../sales.php" <?php if($paginaLink == 'sales_uni.php') {echo 'class="nav-link active"';}else{echo 'class="nav-link"';} ?> ><i class="fas fa-cash-register m-r-4"></i>Vendas</a>             
        <a href="../provider.php" <?php if($paginaLink == 'provider_uni.php') {echo 'class="nav-link active"';}else{echo 'class="nav-link"';} ?> ><i class="fas fa-user-tie m-r-4"></i>Fornecedores</a>
        <a href="../employee.php" <?php if($paginaLink == 'employee_uni.php') {echo 'class="nav-link active"';}else{echo 'class="nav-link"';} ?> ><i class="fas fa-address-book m-r-4"></i>Funcionários</a>
        <a href="../login.php" <?php if($paginaLink == 'login.php') {echo 'class="nav-link active"';}else{echo 'class="nav-link"';} ?> ><i class="fas fa-sign-out-alt m-r-4"></i>Sair</a>
    </div>
</div>