<div id="type_product" class="grey lighten-5">
    <nav>
        <div class="nav-wrapper red lighten-3">
            <div class="col s12 ml-4">
                <a href="<?= CONFIG['baseUrl'] . '/' ?>" class="breadcrumb">Venda</a>
                <a href="#!" class="breadcrumb">Categoria</a>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col s12 m6 l6 mt-4 mb-4">
            <a class="btn-floating btn-large waves-effect waves-light red  modal-trigger" href="#modalAdd" id="btnNew"><i class="material-icons">add</i></a>
        </div>
        <div class="col s12 m12 l12 mb-4">
            <div class="divider"></div>
        </div>
        <div class="col s12 m12 l12">
            <table class="" id="table_type_product">
                <thead>
                    <tr>
                        <th class="center-align">Descrição</th>
                        <th class="center-align">% Imposto</th>
                        <th class="center-align">Ações</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="modalAdd" class="modal">
    <form id="add" action="" method="POST">
        <div class="modal-content">
            <h4>Novo</h4>
            <div class="divider"></div>
            <div class="row mt-4">
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">comment</i>
                        <input id="description" name="description" type="text" class="validate" required>
                        <label for="description">Descrição</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">confirmation_number</i>
                        <input id="imposed" name="imposed" type="number" class="validate" required>
                        <label for="imposed">% Imposto</label>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect grey lighten-1 btn">Fechar</a>
            <button type="submit" class="waves-effect waves-green btn">Salvar</button>
        </div>
    </form>
</div>