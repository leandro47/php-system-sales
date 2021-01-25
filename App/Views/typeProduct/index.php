<div id="type_product" class="grey lighten-5">
    <nav>
        <div class="nav-wrapper indigo lighten-1">
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
            <table class="responsive-table" id="table_type_product">
                <thead class="head-table">
                    <tr>
                        <th class="center-align">Descrição</th>
                        <th class="center-align">% Imposto</th>
                        <th class="center-align">Ações</th>
                    </tr>
                </thead>
                <tbody class="font-size-5">

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
                        <input id="imposed" name="imposed" type="text" class="validate imposed" required>
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

<div id="modalUpdate" class="modal">
    <form id="update" action="" method="">
        <input id="idUpdate" hidden name="idUpdate" type="text" class="" required>
        <div class="modal-content">
            <h4>Atualizar</h4>
            <div class="divider"></div>
            <div class="row mt-4">
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">comment</i>
                        <input id="updateDescription" name="updateDescription" type="text" class="validate" required>
                        <span class="helper-text">Descrição</span>

                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">confirmation_number</i>
                        <input id="updateImposed" name="updateImposed" type="text" class="validate imposed" required>
                        <span class="helper-text">% Imposto</span>
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

<div id="modalDelete" class="modal">
    <form id="delete" action="" method="">
        <input id="idDelete" hidden name="idDelete" type="text" class="" required>
        <div class="modal-content">
            <h4>Deletar</h4>
            <div class="divider"></div>
            <div class="row mt-4">
                <div class="row">
                    <div class="s12">
                        <h6>Deseja realmente deletar a categoria <b id="descriptionDelete"></b> ?</h6>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect grey lighten-1 btn">Fechar</a>
            <button type="submit" class="waves-effect waves-green btn">Deletar</button>
        </div>
    </form>
</div>