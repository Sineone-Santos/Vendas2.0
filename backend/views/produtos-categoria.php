<div class="container mt-4">
    <div class="card">
        <h5 class="card-header bg-primary text-white">Categorias</h5>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <form id="category" enctype="multipart/form-data" action="<?= BASE_URL . '/admin/insert-categoria' ?>" method="post">
                        <div class="py-4">
                            <h4 class="pb-3" style="font-size: 20px;">Nova Categoria</h4>
                            <div class="form-group">
                                <label>Descrição</label>
                                <input type="text" name="descricao" class="form-control form-control-sm <?= isset($erros['descricao']) ? 'is-invalid' : ''; ?>" value="<?= $old['descricao'] ?? null ?>">
                                <span class="invalid-feedback"><?= $erros['descricao'] ?? null ?></span>
                            </div>
                        </div>
                        <button class="btn btn-primary" id="newCategory">Salvar</button>
                    </form>
                </div>
                <div class="col">
                    <div class="py-4">
                        <h4 class="pb-3" style="font-size: 20px;">Categorias ja cadastradas</h4>
                        <div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Descrição</th>
                                        <th scope="col">Produtos</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lista as $item) : ?>
                                        <tr>
                                            <td><?= $item['ID']; ?></td>
                                            <td><?= $item['NAME']; ?></td>
                                            <td class="text-right"><?= $item['TOTALPRODUTOS']; ?></td>
                                            <td><button class="btn btn-outline-danger" onclick="excluir(<?= $item['ID']; ?>)"><i class="fas fa-trash"></i></button></td>
                                            <td><button class="btn btn-outline-success"><i class="fas fa-edit"></i></button></td>
                                            </button></td>
                                            <td><a href="<?= BASE_URL.'/admin/produtos-lista?id_categoria='.$item['ID']?>"><button class="btn btn-outline-success"><i class="fas fa-filter"></i></button></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('category').addEventListener('submit', function() {
        document.getElementById('newCategory').disabled = true;
    })
    async function excluir(id) {

        const {
            isConfirmed
        } = await Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        })
        if (isConfirmed) {
            try {
                await $.post(base_url + '/admin/delete-categoria', {id})
                await Swal.fire(
                    'Deleted!',
                    'A Categoria foi deletada com sucesso',
                    'success'
                )
                location.reload();
            } catch (e) {
                Swal.fire(
                    'Deleted!',
                    e.responseText,
                    'error'
                )

            }
        }

    }
</script>