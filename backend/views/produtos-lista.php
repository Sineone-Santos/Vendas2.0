<div class="container mt-4">
    <div class="card">
        <h5 class="card-header bg-primary text-white">Produtos</h5>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="py-4">
                        <h4 class="pb-3" style="font-size: 20px;">Produtos ja cadastrados</h4>
                        <div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Descrição</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($lista) : ?>
                                        <?php foreach ($lista as $item) : ?>
                                            <tr>
                                                <td><?= $item['ID']; ?></td>
                                                <td><?= $item['NAME']; ?></td>
                                                <td><button class="btn btn-outline-danger" onclick="excluir(<?= $item['ID']; ?>)"><i class="fas fa-trash"></i></button></td>
                                                <td><a href="<?= BASE_URL.'/admin/produtos-cadastro?id='.$item['ID'] ?>"><button class="btn btn-outline-success"><i class="fas fa-edit"></i></button></a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
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
                await $.post(base_url + '/admin/delete-Produto', {
                    id
                })
                await Swal.fire(
                    'Deleted!',
                    'O produto foi deletado com sucesso',
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