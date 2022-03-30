<?php
$imgErro = isset($erros['img']) ? implode('<br>', $erros['img']) : null;
$name = $old['name'] ?? $product['NAME'] ?? null;
?>

<div class="container">
    <div class="col">
        <form id="products" enctype="multipart/form-data" action="<?= BASE_URL . '/admin/save-produto' ?>" method="post">
            <div class="py-4">
                <h4 class="pb-3" style="font-size: 20px;">Novo Produto</h4>
                <div class="form-group">
                    <div class="mb-4">
                        <input type="hidden" name="idProduct" value="<?= $product['ID'] ?? null ?>">
                        <label>Descrição</label>
                        <input type="text" name="name" class="form-control form-control-sm <?= isset($erros['name']) ? 'is-invalid' : ''; ?>" value="<?= $name ?>">
                        <span class="invalid-feedback"><?= $erros['name'] ?? null ?></span>
                    </div>
                    <div class="mb-4">
                        <label>Categorias</label>
                        <select class="custom-select" name="id_category" id="categoria">
                            <?php foreach ($listCategory as $item) : ?>
                                <option value="<?= $item['ID'] ?>"><?= $item['NAME'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label>imagem</label>
                        <input id="file-img" onchange="verifyFile()" type="file" name="img" class="form-control form-control <?= $imgErro ? 'is-invalid' : ''; ?>" value="<?= $old['old'] ?? null ?>">
                        <span class="invalid-feedback"><?= $imgErro ?></span>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" id="newProducts">Salvar</button>
        </form>
    </div>
</div>

<script>
    function verifyFile() {
        const inputFile = document.getElementById('file-img');
        if (inputFile.files[0]) {
            if (inputFile.files[0].size > 5e+6) {
                Swal.fire('O arquivo selecionado deve possui menos que 5M');
                inputFile.value = '';

            }
            if (inputFile.files[0].type != "image/jpeg") {
                Swal.fire('formato invalido, permitido apenas jpeg');
                inputFile.value = '';
            }
        }
    }

    document.getElementById('products').addEventListener('submit', function() {
        document.getElementById('newProducts').disabled = true;
    })
</script>